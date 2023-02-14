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
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $no => $item)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->role }}</td>
            <td>
            {{--  <a href="{{ route($modul.'.edit', $item->id) }}" id="btnEdit" title="{{ $item->name }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>  --}}

                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"
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
                            <option >Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Admin Balai</option>
                            <option value="kepala">Kepala Balai</option>
                        </select>
                    </div>
                </div>
            <p id="tes"></p>

                <div class="form-group row" id="petugas" style="display: none;">
                    <div class="label col-md-3">Admin Balai</div>
                    <div class="col-md-9">
                        <select name="id_balai" id="id_balai" class="form-control">
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Nama User</div>
                    <div class="col-md-9">
                        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama User">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Email</div>
                    <div class="col-md-9">
                        <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Masukan Email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="label col-md-3">Password</div>
                    <div class="col-md-9">
                        <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Masukan Password">
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
@include('layouts.script.delete')

@section('plugins.Datatables', true)

@section('js')
<script>
$("#myTable").DataTable({
    "autoWidth": false,
    "responsive": true
});
$(document).ready(function () {
    $("#role").on('change', function() {
        var balai = @php echo $balai @endphp ;
        if ($(this).val() == 'petugas') {
            $("#petugas").show();
            $.each(balai, function(index) {
                var tes = `<option value="${balai[index].id}">${balai[index].nama_balai}</option>` ;
                $("#id_balai").append(tes);
            });
        }else {
            $("#petugas").hide();
        }
    });
});
</script>
@endsection
