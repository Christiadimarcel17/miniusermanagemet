@extends('adminlte::page')

@section('title', 'Edit Admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Admin</h3>
        </div>


        <form method="post" action="/updateadmin/{{ $user->id }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="Role">Role</label>
                    <select name="role" id="role" class="form-control">
                        @if ($user->role == 'admin')
                            <option value="admin">admin</option>
                        @endif
                        <option value="superadmin">superadmin</option>


                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@stop

{{-- @include('dashuser.modal') --}}

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
