@extends('dashboard.layouts.main')

@section('title','States')

@section('page-imports')
    <link href="{{ asset('metronic/css/datatables.bundle.css') }}" rel="stylesheet" />
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
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    <script>
                                        var createStateModal = document.getElementById('create-state-modal');
                                        var modal = bootstrap.Modal.getInstance(createStateModal);
                                        modal.show();
                                    </script>
                                @enderror
                            </div>

                            <button type="submit" id="kt_button" class="btn btn-primary">
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
    <script src="{{ asset('metronic/js/datatables.bundle.js') }}"></script>
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
@endpush