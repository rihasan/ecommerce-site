
@extends('index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="img-responsive">
                        <div class="pull-left" style="width: 35%"><img src="{{asset('public/images/cart/bag.png')}}" width="150px" height="150px"></div>
                        <div class="pull-right" style="width: 65%">
                            <?php
                            $order_id = Session::get('order_id');
                            // echo $order_id;
                            $order_info = DB::table('tbl_order')->where('order_id', $order_id)->first();
                            $payment_id = $order_info->payment_id;
                            $payment_info = DB::table('tbl_payment')->where('payment_id', $payment_id)->first();
                            // print_r($order_info);
                            // print_r($payment_info);
                            ?>
                            <h2> Order Number: <span style="color: red">{{$order_info->order_number}}</span> </h2>
                            <h4>Your order has been received. You want to pay by <span style="color: green">{{$payment_info->payment_name}}. </span>Please pay 50% advance to make sure your order as active order & rest with <span style="color: green">cash on delivery.</span>
                            </h4>
                            <h5>Thanks for your Order. Check your email to see your order details.</h5>
                            <em class="alert-danger">Please check <a href="{{URL::to('/terms-conditions')}}" target="_blank"> TERMS & CONDITIONS </a></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!--  <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Pay 50% Advance to Make Your Order as Active Order using following Payment Methods.</h3>
                    <hr/>
                    <img src="{{asset('public/images/payment/190X100/visa.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/mcard.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/dbblnexus.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/telecash.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/fastcash.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/qcash.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/bkash.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/rocket.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/surecash.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/mycash.png')}}" >
                    <img src="{{asset('public/images/payment/190X100/cod.png')}}" >
                </div>
            </div>
        </div>
    </div>
 -->
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Pay 50% Advance to Make Your Order as Active Order using following Payment Methods.</h3>
                    <hr/>
                    <a target="_blank" href="{{URL::to('/pay-with-visa')}}"><img src="{{asset('public/images/payment/150X100/visa.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-mcard')}}"><img src="{{asset('public/images/payment/150X100/mcard.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-dbblnexus')}}"><img src="{{asset('public/images/payment/150X100/dbblnexus.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-telecash')}}"><img src="{{asset('public/images/payment/150X100/telecash.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-fastcash')}}"><img src="{{asset('public/images/payment/150X100/fastcash.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-qcash')}}"><img src="{{asset('public/images/payment/150X100/qcash.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-bkash')}}"><img src="{{asset('public/images/payment/150X100/bkash.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-rocket')}}"><img src="{{asset('public/images/payment/150X100/rocket.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-surecash')}}"><img src="{{asset('public/images/payment/150X100/surecash.png')}}" ></a>
                    <a target="_blank" href="{{URL::to('/pay-with-mycash')}}"><img src="{{asset('public/images/payment/150X100/mycash.png')}}" ></a>
                    <!-- <a href="{{URL::to('/pay-with-cod')}}"><img src="{{asset('public/images/payment/150X100/cod.png')}}" ></a> -->
                </div>
            </div>
        </div>
    </div>

</div>

@endsection