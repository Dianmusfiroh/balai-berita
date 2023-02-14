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
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
             
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-messages-tab" data-toggle="pill"
                        href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                        aria-selected="true">Visi-Misi</a>
                </li>
      
               
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                    <div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label for=""> Visi</label>
                            </div>
                            <div class="col-sm-2">
                                @if ($visi->isEmpty())
                                <a href="" data-toggle="modal" data-target="#addVisi"><i class="fas fa-plus-square"></i></a>    
                                @else
                            @foreach ($visi as $v )
                            <a href="{{ route('editVisi', $v->id_visi_misi) }}" class="" id="btneditVisi"><i class="fas fa-edit"></i></a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        @foreach ($visi as $v )
                            {!! $v->deskripsi !!}
                        @endforeach
                            
                    </div>  
                    <div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label for=""> Visi</label>
                            </div>
                            <div class="col-sm-2">
                                @if ($misi->isEmpty())
                                <a href="" data-toggle="modal" data-target="#addMisi"><i class="fas fa-plus-square"></i></a>    
                                @else
                            @foreach ($misi as $m )
                            <a href="{{ route('editVisi', $m->id_visi_misi) }}" class="" id="btneditVisi"><i class="fas fa-edit"></i></a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        @foreach ($misi as $m )
                            {!! $m->deskripsi !!}
                        @endforeach
                            
                    </div>  
                      
                   
                    {{--  <div class="row">
                            <div class="col-sm-10">
                                <label for=""> Visi</label>
                            </div>
                            <div class="col-sm-2">
                                @if ($visi->isEmpty())
                                <a href="" data-toggle="modal" data-target="#addVisi"><i class="fas fa-plus-square"></i></a>    
                                @else
                            @foreach ($visi as $item )
                                <a href="{{ route('editVisi', $item->id_visi_misi) }}" class="" id="btneditVisi"><i class="fas fa-edit"></i></a>
                            </div>
                            <p> {!! $item->deskripsi !!} </p>

                        </div>
                            @endforeach
                        @endif
                        
                        <div class="row">
                            <div class="col-sm-10">
                                <label for=""> Misi</label>
                            </div>
                            <div class="col-sm-2">
                                @if ($misi->isEmpty())
                                <a href="" data-toggle="modal" data-target="#addMisi"><i class="fas fa-plus-square"></i></a>    
                                @else
                                @foreach ($misi as $item )
                                <a href="{{ route('editMisi', $item->id_visi_misi) }}" class=""><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                                    <p> {!! $item->deskripsi !!} </p>
                                @endforeach
                            @endif  --}}

                </div>
            </div>
        </div>

    </div>

    {{--  Popup   --}}

    {{--  Add Modal  --}}
    <div class="modal fade bd-example-modal-lg" id="addVisi" tabindex="-1" role="dialog" aria-labelledby="addVisiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addVisiLabel">Tambah Visi Balai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('storeVisi')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="label col-md-2">Visi</div>
                        <div class="col-md-10">
                            <textarea name="deskripsi" id="textarea-id"></textarea>
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
    <div class="modal fade bd-example-modal-lg" id="addMisi" tabindex="-1" role="dialog" aria-labelledby="addMisiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addMisiLabel">Tambah Misi Balai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('storeMisi')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="label col-md-2">Misi</div>
                        <div class="col-md-10">
                            <textarea name="deskripsi" id="textarea-misi"></textarea>
                            {{--  <textarea name="deskripsi" class="my-editor4 form-control" id="my-editor4" cols="30" rows="10"></textarea>  --}}
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
    <div class="modal fade" id="addAlamat" tabindex="-1" role="dialog" aria-labelledby="addAlamatLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addAlamatLabel">Tambah Alamat Balai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('storeAlamat')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="label col-md-3">Alamat</div>
                        <div class="col-md-9">
                            <textarea name="alamat" class=" form-control" id="" cols="30" rows="10"></textarea>
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
    
    <div class="modal fade" id="addFoto" tabindex="-1" role="dialog" aria-labelledby="addFotoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addFotoLabel">Tambah Foto Balai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('storeFoto')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="label col-md-3">Upload Foto</div>
                        <div class="col-md-9">
                            <input type="file" name="foto_balai" id="foto_balai">
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
    <div class="modal fade bd-example-modal-lg" id="addDeskripsi" tabindex="-1" role="dialog" aria-labelledby="addDeskripsiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addDeskripsiLabel">Tambah Deskripsi Balai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('storeDeskripsi')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="label col-md-2">Deskripsi</div>
                        <div class="col-md-10">
                            <textarea name="deskripsi" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
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

    <div class="modal fade" id="addLogo" tabindex="-1" role="dialog" aria-labelledby="addLogoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addLogoLabel">Tambah Logo Balai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('storeLogo')}}"  enctype="multipart/form-data" id="upload-file" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="label col-md-3">Upload Logo</div>
                        <div class="col-md-9">
                            <input type="file" name="logo_balai" id="logo_balai">
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
    {{--  Edit Modal  --}}
    <div  id="editModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog "  role="document">
            <div class="modal-content" id="detail_edit">
               
            </div>
      </div>
    </div>
   
    <div  id="editModalVisi" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog "  role="document">
            <div class="modal-content" id="detail_editVisi">
               
            </div>
      </div>
    </div>
@endsection
@include('layouts.script.delete')

@section('plugins.Datatables', true)
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

@section('js')
    <script>
        $("#myTable").DataTable({
            "autoWidth": false,
            "responsive": true
        });
    
        $('body').on('click', '#btnEditNama', function (event) {
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
        $('body').on('click', '#btneditAlamat', function (event) {
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
                    $('#detail_editAlamat').html(response);
                }
            });
            $('#editModalAlamat').modal('show');
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
        $('body').on('click', '#btneditDeskripsi', function (event) {
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
                    $('#detail_editDeskripsi').html(response);
                }
            });
            $('#editModalDeskripsi').modal('show');
        });
        {{--  $('body').on('click', '#btneditVisi', function (event) {
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
                    $('#detail_editVisi').html(response);
                }
            });
            $('#editModalVisi').modal('show');
        });  --}}
        $('.open-popup').magnificPopup({
            type: 'inline',
            fixContentPos: true,
            duration: 300,
            closeBtnInside: false,
            preloader: false,
            removalDelay: 160,
            mainClass: 'mfp-fade'
            });
            CKEDITOR.replace('deskripsi');
            CKEDITOR.replace('textarea-misi');
   
 
    </script>

@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor2');
    $(document).ready(function () {
        $('#my-editor4').ckeditor();
        CKEDITOR.replace('my-editor');
        CKEDITOR.replace('my-editor2');
        CKEDITOR.replace('textarea-id');
        CKEDITOR.replace('textarea-updateVisi'); 
        CKEDITOR.replace('deskripsi');
    });
      
    </script>
@endpush