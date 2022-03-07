@extends('layouts.dashboard.app')

@section('title','Users')

@section('breadcrumbs')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.show',$user) }}">{{ $user->name }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('users.update',['user'=>$user]) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $user->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email" value="{{ $user->email }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
                @if ($errors->has('phone_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('phone_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" id="role_id" name="role_id">
                    @foreach ($roles as $role)
                        <option @if($user->role_id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('role_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-2 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection

