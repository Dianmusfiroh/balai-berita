
 <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Keluhan Dari {{ $data->nama }} </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    
        <div class="form-group row">
            <div class="col-md-12">
                <p>{{ $data->keluhan }}</p>
                {{--  <input type="text" name="judul" id="judul" value="{{$data->tanggapan}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">  --}}
            </div>
        </div>

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush
   