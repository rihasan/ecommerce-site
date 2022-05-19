
@extends('index')
@section('content')

<section id="slider"><!--slider-->
    <div class="container">
        <?php
        $slider_info = DB::table('tbl_product')
                ->where('is_slider', 1)
                ->get();

//            echo '<pre>';
//            print_r($slider_info);
//            exit();
        ?>
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach( $slider_info as $slider )
                <li data-target="#slider-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach( $slider_info as $slider )
                <div class="item {{ $loop->first ? ' active' : '' }}" >
                    <div class="col-sm-9">
                        <img src="{{URL::to('/'.$slider->product_image)}}" alt="{{ $slider->product_name }}" class="girl img-responsive" />
                        <!--<img src="{{asset('public/images/home/pricing.png')}}"  class="pricing" alt="" />-->
                    </div>
                    <div class="col-sm-3">
                        <h2>{{$slider->product_name}}</h2>
                        <!--<p>@if(strlen($slider->product_description) > 200) echo "readmore"; @endif </p>-->
                        
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($slider->product_description), 200) }}
                            @if (strlen(strip_tags($slider->product_description)) > 120)
                            ...<a href="{{URL::to('/product-details/'.$slider->product_id)}}" title="{{$slider->product_description}}">Read More</a>
                            @endif</p>
                        <button type="button" class="btn btn-default get"><a href="{{URL::to('/product-details/'.$slider->product_id)}}"> Get it now</a></button>
                    </div>
                </div>
                @endforeach
            </div>

            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</section><!--/slider-->

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
                    <h2 class="title text-center">Latest Items</h2>
                    
                    <div id='hideMe'>
                        <h3 style="color:#0f0; text-align: center;">
                            <?php
                            $message = Session::get('message');
                            if (isset($message)) {
                                ?>
                                <button class="btn btn-block">
                                    <h4 style="color: #B74688; text-align: center; text-transform: uppercase; font-size: normal;">
                                        <?php
                                        echo $message;
                                        Session::put('message', null);
                                    }
                                    ?>
                                </h4>
                            </button>
                        </h3>
                        <h3 style="color:#0f0; text-align: center;">
                            <?php
                            $exception = Session::get('exception');
                            if (isset($exception)) {
                                ?>
                                <button class="btn btn-block">
                                    <h4 style="color: #B74688; text-align: center; text-transform: uppercase; font-size: normal;">
                                        <?php
                                        echo $exception;
                                        Session::put('exception', null);
                                    }
                                    ?>
                                </h4>
                            </button>
                        </h3>
                    </div>
                    
                    <?php 
                    if($latest_product->isEmpty()){ ?>
                        <h2 class="text-center"> Product(s) Not Found. Possibly Empty Product</h2>
                    <?php } else { ?>

                    @foreach($latest_product as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to('/'.$product->product_image)}}" width="275px" height="183px" alt="Fulerhut Product Images - {{$product->product_name}}" />
                                    <h2>{{$product->product_name}}</h2>
                                    <h4>BDT {{$product->product_price}}</h4>
                                    <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">                                  
                                  
                                    <div class="overlay-content">
                                        <img style="overflow: hidden; width: 100%"  class="girl img-responsive" width="275px" height="163px" src="{{URL::to('/'.$product->product_image)}}" alt="Fulerhut Product Images - {{$product->product_name}}"/>
                                        <h3 style="color: #fff;">{{$product->product_name}}</h3>
                                        <h4> BDT {{$product->product_price}}</h4>
                                        <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <a href="{{URL::to('/product-details/'.$product->product_id)}}" class="btn btn-default add-to-cart">Product Details</a>

                                        <!-- <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    @endforeach
                    <div class="row col-sm-12 text-center">
                        {{ $latest_product->links() }}
                        <!--{{$latest_product->links("pagination::bootstrap-4")}}-->
                    </div>
                </div><!--features_items-->
            <?php } ?>
                <br>

                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <?php
                            $category = DB::table('tbl_category')
                                ->where('publication_status', 1)
                                ->where('is_menu', 1)
                                ->get();
                                
                            // echo "<pre>";
                            // print_r($category);
                            // exit();
                        ?>

                        <ul class="nav nav-tabs">
                            @foreach ($category as $v_cat)
                                <li class="{{ $loop->first ? 'active' : '' }}"><a href="#{{ preg_replace('/\s+/', '', $v_cat->category_name)}} " data-toggle="tab">{{$v_cat->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach ($category as $v_cat)
                            <div class="tab-pane fade {{ $loop->first ? 'active in' : '' }}" id="{{ preg_replace('/\s+/', '', $v_cat->category_name)}}" >
                            <?php
                             $product_info = DB::table('tbl_product')
                                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
                                ->where('tbl_product.publication_status', 1)
                                ->where('tbl_category.category_id', $v_cat->category_id)
                                // ->where('tbl_category.is_menu', $v_cat->is_menu)
                                ->select('tbl_product.*')
                                ->paginate(6);
                                // ->get();

                               // echo '<pre>';
                               // print_r($product_info);
                               // exit();
                            ?>
                            @foreach($product_info as $product)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::to('/'.$product->product_image)}}" width="275px" height="183px" alt="Fulerhut Product Images - {{$product->product_name}}" />
                                                <h2>{{$product->product_name}}</h2>
                                                <h4>BDT {{$product->product_price}}</h4>
                                                <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                                <a href="{{URL::to('/product-details/'.$product->product_id)}}" class="btn btn-default add-to-cart">Product Details</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        @endforeach
                    </div>
                </div><!--/category-tab-->
                <div class="text-center">
                    <!-- {{ $product_info->links() }} -->
                    {{$product_info->links("pagination::bootstrap-4")}}
                </div><br>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    <?php
                    $recommended_info = DB::table('tbl_product')
                            ->where('is_recommended', 1)
                            ->get();

//                    echo '<pre>';
//                    print_r($recommended_info);
//                    exit();
                    ?>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($recommended_info as $item)
                            <div class="item {{ $loop->first ? 'active' : '' }}">   
                                <div class="col-sm-8 hidden-xs">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img class="girl img-responsive" src="{{URL::to('/'.$item->product_image)}}" width="275px" height="283px" alt="{{ $slider->product_name}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 hidden-xs">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::to('/'.$item->product_image)}}" class="girl img-responsive hidden-xs" alt="{{ $slider->product_name}}" />
                                                <h2>{{ $item->product_name }}</h2>
                                                <h3 style="color: #D1557D">Price:- {{ $item->product_price }}</h3><br>
                                                <a href="{{URL::to('/add-to-cart/'.$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a><a href="{{URL::to('/product-details/'.$item->product_id)}}" class="btn btn-default add-to-cart">Product Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recommended overlay-content visible-xs text-center" style="background-color: #FE980F">
                                        <img style="overflow: hidden; width: 100%"  class="girl img-responsive" width="275px" height="163px" src="{{URL::to('/'.$item->product_image)}}" alt="Fulerhut Product Images - {{$item->product_name}}"/>
                                        <h2 style="color: #fff;">{{$item->product_name}}</h2>
                                        <h3> BDT {{$item->product_price}}</h3>
                                        <a href="{{URL::to('/add-to-cart/'.$item->product_id)}}" class="btn btn-default add-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <a href="{{URL::to('/product-details/'.$item->product_id)}}" class="btn btn-default add-cart">Product Details</a>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>            
                    </div>
                </div><!--/recommended_items-->
            </div>
        </div>
    </div>
</section>

@endsection
