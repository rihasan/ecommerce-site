
@extends('index')
@section('content')

<section id="cart_items">
    <div class="container">
        <!--  <div class="breadcrumbs">
             <ol class="breadcrumb">
               <li><a href="{{URL::to('/')}}">Home</a></li>
               <li class="active">Shopping Cart</li>
             </ol>
         </div> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="checkout-page-title page-title">
                            <div class="page-title-inner flex-row medium-flex-wrap container">
                                <div class="flex-col flex-grow medium-text-center">
                                    <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                                        <a class="strong" href="{{URL::to('/cart')}}" >Shopping Cart</a>
                                        <?php
                                        $count = Cart::count();
                                        if ($count < 1) {
                                            ?>
                                            <span>&nbsp;
                                            <!-- <i class="fa fa-angle-right" style="font-size:36px;color:red"></i> -->
                                                <i class="fa fa-caret-right" style="font-size:36px;color: #FFA5A5;"></i>
                                            </span>
                                            &nbsp;
                                            <a class="light" href="{{URL::to('/')}}" class="hide-for-small">Continue Shopping</a>

                                            <?php
                                        } else {
                                            $customer_id = Session::get('customer_id');
                                            if ($customer_id) {
                                                ?>
                                                <span class="divider hide-for-small">
                                                <!-- <i class="fa fa-angle-right" style="font-size:36px;color:red"></i> -->
                                                    <i class="fa fa-caret-right" style="font-size:36px;color: red;"></i>
                                                </span>
                                                <a class="light" href="{{URL::to('/check-out-details')}}" class="hide-for-small">Checkout details</a>
                                            <?php } else { ?>
                                                <span class="divider hide-for-small">
                                                <!-- <i class="fa fa-angle-right" style="font-size:36px;color:red"></i> -->
                                                    <i class="fa fa-caret-right" style="font-size:36px;color: red;"></i>
                                                </span>
                                                <a class="light" href="{{URL::to('/checkout')}}" class="hide-for-small">Checkout </a>
                                            <?php } ?>
                                        <?php } ?>

                                        <span class="divider hide-for-small">
                                        <!-- <i class="fa fa-angle-right" style="font-size:36px;color:red"></i> -->
                                            <i class="fa fa-caret-right" style="font-size:36px;color: red;"></i>
                                        </span>
                                        <a href="#" class="no-click light hide-for-small">Order Complete</a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <!-- <a href="{{URL::to('/cart')}}">
                        <div class="col-md-4">
                            <button type="submit" id="signup" name="register" class="btn btn-success btn-block">SHOPPING CART</button>
                        </div></a>
                        <a href="{{URL::to('/check-out-details')}}">
                            <div class="col-md-4">
                            <button type="submit" id="signup" name="register" class="btn btn-success btn-block">CHECKOUT DETAILS</button>
                        </div></a>
                        <a href="{{URL::to('/order')}}"><div class="col-md-4">
                            <button type="submit" id="signup" name="register" class="btn btn-success btn-block">ORDER COMPLETE</button>
                        </div></a>
                        -->
                    </div>
                </div>
            </div>
        </div>

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
            <table class="table table-condensed">
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

@endsection
