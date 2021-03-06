<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Options;
use DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Question::select('question_id', 'question', 'answer')
                ->where('quiz_id', $id)
                ->get();

                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = ' <a href="/admin/question/'. $data->question_id .'/edit" class="editdata btn btn-sm btn-alt-success" data-toggle="tooltip" title="Edit Data"><i class="fa fa-fw fa-edit"></i> Ubah</a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-id="' . $data->question_id . '" class="delete btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $quiz = Quiz::where('quiz_id',$id)->first();

        $jumlahQuestion = Question::where('quiz_id',$id)->count();

        // dd ($quiz->number_of_question);

        return view('backend.exam.question.question_index', [
            'title' => 'List Pertanyaan | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'quiz' => $quiz,
            'jumlahQuestion' => $jumlahQuestion,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::where('quiz_id',$id)->first();

        return view('backend.exam.question.question_add', [
            'title' => 'Tambah Data Pertanyaan | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'quiz' => $quiz
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'option' => 'required',
            'answer' => 'required'
        ]);

        $question = Question::create([
            'quiz_id' => $request->quiz_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        if (count($request->option) > 0)
        {
            foreach ($request->option as $option)
            {
                $data = array(
                    'question_id' => $question->question_id,
                    'option' => $option
                );

                Options::insert($data);
            }
        }

        return redirect()->route('admin.question.index',$request->quiz_id)->with('success', 'Berhasil Menambahkan Pertanyaan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::where('question_id',$id)->first();

        return view('backend.exam.question.question_edit', [
            'title' => 'Ubah Data Pertanyaan | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali',
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'option' => 'required',
            'answer' => 'required'
        ]);

        $question = Question::where('question_id',$id)->first();

        Question::where('question_id', $id)->update([
            'quiz_id' => $question->quiz_id,
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        if (count($request->option) > 0)
        {
            foreach ($request->option_id as $item=>$v)
            {
                $data = array(
                    'option' => $request->option[$item]
                );

                $updateOptions = Options::where('option_id',$request->option_id[$item])->first();
                $updateOptions->update($data);
            }
        }

        return redirect()->route('admin.question.index',$question->quiz_id)->with('success', 'Berhasil Update Pertanyaan.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        // Options::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Pertanyaan'
        ]);
    }
}
