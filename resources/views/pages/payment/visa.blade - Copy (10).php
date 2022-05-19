
@extends('index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<h1>Pay now with visa</h1>
                </div>
                <div class="panel-footer">
                	<a href="{{URL::to('/payment-method')}}"><h3 class="text-center">Go Back</h3></a>
                </div>
            </div>
        </div>        
    </div>        
</div>        

@endsection