@extends('backend.layout')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('admin.students') }}" method="GET" class="card-body row align-items-center">
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

    <div class="col-lg-12">
        <div class="table-responsive- mt-3">
            <table class="table table-striped shadow-sm ">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">User Name</th>
                        <th class="text-white">Email</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <span class="badge bg-label-success">${{ $user->email }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>

                                    <a href="" class="btn btn-sm btn-warning">
                                        <i class='bx bx-show-alt'></i>
                                    </a>
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
