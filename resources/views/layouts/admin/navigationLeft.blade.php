<style type="text/css">
  #icon-header{
    width:45px;
  }
</style>

<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="{{url('/')}}" class="site_title"><img src="{{url('storage/icon/favicon.ico')}}" id="icon-header"> <span>Kaatas <small>Administator</small></span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="{{url('storage/user/'.$user->picture)}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{$user->realName}}</h2>
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @if((Auth::user()->isAdminHead(Auth::user()->id))->count())
            <li><a><i class="fa fa-rocket"></i> DashBoard Kaatas<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('/admin/home')}}">Home</a>
                </li>
                <li><a href="{{url('/admin/services')}}">Services</a>
                </li>
              </ul>
            </li>
            @endif
            <li><a href="{{url('/blog/admin/')}}"><i class="fa fa-newspaper-o"></i>Blog</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-pencil-square-o"></i> Manage <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/blog/admin/blog')}}">Blog</a></li>
            <li><a href="{{url('/blog/admin/category')}}">Category & Tag</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>