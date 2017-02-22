@if($article->header == NULL)
	<div class="coloum-article col-md-6 col-xs-6">
		<div class="article-title">
			<h2><a href="{{url('/blog/user/'.$article->user->name.'/'.$article->slug)}}">Title</a> 
				in <small class="article-category">
					<ul>
						@foreach($article->categories as $category)
							<li><a href="{{url('/blog/category/'.$category->slug)}}">{{$category->title}}</a></li>
						@endforeach
					</ul>
				</small>
			</h2>
			<span class="article-properties">
				<ul>
					<li><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$article->created_at->diffForHumans()}}</li>
					@foreach($article->tags as $tag)
						<li><a href="{{url('/blog/tag/'.$tag->slug)}}">{{$tag->title}}</a></li>
					@endforeach
				</ul>
			</span>
		</div>
		<div class="article-content">
			{{$article->description}}
		</div>
	</div>

@else
	<div class="article-title">
		<h2><a href="{{url('/blog/user/'.$article->user->name.'/'.$article->slug)}}">Title</a> 
			in <small class="article-category">
				<ul>
					@foreach($article->categories as $category)
						<li><a href="{{url('/blog/category/'.$category->slug)}}">{{$category->title}}</a></li>
					@endforeach
				</ul>
			</small>
		</h2>
		<span class="article-properties">
			<ul>
				<li><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$article->created_at->diffForHumans()}}</li>
				@foreach($article->tags as $tag)
					<li><a href="{{url('/blog/tag/'.$tag->slug)}}">{{$tag->title}}</a></li>
				@endforeach
			</ul>
		</span>
	</div>
	<div class="article-content">
		<img src="{{url('storage/image/'.$article->header)}}" class="img img-responsive">
			{{$article->description}}
	</div>
@endif