@extends('layouts.guest.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('/assets/device-mockups/device-mockups.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/kaatas.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/aos/dist/aos.css')}}">
<style type="text/css">
  body{
    background: url(/storage/icon/pattern.png) repeat;
  }
</style>
@endpush
@section('body')
<section class="body-background">
	<section id="home">
		<div class="container">
		@include('layouts.guest.navigator')
			<div class="col-md-4 col-right" >
			<h2>
            	<a href="{{url('/')}}" class="typewrite" data-period="2000" data-type='["Wujudkan Ide Briliant Anda","Ceritakan Ide Anda Kepada Dunia","Maksimalkan Ide Anda"]' id="typing-head">
             		<span class="wrap"></span>
             	</a>
             </h2>
             <h3 id="quote-head">" Kami percaya bahwa teknologi akan bertampak besar untuk kemajuan bisnis dan pribadi anda "</h3>
			</div>

    </div>
  </section>

  <section id="layanan" >
    <div class="container">
    <h4 id="right-selector" class="name-selection" >apa yang kami kerjakan</h4>
    <hr class="blue-dash">
    <div class="row">
      <div class="col-md-8">
         <div id="carousel-a" class="carousel slide carousel-sync laptop" data-ride="carousel" data-pause="false">
              <div class="carousel-inner" role="listbox" >
                <div class="item active">
                  <div class="carousel-caption caption-layanan">
                      <h3 >Pembuatan Website</h3>
                      <p><b>Percayakan kepada kami </b> ide anda dan akan <b>kami realisasikan</b> dalam bentuk website. Mari kita <b>kenalkan ide anda</b> kepada dunia dan berikan ruang dunia untuk mengenal kualitas anda. Website meliputi blog, situs berita, company profile, toko online, ataupun desain website</p>
                    </div>
                </div>
                <div class="item">
                  <div class="carousel-caption caption-layanan">
                      <h3>Pembuatan Aplikasi</h3>
                      <p>Bekerja sekarng dituntut <b>lebih terbuka dan lebih cepat</b>. Mari <b>kita percepat perkembangan </b>bisnis anda dengan menggunakan<b> aplikasi</b>. Aplikasi yang kami buat dapat berbentuk <b>website, desktop atau android</b> yang meliputi Aplikasi administrasi, GIS untuk pemetaan wilayah, ataupuna apliksai akuntansi</p>
                    </div>
                </div>
                <div class="item">
                  <div class="carousel-caption caption-layanan">
                      <h2>Pembantu Teknis</h2>
                      <p><b>Optimalkan insfrastruktur </b> anda sehingga bisnis anda dapat berjalan<b> lebih baik dan cepat</b> , layanan kami meliputi <b>pemeliharaan website, pemeliharaan aplikasi open source, penyiapan jaringan local area, dan sebagainya</b></p>
                    </div>
                </div>
              </div>
            </div>
      </div>

      <div class="col-md-4">
        <div class="device-mockup macbook portrait black">
                <div class="device">
                    <div class="screen">
                        <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                        <div id="carousel-b" class="carousel slide carousel-sync laptop" data-ride="carousel" data-pause="false">
                          <div class="carousel-inner" role="listbox">
                            <div class="item active">
                              <img src="{{url('storage/icon/webdev.jpg')}}" alt="Jasa Pembuatan Website dan aplikasi berbasis web" class="img img-responsive">
                            </div>
                            <div class="item">
                              <img src="{{url('storage/icon/mobile.jpg')}}" alt="Jasa Pembuatan Aplikasi Android" class="img img-responsive">
                            </div>
                            <div class="item">
                              <img src="{{url('storage/icon/it-support.jpg')}}" alt="Jasa Perawatan IT" class="img img-responsive">
                            </div>
                          </div>
                        </div>            
                    </div>
                    <div class="button">
                        <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                    </div>
                </div>
            </div> 
      </div>
    </div>
    </div>
  </section>

  <section id="carakerja">
    <div class="container">
    <h4 id="left-selector" class="name-selection" >apa yang kami kerjakan</h4>
    <hr class="blue-dash" id="spacing">
      <div class="row">
        <div class="col-md-3  carakerja">
            <div class="centered" id="masalah" >
              <i class="fa fa-wpexplorer fa-5x"></i>
            </div>
            <h4 style=" text-align: left; color: #03A9F4;text-align: center">Masalah<br></h4>
            <p>Perkembangan yang semakin cepat. Oleh karena itu optimalkan bisnis anda dengan teknologi. <b>Kami bertekad untuk mememukan akar masalah terhadap yang anda alami</b>, kami tidak akan berhenti dalam mencari pokok permasalahan tersebut </p>
          </div>
          <div class="col-md-3 carakerja">
            <div class="centered" id="solusi" >
              <i class="fa fa-heart-o fa-5x"></i>
            </div>
            <h4 style=" text-align: left; color: #03A9F4;text-align: center">Solusi<br></h4>
            <p>Apapun permasalahan anda pasti ada solusi atau pemecahan masalah. <b>Kami berkomitmen akan menemukan solusi dari akar masalah yang anda alami</b></p>
          </div>
          <div class="col-md-3 carakerja">
            <div class="centered"  id="komunikasi" >
              <i class="fa fa-podcast fa-5x"></i>
            </div>
            <h4 style=" text-align: left; color: #03A9F4;text-align: center">Komunikasi<br></h4>
            <p>
              Kerja kami kerja yang berkesinambungan dan tidak menyampingkan anda dan membuat solusi beradasarkan anggapan kami. <b>Kami pasti selalu melibatkan anda dalam apa yang kami kerjakan</b> untuk menemukan solusi bagi anda sehingga solusinya lebih mengena ke anda 
            </p>
          </div>
          <div class="col-md-3 carakerja">
            <div class="centered"  id="review" >
              <i class="fa fa-spinner fa-5x"></i>
            </div>
            <h4 style=" text-align: left; color: #03A9F4;text-align: center">Evaluasi<br></h4>
            <p>
              Setelah diadakan komunikasi dengan anda , <b>kami akan melalukan review atas solusi yang kami buat dan membuat pembaharuan </b> dari apa yang anda rasa belum cocok.
            </p>
          </div>
      </div>
    </div>
  </section>
  <section id="space"> </section>
  <section id="kelebihan">
    <div class="container why-we">
    <h4 class="name-selection" style="text-align: center;" >kelebihan kami</h4>
      <ol>
              <li>
                  <span>1.</span>
                  <div class="row" id="whyone" >
                    <div class="col-md-8">
                    <h4>Keamanan Data Lebih Terjamin</h4>
                    <p>Keamanan data menjadi faktor penting dalam dunia digital seperti sekarang. Menanggulangi kebocoran informasi pentik dari anda kami berkomitmen untuk memprioritaskan keamanan data anda dalam aplikasi yang kami buat</p>  
                  </div>
                  <div class="col-md-3">
                    <img src="{{url('/storage/icon/security.png')}}" class="img img-responsive">
                  </div>
                  </div>                  
              </li>
              <li>
                  <span>2.</span>
                  <div class="row" id="whytwo" >
                  <div class="col-md-3">
                    <img src="{{url('/storage/icon/development.png')}}" class="img img-responsive">
                  </div>
                    <div class="col-md-8">
                    <h4>Mudah Dalam Pengembangan</h4>
                    <p><b>Kemudahan yang kami tawarkan.</b> Aplikasi yang kami buat dapat mudah dalam pengembangan jika terjadi perubahan atau penambahan sehingga tidak terlalu menganggu anda dan bisnis anda</p>  
                  </div>
                  </div>                  
              </li>
              <li>
                  <span>3.</span>
                  <div class="row" id="whythree" >
                    <div class="col-md-8">
                    <h4>Desain Responsive</h4>
                    <p>Kami selalu <i>mereview</i> teknologi apa yang sedang berkembang. Sekarang banyak yang menggunakan <i>smartphone</i> dalam kehidupan sehari hari. Untuk mengoptimalkan kerja anda dan bisnis anda kami membuat aplikasi yang baik dibuka dari semua perangkat</p>  
                  </div>
                  <div class="col-md-3">
                    <img src="{{url('/storage/icon/responsive.png')}}" class="img img-responsive">
                  </div>
                  </div>                  
              </li>
              <li>
                  <span>4.</span>
                  <div class="row" id="whyfour" >
                  <div class="col-md-3">
                    <img src="{{url('/storage/icon/payment.png')}}" class="img img-responsive">
                  </div>
                    <div class="col-md-8">
                    <h4>Pembayaran</h4>
                    <p>
                      Setiap orang pasti menginginkan pembaharuan. Oleh karenanya kami menawarkan kemudahan itu lagi dalam bagian pembayaran
                    </p>  
                  </div>
                  </div>                  
              </li>
          </ol> 
    </div>
  </section>
<section id="space"> </section>
  <section id="kontak">
    <div class="container">
      <div class="col-md-7">
        <div class="google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1266.361368905368!2d110.74731232701468!3d-7.546168348882258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a148d79e6a593%3A0x5027a76e356b380!2sSingopuran%2C+Kartasura%2C+Kabupaten+Sukoharjo%2C+Jawa+Tengah!5e0!3m2!1sid!2sid!4v1487635310092" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-5" id="kontak-right">
        <h4>Hubungi Kami</h4>

        @include('layouts.guest.notification_alert')

        <form action="{{url('/pesan')}}" method="post">
          {{csrf_field()}}
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama Anda" name="name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Kontak Aktif (Email atau Ponsel)" name="contact">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" placeholder="Masukkan Pesan Anda" name="message"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fa fa-send-o"></i> Kirim</button>
            </div>
        </form>
      </div>
    </div>
  </section>
@endsection
@section('footer')
  <section id="footer">
    <div class="container">
    <div class="row">
      <div class="col-md-4">
        copyright © 2017 
      </div>
      <div class="col-md-3">
        
      </div>
      <div class="col-md-5">
        Desaign by <a href="{{url('/')}}">kaatas</a>
      </div>
    </div>
    </div>
  </section>
</section>
@endsection
@push('script')
<script type="text/javascript" src="{{url('assets/aos/dist/aos.js')}}"></script>
<script type="text/javascript" src="{{url('assets/typing.js')}}"></script>
<script type="text/javascript" src="{{url('assets/jquery.nav.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#nav').onePageNav();
  });
</script>
@endpush