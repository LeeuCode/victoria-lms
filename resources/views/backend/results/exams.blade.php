@extends('backend.layout')

@section('content')
    <div class="col-lg-4">
        <div class="card">
            <form action="{{ route('admin.exam.results') }}" method="GET" class="card-body">

                <h5 class="card-title text-primary">{{ __('Choose Student') }}</h5>
                <div class="mb-3">
                    <label for="cat_name" class="form-label">{{ __('Student') }}</label>
                    <select name="student_select_id" id="student_select_id" class="form-select">
                        <option value="">{{ __('Choose User') }}</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="my-2 text-primary fw-bold">{{ __('Or') }}</p>

                <div class="mb-3">
                    <label for="student_id" class="form-label">{{ __('Student ID') }}</label>
                    <input type="number" class="form-control" name="student_id" id="student_id" />
                </div>
                <button class="btn btn-primary">{{ __('Get Student') }}</button>
            </form>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="text-dark me-1" >{{ __('Student') }} : </span>
                    <span class="text-primary">{{ $student->name }}</span>
                </h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>{{ __('Exam Title') }}</th>
                                <th>{{ __('Exam Status') }}</th>
                                <th>{{ __('Result') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($exams)
                                @foreach ($exams as $key => $exam)
                                    <tr>
                                        <th scope="row">{{ ($key+1) }}</th>
                                        <td>
                                            <p class="m-0 small fw-bold">{{ $exam->subject->name }}</p>
                                        </td>
                                        <td>
                                           @php
                                               if ($exam->status == "open") {
                                                $status  = 'bg-label-primary';
                                               } elseif ($exam->status == "In Progress") {
                                                $status  = 'bg-label-warning';
                                               } elseif ($exam->status == "closed") {
                                                $status  = 'bg-label-secondary';
                                               }
                                           @endphp
                                            <p class="badge {{ $status }} m-0">{{ $exam->status }}</p>
                                        </td>
                                        <td>
                                            <p class="badge bg-label-danger m-0">43%</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
