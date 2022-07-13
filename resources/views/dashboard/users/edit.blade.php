@extends('dashboard.layouts.main')

@section('title','Users')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Users')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        <li class="breadcrumb-item pe-3"><a href="{{ route('users.index') }}" class="pe-3">{{ $user->name }}</a></li>
        <li class="breadcrumb-item px-3 text-muted">Edit</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST" id="update-user-form">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"/>

                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"/>

                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="roles">Roles</label>
                        <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('roles')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="partner_id">Partner</label>
                        <select name="partner_id" id="partner_id" class="form-control @error('partner_id') is-invalid @enderror">
                            @foreach ($partners as $partner)
                                <option value="{{ $partner->id }}" @if($user->partner_id == $partner->id) selected @endif>{{ $partner->name }}</option>
                            @endforeach
                        </select>

                        @error('partner_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <!--begin::Input group-->
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid @error('password') border border-danger @enderror" type="password" placeholder="" name="password" autocomplete="off" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                    <!--end::Hint-->
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--end::Input group=-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
                </div>
                <!--end::Input group-->

                <div class="mb-4">
                    <button type="submit" id="kt_projects_submit" class="btn btn-primary" onclick="updateUser(this)">
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
        function updateUser(obj){

            event.preventDefault();

            obj.setAttribute("data-kt-indicator", "on");

            document.getElementById('update-user-form').submit();
        }
    </script>
@endpush