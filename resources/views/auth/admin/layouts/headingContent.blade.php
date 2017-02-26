<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3> {{$title}} <br><small> {{$subtitle}}</small> </h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <form method="POST" action="{{$action}}">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>  
</div>
<div class="clearfix"></div>