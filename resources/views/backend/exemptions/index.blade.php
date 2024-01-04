@extends('backend.layout')

@section('content')
    <div class="col-lg-6 mx-auto">
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
@endsection
