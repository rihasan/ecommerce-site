<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $customer_id = Session::get('customer_id');
        if ($customer_id != null) {
            return Redirect::to('/')->send();
        }

        $login_content = view('users.login');
        return view('index')
                        ->with('content', $login_content);
    }

    public function customer_login_check(Request $request) {

        $page_check = $request->page_check;
        $customer_email_address = $request->customer_email_address;
        $customer_password = md5($request->customer_password);


        $result = DB::table('tbl_customer')
                ->where('customer_email_address', $customer_email_address)
                ->where('customer_password', $customer_password)
                ->first();

        // echo "<pre>";
        // print_r($result);
        // exit();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_first_name . '&nbsp;' . $result->customer_last_name);
            if ($page_check == 'checkout') {
                return Redirect::to('/check-out-details');
            } else {
                return Redirect::to('/');
            }
        } else {
            Session::put('exception', 'Email Address or Password Invalid!');
            return Redirect::to('/');
        }
    }

    public function register(Request $request) {

        $customer_id = Session::get('customer_id');
        if ($customer_id != null) {
            return Redirect::to('/')->send();
        }

        $customer_register_content = view('users.register');
        return view('index')
                        ->with('content', $customer_register_content);
    }

    public function save_customer(Request $request) {

        $page_check = $request->page_check;

        $customer_id = Session::get('customer_id');
        if ($customer_id != null) {
            return Redirect::to('/')->send();
        }

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['customer_first_name'] = $request->customer_first_name;
        $data['customer_last_name'] = $request->customer_last_name;
        $data['customer_email_address'] = $request->customer_email_address;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone_number'] = $request->customer_phone_number;
        $data['customer_gender'] = $request->customer_gender;
        $data['customer_address'] = $request->customer_address;
        $data['customer_city'] = $request->customer_city;
        $data['customer_district'] = $request->customer_district;
        $data['customer_status'] = $request->customer_status;
        $data['created_at'] = (DB::raw('CURRENT_TIMESTAMP'));

        $customer_name = $data['customer_first_name'] . '&nbsp' . $data['customer_last_name'];

        $to = $data['customer_email_address'];
        $subject = "Customer email varification @ fulerhut.com";
        $en_customer_id = base64_encode($customer_id);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);


        $message = "
            <span>Dear $customer_name . Thanks for join our community.</span> <br/>
            <span>Your login information goes here.</span> <br/>
            <span>Email Address: </span> $data[customer_email_address]<br/>
            <span>Password: </span> $data[customer_password]<br/>
            <span>To activate your account click on bellow</span><br/>
            <a href='http://localhost/seip_php28/day_34/seip_ecommerce28/update_customer_status.php?id=$en_customer_id'> ...</a>    
                ";
        $headers = 'Form: no-replay@fulerhut.com';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Your name <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customer_name);

        // mail($to, $subject, $message, $headers);
        // echo $message;
        // exit();

        Session::put('message', 'Customer Registration Save Successfully! Please check you email for activate your profile.');

        if ($page_check == 'checkout') {
            return Redirect::to('/check-out-details');
        } else {
            return Redirect::to('/');
        }
    }

    public function customer_profile() {

        $customer_id = Session::get('customer_id');
        $customer_name = Session::get('customer_name');
        if ($customer_id != null) {
            // return Redirect::to('/')->send();
            $customer_profile_content = view('users.customer_profile');
            return view('index')
                            ->with('content', $customer_profile_content);
        }

        $customer_profile_content = view('users.customer_profile');
        return view('index')
                        ->with('content', $customer_profile_content);
    }

    public function customer_order() {

        $customer_id = Session::get('customer_id');
        $customer_name = Session::get('customer_name');
        if ($customer_id != null) {
            // return Redirect::to('/')->send();
            $customer_profile_content = view('users.customer_profile');
            return view('index')
                            ->with('content', $customer_profile_content);
        }

        $customer_profile_content = view('users.customer_profile');
        return view('index')
                        ->with('content', $customer_profile_content);
    }







    public function logout() {

        Session::put('customer_id', null);
        Session::put('customer_name', null);
        Session::put('message', 'You are successfully logged out!');
        // return Redirect::to('/');
        return Redirect::to('/')->send();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
