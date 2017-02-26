@extends('layouts.admin.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('assets/datatables.net-dt/css/jquery.dataTables.min.css')}}">
@endpush
@section('main')
<div class="x_panel">
	<!-- Begin Caregory -->
	<div class="col-md-6 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_390 overflow_hidden">
	    <div class="x_title">
	      <h2>Category Article</h2>	
	      <ul class="nav navbar-right panel_toolbox">
	      	<li>
	      		<a href="{{route('manage.category.create')}}">
			      <i class="fa fa-plus"></i>
			  </a>
	      	</li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	      <table class="display tableDatatables" cellspacing="0" width="100%">
	      <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
	      <tbody>
	      @foreach($categories as $category)
	      	<tr>
	      		<td class="col-md-4">{{$category->title}}</td>
	      		<td class="col-md-6">{{str_limit($category->title, 100)}}</td>
	      		<td class="col-md-2 menu-action">
	      			<ul>
	      				<li><a href="{{route('manage.category.edit', ['id'=> $category->id])}}"><i class="fa fa-pencil"></i></a></li>
	      				<li>
			                <form method="POST" action="{{route('manage.category.delete',['id'=>$category->id])}}">
			                  {{ method_field('DELETE') }}
			                  {{ csrf_field() }}
			                  <input type="hidden" name="id" value="{{$category->id}}">
			                  <button type="submit" class="btn-transparant"><i class="fa fa-times"></i></button>
			                </form>
			              </li>
	      			</ul>
	      		</td>
	      	</tr>
	      @endforeach
	      </tbody>
	      </table>
	    </div>
	  </div>
	</div>
	<!-- End Category -->

	<!-- Begin Tag -->
	<div class="col-md-6 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_390 overflow_hidden">
	    <div class="x_title">
	      <h2>Tag Artcle</h2>
	      <ul class="nav navbar-right panel_toolbox">
	      	<li>
	      		<a href="{{route('manage.tag.create')}}">
			      <i class="fa fa-plus"></i>
			  </a>
	      	</li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	      <table class="display tableDatatables" cellspacing="0" width="100%">
	      <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
	      <tbody>
	      @foreach($tags as $tag)
	      	<tr>
	      		<td class="col-md-4">{{$tag->title}}</td>
	      		<td class="col-md-6">{{str_limit($tag->title, 100)}}</td>
	      		<td class="col-md-2 menu-action">
	      			<ul>
	      				<li><a href="{{route('manage.tag.edit', ['id'=> $tag->id])}}"><i class="fa fa-pencil"></i></a></li>
	      				<li>
			                <form method="POST" action="{{route('manage.tag.delete',['id'=>$tag->id])}}">
			                  {{ method_field('DELETE') }}
			                  {{ csrf_field() }}
			                  <input type="hidden" name="id" value="{{$tag->id}}">
			                  <button type="submit" class="btn-transparant"><i class="fa fa-times"></i></button>
			                </form>
			              </li>
	      			</ul>
	      		</td>
	      	</tr>
	      @endforeach
	      </tbody>
	      </table>
	    </div>
	  </div>
	</div>
	<!-- End Tag -->
</div>
@endsection
@push('script')
<script type="text/javascript" src="{{url('assets/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('.tableDatatables').DataTable();
	} );
</script>
@endpush