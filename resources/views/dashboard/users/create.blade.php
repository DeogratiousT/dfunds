@extends('dashboard.layouts.main')

@section('title','Users')

@section('page-imports')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'Users')

@section('breadcrumb')
    <ol class="breadcrumb text-muted fs-6 fw-bold">
        {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> --}}
        <li class="breadcrumb-item px-3 text-muted">Create</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" id="create-user-form">
                @csrf
                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"/>

                        @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"/>

                        @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>

                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> 

                <div class="row mb-4">
                    <div class="form-group col-12">
                        <label class="form-label" for="roles">Project</label>
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

                <div class="mb-4">
                    <button type="submit" id="kt_projects_submit" class="btn btn-primary" onclick="createUser(this)">
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
        function createUser(obj){

            event.preventDefault();

            obj.setAttribute("data-kt-indicator", "on");

            document.getElementById('create-user-form').submit();
        }
    </script>
@endpush