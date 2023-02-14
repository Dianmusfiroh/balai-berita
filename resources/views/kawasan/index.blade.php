@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Kawasan' ?? '')) }}</h1>
@stop

@section('card-header-extra')
 <div class="float-right">
    <a href="" id="btnDetail" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
          
</div>
@endsection
@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama Kawasan</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $kawasan as $no => $item )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->lokasi }}</td>
                <td> 
                    <a href="{{ route($modul.'.edit', $item->id_kawasan) }}" id="btnEdit" title="{{ $item->id_kawasan }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id_kawasan}})"
                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kawasan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route($modul.'.store')}}" enctype="multipart/form-data" id="upload-file"  method="POST">
                @csrf
                <div class="form-group row">
                    <div class="label col-md-3">Nama Kawasan</div>
                    <div class="col-md-9">
                        <input type="text" name="judul" id="judul" class="form-control mt-2" placeholder="Masukan Nama Kawasan">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Lokasi</div>
                    <div class="col-md-9">
                        <input type="lokasi" name="lokasi" id="lokasi" class="form-control mt-2" placeholder="Masukan Lokasi">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Upload Foto</div>
                    <div class="col-md-9">
                        <input type="file" name="foto" id="foto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Deskripsi</div>
                    <div class="col-md-9">
                        <textarea name="deskripsi" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
                    </div>
                </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>

        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

<div  id="editModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog "  role="document">
        <div class="modal-content" id="detail_edit">
           
        </div>
  </div>
</div>
@endsection
@include('layouts.script.delete')

@section('plugins.Datatables', true)

@section('js')
<script>
$("#myTable").DataTable({
    "autoWidth": false,
    "responsive": true
});
{{--  $(window).on('load', function (){
    $( '#my-editor' ).ckeditor();
});  --}}
CKEDITOR.replace('deskripsi');
$('body').on('click', '#btnEdit', function (event) {
    event.preventDefault();
    var me = $(this),
        title = me.attr('title');
        alamat = me.attr('alamat');
        url = me.attr('href');
        console.log(url);
    $('#modal-title').text(title);
    $('#alamat').text(alamat);

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#detail_edit').html(response);
        }
    });
    $('#editModal').modal('show');
});
</script>

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(window).on('load', function (){
            $( '#editor1' ).ckeditor();
        });
        {{--  $.noConflict();  --}}
        {{--  CKEDITOR.replace( 'deskripsi' );  --}}

        {{--  CKEDITOR.replace( 'editor1' );  --}}
    </script>
@endsection
