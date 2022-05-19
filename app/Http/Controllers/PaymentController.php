<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function payment_method() {
        return view('pages.payment');
    }

    public function pay_with_visa() {
        return view('pages.payment.visa');
    }

    public function pay_with_mcard() {
        return view('pages.payment.mastercard');
    }

    public function pay_with_dbblnexus() {
        return view('pages.payment.dbblnexus');
    }

    public function pay_with_telecash() {
        return view('pages.payment.telecash');
    }

    public function pay_with_qcash() {
        return view('pages.payment.qcash');
    }

    public function pay_with_bkash() {
        return view('pages.payment.bkash');
    }

    public function pay_with_rocket() {
        return view('pages.payment.rocket');
    }

    public function pay_with_mycash() {
        return view('pages.payment.mycash');
    }

    public function pay_with_fastcash() {
        return view('pages.payment.fastcash');
    }

    public function pay_with_surecash() {
        return view('pages.payment.surecash');
    }

    public function pay_with_cod() {
        return view('pages.payment.surecash');
    }

    public function save_trxId(Request $request) {

        $data = array();
        // $data['order_id'] = $request->order_id;
        $data['payment_id'] = $request->payment_id;
        $data['order_id'] = $request->order_id;
        $data['trx_id'] = $request->trx_id;

        echo "<pre>";
        print_r($data);


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
