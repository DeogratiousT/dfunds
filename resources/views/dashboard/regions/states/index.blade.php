@extends('dashboard.layouts.main')

@section('title','States')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'States')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> --}}
        <li class="breadcrumb-item px-3 text-muted">All</li>
    </ol>
@endsection

@section('page-right')
    <button  class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create-state-modal">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->New State
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="states-laratable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div> <!-- end card-body -->
    </div> <!-- end card -->

    <!--start:: Create Modal -->
    <div class="modal fade" tabindex="-1" id="create-state-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create State</h4>
    
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
                    <form action="{{ route('states.store') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label class="form-label" for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="John Doe"/>
                                <span class="invalid-feedback" role="alert" id="name-error"></span>
                            </div>

                            <button type="submit" id="kt_states_submit" class="btn btn-primary">
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

    <!--begin:: Danger Modal -->
    <div class="modal fade" tabindex="-1" id="danger-alert-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-wrong h1"></i>
                        <h4 class="mt-2">Oh snap!</h4>
                        <p id="error-p" class="mt-3"></p>
                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('scripts')
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#states-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('states.index') }}",
                columns: [                
                        { name: 'name' },
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
        let subButton = document.getElementById('kt_states_submit');

        subButton.addEventListener('click', 
        (event) => {
            event.preventDefault();

                subButton.setAttribute("data-kt-indicator", "on");

            let requestBody = {
                name : document.getElementById('name').value
            }

            axios.post("{{ route('states.store') }}", requestBody)
            .then((response) => {
                if (response.data.success) {
                    console.log('success');
                    subButton.setAttribute("data-kt-indicator", "off");

                    document.getElementById('success-alert').innerHTML = response.data.success;
                    let createStateModal = document.getElementById('create-state-modal');
                    let modal = bootstrap.Modal.getInstance(createStateModal);
                    modal.hide();

                }else if(response.data.errors){
                    subButton.setAttribute("data-kt-indicator", "off");
                    
                    document.getElementById('name-error').innerHTML = response.data.errors[0];
                    document.getElementById('name').classList.toggle('is-invalid');
                    
                    let createStateModal = document.getElementById('create-state-modal');
                    let modal = bootstrap.Modal.getInstance(createStateModal);
                    modal.show();
                }
            })
            .catch((error) => {
                console.log(error);
                subButton.setAttribute("data-kt-indicator", "off");

                let createStateModal = document.getElementById('create-state-modal');
                let cmodal = bootstrap.Modal.getInstance(createStateModal);
                cmodal.hide();

                let dangerStateModal = document.getElementById('danger-alert-modal');
                let modal = bootstrap.Modal.getInstance(dangerStateModal);
                modal.show();
            })
        });
    </script>
@endpush