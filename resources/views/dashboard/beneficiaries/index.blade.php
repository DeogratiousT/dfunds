@extends('dashboard.layouts.main')

@section('title','Beneficiaries')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Beneficiaries')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> --}}
        <li class="breadcrumb-item px-3 text-muted">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('beneficiaries.create') }}" class="btn btn-sm btn-primary m-4">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->New Beneficiary
    </a>

    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#import-csv-modal">
        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr091.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="black"/>
            <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="black"/>
            <path d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="#C4C4C4"/>
            </svg>
        </span>
    <!--end::Svg Icon-->Import csv</button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="beneficiaries-laratable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>INTERNAL_ID</th>
                        <th>Name</th>
                        <th>Mobile No.</th>
                        <th>National ID</th>
                        <th>Token No.</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div> <!-- end card-body -->
    </div> <!-- end card -->

    <!--start:: Import Modal -->
    <div class="modal fade" tabindex="-1" id="import-csv-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import Beneficiaries</h4>
    
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
                    <div>
                        <h3 class="text-danger">UPLOAD GUIDE</h3>
                        <p class="text-danger pl-3">
                            1. The file headings must appear as show below (including case and order) without any deviation. <br>
                            2. Payment Status Can only be "Paid" or "Not Paid" <br>
                            3. "Middle Name" and "Last Name" can be Empty <br>
                            4. Project ID should link to one of the projects in the system
                        </p>
                        <table class="table table-bordered">
                            <thead style="border: 2px solid black">
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Mobile Number</th>
                                    <th>National ID</th>
                                    <th>Token Number</th>
                                    <th>Project ID</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <form action="{{ route('beneficiaries.import') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label" for="file">Select File</label>
                            <input type="file" name="file" id="file" class="form-control" value="{{ old('file') }}"/>

                            <span class="invalid-feedback" role="alert" id="file-error"></span>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="submitBeneficiaryFile(this)">
                            <span class="indicator-label">Continue</span>
                            <span class="indicator-progress">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Import Modal -->
@endsection

@push('scripts')
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#beneficiaries-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('beneficiaries.index') }}",
                columns: [                
                        { name: 'internal_id' },
                        { name: 'first_name' },
                        { name: 'mobile_number' },
                        { name: 'national_id' },
                        { name: 'token_number' },
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
        function submitBeneficiaryFile(obj){
            event.preventDefault();

            obj.setAttribute("data-kt-indicator", "on");

            let formData = new FormData();
            formData.append('file',document.getElementById('file').files[0]);

            var url = '{{ route("beneficiaries.import") }}';

            axios.post(url, formData)
            .then((response) => {
            if (response.data.success) {
                window.location.replace("{{ route('beneficiaries.index') }}");
                
            }else if(response.data.errors){
                obj.setAttribute("data-kt-indicator", "off");
                
                if (response.data.errors.file) {
                    document.getElementById('file-error').innerHTML = response.data.errors.file;

                    if (! document.getElementById('file').classList.contains("is-invalid")) {
                        document.getElementById('file').classList.add('is-invalid'); 
                    } 
                }
                
                let importCsvModal = document.getElementById('import-csv-modal');
                let modal = bootstrap.Modal.getInstance(importCsvModal);
                modal.show();
                }
            })
            .catch((error) => {
                window.location.replace("{{ route('beneficiaries.index') }}");
            });
        }
    </script>
@endpush