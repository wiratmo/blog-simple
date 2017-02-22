@extends('layouts.guest.index')
@push('style')
	<link rel="stylesheet" type="text/css" href="{{url('assets/blog-kaatas.css')}}">
@endpush
@section('body')
<div class="wrapper-parallax">
    <header>
    </header>
    @include('layouts.guest.navigator_blog')
    <div class="content">
        <div class="container">
        	<div class="row">
        		<div class="col-md-7 col-md-offset-1">
            @foreach($articles as $article)
        			<div class="article">
        				@include('dashboards.article_blog')
        			</div>
              @endforeach
        		</div>
        		<div class="col-md-3" id="sidebar">
        			<span id="date-now">{{$dateNow}}</span>
                <div class="share-story">
                  <h2><a href="{{url('login')}}">Share Your Story</a></h2>
                </div>
                <div class="topview">
                  @foreach($mostView as $mv)
                  <div class="content-topview">
                    <div class="col-md-3 col-xs-3">
                      <img src="{{url('storage/user/'.$mv->user->picture)}}" class="img img-responsive img-circle">
                    </div>
                    <div class="col-md-9 col-xs-9 sidebar-article">
                      <h5><a href="{{url('/blog/user/'.$mv->user->name.'/'.$mv->slug)}}">{{$mv->title}}</a></h5>
                      <p class="smaller-property"><a href="{{url('/blog/user/'.$mv->user->name)}}">{{$mv->user->realName}}</a> at {{$mv->created_at->diffForHumans()}}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="tag-article">
                  <ul>
                    @foreach($tags as $tag)
                    <li>
                      <a href="{{url('/blog/tag/'.$tag->slug)}}">
                        <button class="btn btn-primary">{{$tag->title}}</button>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
        		</div>
        	</div>
        </div>
    </div>

</div>
@endsection
@push('script')
<script type="text/javascript" src="{{url('/assets/kaatas.js')}}"></script>
@endpush