@extends('adminlte::page')

@section('title', 'Admin Management')
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <a href="/adminmanagecreate" class="btn btn-success">Tambah Admin</a>
                    </div>

                    <div class="row">
                        <div class="card-body">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-body">
                                        <table id="laravel_datatable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admin as $admin)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $admin->name }}</td>
                                                        <td>{{ $admin->email }}</td>
                                                        <td>{{ $admin->role }}</td>
                                                        <td>
                                                            <form action="{{ url('editadmin', $admin->id) }}" method="post"
                                                                class="d-inline">
                                                                @csrf
                                                                <!--edit-->
                                                                <button class="btn btn-success border-0"> Edit</button>
                                                            </form>

                                                            <form action="{{ url('/deleteadmin/' . $admin->id) }}" method="post"
                                                                class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger"
                                                                    onclick="return confirm('Are You sure to delete?')">Hapus</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>

                @stop

                {{-- @include('dashuser.modal') --}}

                @section('css')
                    <link rel="stylesheet" href="/css/admin_custom.css">
                @stop

                @section('js')
                    <script>
                        $(document).ready(function() {

                            $('#laravel_datatable').DataTable({
                                stateSave: true,
                            });


                        });
                    </script>
                @stop
