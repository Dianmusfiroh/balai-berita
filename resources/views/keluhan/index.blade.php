@extends('layouts.app')
@section('content_header')
<div class="row">
    <div class="col-sm-11">
        <h1>{{ Str::title(Str::replaceArray('-',[' '],'Keluhan' ?? '')) }}</h1>
    </div>
    @can('isPetugas')
    <div class="col-sm-1">
        <a class="btn btn-primary" onclick="refresh()"><i class="fa fa-refresh ">Refresh</i></a>
    </div>    
    @endcan
    
</div>
</a>
@stop


@section('card-body')
@can('isKetua')
    
<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No hp</th>
            <th>Status</th>
            <th>Tanggapan</th>
            <th>Keluhan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $no => $item)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    @if ($item->status == '0')
                    <span class="badge badge-pill badge-danger"> Belum Ditnggapi</span>
                    @else
                    <span class="badge badge-pill badge-primary"> Sudah Ditnggapi</span>
                    @endif
                </td>
                <td>  @if ($item->status == '0')
                    <span class="badge badge-pill badge-danger"> Belum Ditnggapi</span>

                    @else
                    {{ $item->tanggapan }}
                    @endif
                </td>
                <td>
                    <a href="{{ route($modul.'.show', $item->id) }}" class="" id="btnEdit">Lihat Keluhan</a>

                </td>
                <td>
                    @if ($item->status == '0')
                    <a href="{{ route('tanggapan', $item->id) }}" target="_blank"  class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Tanggapi</a>

                    @else
                    <i class="fas fa-check-double ms-1"></i>
                    @endif


                </td>
            </tr>
        @endforeach

    </tbody>

</table>
<!-- Modal -->
@endcan

{{--  @can('isKetua')
<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No hp</th>
            <th>Keluhan</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach ($sukses as $no => $item)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    {{ $item->keluhan }}
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
@endcan  --}}
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
    function refresh() { 
        location.reload();
     };
    $(document).ready(function () {
        $('.open-popup').magnificPopup({
        type: 'inline',
        fixContentPos: true,
        duration: 300,
        closeBtnInside: false,
        preloader: false,
        removalDelay: 160,
        mainClass: 'mfp-fade'
        });
        })
$("#myTable").DataTable({
    "autoWidth": false,
    "responsive": true
});

$('body').on('click', '#btneditFoto', function (event) {
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
            $('#detail_editFoto').html(response);
        }
    });
    $('#editModalFoto').modal('show');
});
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
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush