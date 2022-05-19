
@extends('index')
@section('content')


<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    {!! Form::open(['url' => '/customer-login-check', 'method' => 'post', 'class' => 'form-horizontal']) !!} 
                    <input type="email" name="customer_email_address" placeholder="Email Email Address" required="required" />
                    <input type="password" name="customer_password" placeholder="Enater your password" required="required" />
                    <!-- <span>
                        <input type="checkbox" class="checkbox"> 
                        Keep me signed in
                    </span> -->
                    <button type="submit" class="btn btn-default">Login</button>
                    {!! Form::close() !!}
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2> New User! </h2>
                    <a href="{{URL::to('/customer-register-panel')}}"><button type="submit" id="signup" name="register" class="btn btn-success btn-block">Register / Sign Up here</button></a>

                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->



@endsection