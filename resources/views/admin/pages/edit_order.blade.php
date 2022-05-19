
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
            <li><a href="{{URL::to('/manage-order')}}"> Manage Order </a></li>
        </ul>
        <div class="panel-body">
            <div class="col-md-12 compose-right">
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
            </div>

            <div class="inbox-details-default">
                <div class="inbox-details-heading">
                    Edit Order(s)
                </div>
                <div class="inbox-details-body">
                    <!-- <div class="alert alert-info">
                        <h4 class="text-center">Please fill details to add a new Product</h4>
                    </div> -->
                    {!! Form::open(['url' => '/update-order', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'com-mail']) !!}
                    @foreach($all_order_info as $order_info)
                    <fieldset>
                        <input  type="hidden" name="order_id" value="{{$order_info->order_id}}"  required="required" >
                        Customer Name: <input  type="text" name="customer_name" value="{{$order_info->customer_first_name." ".$order_info->customer_last_name}}" required="required" >
                        Order Number: <input  type="text" name="order_number" value="{{$order_info->order_number}}" required="required" >
                       
                        Order Total: <input  type="text" name="order_total" value="{{$order_info->order_total}}" required="required" >
                        Payment Id: <input  type="text" name="payment_id" value="{{$order_info->payment_id}}" required="required" >
                        Order Date: <input  type="text" name="created_at" value="{{$order_info->created_at}}" required="required" >
                        Delivery Date: <input  type="text" name="delivery_date" value="{{$order_info->delivery_date}}" required="required" >
                        <div class="form-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;">Order Status: </label>
                            <div class="form" style="float: left">
                                <select name="order_status" id="selectError3" required="required">
                                    <option selected="selected" value="{{$order_info->order_status}}"> {{$order_info->order_status}} </option>
                                    <option value="Active Order"> Active Order </option>
                                    <option value="On Delivery"> On Delivery </option>
                                    <option value="Delivered"> Order Delivered </option>
                                    <option value="Paused"> Order Paused </option>
                                    <option value="Canceled"> Order Canceled </option>
                                </select>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="form-group" style="float: right; margin-top: -10px;">
                            <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn" >Cancel</button>
                        </div>
                    </fieldset>
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--/row-->
    </div>
</div>

@endsection
