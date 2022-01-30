<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Results;
use DataTables;
use Auth;
use App\Models\Question;

class QuizzesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Quiz::select('quiz_id', 'quiz_name', 'quiz_time', 'description')
                ->orderBy('created_at', 'DESC')
                ->get();

                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = ' <a href="/anggota/quiz-start/'. $data->quiz_id .'" class="pilih btn btn-sm btn-primary" data-toggle="tooltip" title="Mulai Quiz"><i class="fa fa-chevron-right mr-1"></i> Mulai Quiz</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('frontend.quiz.quiz_list', [
            'title' => 'Quiz | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }

    public function mulaiQuiz($id)
    {
        $quiz = Quiz::where('quiz_id',$id)->first();

        if ($quiz)
        {
            $userId = Auth::user()->user_id;

            $check = Results::where('user_id', $userId)->where('quiz_id', $quiz->quiz_id)->first();

            if ($check)
            {
                return redirect()->back()->with('error', 'Kamu hanya dapat mengikuti Quiz selama 1 kali.');
            }

            else
            {
                $questions = Question::inRandomOrder()->limit($quiz->number_of_question)->where('quiz_id',$quiz->quiz_id)->get();
                return view('frontend.quiz.quiz_start', [
                    'title' => 'Quiz Mulai | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
                    'questions' => $questions,
                    'quiz' => $quiz
                ]);
            }
        }

        else
        {
            return redirect()->back()->with('error', 'Quiz tidak ditemukan / error.');
        }
    }
}
