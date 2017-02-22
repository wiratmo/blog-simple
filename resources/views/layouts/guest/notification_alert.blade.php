@push('style')
	<style type="text/css">
		.alert{
			font-size: 14px;
		}
		.alert>ul{
			list-style: none;
		}
	</style>
@endpush
<div class="nav-notif">
	@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Selamat!</strong>  {{Session::get('success')}}
		</div>
	@elseif(Session::has('warning'))
		<div class="alert alert-warning alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Peringatan!</strong>  {{Session::get('warning')}}
		</div>
	@elseif(Session::has('danger'))
		<div class="alert alert-danger alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Bahaya!</strong>  {{Session::get('danger')}}
		</div>
	@elseif(Session::has('info'))
		<div class="alert alert-info alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Info!</strong>  {{Session::get('info')}}
		</div>
	@endif	
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

