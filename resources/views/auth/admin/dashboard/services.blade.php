@extends('layouts.admin.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('assets/datatables.net-dt/css/jquery.dataTables.min.css')}}">
@endpush
@section('main')
@if($type == 'edit')
	<div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Edit {{$category}}</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    <form method="POST" action="{{route('manage.service.update', ['category'=>$category,'id'=> $value->id])}}" enctype="multipart/form-data">
	    	{{ csrf_field() }}
	    	<center>
	    		<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"> Save</i></button>
	    	</center>
	    	<input type="hidden" name="id" value="{{$value->id}}">
	    	<input type="hidden" name="category" value="{{$category}}">
	    	<div class="row">
	    		<div class="col-md-5">
	    			@include('layouts.form.text', ['nameInput' => 'title','inputDescription' => 'title of article','required' =>1, 'value'=> $value->title])
		    	</div>
		    	<div class="col-md-5">
		    		@include('layouts.form.flexfile', ['nameInput' => 'picture','inputDescription' => '', 'value' =>$value->picture])
		    	</div>
	    	</div>
	    	<div class="col-md-12">
	    		@include('layouts.form.summernote', ['nameInput' => 'description','inputDescription' => 'discription of article','required' =>0, 'value' =>$value->description])
	    	</div>
	    </form>
	    </div>
	  </div>
	</div>
@elseif($type == 'create')
	<div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Edit {{$category}}</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    <form method="POST" action="{{route('manage.service.store', ['category'=>$category])}}" enctype="multipart/form-data">
	    	{{ csrf_field() }}
	    	<center>
	    		<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"> Save</i></button>
	    	</center>
	    	<input type="hidden" name="category" value="{{$category}}">
	    	<div class="row">
	    		<div class="col-md-5">
	    			@include('layouts.form.text', ['nameInput' => 'title','inputDescription' => 'title of article','required' =>1])
		    	</div>
		    	<div class="col-md-5">
		    		@include('layouts.form.flexfile', ['nameInput' => 'picture','inputDescription' => ''])
		    	</div>
	    	</div>
	    	<div class="col-md-12">
	    		@include('layouts.form.summernote', ['nameInput' => 'description','inputDescription' => 'discription of article','required' =>0])
	    	</div>
	    </form>
	    </div>
	  </div>
	</div>
@endif
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Services</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.service.create',['category' => 'services'])}}"><i class="fa fa-plus"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
	      <tbody>
	      @foreach($services as $service)
	      	<tr>
	      		<td class="col-md-2"><img src="{{url('/storage/icon/'.$service->picture)}}" class="img img-responsive"></td>
	      		<td class="col-md-3">{{$service->title}}</td>
	      		<td class="col-md-6">{!! str_limit($service->description,100) !!}</td>
	      		<td class="col-md-1 menu-action">
	      			<ul>
	      				<li><a href="{{route('manage.service.edit', ['category'=> 'services','id'=> $service->id])}}"><i class="fa fa-pencil"></i></a></li>
	      				<li>
			                <form method="POST" action="{{route('manage.service.delete',['id'=>$service->id])}}">
			                  {{ method_field('DELETE') }}
			                  {{ csrf_field() }}
			                  <input type="hidden" name="id" value="{{$service->id}}">
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

	<div class="col-md-6 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>How To Work</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.service.create',['category' => 'work'])}}"><i class="fa fa-plus"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
	      <tbody>
	      @foreach($works as $work)
	      	<tr>
	      		<td class="col-md-2"><img src="{{url('/storage/icon/'.$work->picture)}}" class="img img-responsive"></td>
	      		<td class="col-md-3">{{$work->title}}</td>
	      		<td class="col-md-6">{!! str_limit($work->description, 100) !!}</td>
	      		<td class="col-md-1 menu-action">
	      			<ul>
	      				<li><a href="{{route('manage.service.edit', ['category'=>'work','id'=> $work->id])}}"><i class="fa fa-pencil"></i></a></li>
	      				<li>
			                <form method="POST" action="{{route('manage.service.delete',['id'=>$work->id])}}">
			                  {{ method_field('DELETE') }}
			                  {{ csrf_field() }}
			                  <input type="hidden" name="id" value="{{$work->id}}">
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
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Superiority</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.service.create',['category' => 'superiority'])}}"><i class="fa fa-plus"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
	      <tbody>
	      @foreach($superiorities as $superiority)
	      	<tr>
	      		<td class="col-md-1"><img src="{{url('/storage/icon/'.$superiority->picture)}}" class="img img-responsive"></td>
	      		<td class="col-md-4">{{$superiority->title}}</td>
	      		<td class="col-md-6">{!! str_limit($superiority->description, 100) !!}</td>
	      		<td class="col-md-1 menu-action">
	      			<ul>
	      				<li><a href="{{route('manage.service.edit', ['category'=>'superiority','id'=> $superiority->id])}}"><i class="fa fa-pencil"></i></a></li>
	      				<li>
			                <form method="POST" action="{{route('manage.service.delete',['id'=>$superiority->id])}}">
			                  {{ method_field('DELETE') }}
			                  {{ csrf_field() }}
			                  <input type="hidden" name="id" value="{{$work->id}}">
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