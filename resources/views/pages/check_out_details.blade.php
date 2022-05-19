
@extends('index')
@section('content')
<script> 
$(function(){
    var dtToday = new Date();
    
    var day = dtToday.getDate();
    var month = dtToday.getMonth() + 1;
    var fday = day+3;
    if(fday > 31){
        day = fday - 31;
        month = dtToday.getMonth() + 2;
    } else{
        day = fday;
        month = month;
    }
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var year = dtToday.getFullYear();

    var minDate= year + '-' + month + '-' + day;
    
    $('#delivery_date').attr('min', minDate);
});
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
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

                    </style>
                    <div class="checkout-page-title page-title">
                        <div class="page-title-inner flex-row medium-flex-wrap container">
                            <div class="flex-col flex-grow medium-text-center">
                                <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                                    <a class="light" href="{{URL::to('/cart')}}" >Shopping Cart</a>
                                    <span class="divider hide-for-small">
                                    <!-- <i class="fa fa-angle-right" style="font-size:36px;color:red"></i> -->
                                        <i class="fa fa-caret-right" style="font-size:36px;color: red;"></i>
                                    </span>
                                    <a class="strong" href="{{URL::to('/check-out-details')}}" class="hide-for-small">Checkout details</a>
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
    <div class="row">
        <div class="panel panel-default col-lg-12">
            <div class="panel-body">
                <h2 class="text-center text-success"> Hello <?php echo Session::get('customer_name') ?> &nbsp;! You have to fill up "Delivery / Billing Address" for complete your valuable order.</h2>
            </div>
            <div class="col-lg-6">
                <br/>
                <br/>
                <?php
                $address = DB::table('tbl_billing')
                        ->where('customer_id', Session::get('customer_id'))
                        ->first();

//                echo '<pre>';
//                print_r($address);
//                exit();

                if ($address) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="text-center text-success"> Once You Order From Fulerhut.com By The Name Of  {{$address->billing_first_name}} {{$address->billing_last_name}}. You May Continue As It Or Update Your Delivery Address Below</h3>
                            <br/>
                            {!! Form::open(['url' => '/update-billing', 'method' => 'post', 'class' => 'form-horizontal','name' => 'check_out_details']) !!} 
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input id="name" name="customer_id" type="hidden" class="form-control input-md" value="{{$address->customer_id}}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input id="name" name="billing_id" type="hidden" class="form-control input-md" value="{{$address->billing_id}}" >
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_first_name">First Name *</label>  
                                    <div class="col-md-8">
                                        <input id="name" name="billing_first_name" type="text" placeholder="Enter Your First Name" value="{{$address->billing_first_name}}" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_last_name"> Last Name *</label>  
                                    <div class="col-md-8">
                                        <input id="name" name="billing_last_name" type="text" placeholder="Enter Your Last Name" value="{{$address->billing_last_name}}" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_company_name"> Company Name </label>  
                                    <div class="col-md-8">
                                        <input id="email" name="billing_company_name" type="text" placeholder="Enter Your Company Name" value="{{$address->billing_company_name}}" class="form-control input-md" >
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_address">Street Address *</label>   
                                    <div class="col-md-8">
                                        <input id="name" name="billing_address" type="text" placeholder="House number and Street name etc.." value="{!! $address->billing_address !!}" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" name="billing_address_optional" for="street"></label>   
                                    <div class="col-md-8">
                                        <input id="name" name="billing_address_optional" type="text" placeholder="Apartment, suite, unit etc. (optional)" value="{{$address->billing_address_optional}}" class="form-control input-md">
                                    </div>
                                </div>


                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_gender"> Gender *</label>
                                    <div class="col-md-8">
                                        <select id="blood_group" name="billing_gender" class="form-control">
                                            <option value="-1">... Select Yours ...</option>
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                            <option value="o">Others</option>
                                        </select>
                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_city">Town / City *</label>  
                                    <div class="col-md-8">
                                        <input id="city" name="billing_city" type="text" placeholder="Enter your Town / City" value="{{$address->billing_city}}" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_district">District *</label>  
                                    <div class="col-md-8">
                                        <input id="dist" name="billing_district" type="text" placeholder="Enter your District" value="{{$address->billing_district}}" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_post_code">Postcode / ZIP </label>  
                                    <div class="col-md-8">
                                        <input id="dist" name="billing_post_code" type="text" placeholder="Enter your Postcode / ZIP code" value="{{$address->billing_post_code}}" class="form-control input-md">
                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_phone_number">Phone Number *</label>  
                                    <div class="col-md-8">
                                        <input id="contact" name="billing_phone_number" type="number" placeholder="Enter your contact no." value="{{$address->billing_phone_number}}" class="form-control input-md" required="">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_email_address">Email Address *</label>  
                                    <div class="col-md-8">
                                        <input id="email" name="billing_email_address" type="email" placeholder="Enter your email id" value="{{$address->billing_email_address}}" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="delivery_date"> Delivery Date *</label>  
                                    <div class="col-md-8">
                                        <input type="date" name="delivery_date" id="delivery_date" class="form-control input-md" required="required">
                                    </div>
                                </div>                           

                                <!-- Button -->
                                <!--   <div class="form-group">
                                      <label class="col-md-4 control-label" for="signup"></label>
                                      <div class="col-md-8">
                                          <button type="submit" id="signup" name="register" class="btn btn-success btn-block">Register / Sign Up</button>
                                      </div>
                                  </div> -->
                            </fieldset>
                        </div>                        
                        <script type="text/javascript">
                            document.forms['check_out_details'].elements['billing_gender'].value = '<?php echo $address->billing_gender ?>'
                        </script> 
                    </div>
                <?php } else { ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="text-center text-success"> Your Delivery Address </h3>
                            <br/>
                            {!! Form::open(['url' => '/save-billing', 'method' => 'post', 'class' => 'form-horizontal']) !!} 
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input id="name" name="customer_id" type="hidden" class="form-control input-md" value="{{Session::get('customer_id')}}" >
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_first_name">First Name *</label>  
                                    <div class="col-md-8">
                                        <input id="name" name="billing_first_name" type="text" placeholder="Enter Your First Name" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_last_name"> Last Name *</label>  
                                    <div class="col-md-8">
                                        <input id="name" name="billing_last_name" type="text" placeholder="Enter Your Last Name" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_company_name"> Company Name </label>  
                                    <div class="col-md-8">
                                        <input id="email" name="billing_company_name" type="text" placeholder="Enter Your Company Name" class="form-control input-md" >
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_address">Street Address *</label>   
                                    <div class="col-md-8">
                                        <input id="name" name="billing_address" type="text" placeholder="House number and Street name etc.." class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" name="billing_address_optional" for="street"></label>   
                                    <div class="col-md-8">
                                        <input id="name" name="billing_address_optional" type="text" placeholder="Apartment, suite, unit etc. (optional)" class="form-control input-md">
                                    </div>
                                </div>


                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_gender"> Gender *</label>
                                    <div class="col-md-8">
                                        <select id="blood_group" name="billing_gender" class="form-control">
                                            <option value="-1">... Select Yours ...</option>
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                            <option value="o">Others</option>
                                        </select>
                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_city">Town / City *</label>  
                                    <div class="col-md-8">
                                        <input id="city" name="billing_city" type="text" placeholder="Enter your Town / City" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_district">District *</label>  
                                    <div class="col-md-8">
                                        <input id="dist" name="billing_district" type="text" placeholder="Enter your District" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_post_code">Postcode / ZIP </label>  
                                    <div class="col-md-8">
                                        <input id="dist" name="billing_post_code" type="text" placeholder="Enter your Postcode / ZIP code " class="form-control input-md">
                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_phone_number">Phone Number *</label>  
                                    <div class="col-md-8">
                                        <input id="contact" name="billing_phone_number" type="number" placeholder="Enter your contact no." class="form-control input-md" required="">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="billing_email_address">Email Address *</label>  
                                    <div class="col-md-8">
                                        <input id="email" name="billing_email_address" type="email" placeholder="Enter your email id" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="delivery_date"> Delivery Date *</label> 
                                    <div class="col-md-8">
                                        <input type="date" name="delivery_date"  id="delivery_date"  class="form-control input-md" required="required">
                                    </div>
                                </div>  

                                <!-- Button -->
                                <!--   <div class="form-group">
                                      <label class="col-md-4 control-label" for="signup"></label>
                                      <div class="col-md-8">
                                          <button type="submit" id="signup" name="register" class="btn btn-success btn-block">Register / Sign Up</button>
                                      </div>
                                  </div> -->

                            </fieldset>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-6">
                <br/>
                <br/>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center text-success"> ORDER SUMMARY </h3>
                        <hr/>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                 <?php
                                    $content = Cart::content();
                                    if($content->isEmpty()){
                                    echo "<h3 class='text-center alert-danger'>Your Shoping Cart is Empty. Please add some products to make Order Button active. </h3>";
                                    } else { ?>
                                <thead style="text-transform:uppercase; border-bottom: 2px solid #333">
                                    <tr class="cart_menu" >
                                        <td class="description"><h3>Product(s)</h3></td>
                                        <td class="quantity"></td>
                                        <td class="total"><h3>Total</h3></td>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    foreach ($content as $v_content) {
                                        ?>
                                        <tr>
                                            <td class="cart_description">
                                                <h4><a href="{{URL::to('/product-details/'.$v_content->id)}}">{{$v_content->name}} </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(qty {{$v_content->qty}})</h4>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">{{$v_content->qty * $v_content->price}}</p>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td class="cart_description">
                                            <h4>Cart Sub Total </h4>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{Cart::subtotal()}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_description">
                                            <h4> Vat (15%)  </h4>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{Cart::tax()}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_description">
                                            <h4> Shipping Cost </h4>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">Free in DMP</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_description">
                                            <h4> Grand Total </h4>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{Cart::total()}}</p>
                                        </td>
                                    </tr>
<!--                                    <tr>
                                        <td colspan="6">
                                            <div style="float: right;" class="col-sm-12">
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
                                    </tr>-->
                                <?php } ?>
                            </table>
                        </div>
                        <br/>
                        <br/>
                        <!-- <div class="col-md-12">                            
                            <button type="submit" class="btn btn-success btn-block"> ORDER </button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center text-success"> Select Payment Method </h3>
                        <hr/>
                        <div class="table-responsive cart_info">
                            <select id="payment_type" name="payment_type" class="form-control">
                                <option value="bkash">Bkash</option>
                                <option value="rocket">Rocket</option>
                                <option value="mcard">Master Card</option>
                                <option value="cod" selected="selected">Cash on delivery</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="col-md-12" style="padding: 30px; ">                            
                    <button type="submit" class="btn btn-success btn-block <?php echo ($content->isEmpty())  ? 'disabled' : 'enabled' ?>"> ORDER </button>
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection

