
@extends('index')
@section('content')

<div class="login-page">
    <div class="login-main">  	
        <div class="login-head">
            <h1>Login</h1>
        </div>
        <div class="login-block">
            <h2 style="color:#0f0;">
                <?php
                $message = Session::get('message');
                if (isset($message)) {
                    ?>
                    <div class="alert alert-success alert-dismissible"><em> {!! session('message') !!}</em></div>
    <?php Session::put('message', null);
} ?>
            </h2>
            <h2 style="color:#0f0;">
                <?php
                $exception = Session::get('exception');
                if (isset($exception)) {
                    ?>
                    <div class="alert alert-success alert-dismissible"><em> {!! session('exception') !!}</em></div>
    <?php Session::put('exception', null);
}
?>
            </h2>


            {!! Form::open(['url' => '/admin-login-check', 'method' => 'post', 'class' => 'form-horizontal']) !!}  
            <input type="text" name="admin_email_address" id="username" type="text" placeholder="type email address" required="required">
            <input type="password" name="admin_password" id="password" type="password" placeholder="type password">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <!-- 	<div class="forgot-top-grids">
                            <div class="forgot-grid">
                                    <ul>
                                            <li>
                                                    <input type="checkbox" id="brand1" value="">
                                                    <label for="brand1"><span></span>Remember me</label>
                                            </li>
                                    </ul>
                            </div>
                            <div class="forgot">
                                    <a href="#">Forgot password?</a>
                            </div>
                            <div class="clearfix"> </div>
                    </div> -->
            <input type="submit" name="btn" value="Sign In">	
            <!-- <h3>Not a member?<a href="{{URL::to('/signup')}}"> Sign up now</a></h3>				 -->
            <!-- <h2>or login with</h2>
            <div class="login-icons">
                    <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>						
                    </ul>
            </div> -->
            {!! Form::close() !!}
            <h5><a href="{{URL::to('/')}}">Go Back to Home</a></h5>
        </div>
    </div>
</div>

@endsection