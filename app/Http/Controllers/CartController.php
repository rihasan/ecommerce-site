<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Cart;
use Illuminate\Support\Facades\Input;

class CartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function add_to_cart($id, Request $request) {

        $product_info = DB::table('tbl_product')
                ->where('product_id', $id)
                ->first();

        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;

        $qty = $request->product_quantity;
        if ($qty > 1) {
            $data['qty'] = $qty;
        } else {
            $data['qty'] = 1;
        }
        $data['weight'] = 550;
        $data['options'] = array('image' => $product_info->product_image);
            
        Cart::add($data);
        Session::put('message', ' Your Cart Item(s) are Updated! ');

        // return back()->send();
        // return back()->with('status', 'Added to Cart!');
        // return Redirect::back()->withInput(Input::all());
        // return Redirect::to('/show-cart');
        return Redirect::back();
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_cart() {

        $cart_content = view('pages.cart');

        return view('index')
                        ->with('content', $cart_content);
    }

    public function update_cart_item(Request $request) {

        $rowId = $request->rowId;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        Session::put('message', ' Cart Updated! ');

        return Redirect::to('/show-cart');
    }

    public function delete_from_cart($rowId) {

        Cart::remove($rowId);
        Session::put('message', ' Your Cart Item(s) are Deleted! ');
        return Redirect::to('/show-cart');
    }

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
