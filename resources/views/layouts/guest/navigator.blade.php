<nav class="navbar navbar-default navbar-transparant">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-menu-navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="{{url('storage/icon/'.$dashboard->headIcon)}}">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-menu-navbar">
      <ul class="nav navbar-nav navbar-right menu-navbar" id="nav">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#carakerja">Cara Bekerja</a></li>
        <li><a href="#kelebihan">Kelebihan</a></li>
        <li><a href="{{url('blog')}}">Blog</a></li>
        <li><a href="#kontak">Kontak</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>