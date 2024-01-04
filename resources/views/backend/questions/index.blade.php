@extends('backend.layout')

@section('content')
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center py-3 mb-3">
            <h5 class="fw-bold m-0"><span class="text-muted fw-light">Victorea /</span> Questions</h5>
            <a href="{{ route('admin.question.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Question') }}</a>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive-">
            <table class="table table-striped shadow-sm ">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">{{ __('Subject Name') }}</th>
                        <th class="text-white">{{ __('Subject Name') }}</th>
                        <th class="text-white">{{ __('Answers') }}</th>
                        <th class="text-white">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($questions as $key => $question)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $question->title }}</td>
                            <td>
                                <span class="badge bg-label-primary">
                                    {{ $question->subject->name }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-label-dark">
                                    {{ $question->answer()->count() }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.question.edit', ['id' => $question->id]) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
