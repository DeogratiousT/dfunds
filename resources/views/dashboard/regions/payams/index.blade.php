@extends('dashboard.layouts.main')

@section('title','PAYAMS')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'PAYAMS')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> --}}
        <li class="breadcrumb-item px-3 text-muted">All</li>
    </ol>
@endsection

@section('page-right')
    <button  class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create-payam-modal">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->New PAYAM
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="payams-laratable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>Name</th>
                        <th>County</th>
                        <th>State</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div> <!-- end card-body -->
    </div> <!-- end card -->

    <!--start:: Create Modal -->
    <div class="modal fade" tabindex="-1" id="create-payam-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create PAYAM</h4>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs012.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                            <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
    
                <div class="modal-body row">
                    <form action="{{ route('payams.store') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"/>
                                <span class="invalid-feedback" role="alert" id="name-error"></span>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="state_id">State</label>
                                <select name="state_id" id="state_id" class="form-control" onchange="updateCounties(this)">
                                    <option style="display:none"> -- Select State Here</option>
                                    @foreach ($states as $state)
                                        <option value="{{ json_encode($state->counties) }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert" id="state-error"></span>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="county_id">County</label>
                                <select name="county_id" id="county_id" class="form-control">
                                    {{-- Populate Options with JS --}}
                                </select>
                                <span class="invalid-feedback" role="alert" id="county-error"></span>
                            </div>

                            <button type="submit" id="kt_counties_submit" class="btn btn-primary">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Create Modal -->
@endsection

@push('scripts')
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#payams-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('payams.index') }}",
                columns: [                
                        { name: 'name' },
                        { name: 'county.name' , orderable: false },
                        { name: 'state' , orderable: false, searchable: false },
                        { name: 'created_at' },
                        { name: 'action' , orderable: false, searchable: false }
                ],
                "language": {
                "lengthMenu": "Show _MENU_",
                },
                "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
            });
        });

    </script>

    <script>
        let subButton = document.getElementById('kt_counties_submit');

        subButton.addEventListener('click', 
        (event) => {
            event.preventDefault();

            subButton.setAttribute("data-kt-indicator", "on");
            let stateSelect = document.getElementById('state_id');
            let cntySelect = document.getElementById('county_id');

            let s_state_id;
            if (stateSelect.options.length > 0) {
                s_state_id = JSON.parse(stateSelect.options[stateSelect.selectedIndex].value);
                s_state_id = s_state_id['0'].state_id;
            }else{
                s_state_id = null;
            }

            let s_county_id;
            if (cntySelect.options.length > 0) {
                s_county_id = cntySelect.options[cntySelect.selectedIndex].value;
            }else{
                s_county_id = null;
            }

            let requestBody = {
                name : document.getElementById('name').value,
                county_id : s_county_id,
                state_id : s_state_id
            }

            this.clearCreateErrors();

            axios.post("{{ route('payams.store') }}", requestBody)
            .then((response) => {
                if (response.data.success) {
                    window.location.reload();
                    
                }else if(response.data.errors){
                    subButton.setAttribute("data-kt-indicator", "off");
                    
                    if (response.data.errors.name) {
                        document.getElementById('name-error').innerHTML = response.data.errors.name;

                        if (! document.getElementById('name').classList.contains("is-invalid")) {
                            document.getElementById('name').classList.add('is-invalid'); 
                        }
                    }

                    if (response.data.errors.state_id) {
                        document.getElementById('state-error').innerHTML = response.data.errors.state_id; 
                        
                        if (! document.getElementById('state_id').classList.contains("is-invalid")) {
                            document.getElementById('state_id').classList.add('is-invalid'); 
                        }
                    } 

                    if (response.data.errors.county_id) {
                        document.getElementById('county-error').innerHTML = response.data.errors.county_id; 
                        
                        if (! document.getElementById('county_id').classList.contains("is-invalid")) {
                            document.getElementById('county_id').classList.add('is-invalid'); 
                        }
                    }
                    
                    let createStateModal = document.getElementById('create-payam-modal');
                    let modal = bootstrap.Modal.getInstance(createStateModal);
                    modal.show();
                }
            })
            .catch((error) => {
                subButton.setAttribute("data-kt-indicator", "off");

                let createStateModal = document.getElementById('create-payam-modal');
                let cmodal = bootstrap.Modal.getInstance(createStateModal);
                cmodal.hide();

                let error_alert = document.getElementById('error-alert-message');
                error_alert.innerHTML = "An Error Occured, Please try again later";
                if (error_alert.parentElement.parentNode.classList.contains("d-none")) {
                    error_alert.parentElement.parentNode.classList.remove("d-none");
                }
            })
        });

        function clearCreateErrors()
        {
            document.getElementById('state-error').innerHTML = '';
            document.getElementById('county-error').innerHTML = '';
            document.getElementById('name-error').innerHTML = '';

            if (document.getElementById('name').classList.contains("is-invalid")) {
                document.getElementById('name').classList.remove('is-invalid'); 
            }

            if (document.getElementById('county_id').classList.contains("is-invalid")) {
                document.getElementById('county_id').classList.remove('is-invalid'); 
            }

            if (document.getElementById('state_id').classList.contains("is-invalid")) {
                document.getElementById('state_id').classList.remove('is-invalid'); 
            }
        }

        function updateCounties(obj)
        {
            let counties = JSON.parse(obj.options[obj.selectedIndex].value);
            let countySelect = document.getElementById('county_id');

            if (typeof counties != 'object' || Object.keys(counties).length === 0) {
                countySelect.innerHTML = '';

                let snOption = document.createElement("option");
                snOption.innerHTML = "State has No Counties";
                snOption.style.display = "none";
                countySelect.appendChild(snOption);
            }else{
                countySelect.innerHTML = '';

                let siOption = document.createElement("option");
                siOption.innerHTML = " -- Select County Here";
                siOption.style.display = "none";
                countySelect.appendChild(siOption);

                counties.forEach(county => {                    
                    let sOption = document.createElement("option");
                    sOption.innerHTML = county.name;
                    sOption.value = county.id;
                    countySelect.appendChild(sOption);
                });
            }
        }
    </script>
@endpush