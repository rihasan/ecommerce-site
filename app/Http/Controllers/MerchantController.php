<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)

    {
        $merchant_id = $id;

        $merchant_info = DB::table('tbl_merchant')
                ->where('publication_status', 1)
                ->where('merchant_name', $merchant_id)
                ->orderBy('merchant_id', 'desc')
                ->first();

        $product_info = DB::table('tbl_product')
                ->join('tbl_merchant', 'tbl_merchant.merchant_id', '=', 'tbl_product.merchant_id')
                ->where('tbl_product.publication_status', 1)
                ->where('merchant_name', $merchant_id)
                ->select('tbl_product.*', 'tbl_merchant.merchant_name')
                ->get();
                
                // echo "<pre>";
                // print_r($product_info);
                // exit();

        $merchant_profile_content = view('pages.merchant_profile')
                                ->with('merchant_info', $merchant_info)
                                ->with('product_info', $product_info);

        return view('index')
                        ->with('content', $merchant_profile_content);

    }

    
    public function product_by_merchant($id)

    {
        $merchant_id = $id;

        $product_info = DB::table('tbl_product')
                ->join('tbl_merchant', 'tbl_merchant.merchant_id', '=', 'tbl_product.merchant_id')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_merchant.merchant_name', $merchant_id)
                ->orderBy('product_id', 'desc')
                ->select('tbl_product.*', 'tbl_merchant.merchant_name')
                // ->paginate(3);
                ->get();

                // echo "<pre>";
                // print_r($product_info);
                // exit();

        $product_by_merchant_content = view('pages.merchant_product')
                                     ->with('id', $merchant_id)
                                     ->with('product_info', $product_info);

        return view('index')
                        ->with('content', $product_by_merchant_content);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
