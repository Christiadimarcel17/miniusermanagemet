@extends('adminlte::page')

@section('title', 'Edit User')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>


        <form method="post" action="/updateuser/{{ $user->id }}">
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
                        @if ($user->role == 'user')
                            <option value="user">user</option>
                        @endif
                        <option value="admin">admin</option>


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
