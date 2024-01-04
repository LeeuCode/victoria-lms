@extends('backend.layout')

@section('content')
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('Choose Student') }}</h5>
                <div class="mb-3">
                    <label for="cat_name" class="form-label">{{ __('Student') }}</label>
                    <select name="" id="" class="form-select">
                        <option value="">Mohamed Ahmed</option>
                        <option value="">Ali Othman</option>
                        <option value="">Hader Atef</option>
                    </select>
                </div>
                <p class="my-2 text-primary fw-bold">{{ __('Or') }}</p>

                <div class="mb-3">
                    <label for="price" class="form-label">{{ __('Student ID') }}</label>
                    <input type="number" class="form-control" name="id" id="price" />
                </div>
                <a href="#" class="btn btn-primary">{{ __('Get Student') }}</a>
            </div>
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
                            <p class="badge bg-label-info">11085</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Name') }}:</p>
                            <p class="badge bg-label-dark">Ahmed Mohamed Ali</p>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Gender') }}:</p>
                            <p class="badge bg-label-primary">{{ __('Male') }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Country') }}:</p>
                            <p class="badge bg-label-success">{{ __('Egypt') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('Apply Exemptions Section') }}</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>{{ __('Exam Title') }}</th>
                                <th>{{ __('Exam Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <p class="m-0 small fw-bold">1.1 Financial Accounting</p>
                                </td>
                                <td>
                                    <p class="badge bg-label-primary m-0">{{ __('Open') }}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">{{ __('Exemption') }}</button>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    <p class="m-0 small fw-bold">1.2 Management Accounting</p>
                                </td>
                                <td>
                                    <p class="badge bg-label-warning m-0">{{ __('In Progress') }}</p>
                                </td>
                                <td>
                                    -
                                    {{-- <button type="button" class="btn btn-sm btn-primary">{{ __('Exemption') }}</button> --}}
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <p class="m-0 small fw-bold">1.3 Business Maths And Quantitive Methods</p>
                                </td>
                                <td>
                                    <p class="badge bg-label-danger m-0">{{ __('Exempt') }}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning">{{ __('Undo') }}</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
