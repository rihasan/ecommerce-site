
@extends('admin.dashboard')
@section('content')

<div class="container">
    <div class="inner-block">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="{{URL::to('/manage-order')}}"> Manage Order </a></li>
        </ul>
        <!-- Invoice Start-->
        <section class="invoice">
            <!-- Invoice Start-->
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Fulerhut.com
                        <small class="pull-right">Order Delivery Date: 
                           <b><?php echo date('d M Y', strtotime($billing_info_by_id->delivery_date))?></b>
                        </small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <b>Customer Details</b><br><br>
                    <address>
                        Name: <strong>{{$order_info_by_id->customer_first_name.' '.$order_info_by_id->customer_last_name}}</strong><br>
                        Address: {{$order_info_by_id->customer_address}}<br>
                        City: {{$order_info_by_id->customer_city}}<br>
                        District: {{$order_info_by_id->customer_district}}<br>
                        Phone Number: <strong>{{$order_info_by_id->customer_phone_number}}</strong><br>
                        Email Address: {{$order_info_by_id->customer_email_address}}<br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Delivery Address</b>
                    <address>
                        Name: <strong>{{$billing_info_by_id->billing_first_name." ".$billing_info_by_id->billing_last_name}}</strong><br>
                        Company: {{$billing_info_by_id->billing_company_name}}<br>
                        Address: {{$billing_info_by_id->billing_address}}<br>
                        City: {{$billing_info_by_id->billing_city}}<br>
                        District: {{$billing_info_by_id->billing_district}}<br>
                        Post Code: {{$billing_info_by_id->billing_post_code}}<br>
                        Phone Number: <strong>{{$billing_info_by_id->billing_phone_number}}</strong><br>
                        Email Address: {{$billing_info_by_id->billing_email_address}}<br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #{{$order_info_by_id->order_number}}</b><br><br>
                    <b>Order Total: {{$order_info_by_id->order_total}} BDT Only</b> <br>
                    <b>Payment Due: <?php echo date('d M Y', strtotime($billing_info_by_id->delivery_date))?></b><br>

                    <b>Order Create Date: <?php echo date('d M Y', strtotime($order_details_by_id->created_at))?></b>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="page">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Qty</th>
                                <th>Product Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0 ?>

                                @foreach($order_details as $v_oreder)
                                <tr>
                                    <td><img src="{{URL::to('/')}}/{{$v_oreder->product_image}}" width="120px" height="50px"></td>
                                    <td>{{$v_oreder->product_name}}</td>
                                    <td class="text-center">{{$v_oreder->product_quantity}}</td>
                                    <td class="text-center">{{$v_oreder->product_price}}</td>
                                    <td class="text-right">{{$v_oreder->product_price*$v_oreder->product_quantity}}</td>
                                </tr>
                                <?php $count += $v_oreder->product_price * $v_oreder->product_quantity; ?>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        <?php 
                             $payment_id = $billing_info_by_id->payment_id;
                                 $result = DB::table('tbl_payment')
                                                ->where('payment_id',$payment_id)
                                                ->select('tbl_payment.payment_name')
                                                ->first();
                        ?>
                        <strong>{{$result->payment_name}}</strong><br>
                    </p>

                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead">Amount Due: <?php echo date('d M Y', strtotime($billing_info_by_id->delivery_date))?></p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?php echo $count; ?></td>
                            </tr>
                            <tr>
                                <th>Vat (15%)</th>
                                <!-- <td><?php echo Cart::tax(); ?></td>  -->
                                <td><?php echo $count*15/100; ?></td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><?php echo $count + $count*15/100; ?></td>
                                <!-- <td><?php  echo $gtotal=Cart::total();?></td>  -->
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <small style="margin-right:10px; margin-top: -15px"><button onclick="printPage()" class="btn btn-primary"><i class="fa fa-print"></i> Print</button><script>
                        function  printPage() {
                            print();
                        }
                        </script>
                        </small>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </section>
        <!-- / Invoice End -->
    </div><!--/row-->
</div>

@endsection

