@extends('layouts.guest.index')
@push('style')
	<link rel="stylesheet" type="text/css" href="{{url('assets/blog-kaatas.css')}}">
@endpush
@section('body')
	@foreach($article as $a)
		<div class="wrapper-parallax">
		    <header style="background: url('{{url('/storage/image/header-blog/'.$a->header)}}')">
		    
		    </header>
		    @include('layouts.guest.navigator_blog')
		    <div class="content">
		    	<div class="container">
		    		<div class="col-md-8 col-md-offset-1">
		    			<h1>{{$a->title}}</h1>
		    			<span class="article-properties">
							<ul>
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$a->created_at->diffForHumans()}}</li>
								@foreach($a->tags as $tag)
								<li>
									<a href="{{url('/blog/tag/'.$tag->slug)}}">
				                    	#{{$tag->title}}
				                    </a>
								</li>
								@endforeach
							</ul>
						</span>
						<div class="article-full">
							{!! $a->content !!}
						</div>
		    		</div>
		    		<div class="col-md-2 affix-top" id="sidebar">
		    			<div class="col-md-offset-4 col-md-8  profil-writer">
		    				<img src="{{url('/storage/user/'.$a->user->picture)}}" class="img img-responsive img-circle pp">
		    				{{$a->user->realName}}
		    			</div>
		    			<div class="aboutme">
		    				{{$a->user->aboutMe}}
		    			</div>
		    			<div class="similiar-article">
		    			<h4>Artikel lainnya</h4>
		    				@foreach($similarArticle as $sa)
		    				<div class="content-topview">
			                    <h5><a href="{{url('/blog/user/'.$sa->user->name.'/'.$sa->slug)}}">{{$sa->title}}</a></h5>
                      			<p class="smaller-property"><a href="{{url('/blog/user/'.$sa->user->name)}}">{{$sa->user->realName}}</a> at {{$sa->created_at->diffForHumans()}}</p>
			                </div>
			                @endforeach
		    			</div>
		    		</div>
		    	</div>
		    </div>
		</div>
	@endforeach
@endsection
@push('script')
<script type="text/javascript" src="{{url('/assets/kaatas.js')}}"></script>
@endpush