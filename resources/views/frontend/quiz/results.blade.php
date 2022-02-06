@extends('components/backend/app')

@section('content')

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table Full Pagination -->
        <div class="block block-rounded">
            <div class="block-header border-bottom bg-danger text-white">
                <h3 class="block-title text-white">Hasil Quiz</h3>
                <b>Nilai : &nbsp; <span>{{ $result->total_mark }}</span></b>
            </div>

            <!-- All Orders -->
            <div class="block-content block-content-full">
                <h3>{{$quiz->quiz_name}}</h3>
                <hr>
                @foreach ($exams as $key=>$exam)
                    @foreach ($questions as $ques)
                        @if ($exam->question_id == $ques->question_id)
                        <table class="table table-borderless">
                            <tr class="bg-primary text-white">
                                <td width="120px"><b>Pertanyaan :</b></td>
                                <td>{{$ques->question}}</td>
                            </tr>
                            <tr>
                                <td><b>Jawaban :</b></td>
                                <td>
                                    <ol class="ul-list" style="list-style-type: none; padding:0;" >
                                        @foreach($ques->optionsdata as $opt)
                                            @if ($ques->answer == $exam->ans)
                                                @if ($opt->option != $ques->answer)
                                                    <li style="font-weight:600;"><input disabled type="radio" /> {{$opt->option}}</li>
                                                @else
                                                    <li style="font-weight:600; color:rgb(22, 146, 22);"><input disabled type="radio" {{$opt->option == $ques->answer ? 'checked' : ''}} /> {{$opt->option}}</li>
                                                @endIf
                                            @else
                                                @if ($opt->option == $ques->answer)
                                                    <li style="font-weight:600; color:rgb(22, 146, 22);"><input disabled type="radio" value="{{$opt->option}}" checked="" /> {{$opt->option}}</li>
                                                @elseif ($opt->option == $exam->ans)
                                                <li style="font-weight:600; color: red;"><input disabled type="radio" value="{{$opt->option}}" checked="" /> {{$opt->option}}</li>
                                                @else
                                                    <li><input type="radio" disabled value="{{$opt->option}}" /> {{$opt->option}}</li>
                                                @endIf
                                            @endIf
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                        </table>
                        @endIf
                    @endforeach
                @endforeach
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop
