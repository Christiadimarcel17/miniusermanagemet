@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-widget widget-user-2">

        <div class="widget-user-header bg-warning">
            @if(Auth::user()->foto)
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{asset('/storage/foto/'.Auth::user()->foto)}}" alt="User Avatar">
            </div>
            @endif

            <h3 class="widget-user-username">{{$nama}} / {{$role}}</h3>
            <h5 class="widget-user-desc">{{$email}}</h5>
        </div>
        <div class="card-footer">
            @if(Auth::user()->id)
            <form action="{{url('/user/'.Auth::user()->id)}}" method="post">
                @csrf
                <!--edit-->
                <button class="btn btn-success border-0"> Unggah Foto</button>
              </form>
            @endif

        </div>
    @stop

    {{-- @include('dashuser.modal') --}}

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
