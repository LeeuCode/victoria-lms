@extends('backend.layout')

@section('content')
    <form action="{{ route('admin.question.save') }}" method="post" class="row">
        @csrf
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ __('Add New Question') }}</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $question->title }}"
                            id="name" />
                    </div>

                    <div class="mb-3">
                        <label for="subject_id" class="form-label">{{ __('Subject') }}</label>
                        <select class="form-select" name="subject_id" id="subject_id">
                            <option value="">{{ __('Choose Subject') }}</option>

                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ $question->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" name="status" type="checkbox" value="offline" id="status">
                        <label class="form-check-label" for="status">{{ __('Offline') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Add Question') }}</button>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div id="repeater">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Repeater Heading -->
                        <div class="repeater-heading d-flex align-items-center justify-content-between">
                            <h5 class="m-0">{{ __('Answers') }}</h5>
                            <button type="button" class="btn btn-primary repeater-add-btn">
                                {{ __('Add Answer') }}
                            </button>
                        </div>
                    </div>
                </div>

                @foreach ($question->answer()->get() as $answer)
                    <!-- Repeater Items -->
                    <div class="items" data-group="answers">
                        <!-- Repeater Item Content -->
                        <div class="item-content">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fw-bold">Answer</span>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" data-name="is_correct" name="is_correct"
                                                    type="checkbox" data-value="true" value="true" id="is_correct"
                                                    {{ $answer->is_correct == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="is_correct">{{ __('Correct Answer') }}</label>
                                            </div>

                                            <button type="button" class="btn btn-sm btn-danger remove-btn">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </div>
                                    </div>
                                    <textarea class="form-control" id="" placeholder="Name" data-name="name">{{ $answer->name }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
@endsection
