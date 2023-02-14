@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <br>
        <div class="alert alert-secondary" role="alert">
            @if (Auth::user()->id_balai== null)
            <h1 class="text-center">Selamat Datang Di Panel Admin </h1>
                
            @else
            <h1 class="text-center">Selamat Datang Di {{ $balai->nama_balai }} </h1>
                
            @endif
        </div>
            <div class="card">
            </div>
        </div>
    </div>
</div>
@endsection
