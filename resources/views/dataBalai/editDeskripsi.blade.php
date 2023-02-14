
@extends('layouts.app')
@section('content_header')
    <h1>{{ Str::title(Str::replaceArray('-', [' '], 'Data Balai' ?? '')) }}</h1>
@stop

@section('card-header-extra')
    <div class="float-right">
        <a href="" id="btnDetail" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-fw fa-plus"></i>
            Tambah Data</a>

    </div>
@endsection
@section('content')
 <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
    {{--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>  --}}
</div>
<div class="modal-body" >
    <form action="{{ route('updateDeskripsi',$data->id)}}" enctype="multipart/form-data"  method="POST">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="label col-md-3">Deskripsi</div>
            <div class="col-md-9">
                @isset($data)
                    <textarea class="my-editor form-control" id="my-editor" name="deskripsi" 
                    rows="4" required> <p>{!! $data->deskripsi !!}</p></textarea>
                @else
                    <textarea class="my-editor form-control" id="my-editor" name="deskripsi" rows="4" required></textarea>
                @endIf
            </div>
        </div>

<div class="modal-footer">
    {{--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>  --}}
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
    </script>  
@endsection

   