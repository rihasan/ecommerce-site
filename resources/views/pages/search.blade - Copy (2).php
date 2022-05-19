
@extends('index')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @section('sidebar')
                    @include('pages.sidebar')
                @show
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Search Result(s)</h2>
                    <h5 class="text-center">Your Search Price Range is: <b style="color: red">৳ {{$min}}</b> &nbsp;&nbsp; to &nbsp; <b style="color: red">৳ {{$max}}</b></h5>
                    @foreach($search_result as $result)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <img src="{{URL::to('/'.$result->product_image)}}" width="275px" height="183px" class="girl img-responsive" alt="Fulerhut Product Images - {{$result->product_name}}" />
                                        <h3 class="text-center" style="color: #f00;">{{$result->product_name}}</h3>
                                        <h4 class="text-center"> ৳ {{$result->product_price}}</h4>
                                        <a href="{{URL::to('/add-to-cart/'.$result->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>&nbsp<a href="{{URL::to('/product-details/'.$result->product_id)}}" class="btn btn-default add-to-cart">Product Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div><!--features_items-->        
            </div>
        </div>
    </div>
</section>

@endsection

