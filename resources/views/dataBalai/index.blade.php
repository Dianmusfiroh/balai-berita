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
                    <a class="nav-link active" id="custom-tabs-three-profile-tab" data-toggle="pill"
                        href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                        aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                        href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                        aria-selected="false">Visi-Misi</a>
                </li>
               
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active " id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <div class=" row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for=""> Nama Balai</label>
                                </div>   
                                @if ( $data->nama_balai == null)
                                    <div class="col-md-9">
                                        <p>Belum ada Data </p>
                                        <a href="" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>    
                                    </div>
                                @else
                                    <div class="col-md-9">
                                        <p>{{ $data->nama_balai}}</p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('editNamaBalai', $data->id) }}" class="" id="btnEditNama"><i class="fas fa-edit"></i></a>
                                    </div>
                                @endif
                                
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for=""> Alamat</label>
                                </div>   
                                @if ( $data->alamat == null)
                                    <div class="col-md-9">
                                        <p>Belum ada Data </p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="" data-toggle="modal" data-target="#addAlamat"><i class="fas fa-plus-square"></i></a>    
                                    </div>
                                @else
                                    <div class="col-md-9">
                                        <p>{{ $data->alamat}}</p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('editAlamat', $data->id) }}" class="" id="btneditAlamat"><i class="fas fa-edit"></i></a>

                                        {{--  <a href=""  data-toggle="modal" data-target="#editAlamat" class=""><i class="fas fa-edit"></i></a>  --}}
                                    </div>
                                @endif
                                
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for=""> Foto Balai</label>
                                </div>   
                                @if ( $data->foto_balai == null)
                                    <div class="col-md-9">
                                        <p>Belum ada Data </p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="" data-toggle="modal" data-target="#addFoto"><i class="fas fa-plus-square"></i></a>    
                                    </div>
                                @else
                                    <div class="col-md-9">
                                            {{--  <a href="#popup-pdf" class="btn btn-sm  btn-info open-popup">lihat</a>  --}}

                                        <a href="#popup-pdf" class=" open-popup">lihat</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('editFoto', $data->id) }}" class="" id="btneditFoto"><i class="fas fa-edit"></i></a>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for=""> Deskripsi</label>
                                </div>   
                                @if ( $data->deskripsi == null)
                                    <div class="col-md-9">
                                        <p>Belum ada Data </p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="" data-toggle="modal" data-target="#addDeskripsi"><i class="fas fa-plus-square"></i></a>    
                                    </div>
                                @else
                                    <div class="col-md-9">
                                        <p>{!! $data->deskripsi !!}</p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('editDeskripsi', $data->id) }}" class=""><i class="fas fa-edit"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                            <Label> Logo</Label>
                            @if ($data->logo_balai == null)
                                
                                <h4 class="text-center">Belum Ada Logo <br>
                                <a href="" data-toggle="modal" data-target="#addLogo" >Tambah Data</a>    
                            </h4>
                            @else
                            <img src="{{ asset('storage/images/logo_balai/'. $data->logo_balai) }}" height="10" alt="..." class=" img-fluid rounded">
                            @endif
                        </div>
                    </div>
                </div>
  
                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                    <div>
                        <div class="row">
                            <div class="col-sm-11">
                                <label for=""> Visi</label>
                            </div>
                            <div class="col-sm-1">
                                @if ($visi->isEmpty())
                                <br>
                                <a href="" data-toggle="modal" data-target="#addVisi">Tambah Data</a>    
                                @else
                            @foreach ($visi as $item )
                                <a href="{{ route('editVisi', $item->id_visi_misi) }}" class="" id="btneditVisi"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                                <p> {!! $item->deskripsi !!} </p>
                            @endforeach
                        @endif
                        
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-11">
                                <label for=""> Misi</label>
                            </div>
                            <div class="col-sm-1">
                                @if ($visi->isEmpty())
                                <br>
                                <a href="" data-toggle="modal" data-target="#addMisi">Tambah Data</a>    
                                @else
                                @foreach ($misi as $item )
                                <a href="{{ route('editMisi', $item->id_visi_misi) }}" class=""><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                     
                                    <p> {!! $item->deskripsi !!} </p>
                                @endforeach
                            @endif

                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--  Popup   --}}
    <div id="popup-pdf" class="mfp-hide" style="text-align:center;">
        {{--  <img
            src="{!! asset('images/foto_balai/'. $data->foto_balai) !!}"
            align="top" height="100%" width="80%" frameborder="0" scrolling="auto">  --}}
            <img src={{ asset('storage/images/foto_balai/'.$data->foto_balai ) }}   align="top" height="100%" width="80%" frameborder="0" scrolling="auto">
        </img>
    </div>
    {{--  Add Modal  --}}
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
    <div  id="editModalAlamat" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog "  role="document">
            <div class="modal-content" id="detail_editAlamat">
               
            </div>
      </div>
    </div>
    <div  id="editModalFoto" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog "  role="document">
            <div class="modal-content" id="detail_editFoto">
               
            </div>
      </div>
    </div>
    <div  id="editModalDeskripsi" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog "  role="document">
            <div class="modal-content" id="detail_editDeskripsi">
               
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
            CKEDITOR.replace( 'deskripsi' );
    CKEDITOR.replace('my-editor');
    CKEDITOR.replace('my-editor2');
    CKEDITOR.replace('textarea-id');
    CKEDITOR.replace('textarea-misi');
    CKEDITOR.replace('textarea-updateVisi'); 
    CKEDITOR.replace('deskripsi');
 
    </script>

@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor2');
    $(document).ready(function () {
        $('#my-editor4').ckeditor();
    });
      
    </script>
@endpush