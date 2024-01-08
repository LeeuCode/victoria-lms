@extends('backend.layout')

@section('content')
    <div class="col-lg-6 mx-auto">
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
@endsection
