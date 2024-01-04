@extends('backend.layout')

@section('content')
    <div class="col-lg-5">
        <div class="card">
            <form action="{{ route('admin.category.save') }}" method="post" class="card-body">
                @csrf
                <h5 class="card-title text-primary">Add Category</h5>
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" />
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" />
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" class="form-control" name="duration" id="duration" />
                </div>
                <button type="submit" class="btn btn-primary">Add New Category</button>
            </form>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="table-responsive-">
            <table class="table table-striped shadow-sm ">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">Category Name</th>
                        <th class="text-white">Price</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <span class="badge bg-label-success">${{ $category->price }}</span>
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

                    {{-- <tr>
                        <td>2</td>
                        <td>Exam Exemption Fee Gross Value</td>
                        <td>
                            <span class="badge bg-label-success">$340</span>
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
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
