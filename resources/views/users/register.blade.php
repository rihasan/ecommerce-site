
@extends('index')
@section('content')

<!-- 
<?php
if (isset($_POST['signup'])) {
    $obj_app->save_customer_info($_POST);
}
?> -->


<div class="container">
    <!--     <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="text-center text-success">You have to login to complete your valuable order. If you are not registered then please register first.</h2>
                    </div>
                </div>
            </div>
        </div> -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body">
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


                    {!! Form::open(['url' => '/save-customer', 'method' => 'post', 'class' => 'form-horizontal']) !!} 
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_first_name">First Name</label>  
                            <div class="col-md-8">
                                <input id="name" name="customer_first_name" type="text" placeholder="Enter your name" class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_last_name">Last Name</label>  
                            <div class="col-md-8">
                                <input id="name" name="customer_last_name" type="text" placeholder="Enter your name" class="form-control input-md" required="">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_email_address">Email</label>  
                            <div class="col-md-8">
                                <input id="email" name="customer_email_address" type="email" placeholder="Enter your email id" class="form-control input-md" required="">
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_password">Password</label>
                            <div class="col-md-8">
                                <input id="password" name="customer_password" type="password" placeholder="Enter a password" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_phone_number">Phone Number</label>  
                            <div class="col-md-8">
                                <input id="contact" name="customer_phone_number" type="number" placeholder="Enter your contact no." class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_gender"> Gender </label>
                            <div class="col-md-8">
                                <select id="blood_group" name="customer_gender" class="form-control">
                                    <option>... Select Yours ...</option>
                                    <option value="m"> Male </option>
                                    <option value="f"> Female </option>
                                    <option value="o"> Others </option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_address">Address</label>  
                            <div class="col-md-8">
                                <textarea class="form-control" name="customer_address"></textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_city">City</label>  
                            <div class="col-md-8">
                                <input id="city" name="customer_city" type="text" placeholder="Enter your city" class="form-control input-md" required="">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="customer_district">District</label>  
                            <div class="col-md-8">
                                <input id="dist" name="customer_district" type="text" placeholder="Enter your district" class="form-control input-md" required="">
                            </div>
                        </div>
                        <input type="hidden" name="customer_status" value="0">

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="signup"></label>
                            <div class="col-md-8">
                                <button type="submit" id="signup" name="register" class="btn btn-success btn-block">Register / Sign Up</button>
                            </div>
                        </div>

                    </fieldset>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center text-warning"> Already Registered! </h2>
                    <a href="{{URL::to('/customer-login-panel')}}"> <button type="submit" id="signup" name="register" class="btn btn-success btn-block"> Login Here </button></a>
                </div>
            </div>
        </div>
    </div>

    @endsection