
@extends('admin.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="inner-block">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{URL::to('/dashboard')}}">Home</a> 
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="{{URL::to('/manage-order')}}"> Manage Order </a></li>
            </ul>        
        </div>

        <div class="col-xs-12">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Invoice
<!--                        <small style="margin-top:-20px;" class="pull-right">
                            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
                            </button>
                        </small>-->
                        <small style="margin-right:10px; margin-top: -15px" class="pull-right"><button onclick="printPage()" class="btn btn-primary"><i class="fa fa-print"></i> Print</button><script>
                        function  printPage() {
                            print();
                        }
                        </script>
                        </small>
                        

                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading"> Delivery Address </div>
                        <div class="panel-body">
                            Name: <strong>{{$billing_info_by_id->billing_first_name." ".$billing_info_by_id->billing_last_name}}</strong><br>
                            Company: {{$billing_info_by_id->billing_company_name}}<br>
                            Address: {{$billing_info_by_id->billing_address}}<br>
                            City: {{$billing_info_by_id->billing_city}}<br>
                            District: {{$billing_info_by_id->billing_district}}<br>
                            Post Code: {{$billing_info_by_id->billing_post_code}}<br>
                            Phone Number: <strong>{{$billing_info_by_id->billing_phone_number}}</strong><br>
                            Email Address: {{$billing_info_by_id->billing_email_address}}<br>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading"> Customer Details </div>
                        <div class="panel-body">
                            Name: <strong>{{$order_info_by_id->customer_first_name.' '.$order_info_by_id->customer_last_name}}</strong><br>
                            Address: {{$order_info_by_id->customer_address}}<br>
                            City: {{$order_info_by_id->customer_city}}<br>
                            District: {{$order_info_by_id->customer_district}}<br>
                            Phone Number: <strong>{{$order_info_by_id->customer_phone_number}}</strong><br>
                            Email Address: {{$order_info_by_id->customer_email_address}}<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Order Preferences</div>
                        <div class="panel-body">
                            Order Create Date: {{$billing_info_by_id->created_at}} <br>
                            Order Delivery Date: {{$billing_info_by_id->delivery_date. " + "." ( 3 to 7 days )"}} <br>
   <!--                            <strong>Gift:</strong> No<br>
                               <strong>Express Delivery:</strong> Yes<br>
                               <strong>Insurance:</strong> No<br>
                               <strong>Coupon:</strong> No<br>-->
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Payment Information</div>
                        <div class="panel-body">
                            <strong>{{$payment_info_by_id->payment_name}}</strong><br>
                        </div>
                        <i class="fa fa-barcode iconbig pull-left"></i><img class="image-responsive pull-left" src="{{asset('public/images/home/logo/fulerhut-logo.png')}}" max-width="180px" height="60px" alt=" Fulerhut Logo " />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable ">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0 ?>
                                @foreach($order_details as $v_oreder)
                                <tr>
                                    <td>{{$v_oreder->product_name}}</td>
                                    <td class="text-center">{{$v_oreder->product_price}}</td>
                                    <td class="text-center">{{$v_oreder->product_quantity}}</td>
                                    <td class="text-right">{{$v_oreder->product_price*$v_oreder->product_quantity}}</td>
                                </tr>
                                <?php $count += $v_oreder->product_price * $v_oreder->product_quantity; ?>
                                @endforeach
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right"><?php echo $count; ?></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Shipping Charge</strong></td>
                                    <td class="emptyrow text-right">100</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig pull-left"></i><img class="image-responsive pull-left" src="{{asset('public/images/home/logo/fulerhut-logo.png')}}" max-width="180px" height="60px" alt=" Fulerhut Logo " /></td>
                                    <td class="emptyrow text-center"></td>
                                    <td class="emptyrow text-center"><strong>Grand Total</strong></td>
                                    <td class="emptyrow text-right"><?php echo $count + 100; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- this row will not appear when printing -->
    <!--    <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice_print.blade.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
        </div>
        <br/>-->
</div>

<style>
    .height {
        min-height: 200px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
</style>


@endsection
