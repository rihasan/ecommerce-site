
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
                <?php
                // echo "<pre>";
                // print_r($product_info);
                // exit();
                ?>
                <div class="product-details"><!--product-details-->
                    @foreach($product_info as $product)
                    <div class="col-sm-12">
                        <div class="view-product">
                            <img src="{{URL::to('/'.$product->product_image)}}" alt="Fulerhut Product Images - {{$product->product_name}}" />
                            <!-- <h3>ZOOM</h3> -->
                        </div>

                        <!-- <div id="similar-product" class="carousel slide" data-ride="carousel"> -->
                        <!-- Wrapper for slides of extra picture-->
                        <!--   <div class="carousel-inner">
                              <div class="item active">
                                <a href=""><img src="{{asset('public/images/product-details/similar1.jpg')}}" alt=""></a>
                                <a href=""><img src="{{asset('public/images/product-details/similar2.jpg')}}" alt=""></a>
                                <a href=""><img src="{{asset('public/images/product-details/similar3.jpg')}}" alt=""></a>
                              </div>
                              <div class="item">
                                <a href=""><img src="{{asset('public/images/product-details/similar1.jpg')}}" alt=""></a>
                                <a href=""><img src="{{asset('public/images/product-details/similar2.jpg')}}" alt=""></a>
                                <a href=""><img src="{{asset('public/images/product-details/similar3.jpg')}}" alt=""></a>
                              </div>
                              <div class="item">
                                <a href=""><img src="{{asset('public/images/product-details/similar1.jpg')}}" alt=""></a>
                                <a href=""><img src="{{asset('public/images/product-details/similar2.jpg')}}" alt=""></a>
                                <a href=""><img src="{{asset('public/images/product-details/similar3.jpg')}}" alt=""></a>
                              </div>
                               </div> 
                        -->
                        <!-- Controls -->
                        <!--  <a class="left item-control" href="#similar-product" data-slide="prev">
                           <i class="fa fa-angle-left"></i>
                         </a>
                         <a class="right item-control" href="#similar-product" data-slide="next">
                           <i class="fa fa-angle-right"></i>
                         </a> -->
                        <!-- </div> -->

                    </div>
                    <div class="col-sm-12">
                        </br>
                        <div class="col-sm-6 text-justify pull-left">
                            <div class="product-information">
                                <!--/product-information-->
                                <!-- <img src="{{asset('public/images/product-details/new.jpg')}}" class="newarrival" alt="" /> -->
                                <h2>{{$product->product_name}}</h2>
                                <p> BDT : {{$product->product_price}} Tk</p>
                                <!-- <img src="{{asset('public/images/product-details/rating.png')}}" alt="" /> -->
                                <span>
                                    <span>BDT {{$product->product_price}} TK</span>
                                    <!-- <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}">
                                            <button class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                    </a>  -->
                                    {!! Form::open(['url' => '/add-to-cart/'.$product->product_id, 'method' => 'post', 'class' => 'form-horizontal']) !!}  
                                    <label>Quantity:</label>
                                    <input type="number" name="product_quantity" value="1" />
                                    <input type="hidden" name="product_id" value="{{$product->product_id}}" />
                                    <button type="submit" name="btn" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                    {!! Form::close() !!}
                                </span>
                                <p><b>Availability:</b> Available In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> Fulerhut </p>
                                <!-- <a href=""><img src="{{asset('public/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a> -->
                            </div><!--/product-information-->
                        </div>
                        <div class="col-sm-6 text-justify pull-right">
                            <div class="product-information">
                                <h2>অর্ডার করতে সমস্যা হলে ফোন অথবা ইমেইল এ অর্ডার করতে পারেন:-</h2>
                                <h3><i class="fa fa-phone-square"></i> Hot-line:  </h3>
                                <h4 style="padding-left:50px">01842 17 22 11   </br> 01712 79 79 35  </br>   01998 333 822   </br>  01977 17 22 11 </h4>
                                <h4><i class="fa fa-envelope"></i>Email: <a href="mailto:info@fulerhut.com"> <strong>info@fulerhut.com</strong></a></h4> 
                                <h4><i class="fa fa-envelope"></i>Email: <a href="mailto:fulerhut@gmail.com"> <strong>fulerhut@gmail.com</strong></a></h4> 
                            </div>
                        </div>
                    </div>

                </div><!--/product-details-->


                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> -->
                            <!-- <li><a href="#tag" data-toggle="tab">Tag</a></li> -->
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <!-- Original template -->
                            <div class="col-sm-4">
                                <div class="product-image-wrapper" style="height: 290px">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('/'.$product->product_image)}}" width="300px" height="183px" alt="Fulerhut Product Images" />
                                            <h2>BDT: {{$product->product_price}} tk</h2>
                                            <a href="{{URL::to('/add-to-cart/'.$product->product_id)}}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Present Content Start-->
                            <h2>Details of - {{$product->product_name}}</h2>
                            <p>{{$product->product_description}}</p>
                            <!-- Present Content End-->

                        </div>

                        <div class="tab-pane fade" id="companyprofile" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery1.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery3.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery2.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery4.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tag" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery1.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery2.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery3.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/gallery4.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a><i class="fa fa-user"></i>Fulerhut.com - Online Flower Market</a></li>
                                    <li><a><i class="fa fa-clock-o"></i><?php echo date("h : i a"); ?></a></li>
                                    <li><a><i class="fa fa-calendar-o"></i><?php echo date(" l,  d - F -Y"); ?></a></li>
                                </ul>
                                <h4 class="alert alert-success">Your review will help us to serve you better. For getting better service please write your review.</h4>
                                <h3>Write Your Review</h3>

                                <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
                                <style>
                                    .checked {
                                        color: orange;
                                    }
                                </style>
                                {!! Form::open(['url' => '/product-review', 'method' => 'post', 'name' => 'myform', 'class' => 'form-horizontal',]) !!}  

                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                <span>
                                    <input type="text" name="review_name" placeholder="Your Name (Required *)" required="required" />
                                    <input type="email" name="review_email" placeholder="Email Address (Required *)" required="required" />
                                </span>
                                <textarea name="review_message" placeholder="Write your reveiw text here...... (Required *)" required="required" ></textarea>

                                <!-- Review Starts -->
                                <label><h3>Star Rating &nbsp;&nbsp;&nbsp;&nbsp;</h3></label>
                                <i class="fa fa-star" id="star1" title="Bad!" onclick="add(this, 1)"></i>&nbsp;
                                <i class="fa fa-star" id="star2" title="Not Bad!" onclick="add(this, 2)"></i>&nbsp;
                                <i class="fa fa-star" id="star3" title="Good!" onclick="add(this, 3)"></i>&nbsp;
                                <i class="fa fa-star" id="star4" title="Very Good!" onclick="add(this, 4)"></i>&nbsp;
                                <i class="fa fa-star" id="star5" title="Perfect!" onclick="add(this, 5)"></i>&nbsp;

                                <script>
                                    function add(ths, star) {

                                        for (var i = 1; i <= 5; i++) {
                                            var cur = document.getElementById("star" + i)
                                            cur.className = "fa fa-star"
                                        }

                                        for (var i = 1; i <= star; i++) {
                                            var cur = document.getElementById("star" + i)
                                            if (cur.className == "fa fa-star")
                                            {
                                                cur.className = "fa fa-star checked"
                                            }
                                        }
                                        // document.write("You Review"+" "+star+" "+"Star");
                                        // alert(cur);
                                        document.myform.review_rating.value = star;
                                    }
                                </script>
                                <input type="hidden" name="review_rating" value="" required="required" >
                            </div>
                            <!-- Review Ends -->
                            <button type="button" class="btn btn-default pull-right" ><input type="submit" name="btn" value="Submit"></button>
                            {!! Form::close() !!}
                        </div>

                        <!-- Extra Review Starts -->
                            <!-- <style type="text/css">
                                .rating {
                                    float:left;
                                }

                                /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
                                   follow these rules. Every browser that supports :checked also supports :not(), so
                                   it doesn’t make the test unnecessarily selective */
                                .rating:not(:checked) > input {
                                    position:absolute;
                                    top:-9999px;
                                    clip:rect(0,0,0,0);
                                }

                                .rating:not(:checked) > label {
                                    float:right;
                                    width:1em;
                                    padding:0 .1em;
                                    overflow:hidden;
                                    white-space:nowrap;
                                    cursor:pointer;
                                    font-size:200%;
                                    line-height:1.2;
                                    color:#ddd;
                                    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
                                }

                                .rating:not(:checked) > label:before {
                                    content: '★ ';
                                }

                                .rating > input:checked ~ label {
                                    color: #f70;
                                    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
                                }

                                .rating:not(:checked) > label:hover,
                                .rating:not(:checked) > label:hover ~ label {
                                    color: gold;
                                    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
                                }

                                .rating > input:checked + label:hover,
                                .rating > input:checked + label:hover ~ label,
                                .rating > input:checked ~ label:hover,
                                .rating > input:checked ~ label:hover ~ label,
                                .rating > label:hover ~ input:checked ~ label {
                                    color: #ea0;
                                    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
                                }

                                .rating > label:active {
                                    position:relative;
                                    top:2px;
                                    left:2px;
                                }

                                /* end of Lea's code */

                                /*
                                 * Clearfix from html5 boilerplate
                                 */

                                .clearfix:before,
                                .clearfix:after {
                                    content: " "; /* 1 */
                                    display: table; /* 2 */
                                }

                                .clearfix:after {
                                    clear: both;
                                }

                                /*
                                 * For IE 6/7 only
                                 * Include this rule to trigger hasLayout and contain floats.
                                 */

                                .clearfix {
                                    *zoom: 1;
                                }

                                /* my stuff */
                                #status, button {
                                    margin: 20px 0;
                                }
                            </style>
                            <form id="ratingForm">
                                <fieldset class="rating">
                                    <legend>Please rate now:</legend>
                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Perfect!">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty Good">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Good">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Not bad">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1 star</label>
                                </fieldset>
                                <div class="clearfix"></div>
                                <button class="submit clearfix">Submit</button>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                    $("form#ratingForm").submit(function(e) 
                                    {
                                        e.preventDefault(); // prevent the default click action from being performed
                                        if ($("#ratingForm :radio:checked").length == 0) {
                                            $('#status').html("nothing checked");
                                            return false;
                                        } else {
                                            $('#status').html( 'You picked ' + $('input:radio[name=rating]:checked').val() );
                                        }
                                    });
                                });
                                </script>
                            </form> -->
                        <!-- Extra Review Ends -->

                    </div>

                </div>
                @endforeach
            </div><!--/category-tab-->


            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>

                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">   
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/recommend1.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/recommend2.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/recommend3.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">  
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/recommend1.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/recommend2.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/images/home/recommend3.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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