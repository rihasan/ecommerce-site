
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Online Flower Shop BD, Fulerhut, Flower Shop, Florist, Flower Shop Online in Dhaka, Flower Delivery / Flower Shops in Dhaka, ">
        <meta name="author" content="">
        <title> Fulerhut.com </title>
        <!-- <link href="{{asset('public/css/app.css')}}" rel="stylesheet"> -->
        <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/price-range.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/responsive.css')}}" rel="stylesheet">

        <!-- For Modal Login -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- For Modal Login -->

        <!-- For Modal Login -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- For Modal Login -->
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        {{-- This portion is for json_encode CSRF Token--}}
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <!--[if lt IE 9]>
        <script src="{{asset('public/js/html5shiv.js')}}"></script>
        <script src="{{asset('public/js/respond.min.js')}}"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="{{asset('public/images/ico/favicon.ico')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/images/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('public/images/ico/apple-touch-icon-57-precomposed.png')}}">


        {{-- style for auto hide notification bar --}}
        <style type="text/css">
            .no-click {
                pointer-events:none;
            }
            .breadcrumbs {
                color:#222222;
                font-weight:bold;
                letter-spacing:0;
                text-transform:uppercase;
            }
            .breadcrumbs .divider {
                font-weight:300;
                margin:0 0.3em;
                opacity:0.35;
                position:relative;
                top:1.5px;
            }

            *, ::before, ::after {
                box-sizing:border-box;
            }

            .text-center {
                text-align:center;
            }
            .heading-font {
                font-family:Lato, sans-serif;
            }
            .checkout-breadcrumbs a {
                color:#B74688;
            }
            .hide-for-smal{
                display: none;
            }
            /* i.icon-angle-right{
                 margin-right:0;margin-left:10px;
             }*/
            .strong {
                font-weight:bold;
            }
            .light {
                font-weight: normal;
                font-size: .90em

            }
            @media only screen and (max-width: 600px) {
                .hide-for-small{
                    display: none;
                }
            }

            /*Tis is for hiding notification message bar*/

            #hideMe {
                -moz-animation: cssAnimation 0s ease-in 5s forwards;
                /* Firefox */
                -webkit-animation: cssAnimation 0s ease-in 5s forwards;
                /* Safari and Chrome */
                -o-animation: cssAnimation 0s ease-in 5s forwards;
                /* Opera */
                animation: cssAnimation 0s ease-in 5s forwards;
                -webkit-animation-fill-mode: forwards;
                animation-fill-mode: forwards;
            }
            @keyframes cssAnimation {
                to {
                    width:0;
                    height:0;
                    overflow:hidden;
                }
            }
            @-webkit-keyframes cssAnimation {
                to {
                    width:0;
                    height:0;
                    visibility:hidden;
                }
            }

        </style>
    </head><!--/head-->

    <body>

        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row container-fluid">
                        <div class="col-sm-9">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> Hot-line: <strong>01842 17 22 11</strong> &nbsp; <strong>01712 79 79 35</strong> &nbsp; <strong>01998 333 822 &nbsp; </strong> <strong>01977 17 22 11</strong> </a></li>
                                    <li><a href="mailto:info@fulerhut.com"><i class="fa fa-envelope"></i> <strong>info@fulerhut.com</strong></a></li>
                                    <li><a href="mailto:fulerhut@gmail.com"><i class="fa fa-envelope"></i> <strong>fulerhut@gmail.com</strong></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="https://www.facebook.com/fulerhut/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.facebook.com/fulerhut/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/fulerhut/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://www.facebook.com/fulerhut/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="https://www.facebook.com/fulerhut/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                <!-- Cart & Login button for small screen device -->
                <div class="text-center visible-xs">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            $customer_id = Session::get('customer_id');
                            $customer_name = Session::get('customer_name');
                            ?>
                            <!-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> -->
                            <?php
                            $customer_id = Session::get('customer_id');
                            if ($customer_id) {
                                ?>
                                <li><button type="button" class="btn btn-default dropdown-toggle usa"><a href="{{URL::to('/billing')}}">Billing</a></button></li>
                            <?php } else { ?>
                                <li><button type="button" class="btn btn-default dropdown-toggle usa"><a href="{{URL::to('/checkout')}}"><i class="fa fa-play-circle-o"></i> Checkout</a></button></li>
                            <?php } ?>

                            <li>
                                <button data-toggle="modal" data-target="#myModalCartforsm" class="btn btn-default dropdown-toggle usa"><i class="fa fa-shopping-cart"></i> {{Cart::content()->count()}} Cart</button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalCartforsm" role="dialog">
                                    <div class="modal-dialog modal-sm">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title text-center">WWW.FULERHUT.COM</h4>
                                            </div>
                                            <div class="modal-body">
                                                <section id="cart_items">
                                                    <div class="container col-sm-12">
                                                        <!-- <div class="breadcrumbs">
                                                            <ol class="breadcrumb">
                                                              <li><a href="{{URL::to('/')}}">Home</a></li>
                                                              <li class="active">Shopping Cart</li>
                                                            </ol>
                                                        </div> -->
                                                        <!-- this fragment is for Notification -->
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

                                                        <div class="table-responsive">
                                                            <table class="table table-responsive table-condensed">
                                                                <thead>
                                                                    <tr class="cart_menu">
                                                                        <td class="image hidden-xs">Item</td>
                                                                        <td class="description">Product Name</td>
                                                                        <td class="quantity">Quantity</td>
                                                                        <td class="price">Price</td>
                                                                        <td class="total">Total</td>
                                                                        <td></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $content = Cart::content();

                                                                    $count = Cart::count();

                                                                    // echo "<pre>";
                                                                    // print_r($count);
                                                                    // exit();
                                                                    if ($count < 1) {
                                                                        ?>

                                                                        <tr>                                
                                                                            <td colspan="6">
                                                                                <div class="">
                                                                                    <a href="{{URL::to('/')}}"><h5 style="color: red; text-align: center;"> Cart is Empty! Please Add some product(s) for continue shopping!</h5></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                    }

                                                                    foreach ($content as $v_content) {
                                                                        ?>
                                                                        <tr>                                
                                                                            <td class="cart_product hidden-xs">
                                                                                <a href=""><img src="{{$v_content->options['image']}}" width="100px" height="70px" alt=""></a>
                                                                            </td>
                                                                            <td class="cart_description">
                                                                                <h4><a href="">{{$v_content->name}}</a></h4>
                                                                                <p style="color: red">Web ID: {{$v_content->id}}</p>
                                                                            </td>
                                                                            <td class="cart_quantity">
                                                                                <div class="cart_quantity_button">
                                                                                    {!! Form::open(['url' => '/update-cart-item', 'method' => 'post', 'class' => 'form-horizontal']) !!}  
                                                                                    <!-- <a class="cart_quantity_down" href=""> - </a> -->
                                                                                    <input style="width: 50px" class="cart_quantity_input" type="number" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                                                                    <input type="hidden" name="rowId" value="{{$v_content->rowId}}">
                                                                                    <input type="submit" name="btn" value="Update">
                                                                                    <!-- <a class="cart_quantity_up" href=""> + </a> -->
                                                                                    {!! Form::close() !!}
                                                                                </div>
                                                                            </td>
                                                                            <td class="cart_price">
                                                                                <p>{{$v_content->price}}</p>
                                                                            </td>
                                                                            <td class="cart_total">
                                                                                <p class="cart_total_price">{{$v_content->qty * $v_content->price}}</p>
                                                                            </td>
                                                                            <td class="cart_delete">
                                                                                <a class="cart_quantity_delete" href="{{URL::to('/delete-from-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td colspan="6">
                                                                            <div style="float: right;" class="col-sm-6">
                                                                                <div class="total_area">
                                                                                    <ul>
                                                                                        <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                                                                                        <li>Vat (15%) <span>{{Cart::tax()}}</span></li>
                                                                                        <li>Shipping Cost <span>Free</span></li>
                                                                                        <li>Total <span>{{Cart::total()}}</span></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6" class="col-sm-12">
                                                                            <div style="float: left;">
                                                                                <a class="btn btn-default check_out" href="{{URL::to('/')}}"> Continue Shopping </a>
                                                                            </div>
                                                                            <div style="float: right;">
                                                                                <?php
                                                                                $count = Cart::count();
                                                                                if ($count < 1) {
                                                                                    ?>

                                                                                    <div style="float: right;">
                                                                                        <a class="btn btn-default check_out" href="{{URL::to('/')}}"> Continue Shopping </a>
                                                                                    </div>

                                                                                    <?php
                                                                                } else {

                                                                                    $customer_id = Session::get('customer_id');
                                                                                    if ($customer_id) {
                                                                                        ?>
                                                                                        <a class="btn btn-default check_out" href="{{URL::to('/check-out-details')}}">Check Out Details</a>
                                                                                    <?php } else { ?>
                                                                                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!--/#cart_items-->
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>


                            <?php
                            $customer_id = Session::get('customer_id');
                            if ($customer_id) {
                                ?>
                                <li>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                            <?php echo $customer_name; ?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{URL::to('/customer-order')}}"><i class=""></i> Your Order(s)</a></li>
                                            <li><a href="{{URL::to('/change-customer-password')}}"><i class=""></i> Change Password </a></li>
                                            <li><a href="{{URL::to('/customer-logout-panel')}}"><i class=""></i> Logout </a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <!-- <a href="{{URL::to('/customer-login-panel')}}"> -->
                                <li>
                                    <button type="button" data-toggle="modal" data-target="#myModalloginforsm" class="btn btn-default dropdown-toggle usa"><i class="fa fa-lock"></i> Login</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModalloginforsm" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-center">WWW.FULERHUT.COM</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <section id="form"><!--form-->
                                                        <div class="container col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="login-form"><!--login form-->
                                                                        <h2 class="text-center">Login to your account</h2>
                                                                        {!! Form::open(['url' => '/customer-login-check', 'method' => 'post', 'class' => 'form-horizontal']) !!} 
                                                                        <input type="email" name="customer_email_address" placeholder="Email Email Address" required="required" />
                                                                        <input type="password" name="customer_password" placeholder="Enater your password" required="required" />
                                                                        <!-- <span>
                                                                            <input type="checkbox" class="checkbox"> 
                                                                            Keep me signed in
                                                                        </span> -->
                                                                        <button type="submit" class="btn btn-success btn-block">Login</button>
                                                                        {!! Form::close() !!}
                                                                    </div><!--/login form-->
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="signup-form"><!--sign up form-->
                                                                <hr>
                                                                    <h1 class="text-center"> Or New User! </h1>
                                                                <hr>
                                                                    <a href="{{URL::to('/customer-register-panel')}}"><button type="submit" id="signup" name="register" class="btn btn-success btn-block">Register / Sign Up</button></a>

                                                                </div><!--/sign up form-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section><!--/form-->
                                                <div class="modal-footer text-center">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!-- </a> -->
                        <?php } ?>
                    </ul>
                </div>
                <!-- Cart & Login button for small screen device -->
             
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row hidden-xs">
                        <div class="col-sm-4">
                            <div class="contactinfo">
                                <div class="logo pull-left hidden-xs">
                                    <a href="{{URL::to('/')}}"><img src="{{asset('public/images/home/logo/fulerhut-logo.png')}}" width="180px" height="60px" alt=" Fulerhut Logo " /></a>
                                </div>
                            </div>

                            <!-- <div class="btn-group pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        USA
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canada</a></li>
                                        <li><a href="#">UK</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        DOLLAR
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canadian Dollar</a></li>
                                        <li><a href="#">Pound</a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>

                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    $customer_name = Session::get('customer_name');
                                    ?>
                                    <!-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> -->
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id) {
                                    ?>
                                        <li><button type="button" class="btn btn-default dropdown-toggle add-to-cart"><a href="{{URL::to('/billing')}}">Billing</a></button></li>
                                    <?php } else { ?>
                                        <li><button type="button" class="btn btn-default dropdown-toggle add-to-cart"><a href="{{URL::to('/checkout')}}"><i class="fa fa-play-circle-o"></i> Checkout</a></button></li>
                                    <?php } ?>

                                    <li>
                                        <button data-toggle="modal" data-target="#myModalCart" class="btn btn-default dropdown-toggle add-to-cart"><i class="fa fa-shopping-cart"></i> {{Cart::content()->count()}} Cart</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModalCart" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title text-center">WWW.FULERHUT.COM</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section id="cart_items">
                                                            <div class="container col-sm-12">
                                                                <!-- <div class="breadcrumbs">
                                                                    <ol class="breadcrumb">
                                                                      <li><a href="{{URL::to('/')}}">Home</a></li>
                                                                      <li class="active">Shopping Cart</li>
                                                                    </ol>
                                                                </div> -->
                                                                <!-- this fragment is for Notification -->
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

                                                                <div class="table-responsive cart_info">
                                                                    <table class="table table-responsive table-condensed">
                                                                        <thead>
                                                                            <tr class="cart_menu">
                                                                                <td class="image">Item</td>
                                                                                <td class="description">Product Name</td>
                                                                                <td class="quantity">Quantity</td>
                                                                                <td class="price">Price</td>
                                                                                <td class="total">Total</td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                            $content = Cart::content();

                                                                            $count = Cart::count();

                                                                            // echo "<pre>";
                                                                            // print_r($count);
                                                                            // exit();
                                                                            if ($count < 1) {
                                                                                ?>

                                                                                <tr>                                
                                                                                    <td colspan="6">
                                                                                        <div class="">
                                                                                            <a href="{{URL::to('/')}}"><h2 style="color: red; text-align: center;"> Cart is Empty! Please Add some product(s) for continue shopping!</h2></a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <?php
                                                                            }

                                                                            foreach ($content as $v_content) {
                                                                                ?>
                                                                                <tr>                                
                                                                                    <td class="cart_product">
                                                                                        <a href=""><img src="{{$v_content->options['image']}}" width="100px" height="70px" alt=""></a>
                                                                                    </td>
                                                                                    <td class="cart_description">
                                                                                        <h4><a href="">{{$v_content->name}}</a></h4>
                                                                                        <p style="color: red">Web ID: {{$v_content->id}}</p>
                                                                                    </td>
                                                                                    <td class="cart_quantity">
                                                                                        <div class="cart_quantity_button">
                                                                                            {!! Form::open(['url' => '/update-cart-item', 'method' => 'post', 'class' => 'form-horizontal']) !!}  
                                                                                            <!-- <a class="cart_quantity_down" href=""> - </a> -->
                                                                                            <input style="width: 50px" class="cart_quantity_input" type="number" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                                                                            <input type="hidden" name="rowId" value="{{$v_content->rowId}}">
                                                                                            <input type="submit" name="btn" value="Update">
                                                                                            <!-- <a class="cart_quantity_up" href=""> + </a> -->
                                                                                            {!! Form::close() !!}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="cart_price">
                                                                                        <p>{{$v_content->price}}</p>
                                                                                    </td>
                                                                                    <td class="cart_total">
                                                                                        <p class="cart_total_price">{{$v_content->qty * $v_content->price}}</p>
                                                                                    </td>
                                                                                    <td class="cart_delete">
                                                                                        <a class="cart_quantity_delete" href="{{URL::to('/delete-from-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            <tr>
                                                                                <td colspan="6">
                                                                                    <div style="float: right;" class="col-sm-6">
                                                                                        <div class="total_area">
                                                                                            <ul>
                                                                                                <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                                                                                                <li>Vat (15%) <span>{{Cart::tax()}}</span></li>
                                                                                                <li>Shipping Cost <span>Free</span></li>
                                                                                                <li>Total <span>{{Cart::total()}}</span></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="6" class="col-sm-12">
                                                                                    <div style="float: left;">
                                                                                        <a class="btn btn-default check_out" href="{{URL::to('/')}}"> Continue Shopping </a>
                                                                                    </div>
                                                                                    <div style="float: right;">
                                                                                        <?php
                                                                                        $count = Cart::count();
                                                                                        if ($count < 1) {
                                                                                            ?>

                                                                                            <div style="float: right;">
                                                                                                <a class="btn btn-default check_out" href="{{URL::to('/')}}"> Continue Shopping </a>
                                                                                            </div>

                                                                                            <?php
                                                                                        } else {

                                                                                            $customer_id = Session::get('customer_id');
                                                                                            if ($customer_id) {
                                                                                                ?>
                                                                                                <a class="btn btn-default check_out" href="{{URL::to('/check-out-details')}}">Check Out Details</a>
                                                                                            <?php } else { ?>
                                                                                                <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <!--/#cart_items-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>


                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id) {
                                        ?>
                                        <li>
                                            <div class="btn-group pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle add-to-cart" data-toggle="dropdown">
                                                        <?php echo $customer_name; ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{URL::to('/customer-order')}}"><i class=""></i> Your Order(s)</a></li>
                                                        <li><a href="{{URL::to('/change-customer-password')}}"><i class=""></i> Change Password </a></li>
                                                        <li><a href="{{URL::to('/customer-logout-panel')}}"><i class=""></i> Logout </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } else { ?>
                                        <!-- <a href="{{URL::to('/customer-login-panel')}}"> -->
                                        <li>
                                            <button type="button" data-toggle="modal" data-target="#myModallogin" class="btn btn-default dropdown-toggle add-to-cart"><i class="fa fa-lock"></i> Login</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModallogin" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title text-center">WWW.FULERHUT.COM</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <section id="form"><!--form-->
                                                                <div class="container col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="login-form"><!--login form-->
                                                                                <h2 class="text-center">Login to your account</h2>
                                                                                {!! Form::open(['url' => '/customer-login-check', 'method' => 'post', 'class' => 'form-horizontal']) !!} 
                                                                                <input type="email" name="customer_email_address" placeholder="Email Email Address" required="required" />
                                                                                <input type="password" name="customer_password" placeholder="Enater your password" required="required" />
                                                                                <!-- <span>
                                                                                    <input type="checkbox" class="checkbox"> 
                                                                                    Keep me signed in
                                                                                </span> -->
                                                                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                                                                {!! Form::close() !!}
                                                                            </div><!--/login form-->
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <h2 class="or text-center">OR</h2>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="signup-form"><!--sign up form-->
                                                                                <h2 class="text-center"> New User! </h2>
                                                                                <a href="{{URL::to('/customer-register-panel')}}"><button type="submit" id="signup" name="register" class="btn btn-success btn-block">Register / Sign Up</button></a>

                                                                            </div><!--/sign up form-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section><!--/form-->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <!-- </a> -->
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <div class="logo pull-left visible-xs">
                                    <a href="{{URL::to('/')}}"><img src="{{asset('public/images/home/logo/fulerhut-logo.png')}}" style="float:left; width: 85%; height:60px; margin-bottom: -55px" alt=" Fulerhut Logo " /></a>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a class="@if(Request::is('/')) active @endif" href="{{URL::to('/')}}" href="{{URL::to('/')}}"><b class="fa fa-home"> Home </b></a></li>
                                    <?php
                                    $category = DB::table('tbl_category')
                                            ->where('publication_status', 1)
                                            ->limit(19)
                                            ->get();

                                    $subcategory = DB::table('tbl_sub_category')
                                            ->where('publication_status', 1)
                                            ->get();
                                    ?>

                                    @foreach ($category as $cat)
                                    <li class="dropdown">
                                        <a class="@if(Request::is('flowers-category/'.$id = $cat->category_name)) active @endif @foreach($subcategory as $sub)
                                            @if ($sub->category_id === $cat->category_id)@if(Request::is('flowers-sub-category/'.$id = $sub->sub_category_name)) active @endif @endif
                                            @endforeach" href="{{URL::to('/flowers-category/'.$id = $cat->category_name)}}"><?php echo $cat->category_name; ?> 
                                            <i class="@foreach($subcategory as $sub) @if($sub->category_id === $cat->category_id) fa fa-angle-down @endif @endforeach"></i> 
                                        </a>
                                        <ul role="menu" class="sub-menu">
                                            @foreach($subcategory as $sub)
                                            @if ($sub->category_id === $cat->category_id)
                                            <li><a class="@if(Request::is('flowers-sub-category/'.$id = $sub->sub_category_name)) active @endif" href="{{URL::to('/flowers-sub-category/'.$id = $sub->sub_category_name)}}"><?php echo $sub->sub_category_name; ?></a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach 
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <!-- Content will be here -->

        @yield('content')


        <footer id="footer"><!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <a href='{{url::to("/")}}'><h2><span>fulerhut.com</span></h2></a>
                                <p>Online Flower Shop - We Supply all shorts of flowers or flower products packages at current market price with free delivery.</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{asset('public/images/home/iframe1.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{asset('public/images/home/iframe2.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{asset('public/images/home/iframe3.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{asset('public/images/home/iframe4.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="{{asset('public/images/home/map.png')}}" alt="" />
                                <p>Kazi Nazrul Islam Ave, Dhaka, Bangladesh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-widget">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/')}}">Online Help</a></li>
                                    <li><a href="{{URL::to('/contact-us')}}">Contact Us</a></li>
                                    <li><a href="{{URL::to('/')}}">Order Status</a></li>
                                    <li><a href="{{URL::to('/')}}">Change Location</a></li>
                                    <li><a href="{{URL::to('/faq')}}">FAQ’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quock Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/')}}">T-Shirt</a></li>
                                    <li><a href="{{URL::to('/')}}">Mens</a></li>
                                    <li><a href="{{URL::to('/')}}">Womens</a></li>
                                    <li><a href="{{URL::to('/')}}">Gift Cards</a></li>
                                    <li><a href="{{URL::to('/')}}">Shoes</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/terms-conditions')}}">Terms & Condition</a></li>
                                    <li><a href="{{URL::to('/terms-conditions')}}">Privecy Policy</a></li>
                                    <li><a href="{{URL::to('/')}}">Refund Policy</a></li>
                                    <li><a href="{{URL::to('/')}}">Billing System</a></li>
                                    <li><a href="{{URL::to('/')}}">Ticket System</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/')}}">Company Information</a></li>
                                    <li><a href="{{URL::to('/')}}">Careers</a></li>
                                    <li><a href="{{URL::to('/contact-us')}}">Store Location</a></li>
                                    <li><a href="{{URL::to('/')}}">Affillate Program</a></li>
                                    <li><a href="{{URL::to('/')}}">Copyright</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row hidden-xs">
                        <p class="pull-left">Copyright © <?php echo date('Y'); ?> Fulerhut.com. All rights reserved.</p>
                        <p class="pull-right">Developed & Designe Customized by <span><a target="_blank" href="http://rihasan.comuv.com/cv/A.%20H.%20M%20RIAZUL%20ISLAM_CV.pdf">rihasan</a></span></p>
                    </div>
                    <div class="row visible-xs">
                        <p class="text-center">Copyright © <?php echo date('Y'); ?> Fulerhut.com. All rights reserved.</p>
                        <p class="text-center">Developed & Designe Customized by <span><a target="_blank" href="http://rihasan.comuv.com/cv/A.%20H.%20M%20RIAZUL%20ISLAM_CV.pdf">rihasan</a></span></p>
                    </div>
                </div>
            </div>

        </footer><!--/Footer-->

        <script src="{{asset('public/js/jquery.js')}}"></script>
        <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('public/js/price-range.js')}}"></script>
        <script src="{{asset('public/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('public/js/main.js')}}"></script>

    </body>
</html>