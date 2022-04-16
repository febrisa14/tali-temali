@extends('components/backend/app')

@section('content')

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table Full Pagination -->
        <div class="block block-rounded">
            <div class="block-header border-bottom bg-danger text-white">
                <h3 class="block-title text-white">Quiz</h3>
                <b>Waktu tersisa : &nbsp; <span id="time-remaining" class="js-timeout">{{ $timer }}</span></b>
            </div>

            <!-- All Orders -->
            <div class="block-content block-content-full">
                <h3>{{$quiz->quiz_name}}</h3><hr>
                <form action="{{ route('quiz.submit')}}" method="POST" name="exam">
                @csrf
                    @foreach($questions as $key=>$ques)
                        <input type="hidden" name="question_id{{$key+1}}" value="{{$ques->question_id}}">
                        <input type="hidden" name="ans{{$key+1}}" value="0">
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
                                        <li><input type="radio" name="ans{{$key+1}}" value="{{$opt->option}}" /> {{$opt->option}}</li>
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                        </table>

                    @endforeach
                    <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                    <input type="hidden" name="quiz_id" value="{{$quiz->quiz_id}}">

                    <div class="row items-push">
                        <div class="col-lg-8 offset-lg-5">
                            <button type="submit" data-toggle="click-ripple" class="btn btn-primary">
                                <i class="fa fa-save mr-1"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END All Orders -->
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop

@push('scripts')

<script>

// var test = 300;
// if (localStorage.getItem("counter")) {
//     if (localStorage.getItem("counter") <= 0) {
//         var value = test;
//     } else {
//         var value = localStorage.getItem("counter");
//     }
// } else {
//     var value = test;
// }
// document.getElementById('time-remaining').innerHTML = value;

// var counter = function() {
//     if (value <= 0) {
//         localStorage.setItem("counter", test);
//         value = test;
//     } else {
//         value = parseInt(value) - 1;
//         localStorage.setItem("counter", value);
//     }
//     document.getElementById('time-remaining').innerHTML = value;
// };

// var interval = setInterval(function() { counter(); }, 1000);

	var interval;
	var form=document.forms.exam;
	function countdown() {
	  clearInterval(interval);

	  interval = setInterval( function() {
	      var timer = $('.js-timeout').html();
	      timer = timer.split(':');
	      var minutes = timer[0];
	      var seconds = timer[1];
	      seconds -= 1;
	      if (minutes < 0) return;
	      else if (seconds < 0 && minutes != 0) {
	          minutes -= 1;
	          seconds = 59;
	      }
	      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

	      $('.js-timeout').html(minutes + ':' + seconds);

	      if (minutes == 0 && seconds == 0) {
            clearInterval(interval);
            form.submit();
            }
	  }, 1000);
	}

	countdown();
</script>

@endpush
