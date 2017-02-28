@extends('layouts.guest.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('/assets/device-mockups/device-mockups.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/kaatas.css')}}">
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
            	<a href="{{url('/')}}" class="typewrite" data-period="2000" data-type='[{!! $dashboard->typingTextHead !!}]' id="typing-head">
             		<span class="wrap"></span>
             	</a>
             </h2>
             <h3 id="quote-head">" {!! $dashboard->headQuote !!} "</h3>
			</div>

    </div>
  </section>

  <section id="layanan" >
    <div class="container">
    <h4 id="right-selector" class="name-selection">apa yang kami kerjakan</h4>
    <hr class="blue-dash">
    <div class="row">
      <div class="col-md-8">
         <div id="carousel-a" class="carousel slide carousel-sync laptop" data-ride="carousel" data-pause="false">
              <div class="carousel-inner" role="listbox" >
              @foreach($services as $service)
                 @if ($loop->first)
                  <div class="item active">
                @else
                  <div class="item">
                @endif
                  <div class="carousel-caption caption-layanan">
                      <h3>{{$service->title}}</h3>
                      {!! $service->description !!}
                    </div>
                </div>
                @endforeach
              </div>
            </div>
      </div>

      <div class="col-md-4">
        <div class="device-mockup macbook_2015 silver portrait black">
                <div class="device">
                    <div class="screen">
                        <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                        <div id="carousel-b" class="carousel slide carousel-sync laptop" data-ride="carousel" data-pause="false">
                          <div class="carousel-inner" role="listbox">
                            @foreach($services as $service)
                              @if ($loop->first)
                                <div class="item active">
                              @else
                                <div class="item">
                              @endif
                              <img src="{{url('storage/icon/'.$service->picture)}}" alt="{{$service->alt}}" class="img img-responsive">
                            </div>
                            @endforeach
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
<section id="spacereserve"> </section>
  <section id="carakerja">
    <div class="container">
    <h4 id="left-selector" class="name-selection">Cara Kerja Kami</h4>
    <hr class="blue-dash" id="spacing">
      <div class="row">
        @foreach($works as $work)
        <div class="col-md-3  carakerja">
            <div class="centered">
              <img src="{{url('/storage/icon/'.$work->picture)}}">
            </div>
            <h4 style=" text-align: left; color: #03A9F4;text-align: center">{{$work->title}}<br></h4>
            {!! $work->description !!}
          </div>
          @endforeach
      </div>
    </div>
  </section>
  <section id="space"> </section>
  <section id="kelebihan">
    <div class="container why-we">
    <h4 class="name-selection" style="text-align: center;" >kelebihan kami</h4>
      <ol>
          @foreach($superiorities as $key => $superiority)
              @php
                $number = rand(1,2);
              @endphp
              @if($number == 1)
                <li>
                    <span>{{$key+1}}.</span>
                    <div class="row" id="whyone" >
                      <div class="col-md-10">
                      <h4>{{$superiority->title}}</h4>
                      {!! $superiority->description !!}
                    </div>
                    <div class="col-md-2">
                      <img src="{{url('/storage/icon/'.$superiority->picture)}}" class="img img-responsive">
                    </div>
                    </div>                  
                </li>
              @elseif($number == 2)
                <li>
                    <span>{{$key+1}}.</span>
                    <div class="row" id="whyone" >
                      <div class="col-md-2">
                        <img src="{{url('/storage/icon/'.$superiority->picture)}}" class="img img-responsive">
                      </div>
                      <div class="col-md-10">
                        <h4>{{$superiority->title}}</h4>
                        {!! $superiority->description !!}
                      </div>
                    </div>                  
                </li>
              @endif
              
            @endforeach
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
<script type="text/javascript" src="{{url('assets/typing.js')}}"></script>
<script type="text/javascript" src="{{url('assets/jquery.nav.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#nav').onePageNav();
  });
</script>
@endpush