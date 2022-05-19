
@extends('index')
@section('content')
<section>
    <div class="container">
        <div class="row col-sm-12">
            <div class="col-sm-3">
                @section('sidebar')
                    @include('pages.sidebar')
                @show
            </div>


            <div class="col-sm-9 padding-right">
            	
				    <div class="logo-404">
				        <a href="{{URL::to('/')}}"><img src="{{asset('public/images/home/logo.png')}}" alt="Fulerhut.com - Online Full Bazar" /></a>
				    </div>
				    <div class="content-404">
				        <img src="{{asset('public/images/404/404.png')}}" width="300px" height="150px" class="img-responsive" alt="Fulerhut.com" />
				        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
				        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
				        <h2><a href="{{URL::to('/')}}">Bring me back Home</a></h2>
				    </div>
            </div>
		</div>            
	</div>
</section>	


@endsection
