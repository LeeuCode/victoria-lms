@extends('backend.layout')

@section('content')
    <div class="col-lg-5">
        <div class="card">
            <form action="{{ route('admin.subject.save') }}" method="post" class="card-body">
                @csrf
                <h5 class="card-title text-dark">Add Subject</h5>
                <div class="mb-3">
                    <label for="name" class="form-label">Subject Name</label>
                    <input type="text" class="form-control" name="name" id="name" />
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" />
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" class="form-control" name="duration" id="duration" />
                </div>

                <button type="submit" class="btn btn-dark">Add New Subject</button>
            </form>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="table-responsive-">
            <table class="table table-striped shadow-sm ">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">Subject Name</th>
                        <th class="text-white">Category Name</th>
                        <th class="text-white">Price</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if (count($subjects) > 0)
                        @foreach ($subjects as $key => $subject)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <span class="badge bg-label-primary">
                                        {{ $subject->category->name }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-label-success">${{ $subject->price }}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <p class="m-0 text-center">Not Found Data</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
