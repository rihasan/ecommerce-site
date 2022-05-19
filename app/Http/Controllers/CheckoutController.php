<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use Cart;

class CheckoutController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.checkout');
        // return Redirect::to('/billing');
    }

    public function check_out_details(Request $request) {

        $customer_id = Session::get('customer_id');
        $customer_name = Session::get('customer_name');

        return view('pages.check_out_details');

        // return Redirect::to('/billing');
    }

    public function billing() {
        return view('pages.check_out_details');
    }

    public function save_billing(Request $request) {

        $customer_id = Session::get('customer_id');
        $customer_name = Session::get('customer_name');
       
        $data = array();
        $data['billing_id'] = $request->billing_id;
        $data['customer_id'] = $customer_id;
        $data['billing_first_name'] = $request->billing_first_name;
        $data['billing_last_name'] = $request->billing_last_name;
        $data['billing_company_name'] = $request->billing_company_name;
        $data['billing_address'] = $request->billing_address;
        $data['billing_address_optional'] = $request->billing_address_optional;
        $data['billing_gender'] = $request->billing_gender;
        $data['billing_city'] = $request->billing_city;
        $data['billing_district'] = $request->billing_district;
        $data['billing_post_code'] = $request->billing_post_code;
        $data['billing_phone_number'] = $request->billing_phone_number;
        $data['billing_email_address'] = $request->billing_email_address;
        $data['created_at'] = DB::raw('CURRENT_TIMESTAMP');

        $billing_name = $data['billing_first_name'] . '&nbsp' . $data['billing_last_name'];

        $billing_id = DB::table('tbl_billing')->insertGetId($data);

        Session::put('billing_id', $billing_id);
        Session::put('customer_id', $customer_id);
        Session::put('billing_name', $billing_name);

        /* Payment Save Start */
        $pdata['payment_type'] = $request->payment_type;

          if($request->payment_type == 'cod'){
          $pdata['payment_name'] = 'Cash On Delivery';
          }
          elseif($request->payment_type == 'bkash'){
          $pdata['payment_name'] = 'Bkash';
          }
          elseif($request->payment_type == 'rocket'){
          $pdata['payment_name'] = 'Rocket';
          }
          elseif($request->payment_type == 'mcard'){
          $pdata['payment_name'] = 'Master Card';
          }

        $pdata['customer_id'] = $customer_id;
        $pdata['billing_id'] = Session::get('billing_id');
        $pdata['created_at'] = DB::raw('CURRENT_TIMESTAMP');
        $payment_id = DB::table('tbl_payment')->insertGetId($pdata);

       // echo '<pre>';
       // print_r($pdata);
       // exit();

        /* Payment Save End */


        /* Order Save Start */
        // this is for random 6 digit number generation
            function rand6($length = 6)
            {
              $intMin = (10 ** $length) / 10; // 100...
              $intMax = (10 ** $length) - 1;  // 999...

              $codeRandom = mt_rand($intMin, $intMax);

              return $codeRandom;
            }
        $odata = array();
        $odata['customer_id'] = $customer_id;
        $odata['billing_id'] = $billing_id;
        $odata['payment_id'] = $payment_id;
        $odata['order_number'] = rand6();
        $order_total = str_replace(",", "", Cart::total());
        $odata['order_total'] = $order_total;
        $odata['created_at'] = DB::raw('CURRENT_TIMESTAMP');
        $odata['delivery_date'] = $request->delivery_date;
        $order_id = DB::table('tbl_order')->insertGetId($odata);

        Session::put('order_id', $order_id);

        /* Order Save End */

        /* Order-details Save Start */
        $oddata = array();
        $content = Cart::content();
        foreach ($content as $v_content) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_content->id;
            $oddata['product_name'] = $v_content->name;
            $oddata['product_price'] = $v_content->price;
            $oddata['product_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($oddata);
        }
        /* Order-details Save end */


        // mail($to, $subject, $message, $headers);
        // echo $message;
        // exit();
        // Session::put('message', 'Customer Registration Save Successfully! Please check you email for activate your profile.');

        return Redirect::to('/payment-method');
    }

    public function update_billing(Request $request) {

        $billing_id = $request->billing_id;
        $customer_id = Session::get('customer_id');
        $customer_name = Session::get('customer_name');

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['billing_first_name'] = $request->billing_first_name;
        $data['billing_last_name'] = $request->billing_last_name;
        $data['billing_company_name'] = $request->billing_company_name;
        $data['billing_address'] = $request->billing_address;
        $data['billing_address_optional'] = $request->billing_address_optional;
        $data['billing_gender'] = $request->billing_gender;
        $data['billing_city'] = $request->billing_city;
        $data['billing_district'] = $request->billing_district;
        $data['billing_post_code'] = $request->billing_post_code;
        $data['billing_phone_number'] = $request->billing_phone_number;
        $data['billing_email_address'] = $request->billing_email_address;
        $data['updated_at'] = DB::raw('CURRENT_TIMESTAMP');

        $billing_name = $data['billing_first_name'] . '&nbsp' . $data['billing_last_name'];

       // echo '<pre>';
       // print_r($data);
       // exit();

        DB::table('tbl_billing')
                ->where('billing_id', $billing_id)
                ->update($data);

        Session::put('billing_id', $billing_id);
        Session::put('customer_id', $customer_id);
        Session::put('billing_name', $billing_name);

        /* Payment Save Start */
        $pdata['payment_type'] = $request->payment_type;

          if($request->payment_type == 'cod'){
          $pdata['payment_name'] = 'Cash On Delivery';
          }
          elseif($request->payment_type == 'bkash'){
          $pdata['payment_name'] = 'Bkash';
          }
          elseif($request->payment_type == 'rocket'){
          $pdata['payment_name'] = 'Rocket';
          }
          elseif($request->payment_type == 'mcard'){
          $pdata['payment_name'] = 'Master Card';
          }

        $pdata['customer_id'] = Session::get('customer_id');
        $pdata['billing_id'] = Session::get('billing_id');
        $pdata['created_at'] = DB::raw('CURRENT_TIMESTAMP');
        $payment_id = DB::table('tbl_payment')->insertGetId($pdata);

       // echo '<pre>';
       // print_r($pdata);
       // exit();

        /* Payment Save End */

        /* Order Save Start */
        // this is for random 6 digit number generation
        function rand6($length = 6)
        {
          $intMin = (10 ** $length) / 10; // 100...
          $intMax = (10 ** $length) - 1;  // 999...

          $codeRandom = mt_rand($intMin, $intMax);

          return $codeRandom;
        }

        $odata = array();
        $odata['customer_id'] = $customer_id;
        $odata['billing_id'] = Session::get('billing_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_number'] = rand6();
        
        $order_total = str_replace(",", "", Cart::total());
        $odata['order_total'] = $order_total;        
        $odata['delivery_date'] = $request->delivery_date;
        $odata['created_at'] = DB::raw('CURRENT_TIMESTAMP');
        $order_id = DB::table('tbl_order')->insertGetId($odata);

        Session::put('order_id', $order_id);
        /* Order Save End */
        
//        echo '<pre>';
//        print_r($odata);
//        exit();

        /* Order-details Save Start */
        $oddata = array();
        $content = Cart::content();
        foreach ($content as $v_content) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_content->id;
            $oddata['product_name'] = $v_content->name;
            $oddata['product_price'] = $v_content->price;
            $oddata['product_quantity'] = $v_content->qty;
            $oddata['product_image'] = $v_content->options['image'];
            $oddata['created_at'] = DB::raw('CURRENT_TIMESTAMP');
            DB::table('tbl_order_details')->insert($oddata);
        }
       
       // echo '<pre>';
       // print_r($oddata);
       // exit();
        
        /* Order-details Save end */

        $to = 'email@site.com';
        $subject = 'Confirm your account';
        $message = "Message body goes here...";

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Your name <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


//        mail($to, $subject, $message, $headers);
        // Session::put('message', 'Customer Registration Save Successfully! Please check you email for activate your profile.');

//        return "Succes!";
        return Redirect::to('/payment-method');
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
