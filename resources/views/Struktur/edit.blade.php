
 <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <form action="{{ route($modul.'.update',$data->id_struktur)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="label col-md-3">Nama </div>
            <div class="col-md-9">
                <input type="text" name="nama" id="nama" value="{{$data->nama}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Nama </div>
            <div class="col-md-9">
                <select name="id_bagan_struktur" id="">
                    <option value="{{ $data->id_bagan_struktur}}">{{ $data->baganStruktur->nama }}</option>
                    @foreach ($bagan as $item)
                    <option value="{{ $item->id_bagan_struktur }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Jabatan </div>
            <div class="col-md-9">
                <input type="text" name="jabatan" id="jabatan" value="{{$data->jabatan}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
            </div>
        </div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
   