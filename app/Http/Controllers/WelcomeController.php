<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $all_published_home_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
                ->where('tbl_product.publication_status', 1)
                ->orderBy('product_id', 'desc')
                ->select('tbl_product.*', 'tbl_category.category_name')
                ->paginate(3);
        // ->get();

        $all_published_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
                ->where('tbl_product.publication_status', 1)
                ->orderBy('product_id', 'desc')
                ->select('tbl_product.*', 'tbl_category.category_name')
//                ->paginate(9);
                ->get();

        $all_latest_published_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
                ->where('tbl_product.publication_status', 1)
                ->orderBy('product_id', 'desc')
                ->select('tbl_product.*', 'tbl_category.category_name')
                ->paginate(6);
//                ->get();

        $home_content = view('pages.home')
                ->with('all_home_product', $all_published_home_product)
                ->with('all_product', $all_published_product)
                ->with('latest_product', $all_latest_published_product);
        return view('index')
                        ->with('content', $home_content);
    }

    public function flowers_category($id) {

        $product_info_by_category_id = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_category.category_name', $id)
                ->select('tbl_product.*')
                ->select('tbl_product.*', 'tbl_category.category_name')
                ->get();

        $flowers_category_content = view('pages.category')
                ->with('product_info', $product_info_by_category_id)
                ->with('id', $id);

        return view('index')
                        ->with('content', $flowers_category_content);
    }

    public function flowers_sub_category($id) {

        $product_info_by_sub_category_id = DB::table('tbl_product')
                ->join('tbl_sub_category', 'tbl_sub_category.sub_category_id', '=', 'tbl_product.sub_category_id')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_sub_category.sub_category_name', $id)
                ->select('tbl_product.*')
                ->select('tbl_product.*', 'tbl_sub_category.sub_category_name')
                ->get();

        $flowers_sub_category_content = view('pages.sub_category')
                ->with('product_info', $product_info_by_sub_category_id)
                ->with('id', $id);

        return view('index')
                        ->with('content', $flowers_sub_category_content);
    }

    // public function login()
    // {
    //     $login_content = view('users.login');
    //     return view('index')
    //                     ->with('content', $login_content);
    // }


    public function fourzerofour() {
        $fourzerofour_content = view('pages.fourzerofour');

        return view('index')
                        ->with('content', $fourzerofour_content);
    }

    public function contact_us() {
        $contact_us_content = view('pages.contact_us');

        return view('index')
                        ->with('content', $contact_us_content);
    }

    public function terms_conditions() {
        $terms_conditions_content = view('pages.terms_conditions');

        return view('index')
                        ->with('content', $terms_conditions_content);
    }

    public function faq() {
        $faq_content = view('pages.faq');

        return view('index')
                        ->with('content', $faq_content);
    }

    public function shop() {
        $shop_content = view('pages.shop');

        return view('index')
                        ->with('content', $shop_content);
    }

    public function cart() {
        $cart_content = view('pages.cart');

        return view('index')
                        ->with('content', $cart_content);
    }

    public function checkout() {
        $checkout_content = view('pages.checkout');

        return view('index')
                        ->with('content', $checkout_content);
    }

    public function product_details($product_id) {
        // $product_id = $product_id;

        $product_info = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                ->where('product_id', $product_id)
                ->select('tbl_product.*', 'tbl_category.category_name')
                ->get();

        // echo "<pre>";
        // print_r($product_info);
        // exit();

        $product_details_content = view('pages.product_details')
                ->with('product_info', $product_info);

        return view('index')
                        ->with('content', $product_details_content);
    }

   
    public function price_range_search(Request $request)

    {

        $price_range = $request->input('price_range');
        Session::put('price_range', $price_range);

        return Redirect('/search-result');

    }

    public function search_result(){

        $price_range = Session::get('price_range');
        // echo $price_range;
        $min_max = explode(',', $price_range);

        $min = $min_max[0];
        $max = $min_max[1];

        $search_result = DB::table('tbl_product')
                ->whereBetween('product_price', array($min, $max))
                ->orderBy('product_id', 'desc')
                ->get();

        $search_content = view('pages.search')
                        ->with('min', $min)
                        ->with('max', $max)
                        ->with('price_range', $price_range)
                        ->with('search_result', $search_result);


        return view('index')->with('content', $search_content);
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
