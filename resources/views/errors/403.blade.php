@extends('layouts.guest.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('assets/errors/custom.css')}}">
@endpush
@section('body')
	<div class="nav-md container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">403</h1>
              <h2>Access denied</h2>
              <p>Full authentication is required to access this resource. <a href="#">Report this?</a>
              </p>
              <div class="mid_center">
                <h3>Search</h3>
                <form>
                  <div class="col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
@endsection
@push('script')
<script type="text/javascript" src="{{url('assets/fastclick/lib/fastclick.js')}}"></script>
<script type="text/javascript" src="{{url('assets/nprogress/nprogress.js')}}"></script>
<script type="text/javascript" src="{{url('assets/errors/custom.js')}}"></script>
@endpush