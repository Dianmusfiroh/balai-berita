
 <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <form action="{{ route($modul.'.update',$data->id_berita)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="label col-md-3">Judul </div>
            <div class="col-md-9">
                <input type="text" name="nama_balai" id="nama_balai" value="{{$data->judul}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Upload Foto</div>
            <div class="col-md-9">
                <img src="/images/{{ $data->foto }}" width="300px">
                <input type="file" name="foto"  value="{{$data->foto}}" id="foto">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Deskripsi</div>
            <div class="col-md-9">
                @isset($data)
                    <textarea class="my-editor form-control" id="my-editor" name="deskripsi" 
                    rows="4" required>{{$data->deskripsi}}</textarea>

                    @else
                    <textarea class="my-editor form-control" id="my-editor" name="deskripsi" rows="4" required></textarea>

                    @endIf
                {{--  <textarea name="deskripsi"  value="{{$data->deskripsi}}" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>  --}}
            </div>
        </div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush
   