@extends('backend.layout')

@section('content')
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center py-3 mb-3">
            <h5 class="fw-bold m-0"><span class="text-muted fw-light">Victorea /</span> Questions</h5>
            <a href="{{ route('admin.question.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Question') }}</a>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <form action="{{ route('admin.questions') }}" method="get" class="card-body">
                {{-- @csrf --}}
                <h5 class="card-title text-dark">Subject Name</h5>
                <div class="mb-3">
                    {{-- <label for="name" class="form-label">Subject Name</label> --}}
                    <select class="form-select" name="subject_id" id="">
                        <option value="">{{ __('Choose The Subject') }}</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Choose') }}</button>
            </form>
        </div>
    </div>

    @isset($questions)
        <div class="col-lg-6">
            <div class="card">
                <form action="{{ route('admin.question.edit') }}" method="git" class="card-body">
                    {{-- @csrf --}}
                    <h5 class="card-title text-dark">Quetion</h5>
                    <div class="mb-3">
                        {{-- <label for="name" class="form-label">Subject Name</label> --}}
                        <select class="form-select" name="question_id" id="">
                            <option value="">{{ __('Choose The Subject') }}</option>
                            @foreach ($questions as $question)
                                <option value="{{ $question->id }}">{{ Str::words($question->title, 9, '...') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                </form>
            </div>
        </div>
    @endisset
@endsection
