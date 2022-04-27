@extends('dashboard.layouts.main')

@section('title','Projects')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Projects')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> --}}
        <li class="breadcrumb-item px-3 text-muted">Create</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('projects.store') }}" method="post" id="create-project-form">
                @csrf
                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>

                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="partner_id">Partner</label>
                        <select name="partner_id" id="partner_id" class="form-control @error('partner_id') is-invalid @enderror">
                            @foreach ($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>

                        @error('partner_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                            {{ old('description') }}
                        </textarea>

                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}"/>

                        @error('start_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}"/>

                        @error('end_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="state_id">State</label>
                        <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror" onchange="updateCounties(this, {{ json_encode($states) }})">
                            <option style="display: none">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>

                        @error('state_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="county_id">County</label>
                        <select name="county_id" id="county_id" class="form-control @error('county_id') is-invalid @enderror" onchange="updatePayams(this, {{ json_encode($counties) }})">

                        </select>

                        @error('county_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="payam_id">PAYAM</label>
                        <select name="payam_id" id="payam_id" class="form-control @error('payam_id') is-invalid @enderror">

                        </select>

                        @error('payam_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="payment_type">Payment Type</label>
                        <select name="payment_type" id="payment_type" class="form-control @error('payment_type') is-invalid @enderror">
                            <option value="once">Once</option>
                            <option value="monthly">Monthly</option>
                        </select>

                        @error('payment_type')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="status">Project status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="mb-4">
                    <button type="submit" id="kt_projects_submit" class="btn btn-primary" onclick="createProject(this)">
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
        function createProject(obj){

            event.preventDefault();

            obj.setAttribute("data-kt-indicator", "on");

            document.getElementById('create-project-form').submit();
        }

    function updateCounties(obj, states)
    {
        let sstate;
        let countySelect = document.getElementById('county_id');

        if (obj.options.length > 0) {
            countySelect.innerHTML = "";
            sstate = obj.options[obj.selectedIndex].value;            
            states.forEach(state => {                
                if (sstate == state.id) {
                    for (let i = 0; i < state.counties.length; i++) {
                        let sOption = document.createElement("option");
                        sOption.innerHTML = state.counties[i].name;
                        sOption.value = state.counties[i].id;
                        countySelect.appendChild(sOption);
                    }

                    this.updatePayams(countySelect, state.counties);

                }
            });
        }
    }

    function updatePayams(pobj, counties)
    {
        let scounty;
        let payamSelect = document.getElementById('payam_id');

        if (pobj.options.length > 0) {
            payamSelect.innerHTML = "";
            scounty = pobj.options[pobj.selectedIndex].value;            
            counties.forEach(county => {                
                if (scounty == county.id) {
                    county.payams.forEach(payam => {                    
                        let spOption = document.createElement("option");
                        spOption.innerHTML = payam.name;
                        spOption.value = payam.id;
                        payamSelect.appendChild(spOption);
                    });
                }
            });
        }
    }
    </script>
@endpush