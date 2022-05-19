
@extends('index')
@section('content')

<style type="text/css">
    p{
      font-family: "Times New Roman", Times, serif;
      font-size: 18px;
      font-weight: normal;
      margin-left: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<h1>Pay now with bkash</h1>
                    <div class="panel panel-body">
                        <br>
                        <br>
                        <p class="text-justify">We have our personal Bkash account. We accept from all of your Bkash account personal or merchant bikash number. You can send us payment via your personal Bkash or go to any nearest Bkash agent and send us your packages amount money to our Bkash number.</p>

                        <h3 class="text-center">Please add extra 2% of your total amount for Bkash charge with bill</h3>

                        <p class="text-center">To send us payment using your personal account, use the following steps-</p>
                        <br>
                        <div class="text-justify">
                            <p> 01. Go to bKash Mobile Menu by dialing *247#</p>
                        <p> 02. Choose “Send Money”</p>
                        <p> 03. Enter our bKash Account Number 01712 79 79 35</p>
                        <p> 04. Enter the amount </p>
                        <p> 05. Enter a reference about the transaction. (Do not use more than one word, avoid space or special characters)</p>
                        <p> 06. Now enter your bKash Mobile Menu PIN to confirm the transaction</p>
                        </div>

                        <p> Done! You will receive confirmation message from bKash.</p>
                    </div>
                    <img src="{{asset('public/images/payment/bKash_payment_process.png')}}" width="100%" height="600px" >
                </div>
                <div class="panel panel-body text-center">
                    {!! Form::open(['url' => '/save-transection', 'method' => 'post', 'class' => 'form-horizontal']) !!} 
                    <fieldset>
                        <?php
                            $order_id = Session::get('order_id');
                            // echo $order_id;
                            $order_info = DB::table('tbl_order')->where('order_id', $order_id)->first();
                            $payment_id = $order_info->payment_id;
                            // print_r($order_info);
                            // print_r($payment_id);
                        ?>
                    <h2>Enter Transection Id & Submit Payment</h2>
                    <input type="hidden" name="order_id" value="{{$order_id}}">
                    <input type="hidden" name="payment_id" value="{{$payment_id}}">
                    <p>Enter Transection Id (Trx ID): <input type="text-justify" name="trx_id" placeholder="Enter Trx Id XXXX" required="required"></p>
                    
                    <button type="Submit" name="Submit" class="button button-default">Confirm Payment</button>

                    </fieldset>
                    {!! Form::close() !!}
                
                </div>
                <div class="panel-footer">
                	<a href="{{URL::to('/payment-method')}}"><h3 class="text-center">Go Back</h3></a>
                </div>
            </div>
        </div>        
    </div>        
</div>        

@endsection