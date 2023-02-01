@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Petugas' ?? '')) }}</h1>
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
            <th>Jenis Disabilitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>

</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route($modul.'.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="label col-md-3">Pilih Role</div>
                    <div class="col-md-9">
                        <select name="role" class="form-control" id="role">
                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Admin Balai</option>
                            <option value="kepala">Kepala Balai</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Nama User</div>
                    <div class="col-md-9">
                        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Jenis Disabilitas">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Email</div>
                    <div class="col-md-9">
                        <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Masukan Jenis Disabilitas">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Password</div>
                    <div class="col-md-9">
                        <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Masukan Jenis Disabilitas">
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
@endsection
@section('plugins.Datatables', true)

@section('js')
<script>
$("#myTable").DataTable({
    "autoWidth": false,
    "responsive": true
});
$(document).ready(function () {
    $("#role").on('change', function() {
        if (this.value == 'petugas') {
            alert('petugas')
        }else{
            
        }
    });
});
</script>
@endsection
