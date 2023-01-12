@extends('adminlte::page')

@section('title', 'Tambah Admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Admin</h3>
        </div>


        <form method="post" action="/adminmanagecreate">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="Role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">--Pilih Role--</option>
                        <option value="admin">admin</option>
                        <option value="superadmin">superadmin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
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
