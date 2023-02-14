
 <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <form action="{{ route('updateFoto',$data->id)}}" enctype="multipart/form-data"  method="POST">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="label col-md-3">Foto </div>
            <div class="col-md-9">
                <img src="{{ asset('storage/images/foto_balai/'. $data->foto_balai) }} " class=" img-fluid"></img>
                <input type="file" name="foto_balai" id="foto_balai"  class="form-control mt-2" placeholder="Masukan Nama Lengkap">
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
   