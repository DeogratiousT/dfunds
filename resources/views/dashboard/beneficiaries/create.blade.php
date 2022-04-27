@extends('dashboard.layouts.main')

@section('title','Beneficiaries')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Beneficiaries')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> --}}
        <li class="breadcrumb-item px-3 text-muted">Create</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('beneficiaries.store') }}" method="POST" enctype="multipart/form-data" id="create-beneficiary-form">
                @csrf
                <div class="row mb-4">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"/>

                        @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="middle_name">Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}"/>

                        @error('middle_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"/>

                        @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}"/>

                        @error('age')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="mobile_number">Mobile Number</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number') }}"/>

                        @error('mobile_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="national_id">National ID</label>
                        <input type="text" name="national_id" id="national_id" class="form-control @error('national_id') is-invalid @enderror" value="{{ old('national_id') }}"/>

                        @error('national_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="token_number">Token Number</label>
                        <input type="text" name="token_number" id="token_number" class="form-control @error('token_number') is-invalid @enderror" value="{{ old('token_number') }}"/>

                        @error('token_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="project_id">Project</label>
                        <select name="project_id" id="project_id" class="form-control @error('project_id') is-invalid @enderror">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>

                        @error('project_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="amount">Amount To Be Paid</label>
                        <input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">

                        @error('amount')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="featured_image">Beneficiary featured_image</label>
                        <input type="file" name="featured_image" id="featured_image" class="form-control @error('featured_image') is-invalid @enderror" value="{{ old('featured_image') }}">

                        @error('featured_image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="payment_status">Payment Status</label>
                        <select name="payment_status" id="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
                            <option value="paid">Paid</option>
                            <option value="not paid">Not Paid</option>
                        </select>

                        @error('payment_status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" id="kt_projects_submit" class="btn btn-primary" onclick="createBeneficiary(this)">
                        <span class="indicator-label">Continue</span>
                        <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div> 
            </form>
        </div> <!-- end card-body -->
    </div> <!-- end card -->                
@endsection

@push('scripts')
    <script>
        function createBeneficiary(obj){

            event.preventDefault();

            obj.setAttribute("data-kt-indicator", "on");

            document.getElementById('create-beneficiary-form').submit();
        }
    </script>
@endpush