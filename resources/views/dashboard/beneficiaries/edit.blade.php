@extends('dashboard.layouts.main')

@section('title','Beneficiaries')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Beneficiaries')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">{{ $beneficiary->first_name }}</a></li>
        <li class="breadcrumb-item px-3 text-muted">Edit</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('beneficiaries.update', $beneficiary) }}" method="POST" enctype="multipart/form-data" id="create-beneficiary-form">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $beneficiary->first_name }}"/>

                        @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="middle_name">Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ $beneficiary->middle_name }}"/>

                        @error('middle_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ $beneficiary->last_name }}"/>

                        @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ $beneficiary->age }}"/>

                        @error('age')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="mobile_number">Mobile Number</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ $beneficiary->mobile_number }}"/>

                        @error('mobile_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="national_id">National ID</label>
                        <input type="text" name="national_id" id="national_id" class="form-control @error('national_id') is-invalid @enderror" value="{{ $beneficiary->national_id }}"/>

                        @error('national_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="token_number">Token Number</label>
                        <input type="text" name="token_number" id="token_number" class="form-control @error('token_number') is-invalid @enderror" value="{{ $beneficiary->token_number }}"/>

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
                                <option value="{{ $project->id }}" @if($beneficiary->project_id == $project->id) selected @endif>{{ $project->name }}</option>
                            @endforeach
                        </select>

                        @error('project_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="amount">Amount To Be Paid</label>
                        <input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ $beneficiary->amount }}">

                        @error('amount')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="featured_image">Beneficiary Image</label>
                        <input type="file" name="featured_image" id="featured_image" class="form-control @error('featured_image') is-invalid @enderror">

                        @error('featured_image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="payment_status">Payment Status</label>
                        <select name="payment_status" id="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
                            <option value="paid" @if($beneficiary->payment_status == 'paid') selected @endif>Paid</option>
                            <option value="not paid" @if($beneficiary->payment_status == 'not paid') selected @endif>Not Paid</option>
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