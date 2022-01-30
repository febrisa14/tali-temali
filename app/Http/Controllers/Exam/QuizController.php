<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use DataTables;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Quiz::select('quiz_id', 'quiz_name', 'quiz_time', 'number_of_question')
                ->orderBy('created_at', 'DESC')
                ->get();

                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = ' <a href="/admin/quiz/'. $data->quiz_id .'/question" class="pilih btn btn-sm btn-primary" data-toggle="tooltip" title="Lihat Pertanyaan"><i class="fa fa-chevron-right mr-1"></i> Lihat Pertanyaan</a>';
                    $actionBtn = $actionBtn . ' <a href="/admin/quiz/'. $data->quiz_id .'/edit" class="editdata btn btn-sm btn-alt-success" data-toggle="tooltip" title="Edit Data"><i class="fa fa-fw fa-edit"></i> Ubah</a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" class="delete btn btn-sm btn-alt-danger" data-id="' . $data->quiz_id . '" data-toggle="tooltip" title="Delete Data"><i class="fa fa-fw fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.exam.quiz.quiz_index', [
            'title' => 'List Quiz | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exam.quiz.quiz_add', [
            'title' => 'Tambah Data Quiz | SI Pembelajaran Tali Temali - UKM Mapala Kompas Stikom Bali'
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
            'quiz_name' => 'required|unique:quizzes',
            'description' => 'required',
            'quiz_date' => 'required',
            'quiz_time' => 'required',
            'number_of_question' => 'required',
        ]);

        Quiz::create([
            'quiz_name' => $request->quiz_name,
            'description' => $request->description,
            'quiz_date' => $request->quiz_date,
            'quiz_time' => $request->quiz_time,
            'number_of_question' => $request->number_of_question,
        ]);

        return redirect()->route('admin.quiz.index')->with('success', 'Berhasil Menambahkan Quiz.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
