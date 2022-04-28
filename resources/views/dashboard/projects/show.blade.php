@extends('dashboard.layouts.main')

@section('title','Project Beneficiaries')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Projects Beneficiaries')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        <li class="breadcrumb-item pe-3"><a href="{{ route('projects.index') }}" class="pe-3">Projects</a></li>
        <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">{{ $project->name }}</a></li>
        <li class="breadcrumb-item px-3 text-muted">All Beneficiaries</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
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
                <tbody>
                    @forelse ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->internal_id }}</td>
                            <td>
                                {{ $beneficiary->first_name }}
                                @isset($beneficiary->middle_name)
                                    &nbsp;
                                    {{ $beneficiary->middle_name }}
                                @endisset
                                @isset($beneficiary->last_name)
                                    &nbsp;
                                    {{ $beneficiary->last_name }}
                                @endisset
                            </td>
                            <td>{{ $beneficiary->mobile_number }}</td>
                            <td>{{ $beneficiary->national_id }}</td>
                            <td>{{ $beneficiary->token_number }}</td>
                            <td>
                                <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#show-beneficiary-{{ $beneficiary->id }}-modal">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs014.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z" fill="black"/>
                                        <path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z" fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">This Project Has No Beneficiaries</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $beneficiaries->links('vendor.pagination.bootstrap-4') }}
        </div> <!-- end card-body -->
    </div> <!-- end card -->

    <!-- Start Modals -->
    <!--start:: Show Modal -->
    @foreach ($beneficiaries as $beneficiary)
        <div class="modal fade" id="show-beneficiary-{{ $beneficiary->id }}-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">
                            {{ $beneficiary->first_name }} &nbsp; {{ $beneficiary->middle_name }} &nbsp; {{ $beneficiary->last_name }} 
                            &nbsp;
                            <span>
                                @if ($beneficiary->payment_status == 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @elseif ($beneficiary->payment_status == 'not paid')
                                    <span class="badge badge-warning">Not Paid</span>
                                @endif
                            </span>
                        </h3>

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

                        <div class="row">
                            <div class="col-md-6">
                                <h2>{{ $beneficiary->internal_id }}</h2>                        
                                <h4>Mobile Number : {{ $beneficiary->mobile_number }}</h4>
                                <h4>National ID : {{ $beneficiary->internal_id }}</h4>
                                <h4>Token Number : {{ $beneficiary->token_number }}</h4>  
                                <h4>Payment Status : {{ $beneficiary->payment_status }}</h4>    

                                <p>{{ $beneficiary->first_name }} of {{ $beneficiary->age }} Years Old is set to receive {{ $beneficiary->amount }} under the {{ $beneficiary->project->name }}</p>

                            </div>
                            <div class="col-md-6">
                                <div class="symbol symbol-200px">
                                    <img src="{{ asset('storage/beneficiaries/' .  $beneficiary->featured_image) }}" alt=""/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--end:: Show Modal -->
    <!-- End Modals -->
@endsection