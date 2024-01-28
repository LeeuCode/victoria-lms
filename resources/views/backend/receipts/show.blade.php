@extends('backend.layout')

@section('content')
    <div class="col-lg-4">
        {{-- Choose Student --}}
        <div class="card mb-3">
            <form action="{{ route('admin.exam.booking') }}" method="GET" class="card-body">
                {{-- @csrf --}}

                <h5 class="card-title text-primary">{{ __('Choose Student') }}</h5>
                <div class="mb-3">
                    <label for="cat_name" class="form-label">{{ __('Student') }}</label>
                    <select name="student_select_id" id="student_select_id" class="form-select">
                        <option value="">{{ __('Choose User') }}</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="my-2 text-primary fw-bold">{{ __('Or') }}</p>

                <div class="mb-3">
                    <label for="student_id" class="form-label">{{ __('Student ID') }}</label>
                    <input type="number" class="form-control" name="student_id" id="student_id" />
                </div>
                <button class="btn btn-primary">{{ __('Get Student') }}</button>
            </form>
        </div>

        {{-- Amount Paid --}}
        <div class="card">
            <form action="{{ route('admin.exam.booking') }}" method="GET" class="card-body mb-2">
                {{-- @csrf --}}

                <h5 class="card-title text-success">{{ __('Amount Paid') }}</h5>

                <div class="mb-3">
                    {{-- <label for="student_id" class="form-label">{{ __('Student ID') }}</label> --}}
                    <input type="number" class="form-control" name="student_id" id="student_id" />
                </div>
                <button class="btn btn-success">{{ __('Post the Receipt') }}</button>
            </form>

            <table class="table table-striped">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">{{ __('Date') }}</th>
                        <th class="text-white">{{ __('Amount') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td>1</td>
                        <td>22-12-2023</td>
                        <td>
                            <span class="badge bg-label-success">$350</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>24-12-2023</td>
                        <td>
                            <span class="badge bg-label-success">$50</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>26-12-2023</td>
                        <td>
                            <span class="badge bg-label-success">$40</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-8">
        {{-- Student Infromation --}}
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('Student Infromation') }}</h5>
                <div class="d-flex gap-3 justify-content-between">
                    <div class="w-50">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Student ID') }}:</p>
                            <p class="badge bg-label-info">{{ $student->id }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">{{ __('Name') }}:</p>
                            <p class="badge bg-label-dark">{{ $student->name }}</p>
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

        {{-- Oustanding Invoices --}}
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('Oustanding Invoices / Adjustments') }}</h5>
            </div>
            <table class="table table-striped">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">{{ __('Inv ID') }}</th>
                        <th class="text-white">{{ __('Date') }}</th>
                        <th class="text-white">{{ __('Description') }}</th>
                        <th class="text-white">{{ __('Amount') }}</th>
                        <th class="text-white">{{ __('Status') }}</th>
                        <th class="text-white"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($student->receipt()->get() as $key => $receipt)
                        <tr>
                            <td>
                                <p class="small m-0">{{ $key + 1 }}</p>
                            </td>
                            <td>
                                <p class="small m-0">#{{ $receipt->id }}</p>
                            </td>
                            <td>
                                <p class="small m-0">{{ date('d-m-Y', strtotime($receipt->created_at)) }}</p>
                            </td>
                            <td>
                                <p class="small m-0">{{ $receipt->description }}</p>
                            </td>
                            <td>
                                <span class="badge bg-label-success">${{ $receipt->amount }}</span>
                            </td>
                            <td>
                                @if ($receipt->status == 'paid')
                                    {{ __('Paid') }}
                                @else
                                    <button class="btn btn-sm btn-success">Pay</button>
                                @endif
                            </td>
                            <td>
                                @if ($receipt->status == 'paid')
                                    <button class="btn btn-sm btn-danger">Undo</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                        <td>
                            <p class="small m-0">2</p>
                        </td>
                        <td>
                            <p class="small m-0">#12</p>
                        </td>
                        <td>
                            <p class="small m-0">24-12-2023</p>
                        </td>
                        <td>
                            <p class="small m-0">Affiliate Member Annual Subscription</p>
                        </td>
                        <td>
                            <span class="badge bg-label-success">$300</span>
                        </td>
                        <td>
                            <p class="m-0">Paid</p>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger">Undo</button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
