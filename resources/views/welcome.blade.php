<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Sistem Informasi Pemberdayaan Kawasan Hutan</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                {{--  <a class="navbar-brand" href="#page-top"><img src="{{ asset('template/assets/img/Lambang_Kabupaten_Gorontalo.jpg') }}" alt="..." /></a>  --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        {{--  <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>  --}}
                        <li class="nav-item"><a class="nav-link" href="#profil">Profil Balai</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Informasi</a></li>
                        {{--  <li class="nav-item"><a class="nav-link" href="#team">Dokument</a></li>  --}}
                        <li class="nav-item"><a class="nav-link" href="#team">Peraturan</a></li>
                        @if (Auth::user())
                            @if (Auth::user()->role != 'masyarakat')
                                <li class="nav-item"><a class="nav-link" href="/home"> {{ Auth::user()->name }}</a></li>
                                
                            @else
                                {{--  <li class="nav-item"><a class="nav-link" href="/"> {{ Auth::user()->name }}</a></li>  --}}
                                <div class="dropdown">
                                    <a class=" dropdown-toggle nav-link" href="{{ route('logout') }}" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }} 
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

                                        @if (config('adminlte.use_route_url', false))
                                            @php( $logout_url = $logout_url ? route($logout_url) : '' )
                                        @else
                                            @php( $logout_url = $logout_url ? url($logout_url) : '' )
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-fw fa-power-off text-red"></i>
                                                {{ __('adminlte::adminlte.log_out') }}
                                            </a>
                                            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                                                @if(config('adminlte.logout_method'))
                                                    {{ method_field(config('adminlte.logout_method')) }}
                                                @endif
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                  </div>
                            @endif
                        @else
                            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Portal Informasi Terpadu</div>

                <div class="masthead-subheading">Dulo Ito Momongu Lipu </div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#home">Selengkapnya</a>
            </div>
        </header>
    
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="profil">
            <div class="container">
                
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Profil Balai</h2>
                    <h3 class="section-subheading ">Dashboard Sistem Informasi Pemberdayaan Hutan</h3>
                </div>
                <div class="row">
                   
                    @foreach ($dataBalai as $db )
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                            
                        <div class="portfolio-item ">
                         
                            <a class="portfolio-link" href="{{ route('detailProfilBalai', $db->id) }}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-detail fa-3x"></i></div>
                                </div>
                                <div class="h-50">
                                @if ($db->logo_balai != null)
                                    <img class="img-fluid" src="{{ asset('storage/images/logo_balai/'. $db->logo_balai) }}" style="height: 15rem; width: 100%;" alt="..." />
                                @else
                                    <img class="img-fluid" src="{{ asset('storage/images/Logo Balai.png') }}" style="height: 15rem; width: 100%;"  alt="..." />
                                    
                                @endif
                                </div>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $db->nama_balai }}</div>
                                {{--  <div class="portfolio-caption-subheading text-muted">Illustration</div>  --}}
                            </div>

                        </div>

                    </div>
                    @endforeach
        
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Informasi</h2>
                    <h3 class="section-subheading text-muted">Kumpulan Informasi</h3>
                </div>
                <div class="row ">
                @foreach ($informasi as $i)
                    <div class="col-md-4">
                        <div class="card " style="width: 22rem;">
                            <img class="card-img-top" src="{{ asset('storage/images/informasi/'.$i->foto) }}" alt="Card image cap">
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
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Peraturan</h2>
                    {{--  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>  --}}
                </div>
                <div class="row">
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
                            @foreach ($peraturan as $no => $p )
                                
                          <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $p->judul }}</td>
                            <td>{{ $p->jenis }}</td>
                            <td>{{ $p->tahun }}</td>
                            <td>{{ $p->balai->nama_balai }}</td>
                            <td>
                                <a href="{{ asset('uploads/'. $p->pdf) }}" target="_blank" ><i class="fa fa-download"></i></a>
                                {{--  <a href="#popup-pdf" class=" open-popup">lihat</a>
                                <div id="popup-pdf" class="mfp-hide" style="text-align:center;">
                                    <iframe
                                        src="{!! asset('uploads/'. $p->pdf) !!}"
                                        align="top" height="650" width="100%" frameborder="0" scrolling="auto"></iframe>
                                </div>  --}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                {{--  <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>  --}}
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Form Keluhan</h2>
                </div>
               
                @if (Auth::user())
                <form id="contactForm" action="{{ route('keluhan.store')}}"  method="post">
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <select name="id_balai" id="id_balai" class="form-control" required data-sb-validations="required">
                                <option value="">Pilih Nama Balai</option>
                                @foreach ($dataBalai as $b )
                                    <option value="{{ $b->id }}">{{ $b->nama_balai }}</option>
                                    
                                @endforeach
                            </select>
                            <div class="invalid-feedback" data-sb-feedback="id_balai:required">Data Wajib Diisi</div>
                        </div>

                        <div class="form-group">
                            <!-- Name input-->
                            <select name="spesifikasi" id="spesifikasi" class="form-control" required data-sb-validations="required" >
                            </select>
                            <div class="invalid-feedback" data-sb-feedback="spesifikasi:required">Data Wajib Diisi</div>
                        </div>
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="nama" name="nama" required type="text" placeholder="Tuliskan Nama Anda *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="nama:required">Data Wajib Diisi</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="alamat" name="alamat" required type="text" placeholder="Tuliskan Alamat Anda*" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="alamat:required">Data Wajib Diisi</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" name="no_hp" id="phone" required type="tel" placeholder="Tuliskan No Hp  *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="keluhan" required placeholder="Keluhan Anda *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                    </div>
                  
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " type="submit">Kirim Keluhan</button></div>

                </form>
                @else
                <h4 class="text-warning">Login Terlebih Dahulu!!!</h4>
                <form id="contactForm" action="{{ route('keluhan.store')}}"  method="post">
                    @csrf

                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <select name="id_balai" id="id_balai" class="form-control" required data-sb-validations="required" disabled>
                                <option value="">Pilih Nama Balai</option>
                                @foreach ($dataBalai as $b )
                                    <option value="{{ $b->id }}">{{ $b->nama_balai }}</option>
                                    
                                @endforeach
                            </select>
                            <div class="invalid-feedback" data-sb-feedback="id_balai:required">Data Wajib Diisi</div>
                        </div>
                        
                   
                        <div class="form-group">
                            <!-- Name input-->
                            <input disabled class="form-control" id="nama" name="nama" required type="text" placeholder="Tuliskan Nama Anda *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="nama:required">Data Wajib Diisi</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input disabled class="form-control" id="alamat" name="alamat" required type="text" placeholder="Tuliskan Alamat Anda*" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="alamat:required">Data Wajib Diisi</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input disabled class="form-control" name="no_hp" id="phone" required type="tel" placeholder="Tuliskan No Hp  *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea disabled class="form-control" id="message" name="keluhan" required placeholder="Keluhan Anda *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                    </div>
                  
                    <div class="text-center"><button disabled class="btn btn-primary btn-xl text-uppercase " type="submit">Kirim Keluhan</button></div>

                </form>
                @endif
             
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
         
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Threads
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Illustration
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Explore
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Graphic Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Finish
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Identity
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Lines
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Branding
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Southwest
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Website Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('template/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script>
            $("#myTable").DataTable({
                "autoWidth": false,
                "responsive": true
            });
            $(document).ready(function () {
                $('#spesifikasi').hide(); 

                $('.open-popup').magnificPopup({
                type: 'inline',
                fixContentPos: true,
                duration: 300,
                closeBtnInside: false,
                preloader: false,
                removalDelay: 160,
                mainClass: 'mfp-fade'
                });
                $('#id_balai').on('change', function() {
                    var cmbVal = $('#id_balai :selected').val();
                    if (cmbVal == '' ) {
                        $('#spesifikasi').hide(); 
                    } else {
                        console.log(cmbVal);
                        $.ajax({
                            type: "GET",
                            url: "{{ route('getSpesifikasi') }}",
                            data:  {id_balai: cmbVal},
                            success: function (data,response) {
                                $('#spesifikasi').show(); 
                                $('#spesifikasi').html(data); 

                            }
                        });
                    }
                    
                });
         
            })
            

        </script>  
    </body>
   
</html>
