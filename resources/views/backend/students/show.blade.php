@extends('backend.layout')

@section('content')
    <div class="col-lg-12">
        <div class="card mb-3">
            <form action="{{ route('admin.exam.booking') }}" method="GET" class="card-body row align-items-center">
                {{-- @csrf --}}

                <h5 class="card-title text-primary">{{ __('Choose Student') }}</h5>
                <div class="col-6">
                    <label for="cat_name" class="form-label">{{ __('Student') }}</label>
                    <select name="student_select_id" id="student_select_id" class="form-select">
                        <option value="">{{ __('Choose User') }}</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="col-1 text-primary fw-bold m-0 text-center">{{ __('Or') }}</p>

                <div class="col-5">
                    <label for="student_id" class="form-label">{{ __('Student ID') }}</label>
                    <input type="number" class="form-control" name="student_id" id="student_id" />
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary">{{ __('Get Student') }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-6">
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
                            <p class="badge bg-label-danger">$ 45</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Account Balance') }}:</p>
                            <p class="badge bg-label-success">$ {{ $student->balance }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold me-3">{{ __('Email') }}:</p>
                        <p class="badge bg-label-dark">{{ $student->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-success">{{ __('Login Information') }}</h5>
                <div class="d-flex- gap-3 justify-content-between-">
                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Name') }}:</p>
                            <p class="badge bg-label-dark">{{ $student->name }}</p>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Email') }}:</p>
                            <p class="badge bg-label-success">{{ $student->email }}</p>
                        </div>
                    </div>

                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Password') }}:</p>
                            <a href="#" class="">{{ __('Reset Password') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
