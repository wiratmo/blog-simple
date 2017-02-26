<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Contributor</span>
    <div class="count">{{$countContributor->countUser}}</div>
    <span class="count_bottom"><i class="green fa fa-calender-o"></i> {{$countContributor->created_at}}</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Total Article</span>
    <div class="count">{{$countArticle->countArticle}}</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> {{$countArticle->created_at}}</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Draff Article</span>
    <div class="count">{{$countArticleDraf->countArticle}}</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> {{$countArticleDraf->created_at}}</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Posted Article</span>
    <div class="count">{{$countArticleDraf->countArticle}}</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> {{$countArticleDraf->created_at}}</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Category</span>
    <div class="count">{{$countCategory}}</div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Tag</span>
    <div class="count">{{$countTag}}</div>
  </div>
</div>