@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Bagan Struktur Organisasi' ?? '')) }}</h1>
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
            <th>Nama Bagan Struktur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $no => $item)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                {{--  <a href="{{ route($modul.'.edit', $item->id) }}" id="btnEdit" title="{{ $item->judul }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>  --}}

                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id_bagan_struktur}})"
                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                        Delete</a>
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Balai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="{{ route($modul.'.store')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                @csrf
               
                <div class="form-group row">
                    <div class="label col-md-3">Nama Bagan Struktur</div>
                    <div class="col-md-9">
                        <input type="text" name="nama" id="nama" class="form-control  mt-2" placeholder="Masukan Nama Bagan Struktur">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
        </div>
      </div>
    </div>
  </div>
{{--  <div  id="editModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog "  role="document">
        <div class="modal-content" id="detail_edit">
           
        </div>
  </div>
</div>  --}}
@endsection
@include('layouts.script.delete')

@section('plugins.Datatables', true)

@section('js')
<script>
$("#myTable").DataTable({
    "autoWidth": false,
    "responsive": true
});

{{--  $('body').on('click', '#btnEdit', function (event) {
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
});  --}}
</script>
@endsection
