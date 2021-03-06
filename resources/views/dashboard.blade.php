<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ferdi Sonmezay">
    <meta name="website" content="http://www.ferdisonmezay.com">
    <meta name="github" content="http://github.com/pherdee">
    
    <title>Summernote - File Upload</title>
    
    <!-- Bootstrap, Fontawesome Core CSS -->
<link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
      <link href="/coba/css/summernote.css" rel="stylesheet">
      
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
    <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container" style="padding-top:10px;">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a href="http://www.ferdisonmezay.com" target="_blank">
          <img src="/img/logo.png" alt="ferdi sonmezay"  height="50">
        </a>
      </div>
           
            <div class="collapse navbar-collapse">
              <div class="row">
                <div class="col-md-6">
                  <p style="margin-top:10px;">Summernote Img Uploader</p>
                </div>
                <div class="col-md-5 text-right" style="margin-top:8px;">
                  <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-1">
                      <a href="http://www.ferdisonmezay.com">
                    <i class="fa fa-globe fa-lg a-social-web a-social"></i>
                </a>
                    </div>
                    
                    <div class="col-md-1">
                      <a href="https://twitter.com/fsonmezay">
                        <i class="fa fa-twitter fa-lg a-social-twitter a-social"></i>
                </a>
                    </div>
                    
                    <div class="col-md-1">
                      <a href="https://github.com/pherdee">
                   <i class="fa fa-github fa-lg a-social-github a-social"></i>
                </a>
                    </div>
                  </div>
                </div>
              </div>
      </div>
        </div>
    <!-- /.container -->
  </nav>
  <div class="container" style="margin-top:80px;">
    
    <div class="row">
      
    </div>
    <div class="row"  style="padding-top:40px;">
      <p>The original <a href="https://github.com/summernote">summernote</a> converts uploaded images to base64 format.</p>
      <p>This editor uploads images to the file system, <br>
        Just make sure that you have write access to <code>img-uploads</code> folder.
      </p>
      <textarea class="summernote"></textarea>     
      <br/>
      <button id="submitBtn" class="btn btn-success">See Output</button>
      <br>
      <br>
      <textarea rows="5" style="width:100%;" id="result"></textarea>  
        
    </div>  
  </div>
  
  <div style="background-color:#121314; color:#aaa; padding:30px 0px; margin-top:100px; font-size:10pt;">
    <div class="container text-right">
      Design & Developed with &nbsp;<i class="fa fa-heart-o fa-lg" style="color:#c02942;"></i> 
    </div>
  </div>
  <!-- jQuery -->
  <script type="text/javascript" src="{{url('/assets/jquery/dist/jquery.min.js')}}"></script>
  <script src="/coba/js/jquery.js"></script>
  
<script type="text/javascript" src="{{url('/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/summernote/summernote.js')}}"></script>
  
  <script type="text/javascript">               
  <!--
  
  $(document).ready(function() {
    
    $('.summernote').summernote({
        height: 200
    });
  });
  
  //-->
  </script>

</body></html>

