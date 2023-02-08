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
                <div class="tab-pane fade show active" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <div class=" row">
                        <div class="col-md-8">
                            <div class="">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr class="" style="border: #00000000">
                                            <td class="fs-6 py-2">Nama Balai</td>
                                            <td class="fs-6 py-2 text text-capitalize"> 
                                                {{ $data->nama_balai }}
                                            </td>
                                        </tr>
                                        <tr class="" style="border: #00000000">
                                            <td class="fs-6 py-2">Alamat</td>
                                            <td class="fs-6 py-2">
                                                @if ($data->alamat == null)
                                                    <a href="" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>    
                                                @else
                                                    {{ $data->alamat }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="" style="border: #00000000">
                                            <td class="fs-6 py-2">Foto Lembaga</td>
                                            <td class="fs-6 py-2">
                                                @if ($data->foto_balai == null)
                                                    <a href="">Tambah Data</a>    
                                                @else
                                                <a href="#popup-pdf" class=" open-popup">lihat</a>
                                                    {{--  {{ $data->alamat }}  --}}
                                                @endif
                                                </td>
                                        </tr>
                                        <tr class="" style="border: #00000000">
                                            <td class="fs-6 py-2">Deskripsi</td>
                                            <td class="fs-6 py-2">
                                                @if ($data->deskripsi == null)
                                                <a href="">Tambah Data</a>    
                                            @else
                                            <a href="#popup-pdf" class=" open-popup">lihat</a>
                                                {{--  {{ $data->alamat }}  --}}
                                            @endif
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            
                            <Label> Logo</Label>
                            @if ($data->logo_balai == null)
                                
                                <h4 class="text-center">Belum Ada Logo <br>
                                <a href="" >Tambah Data</a>    
                            </h4>
                            @else
                            <img src="https://alakota.com/wp-content/uploads/2022/12/menara-keagungan-limboto-2.webp" height="10" alt="..." class=" img-fluid rounded">
                                                    
                            @endif
                        </div>
                    </div>
                </div>
  
                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                    <div>
                        <label for=""> Visi</label>
                        @if ($data->foto_balai == null)
                            <a href="">Tambah Data</a>    
                        @else
                        <p> {{ $data->alamat }} </p>
                                                
                        @endif
                        
                    </div>
                    <div>
                        <label for=""> Misi</label>
                        <p> Visi</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
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
                        <div class="label col-md-3">Judul informasi</div>
                        <div class="col-md-9">
                            <input type="text" name="judul" id="judul" class="form-control  mt-2" placeholder="Masukan Nama Peraturan">
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
    
            </form>
            </div>
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
    </script>
@endsection
