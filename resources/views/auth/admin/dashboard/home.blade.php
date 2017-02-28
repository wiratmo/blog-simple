@extends('layouts.admin.index')
@section('main')
@if($sector != '')
<form method="POST" action="{{route('manage.dashboard.sector.update',['sector'=> $sector])}}">
{{ csrf_field() }}
<input type='hidden' name='id' value='{{$dashboard->id}}'>
<input type='hidden' name='sector' value='{{$sector}}'>
<center><button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button></center>
<hr>
@endif
<div class="row">
	<!-- icon favicon -->
	<div class="col-md-2 col-sm-2 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Icon Favicon</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'favicon'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<center>
	    		<img src="{{url('/storage/icon/'.$dashboard->favicon)}}">
	    	</center>
	    	@if($sector == 'favicon')
	    		@include('layouts.form.file', ['type'=>'create','nameInput' => 'favicon','inputDescription' => ''])
	    	@endif
	    </div>
	  </div>
	</div>	
	<!-- logo kaatas -->
	<div class="col-md-2 col-sm-2 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Heading Icon</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'headIcon'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content" style="background: black">
	     <center>
	     	<img src="{{url('/storage/icon/'.$dashboard->headIcon)}}">
	     </center>
	     	@if($sector == 'headIcon')
	    		@include('layouts.form.file', ['type'=>'create','nameInput' => 'headIcon','inputDescription' => ''])
	    	@endif
	    </div>
	  </div>
	</div>

	<!-- Header Quote -->

	<div class="col-md-4 col-sm-4 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Heading Quote</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'headQuote'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<center>
	    		<h4>{{$dashboard->headQuote}}</h4>
	    	</center>
	    	@if($sector == 'headQuote')
	    		@include('layouts.form.textarea', ['type'=>'edit','nameInput' => 'headQuote','inputDescription' => '','required' =>0, 'value' =>$dashboard->headQuote])
	    	@endif
	    </div>
	  </div>
	</div>

	<!-- header Typing  -->

	<div class="col-md-4 col-sm-4 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Header Typing</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'typingTextHead'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<center>
	    		<h4>{{$dashboard->typingTextHead}}</h4>
	    	</center>
	    	@if($sector == 'typingTextHead')
	    		@include('layouts.form.textarea', ['type'=>'edit','nameInput' => 'typingTextHead','inputDescription' => '','required' =>0, 'value' =>$dashboard->typingTextHead])
	    	@endif
	    </div>
	  </div>
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Title</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'title'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<center>
	    		<h4>{{$dashboard->title}}</h4>
	    		@if($sector == 'title')
		    		@include('layouts.form.text', ['type'=>'edit','nameInput' => 'title','inputDescription' => '','required' =>1, 'value' =>$dashboard->title])
		    	@endif
	    	</center>
	    </div>
	  </div>
	</div>

	<div class="col-md-4 col-sm-4 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Keyword</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'keyword'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<center>
	    		<h4>{{$dashboard->keyword}}</h4>
	    	</center>
	    	@if($sector == 'keyword')
	    		@include('layouts.form.textarea', ['type'=>'edit','nameInput' => 'keyword','inputDescription' => '','required' =>0, 'value' =>$dashboard->keyword])
	    	@endif
	    </div>
	  </div>
	</div>

	<div class="col-md-4 col-sm-4 col-xs-6">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Description</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'description'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<center>
	    		<h4>{{$dashboard->description}}</h4>
	    	</center>
	    	@if($sector == 'description')
	    		@include('layouts.form.textarea', ['type'=>'edit','nameInput' => 'description','inputDescription' => '','required' =>0, 'value' =>$dashboard->description])
	    	@endif
	    </div>
	  </div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12">
	  <div class="x_panel tile fixed_height_320 flex-panel">
	    <div class="x_title">
	      <h8>Maps</h8>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a href="{{route('manage.dashboard.sector', ['sector'=>'maps'])}}" ><i class="fa fa-pencil"></i></a></li>
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    	<div class="row">
	    		<div class="col-md-10 col-xs-10">
		    		<div class="google-maps">
	            		<iframe src="{{$dashboard->map}}" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	        		</div>
		    	</div>
		    	<div class="col-md-2 col-xs-2">
		    		<h4>{{$dashboard->address}}</h4>
		    	</div>	
	    	</div>
	    	@if($sector == 'maps')
	    		
	    	<div class="row">
	    		<div class="col-md-8">
	    			@include('layouts.form.textarea', ['type'=>'edit','nameInput' => 'map','inputDescription' => 'Location of kaatas','required' =>0, 'value' =>$dashboard->map])	
	    		</div>
	    		<div class="col-md-4">
	    			@include('layouts.form.text', ['type'=>'edit','nameInput' => 'address','inputDescription' => 'Address','required' =>0, 'value' =>$dashboard->address])
	    		</div>
	    	</div>
	    	@endif
	    </div>
	  </div>
	</div>
</div>
@if($sector != '')
</form>
@endif
@endsection