<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_order() {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $order_info = DB::table('tbl_order')
                ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
                ->select('tbl_customer.*', 'tbl_order.*')
                ->get();

        $order_details = view('admin.pages.manage_order')
                ->with('all_order_info', $order_info);

        return view('admin.dashboard')
                        ->with('order_details', $order_details);
    }

    public function Oview_invoice() {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $order_id = 1;
        $order_info_by_id = DB::table('tbl_order')
                ->where('tbl_order.order_id', $order_id)
                ->select('tbl_order.created_at')
                ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
                ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
                ->select('tbl_order.*', 'tbl_customer.*', 'tbl_payment.payment_type')
                ->first();

       // echo "<pre>";
       // echo $order_info_by_id['customer_name'];
       //  print_r($order_info_by_id);
       //  exit();

        $billing_info_by_id = DB::table('tbl_order')
                ->join('tbl_billing', 'tbl_order.billing_id', '=', 'tbl_billing.billing_id')
                ->where('tbl_order.order_id', $order_id)
                ->select('tbl_order.*', 'tbl_billing.*')
                ->first();
//        echo "<pre>";
//        print_r($order_info_by_id);
//        exit();
        $order_details = DB::table('tbl_order_details')
                ->where('order_id', $order_id)
                ->get();

        // echo "<pre>";
        // print_r($order_details);
        // exit();

        $product_content = view('admin.pages.view_invoice')
                ->with('order_info_by_id', $order_info_by_id)
                ->with('billing_info_by_id', $billing_info_by_id)
                ->with('order_details', $order_details);

        return view('admin.dashboard')
                        ->with('content', $product_content);
    }

    public function view_invoice_by_id($order_id) {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $order_info_by_id = DB::table('tbl_order')
                ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
                ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
                ->where('tbl_order.order_id', $order_id)
                ->select('tbl_order.*', 'tbl_customer.*', 'tbl_payment.payment_type')
                ->first();

        // echo "<pre>";
        // print_r($order_info_by_id);
        // exit();

        $billing_info_by_id = DB::table('tbl_order')
                ->join('tbl_billing', 'tbl_order.billing_id', '=', 'tbl_billing.billing_id')
                ->where('tbl_order.order_id', $order_id)
                ->select('tbl_order.*', 'tbl_billing.*')
                ->first();

        $order_details_by_id = DB::table('tbl_order_details')
                ->where('order_id', $order_id)
                ->first();
        
        $order_details = DB::table('tbl_order_details')
                ->where('order_id', $order_id)
                ->get();

        // echo "<pre>";
        // print_r($order_details);
        // exit();

        $product_content = view('admin.pages.view_invoice')
                ->with('order_info_by_id', $order_info_by_id)
                ->with('billing_info_by_id', $billing_info_by_id)
                ->with('order_details_by_id', $order_details_by_id)
                ->with('order_details', $order_details);

        return view('admin.dashboard')
                        ->with('content', $product_content);
    }

    public function edit_order($order_id) {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $order_info = DB::table('tbl_order')
                ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
                ->where('order_id',$order_id)
                ->select('tbl_customer.*', 'tbl_order.*')
                ->get();

        $order_details = view('admin.pages.edit_order')
                ->with('all_order_info', $order_info);

        return view('admin.dashboard')
                        ->with('order_details', $order_details);

        // return view('admin.pages.newpage');
    }

    public function update_order(Request $request) {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $order_id = $request->order_id;
        $data = array();
        $data['order_status'] = $request->order_status;
        $data['delivery_date'] = $request->delivery_date;
        $data['updated_at'] = (DB::raw('CURRENT_TIMESTAMP'));

        DB::table('tbl_order')->where('order_id', $order_id)->update($data);
        Session::put('message', 'Order Updated Successfully');
        return Redirect::to('/manage-order');
    }

    public function delete_order($order_id) {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        Session::put('message', 'Order Deleted Successfully');
        return back();
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
