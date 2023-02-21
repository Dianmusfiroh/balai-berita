@extends('layouts.gues')
@section('hero')
    @if ($dataBalai->foto_balai == null)
        <section id="hero" style=" background: url('../storage/images/Logo Balai.png') top center;"
            class="d-flex overlay flex-column align-items-center justify-content-center">
        @else
            <section id="hero"
                style="   overflow: hidden;
                background: #1a1818;  
                background: linear-gradient(rgb(18, 16, 16,0.8), rgb(18, 16, 16,0.1)), url('../storage/images/foto_balai/{{ $dataBalai->foto_balai }}') top center;"
                class="d-flex flex-column align-items-center justify-content-center">
    @endif
    <h1 class="text-white">Selamat Datang Di Balai</h1>
    <h2 class="text-white">{{ $dataBalai->nama_balai }}</h2>
    {{--  <a href="#about" class="btn-get-started scrollto"><i class="bi bi-chevron-double-down"></i></a>  --}}
    </section>
@endsection
@section('nama-balai')
@endsection
@section('profil')
    <div class="section-title">
        <h2>Profil Balai</h2>
    </div>
    <div class=" col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start">
        @if ($dataBalai->logo_balai == null)
            <img class="img-fluid" src="{{ asset('storage/images/Logo Balai.png') }}"
                style="background-size: cover; min-height: 400px;" alt="..." />
        @else
            <img src="{{ asset('storage/images/logo_balai/' . $dataBalai->logo_balai) }}"
                style="background-size: cover; min-height: 400px;" height="10" alt="..." class=" img-fluid rounded">
        @endif
    </div>
    <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
        <div class="content d-flex flex-column justify-content-center">
            <h3>{{ $dataBalai->nama_balai }}</h3>
            <p>
                {{ $dataBalai->alamat }}
            </p>
            <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <h3>Deskripsi</h3>
                        <p>{!! $dataBalai->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </div><!-- End .content-->
    </div>
@endsection
@section('Visi-Misi')
    <div class="section-title">
        <h2>Visi-Misi</h2>
    </div>
    <div class="row resume">
        <div class="col-lg-6">
            <h3 class="resume-title">Visi</h3>
            <div class="resume-item pb-0">
                @foreach ($visi as $v)
                    <p><em>{!! $v->deskripsi !!}</em></p>
                @endforeach

            </div>
        </div>
        <div class="col-lg-6">
            <h3 class="resume-title">Misi</h3>
            <div class="resume-item">
                @foreach ($misi as $m)
                    <p><em>{!! $m->deskripsi !!}</em></p>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@section('Peraturan')
    <div class="section-title">
        <h2>Peraturan</h2>
    </div>
    <table class="table " id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Peraturan</th>
                <th scope="col">Jenis Peraturan</th>
                <th scope="col">Tahun</th>
                <th scope="col">Nama Balai</th>
                <th scope="col">file</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peraturan as $no => $p)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->jenis }}</td>
                    <td>{{ $p->tahun }}</td>
                    <td>{{ $p->balai->nama_balai }}</td>
                    <td>
                        <a href="{{ asset('uploads/' . $p->pdf) }}" target="_blank"><i class="fa fa-download"></i></a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('Informasi')
    <div class="section-title">
        <h2>Informasi</h2>
    </div>
    <div class="row ">
        @foreach ($informasi as $i)
            <div class="col-md-4">
                <div class="card " style="width: 22rem;">
                    <img class="card-img-top" src="{{ asset('storage/images/informasi/' . $i->foto) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text">{{ $i->judul }}</h5>
                        <div class="text">
                            <p class="card-text ">{!! $i->deskripsi !!}</p>
                        </div>
                        <div class="card-read-more">
                            <a href="{{ route('detailBerita', $i->id_berita) }}"
                                class="btn btn-link btn-block">
                                Lihat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('Kawasan')
    <div class="section-title">
        <h2>Kawasan</h2>
    </div>
    @foreach ($kawasan as $k)
        <h1>{{ $k->judul }}</h1>
        <span>( <em> {{ $k->lokasi }} </em>)</span>
        <div class=" d-flex mt-2 align-items-stretch justify-content-center">
            <img class=" col-md-8 img-fluid d-flex align-items-stretch justify-content-center justify-content-lg-start"
                src="{{ asset('storage/images/kawasan/'.$k->foto) }}" style="background-size: cover; min-height: 400px;"
                alt="..." />

        </div>
        <div class="text">
            <p class="card-text ">{!! $k->deskripsi !!}</p>
        </div>
        <div class="card-read-more">
            <a href="{{ route('detailKawasan', $k->id_kawasan) }}" class="btn btn-link btn-block">
                Lihat
            </a>
        </div>
        </br>
    @endforeach
@endsection
@section('Struktur')
    <div class="section-title">
        <h2>Struktur</h2>
    </div>
    @foreach ($baganStruktur as $b )
      <div class="card bg-primary">
        <h2 class="text-center text-white">{{ $b->nama }}</h2>
      </div>
      <div class="row">
        @php
        $value = App\Models\StrukurOrganisasi::where('id_bagan_struktur' , $b->id_bagan_struktur)->get();
        @endphp
        @foreach ($value as $v)
          <div class="col-md-3 my-4">
              <h5 class="text-center">{{ $v->nama }}</h5>
              <p class="text-center"><em>{{ $v->jabatan }}</em></p>            
          </div>          
        @endforeach

      </div>
    @endforeach

    @endsection

@section('js-section')
    $("#myTable").DataTable({
    "autoWidth": false,
    "responsive": true
    });
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
@endsection
