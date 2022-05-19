
@extends('index')
@section('content')

<style type="text/css">
    
/* ==========================================================================
   Author's custom styles
   ========================================================================== */

body
{
    font-family: 'Open Sans', sans-serif;
}

.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
    height: fit-content;
}

@media screen and (min-width: 468px) and (max-width: 1300px){
    .fb-profile img.fb-image-lg{
        width: 100%; 
    }
}

@media screen and (min-width: 768px) and (max-width: 1300px){
    .fb-profile img.fb-image-lg{
        width: 80%; 
        margin-right: 20%;
    }
}
@media screen and (min-width: 992px) and (max-width: 1500px){
    .fb-profile img.fb-image-lg{
        width: 75%; 
        margin-right: 25%;
    }
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}

@media (max-width:768px)
{
    
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}

.fb-image-profile
{
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 20%; 
}
}
</style>

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
                    <h2 class="title text-center">Merchant Profile</h2>
                    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
                        <div class="container">

                            <div class="fb-profile">
                                @if($merchant_info->m_banner_pic)
                                <a href="{{URL::to('/'.$merchant_info->m_banner_pic)}}" target="_blank"><img align="left" class="fb-image-lg" src="{{URL::to('/'.$merchant_info->m_banner_pic)}}" alt="$merchant_info->merchant_name" /></a>
                                @else
                                <a href="{{URL::to('/public/merchant_images/banner/banner.jpg')}}" target="_blank"><img align="left" class="fb-image-lg" src="{{URL::to('/public/merchant_images/banner/banner.jpg')}}" alt=" No Banner Image "/></a>
                                @endif
                                @if($merchant_info->m_profile_pic)
                                <a href="{{URL::to('/'.$merchant_info->m_profile_pic)}}" target="_blank"><img align="left" class="fb-image-profile thumbnail"  src="{{URL::to('/'.$merchant_info->m_profile_pic)}}" alt="$merchant_info->merchant_name" /></a>
                                @else
                                <a href="{{URL::to('/public/merchant_images/profile/no-profile.jpg')}}" target="_blank"><img align="left" class="fb-image-profile thumbnail"  src="{{URL::to('/public/merchant_images/profile/no-profile.jpg')}}" alt="$merchant_info->merchant_name"/></a>
                                @endif
                                <div class="fb-profile-text">
                                    <h1>{{$merchant_info->merchant_name}}</h1>
                                    <p>{{$merchant_info->merchant_services}}</p>
                                </div>
                            </div>
                        </div> 
                        <!-- /container --> 

                </div><!--features_items-->  
                <div class="features_items"><!--features_items-->
                    <br><br>
                    <h2 class="title text-center">Product(s) By {{$merchant_info->merchant_name}}</h2>
                   
                    @if(count($product_info) == !null)
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
                    @else
                    <div class="col-sm-12">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <h2 class="text-center"> No Product(s) Yet!</h2>
                            </div>
                        </div>
                    </div> 
                    @endif
                </div><!--features_items-->      
            </div>
        </div>
    </div>
</section>
@endsection

