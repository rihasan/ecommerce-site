
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

                    <h2 class="title text-center">{{$id}}</h2>
                    @foreach($product_info as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to('/'.$product->product_image)}}" width="275px" height="183px" alt="Fulerhut Product Images - {{$product->product_name}}" />
                                    <h2>{{$product->product_name}}</h2>
                                    <h3> BDT {{$product->product_price}}</h3>
                                    <p></p>
                                    <a href="{{URL::to('/add-to-cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <img src="{{URL::to('/'.$product->product_image)}}" width="80%" height="auto" alt="Fulerhut Product Images - {{$product->product_name}}"/>
                                        <h2>{{$product->product_name}}</h2>
                                        <h3> BDT {{$product->product_price}}</h3>
                                        <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <br/>
                                        OR
                                        <br/>
                                        <br/>
                                        <a href="{{URL::to('/product-details/'.$product->product_id)}}" class="btn btn-default add-to-cart">Product Details</a>
                                    </div>
                                </div>
                            </div>
                            <!--  <div class="choose">
                                 <ul class="nav nav-pills nav-justified">
                                     <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                     <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                 </ul>
                             </div> -->
                        </div>
                    </div>
                    @endforeach
                    <!--   <ul class="pagination">
                          <li class="active"><a href="">1</a></li>
                          <li><a href="">2</a></li>
                          <li><a href="">3</a></li>
                          <li><a href="">&raquo;</a></li>
                      </ul> -->
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection
