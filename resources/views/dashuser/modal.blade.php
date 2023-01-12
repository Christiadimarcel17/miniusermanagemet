@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Unggah Foto</h3>
        </div>


        <form action="/userupdate/{{$user->id}}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control" id="exampleInputFile" value="{{$user->foto}}" name="foto">
                        </div>

                    </div>
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
