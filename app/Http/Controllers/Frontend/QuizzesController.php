<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Results;
use App\Models\Exams;
use DataTables;
use Carbon\Carbon;
use Auth;
use App\Models\Question;

class QuizzesController extends Controller
{
    public function __construct()
    {
        $this->middleware('avoid-back')->except('index','startQuiz','hasilQuiz');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Quiz::select('quiz_id', 'quiz_name', 'quiz_time', 'description')
                ->orderBy('created_at', 'DESC')
                ->get();

                return Datatables::of($data)
                ->editColumn('quiz_time', '{{$quiz_time}} menit')
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    if ($res = Results::where('user_id', Auth::user()->user_id)->where('quiz_id', $data->quiz_id)->where('status','Selesai')->first())
                    {
                        $actionBtn = ' <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="Hasil Quiz"> Hasil : '. $res->total_mark .'</a>';
                        $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-id="' . $data->quiz_id . '" class="mulai btn btn-sm btn-primary" data-toggle="tooltip" title="Mulai Quiz"><i class="fa fa-chevron-right mr-1"></i> Mulai Ulang Quiz</a>';
                        return $actionBtn;
                    }
                    else if ($res = Results::where('user_id', Auth::user()->user_id)->where('quiz_id', $data->quiz_id)->first())
                    {
                        $actionBtn = ' <a href="/anggota/quiz-start/'. $data->quiz_id .'" class="pilih btn btn-sm btn-warning" data-toggle="tooltip" title="Lihat Hasil Quiz"><i class="fa fa-chevron-right mr-1"></i> Lanjutkan Quiz</a>';
                        return $actionBtn;
                    }
                    else
                    {
                        $actionBtn = ' <a href="javascript:void(0)" data-id="' . $data->quiz_id . '" class="mulai btn btn-sm btn-primary" data-toggle="tooltip" title="Mulai Quiz"><i class="fa fa-chevron-right mr-1"></i> Mulai Quiz</a>';
                        return $actionBtn;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('frontend.quiz.quiz_list', [
            'title' => 'Quiz | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    public function startQuiz($id)
    {
        $quiz = Quiz::where('quiz_id',$id)->first();
        // $question = Question::where('quiz_id',$id)->get()->first();
        // $exams = new Exams;
        $userId = Auth::user()->user_id;
        $current = Carbon::now();

        if ($result = Results::where('quiz_id', $id)->where('user_id',$userId)->first())
        {
            $result->delete();

            Exams::where('quiz_id', $id)->where('user_id',$userId)->delete();

            Results::create([
                'quiz_id' => $quiz->quiz_id,
                // 'question_id' => $question->question_id,
                'user_id' => $userId,
                'tgl_exp' => $current->addMinute($quiz->quiz_time),
            ]);
        }

        else
        {
            Results::create([
                'quiz_id' => $quiz->quiz_id,
                // 'question_id' => $question->question_id,
                'user_id' => $userId,
                'tgl_exp' => $current->addMinute($quiz->quiz_time),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mulai Quiz'
        ]);

        // return redirect()->route('anggota.quiz.mulai');
    }

    public function mulaiQuiz($id)
    {
        $quiz = Quiz::where('quiz_id',$id)->first();
        $userId = Auth::user()->user_id;
        $current = Carbon::now();

        if ($quiz) {

            $check = Results::where('user_id', $userId)->where('quiz_id', $quiz->quiz_id)->where('status', 'Selesai')->first();

            if ($check)
            {
                return redirect()->back()->with('error', 'Kamu hanya dapat mengikuti Quiz selama 1 kali.');
            }

            else
            {
                $questions = Question::inRandomOrder()->limit($quiz->number_of_question)->where('quiz_id',$quiz->quiz_id)->get();
                $results = Results::where('user_id', $userId)->where('quiz_id', $quiz->quiz_id)->first();
                $timer = Carbon::parse($results->tgl_exp)->diffInSeconds($current);
                $timerUpdate = Carbon::parse($timer)->format('i:s');

                if ($results->tgl_exp <= $current) {
                    $timerUpdate = '0:01';
                }

                return view('frontend.quiz.quiz_start', [
                    'title' => 'Quiz Mulai | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
                    'questions' => $questions,
                    'quiz' => $quiz,
                    'timer' => $timerUpdate
                ]);
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Quiz tidak ditemukan.');
        }
    }

    public function submitQuiz(Request $request)
    {
        $userId = Auth::user()->user_id;
        $date = date('Y-m-d');
        $yes = 0;
        $no = 0;
        $data = $request->all();
        $result = array();

        for ($i = 1; $i <= $request->index; $i++)
        {
            if (isset($data['question_id'.$i]))
            {
                if ($exam = Exams::where('user_id', $userId)->where('question_id', $data['question_id'.$i])->first())
                {

                }
                else
                {
                    $exam = new Exams;
                }

                $question = Question::where('question_id', $data['question_id'.$i])->get()->first();

                if ($question->answer == $data['ans'.$i])
                {
                    $result[$data['question_id'.$i]]='yes';
                    $exam->is_ans = "yes";
                    $yes++;
                }
                else
                {
                    $result[$data['question_id'.$i]]='no';
                    $exam->is_ans = "no";
                    $no++;
                }

                $exam->user_id= $userId;
                $exam->quiz_id= $question->quiz_id;
       		    $exam->question_id=$data['question_id'.$i];
       		    $exam->ans=$data['ans'.$i];

       		    $exam->save();
            }
        }

        if ($res = Results::where('user_id', $userId)->where('quiz_id', $request->quiz_id)->first())
        {
            $res->user_id = $userId;
            $res->quiz_id = $request->quiz_id;
            $res->tgl_selesai = Carbon::now();
            $res->yes_ans = $yes;
            $res->status = 'Selesai';
            $res->no_ans = $no;
            $res->total_mark = 100*$yes/($yes+$no);
            $res->result_json = json_encode($result);
            $res->save();
        }
        // else
        // {
        //     $res = new Results;
        // }

        // $res->user_id = $userId;
        // $res->quiz_id = $request->quiz_id;
        // $res->date = $date;
        // $res->yes_ans = $yes;
        // $res->no_ans = $no;
        // $res->total_mark = 100*$yes/($yes+$no);
        // $res->result_json = json_encode($result);
        // $res->save();

        return redirect()->route('anggota.quiz.index')->with('success', 'Berhasil Mengikuti Quiz.');

    }

    public function hasilQuiz($id)
    {
        $userId = Auth::user()->user_id;
        $exams = Exams::where('user_id', $userId)->where('quiz_id',$id)->get();
        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id',$id)->get();
        $result = Results::where('quiz_id',$id)->where('user_id',$userId)->first();

        return view('frontend.quiz.results', [
            'title' => 'Hasil Quiz | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'exams' => $exams,
            'quiz' => $quiz,
            'questions' => $questions,
            'result' => $result
        ]);
    }
}
