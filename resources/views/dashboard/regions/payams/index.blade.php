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
    <a href="/metronic8/demo1/../demo1/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->New State</a>
    </a>
@endsection

@section('content')
    <!--begin::Body-->
    <div class="py-3">
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
    </div>
    <!--end::Body-->
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