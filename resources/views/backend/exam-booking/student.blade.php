@extends('backend.layout')

@section('content')
    <div class="col-lg-5">
        <div class="card">
            <form action="{{ route('admin.exam.booking') }}" method="GET" class="card-body">
                {{-- @csrf --}}

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

    <div class="col-lg-7">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('Student Infromation') }}</h5>
                <div class="d-flex gap-3 justify-content-between">
                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Student ID') }}:</p>
                            <p class="badge bg-label-info">{{ $student->id }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Name') }}:</p>
                            <p class="badge bg-label-dark">{{ $student->name }}</p>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Due Invoices') }}:</p>
                            <p class="badge bg-label-danger">€ 45</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Account Balance') }}:</p>
                            <p class="badge bg-label-success">€ 45</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <form action="{{ route('admin.exam.booking.save') }}" method="post" class="card-body">
                @csrf

                <input type="hidden" name="user_id" value="{{ $student->id }}">
                <h5 class="card-title text-primary">{{ __('Choose Exam') }}</h5>

                <div class="mb-3">
                    <label for="date" class="form-label">{{ __('Select Exam Date') }}</label>
                    <input type="date" class="form-control" name="date" id="exam_date" required />
                </div>

                <div class="mb-3">
                    <label for="subject_id" class="form-label">{{ __('Select Exam') }}</label>
                    <select name="subject_id" id="subject_id" class="form-select" required>
                        <option value="">Select an Exam</option>

                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->title }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-dark">{{ __('Confirm The Exam Booking') }}</button>
            </form>
        </div>
    </div>
@endsection
