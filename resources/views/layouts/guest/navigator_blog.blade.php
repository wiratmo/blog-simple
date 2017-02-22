<nav class="navbar navbar-default affix-top" role="navigation" id="BB-nav">
	    <div class="container-fluid">
	        <div class="container nav-container">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".BB-nav">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	            <ul id="menu-menu" class="nav navbar-nav BB-nav collapse navbar-collapse">
	            		<li class="menu-item"><a title="Itme1" href="{{url('/blog')}}">Beranda</a></li>
	            	@foreach($category as $c)
	                	<li class="menu-item"><a title="Itme1" href="{{url('/blog/category/'.$c->slug)}}">{{$c->title}}</a></li>
	                @endforeach
	            </ul>            
	            
	            <ul class="nav navbar-nav navbar-right nav-pills">
	                <li class="li-form">
	                    <!--  SEARCH -->
	                    <form role="search" id="search-nav" method="get" action="#">
	                        <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Rechercher :">

	                    <button type="reset">
	                            <span class="fa fa-close">
	                                <span class="sr-only">Close</span>
	                            </span>
	                    </button>
	                    <button type="submit" class="search-submit">
	                            <span class="fa fa-search">
	                                <span class="sr-only">Rechercher</span>
	                            </span>
	                    </button>
	                </form>               
	                </li>
	            </ul>
	        </div>
	    </div>
	</nav>