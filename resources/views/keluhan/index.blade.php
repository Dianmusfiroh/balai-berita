@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Keluhan' ?? '')) }}</h1>
@stop


@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No hp</th>
            <th>Status</th>
            <th>Tanggapan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $no => $item)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    {{--  <a href="#popup-pdf" class="btn btn-sm  btn-info open-popup">lihat</a>  --}}
                    <a href="{{ route($modul.'.edit', $item->id) }}" id="btnEdit" title="{{ $item->id }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"
                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                        Delete</a>
                        {{--  <div id="popup-pdf" class="mfp-hide" style="text-align:center;">
                            <iframe
                                src="{!! asset('uploads/'. $item->id_berita) !!}"
                                align="top" height="650" width="100%" frameborder="0" scrolling="auto"></iframe>
                        </div>  --}}
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
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