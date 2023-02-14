
@extends('layouts.app')
@section('content_header')
    <h1>{{ Str::title(Str::replaceArray('-', [' '], 'Edit Visi Balai' ?? '')) }}</h1>
@stop

@section('card-header-extra')
    <div class="float-right">
        <a href="" id="btnDetail" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-fw fa-plus"></i>
            Tambah Data</a>

    </div>

@endsection
@section('content')
 {{--  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>  --}}
<a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="material-icons md-arrow_back"></i> Kembali </a>

<div class="modal-body" >
    <form action="{{ route('updateVisi',$data->id_visi_misi)}}" enctype="multipart/form-data"  method="POST">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="label col-md-3">Deskripsi</div>
            <div class="col-md-9">
                @isset($data)
                    <textarea class="my-editor form-control" id="my-editor" name="deskripsi" 
                    rows="4" required> <p>{!! $data->deskripsi !!}</p></textarea>
                @else
                    <textarea name="deskripsi" id="textarea-updateVisi"></textarea>
                @endIf
            </div>
        </div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</div>
</form>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'deskripsi');
    </script>  
@endsection

   