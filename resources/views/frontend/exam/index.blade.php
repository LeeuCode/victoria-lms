@extends('backend.layout')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('/backend/css/jquery.countdown.css') }}"> --}}
@endsection

@section('content')
    <div class="col-lg-11 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="m-0">{{ $question->title }}</h4>
                <span id="time"></span>
            </div>
            <form action="{{ route('exam.store') }}" method="post" class="card-body row align-items-center">
                @csrf

                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                <input type="hidden" name="question_id" value="{{ $question->id }}">

                @foreach ($question->answer()->get() as $answer)
                    <div class="col-lg-6">
                        <div class="form-check mb-3">
                            <input name="answer_id" class="form-check-input" type="radio" value="{{ $answer->id }}"
                                id="answer-{{ $answer->id }}">
                            <label class="form-check-label" for="answer-{{ $answer->id }}"> {{ $answer->name }} </label>
                        </div>
                    </div>
                @endforeach

                <div class="col-12">
                    <button class="btn btn-primary px-5 mt-3">{{ __('Submit') }}</button>
                    <button class="btn btn-warning px-5 mt-3">{{ __('Bookmark') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/backend/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('/backend/js/jquery.countdown.min.js') }}"></script>
    <script>
        $(document).ready(function(){



            shortly = new Date();
            shortly.setMinutes(shortly.getMinutes() + 300);
            // shortly.setSeconds(shortly.getSeconds() + 5.5);

            function updatedata(params) {
                // var dateObject = new Date(...params);
                console.log(params[5], params[6]);
            }

            $('#time').countdown({
                until: shortly,
                expiryUrl: "{{ route('exam.destroy') }}",
                format: 'MS',
                // labels: ['Years', 'Months', 'Weeks', 'Days', 'H', 'Min', 'Sec'],
                compact: true,
                onTick: updatedata
                // description: 'To go to jQuery'
            });


            // $('#time').countdown('option', {
            //     until: shortly
            // });
        });
        // window.onbeforeunload = function() {
        //     $.get('removeSession.aspx', function() {
        //         // all good
        //     });
        // }
    </script>
@endsection
