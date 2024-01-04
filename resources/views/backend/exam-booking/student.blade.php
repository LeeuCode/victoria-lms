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
                            <p class="fw-bold">{{ __('Due Invoices') }}:</p>
                            <p class="badge bg-label-danger">€ 45</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Account Balance') }}:</p>
                            <p class="badge bg-label-success">€ 45</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('Choose Exam') }}</h5>

                <div class="mb-3">
                    <label for="date" class="form-label">{{ __('Select Exam Date') }}</label>
                    <input type="date" class="form-control" name="date" id="date" />
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">{{ __('Select Exam') }}</label>
                    <select name="" id="" class="form-select">
                        <option value="">Select an Exam</option>
                        <option value="">1.1 Financial Accounting</option>
                        <option value="">1.2 Management Accounting</option>
                        <option value="">1.3 Business Maths And Quantitive Methods</option>
                        <option value="">1.4 Economics</option>
                    </select>
                </div>

                <a href="#" class="btn btn-dark">{{ __('Confirm The Exam Booking') }}</a>
            </div>
        </div>
    </div>
@endsection
