@extends('layouts.admin.index')

@push('style')
<style type="text/css">
  .ui-ribbon-container .ui-ribbon-wrapper{
    top: 3px;
    right: 15px;
    z-index: 1;
  }
  .ui-ribbon-container .ui-ribbon{
    background-color: #00cbfe;
  }
  .thumbnail{
    height: 210px;
  }
  .modal-content{
    height: 100vh;
  }
  .tools-bottom>ul{
    display: inline-flex;
  }
  .tools-bottom>ul>li{
    list-style: none;
  }
</style>
@endpush

@section('main')
<center>
  <a href="{{route('manage.blog.create')}}">
    <button class="btn btn-primary">
      <i class="fa fa-plus">Add</i>
    </button>
  </a>
</center>
<div class="x_panel">
  
  @foreach($articles as $article)
  <div class="col-md-55 ui-ribbon-container">
    @if($article->status == 'draf')
    <div class="ui-ribbon-wrapper">
      <div class="ui-ribbon">
        Draff
      </div>
    </div>
    @endif
    <div class="thumbnail">
      <div class="image view view-first">
        @if($article->header == NULL)
        <img style="height: 100%; display: block;" src="{{url('/storage/image/default-icon-article.png')}}" class="img img-responsive" />
        @else
        <img style="height: 100%; display: block;" src="{{url('/storage/image/'.$article->header)}}" class="img img-responsive"/>
        @endif
        <div class="mask">
          <p>{{str_limit($article->description, 200)}}</p>
          <div class="tools tools-bottom">
            <ul>
              <li>
                <a href="{{url('/blog/user/'.$article->user->name.'/'.$article->slug)}}" target="_blank"><i class="fa fa-link"></i></a>  
              </li>
              <li>
                <a href="{{route('manage.blog.edit',['id'=> $article->id])}}"><i class="fa fa-pencil"></i></a>    
              </li>
              <li>
                <form method="POST" action="{{route('manage.blog.delete',['id'=>$article->id])}}">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{$article->id}}">
                  <button type="submit" class="btn-transparant"><i class="fa fa-times"></i></button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="caption">
        <p>{{$article->title}}</p>
          
        <div class="property">
          <i class="fa fa-calendar-o"> {{$article->updated_at->diffForHumans()}}</i>
          <br>
        </div>
          @foreach($article->tags as $tag)
            <i class="fa fa-tags"><span>{{$tag->title}} </span></i>
          @endforeach
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection