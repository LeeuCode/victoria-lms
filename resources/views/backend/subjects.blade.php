@extends('backend.layout')

@section('content')
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-dark">Add Subject</h5>
                <div class="mb-3">
                    <label for="cat_name" class="form-label">Subject Name</label>
                    <input type="text" class="form-control" name="cat_name" id="cat_name" />
                </div>

                <div class="mb-3">
                    <label for="cat_name" class="form-label">Category</label>
                    <select class="form-select" name="cat_name" id="cat_name">
                        <option value="">MPA</option>
                        <option value="">CCPA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" />
                </div>
                <a href="#" class="btn btn-dark">Add New Subject</a>
            </div>
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
                    <tr>
                        <td>1</td>
                        <td>Exam Fee Gross Value</td>
                        <td>
                            <span class="badge bg-label-primary">CCPA</span>
                        </td>
                        <td>
                            <span class="badge bg-label-success">$230</span>
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

                    <tr>
                        <td>2</td>
                        <td>Financial Accounting</td>
                        <td>
                            <span class="badge bg-label-primary">MPA</span>
                        </td>
                        <td>
                            <span class="badge bg-label-success">$50</span>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
