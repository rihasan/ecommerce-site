
@extends('index')
@section('content')

<div class="container">
    <div class="row">
        <h1>Please Activate your Account!</h1>
        <h2 style="color:#0f0;">
            <?php
            $customer_id = Session::get('customer_id');
            $message = Session::get('message');
            if (isset($message)) {
                echo $message;
                Session::put('message', null);
            }
            ?>
        </h2>
        <h2 style="color: #f00;">
            <?php
            $exception = Session::get('exception');
            if ($exception) {
                echo $exception;
                Session::put('exception', null);
            }
            ?>
        </h2>
        <h3>Enter the code sent by your email address!</h3><input type="text" name="activation_code_from_mail">
        <button type="submit" name="activation_code_submit"> Submit </button>
    </div>
</div>

@endsection