
@extends('admin.dashboard')
@section('content')

<div class="col-md-12 compose-right">
    <div class="inner-block">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li><span> Manage Order(s) </span></li>
        </ul>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered bootstrap-datatable datatable ">
                    <center>
                        <?php
                        $message = Session::get('message');
                        if (isset($message)) {
                            ?>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 style="color: green;"> <?php
                                echo $message;
                                Session::put('message', null);
                            }
                            ?>
                            </h2>
                        </div>
                    </center>

                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Customer Name</th>
                            <th>Order Number</th>
                            <th>Order Total (BDT / TK)</th>
                            <th>Payment Type</th>
                            <th>Order Date</th>
                            <th>Delivery Date</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($all_order_info as $order_info)
                       
                        <tr>
                            <td class="center">{{$order_info->order_id}}</td>
                            <td class="center">{{$order_info->customer_first_name." ".$order_info->customer_last_name}}</td>
                            <td class="center">{{$order_info->order_number}}</td>
                            <td class="center">{{$order_info->order_total}}</td>
                            <td class="center"><?php
                             $payment_id = $order_info->payment_id;
                             $result = DB::table('tbl_payment')
                                            ->where('payment_id',$payment_id)
                                            ->select('tbl_payment.payment_name')
                                            ->first();
                             echo $result->payment_name;
                             ?></td>
                            {{-- Date with time --}}
                            <!-- <td class="center">{{$order_info->created_at}}</td>
                            <td class="center">{{$order_info->delivery_date}}</td> -->
                            {{-- Date with out time --}}
                            <td class="center"><?php echo date('d M Y h:i a', strtotime($order_info->created_at));?></td>
                            <td class="center"><?php echo date('d M Y h:i a', strtotime($order_info->delivery_date));?></td>


                            <td class="center">
                                <span class="label label-danger">{{$order_info->order_status}}</span>
                            </td>
                            <td class="center">

                                <a class="btn btn-success" href="{{URL::to('/view-invoice/'.$order_info->order_id)}}" title="View Invoice">
                                    <i class="glyphicon glyphicon-zoom-in white"></i>  
                                </a>
                                <a class="btn btn-info" href="{{URL::to('/edit-order/'.$order_info->order_id)}}" title="Edit Order">
                                    <i class="glyphicon glyphicon-edit"></i>  
                                </a>

                                <?php
                                $access_label = Session::get('access_label');
                                if ($access_label == 1) {
                                    ?>
                                    <a class="btn btn-danger" onclick="return confirm('Are You Sure To Delete?')" href="{{URL::to('/delete-order/'.$order_info->order_id)}}" onclick = "return confirm_delete()" title="Delete" >
                                        <i class="glyphicon glyphicon-trash"></i> 
                                    </a>
                            <?php } ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div><!--/row-->
</div>

@endsection
