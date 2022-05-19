<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SuperAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $home_content = view('admin.pages.home');
        return view('admin.dashboard')
                        ->with('content', $home_content);
    }

    /*
     *   Category Management start
     */

    public function add_category() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $categry_content = view('admin.pages.add_category');
        return view('admin.dashboard')
                        ->with('content', $categry_content);
    }

    public function save_category(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        // $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = (DB::raw('CURRENT_TIMESTAMP'));

        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Category Information Save Successfully');
        return Redirect::to('manage-category');
    }

    public function manage_category() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $category_info = DB::table('tbl_category')->get();
        $manage_category_content = view('admin.pages.manage_category')->with('all_category_info', $category_info);
        return view('admin.dashboard')
                        ->with('content', $manage_category_content);
    }

    public function published_category($category_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update(['publication_status' => 1]);
        Session::put('message', 'Publication Status Changed Published Successfully');
        return Redirect::to('/manage-category');
    }

    public function unpublished_category($category_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update(['publication_status' => 0]);
        Session::put('message', 'Publication Status Changed Unpublished Successfully');
        return Redirect::to('/manage-category');
    }

    public function edit_category($category_id) {
        $category_info = DB::table('tbl_category')->where('category_id', $category_id)->first();
        $edit_category_content = view('admin.pages.edit_category')->with('category_info', $category_info);
        return view('admin.dashboard')
                        ->with('content', $edit_category_content);
    }

    public function update_category(Request $request) {
        $category_id = $request->category_id;
        $data = array();
        $data['category_name'] = $request->category_name;
        // $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        Session::put('message', 'Category Info Updated Successfully');
        return Redirect::to('/manage-category');
    }

    public function delete_category($category_id) {
        DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::put('message', 'Category Info Deleted Successfully');
        return Redirect::to('/manage-category');
    }

    /*
     *   Category Management end
     */


    /*
     *   Sub Category Management start
     */

    public function add_sub_category() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $sub_category_content = view('admin.pages.add_sub_category');
        return view('admin.dashboard')
                        ->with('content', $sub_category_content);
    }

    public function save_sub_category(Request $request) {
        $data = array();
        $data['sub_category_name'] = $request->sub_category_name;
        $data['category_id'] = $request->category_id;
        // $data['sub_category_description'] = $request->sub_category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = (DB::raw('CURRENT_TIMESTAMP'));

        DB::table('tbl_sub_category')->insert($data);
        Session::put('message', 'Sub Category Information Save Successfully');
        return Redirect::to('manage-sub-category');
    }

    public function manage_sub_category() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $sub_category_info = DB::table('tbl_sub_category')->get();
        $category_info = DB::table('tbl_category')->get();

        $manage_sub_category_content = view('admin.pages.manage_sub_category')
                ->with('all_sub_category_info', $sub_category_info)
                ->with('all_category_info', $category_info);

        return view('admin.dashboard')
                        ->with('content', $manage_sub_category_content);
    }

    public function published_sub_category($sub_category_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_sub_category')
                ->where('sub_category_id', $sub_category_id)
                ->update(['publication_status' => 1]);
        Session::put('message', 'Publication Status Changed Published Successfully');
        return Redirect::to('/manage-sub-category');
    }

    public function unpublished_sub_category($sub_category_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_sub_category')
                ->where('sub_category_id', $sub_category_id)
                ->update(['publication_status' => 0]);
        Session::put('message', 'Publication Status Changed Unpublished Successfully');
        return Redirect::to('/manage-sub-category');
    }

    public function edit_sub_category($sub_category_id) {
        $sub_category_info = DB::table('tbl_sub_category')->where('sub_category_id', $sub_category_id)->first();
        $edit_sub_category_content = view('admin.pages.edit_sub_category')->with('sub_category_info', $sub_category_info);
        return view('admin.dashboard')
                        ->with('content', $edit_sub_category_content);
    }

    public function update_sub_category(Request $request) {
        $sub_category_id = $request->sub_category_id;
        $data = array();
        $data['sub_category_name'] = $request->sub_category_name;
        $data['category_id'] = $request->category_id;
        // $data['sub_category_description'] = $request->sub_category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_sub_category')
                ->where('sub_category_id', $sub_category_id)
                ->update($data);
        Session::put('message', ' Sub Category Info Updated Successfully');
        return Redirect::to('/manage-sub-category');
    }

    public function delete_sub_category($sub_category_id) {
        DB::table('tbl_sub_category')->where('sub_category_id', $sub_category_id)->delete();
        Session::put('message', 'Sub Category Info Deleted Successfully');
        return Redirect::to('/manage-sub-category');
    }

    /*
     *   Sub Category Management end
     */



    /*
     *   Merchant Management start
     */

    public function add_merchant() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $merchant_content = view('admin.pages.add_merchant');
        return view('admin.dashboard')
                        ->with('content', $merchant_content);
    }

    public function save_merchant(Request $request) {

        $data = array();
        $data['merchant_name'] = $request->merchant_name;
        $data['merchant_type'] = $request->merchant_type;
        $data['merchant_services'] = $request->merchant_services;
        $data['m_profile_pic'] = $request->m_profile_pic;
        $data['m_banner_pic'] = $request->m_banner_pic;
        // $data['merchant_description'] = $request->merchant_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = (DB::raw('CURRENT_TIMESTAMP'));

        // echo "<pre>";
        // print_r($data);
        // exit();

        /*
         * Image Upload start
         */
        $m_profile_pic = $request->file('m_profile_pic');

        if ($m_profile_pic) {
            $m_profile_pic_name = str_random(20);
            $ext = strtolower($m_profile_pic->getClientOriginalExtension());
            $m_profile_pic_full_name = $m_profile_pic_name . '.' . $ext;
            $upload_path = 'public/merchant_images/profile/';
            $m_profile_pic_url = $upload_path . $m_profile_pic_full_name;
            $success_profile = $m_profile_pic->move($upload_path, $m_profile_pic_full_name);

            $m_banner_pic = $request->file('m_banner_pic');
            if ($m_banner_pic) {
                $m_banner_pic_name = str_random(20);
                $ext = strtolower($m_banner_pic->getClientOriginalExtension());
                $m_banner_pic_full_name = $m_banner_pic_name . '.' . $ext;
                $upload_path = 'public/merchant_images/banner/';
                $m_banner_pic_url = $upload_path . $m_banner_pic_full_name;
                $success_banner = $m_banner_pic->move($upload_path, $m_banner_pic_full_name);

                    // echo "<pre>";
                    // echo "here</br>";
                    // print_r($m_banner_pic_url);
                    // exit();

                    if ($success_profile && $success_banner) {

                        // echo "<pre>";
                        // echo "success</br>";
                        // print_r($m_banner_pic_url);
                        // exit();

                        $data['m_profile_pic'] = $m_profile_pic_url;
                        $data['m_banner_pic'] = $m_banner_pic_url;

                        DB::table('tbl_merchant')->insert($data);
                        Session::put('message', 'Merchant Information Save Successfully!');
                        return Redirect::to('/manage-merchant');
                    }
                }
                }
                 else {
                        // echo "<pre>";
                        // echo "else";
                        // print_r($image);
                        // exit();
                    // Save data without picture

                    DB::table('tbl_merchant')->insert($data);
                    Session::put('message', 'Merchant Information Save Successfully!');
                    return Redirect::to('/manage-merchant');
                }
                /*
                 * Image Upload End
                 */

                DB::table('tbl_merchant')->insert($data);
                Session::put('message', 'Merchant Information Save Successfully');
                return Redirect::to('manage-merchant');
    }

    public function manage_merchant() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $merchant_info = DB::table('tbl_merchant')->get();
        $manage_merchant_content = view('admin.pages.manage_merchant')->with('all_merchant_info', $merchant_info);
        return view('admin.dashboard')
                        ->with('content', $manage_merchant_content);
    }

    public function published_merchant($merchant_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_merchant')
                ->where('merchant_id', $merchant_id)
                ->update(['publication_status' => 1]);
        Session::put('message', 'Publication Status Changed Published Successfully');
        return Redirect::to('/manage-merchant');
    }

    public function unpublished_merchant($merchant_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_merchant')
                ->where('merchant_id', $merchant_id)
                ->update(['publication_status' => 0]);
        Session::put('message', 'Publication Status Changed Unpublished Successfully');
        return Redirect::to('/manage-merchant');
    }

    public function edit_merchant($merchant_id) {
        $merchant_info = DB::table('tbl_merchant')->where('merchant_id', $merchant_id)->first();
        $edit_merchant_content = view('admin.pages.edit_merchant')->with('merchant_info', $merchant_info);
        return view('admin.dashboard')
                        ->with('content', $edit_merchant_content);
    }

    public function update_merchant(Request $request) {
        $merchant_id = $request->merchant_id;
        $data = array();
        $data['merchant_name'] = $request->merchant_name;
        $data['merchant_type'] = $request->merchant_type;
        $data['merchant_services'] = $request->merchant_services;
        // $data['m_profile_pic'] = $request->m_profile_pic;
        // $data['m_banner_pic'] = $request->m_banner_pic;
        // $data['merchant_description'] = $request->merchant_description;
        $data['publication_status'] = $request->publication_status;

        // echo "<pre>";
        // print_r($data);
        // exit();
        
        DB::table('tbl_merchant')
                ->where('merchant_id', $merchant_id)
                ->update($data);
        Session::put('message', 'Merchant info Updated Successfully');
        return Redirect::to('/manage-merchant');
    }

    public function delete_merchant($merchant_id) {
        DB::table('tbl_merchant')->where('merchant_id', $merchant_id)->delete();
        Session::put('message', 'Merchant info Deleted Successfully');
        return Redirect::to('/manage-merchant');
    }

    /*
     *   Merchant Management end
     */


    /*
     *   Product Management start
     */

    public function add_product() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();

        $published_sub_category = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();

        $published_merchant = DB::table('tbl_merchant')
                ->where('publication_status', 1)
                ->get();

        $product_content = view('admin.pages.add_product')
                ->with('published_category', $published_category)
                ->with('published_sub_category', $published_sub_category)
                ->with('published_merchant', $published_merchant);

        return view('admin.dashboard')
                        ->with('content', $product_content);
    }

    public function save_product(Request $request) {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['merchant_id'] = $request->merchant_id;
        $data['product_price'] = $request->product_price;
        $data['product_old_price'] = $request->product_old_price;
        $data['is_slider'] = $request->is_slider;
        $data['is_recommended'] = $request->is_recommended;
        $data['product_description'] = $request->product_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = (DB::raw('CURRENT_TIMESTAMP'));

//        echo '<pre>';
//        print_r($data);
//        exit();

        /*
         * Image Upload start
         */
        $image = $request->file('product_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/product_images/';
            $image_ulr = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_ulr;
                DB::table('tbl_product')->insert($data);
                Session::put('message', 'product Information Save Successfully!');
                return Redirect::to('/manage-product');
            }
        } else {
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'product Information Save Successfully!');
            return Redirect::to('/manage-product');
        }
        /*
         * Image Upload End
         */
    }

    public function manage_product() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $product_info = DB::table('tbl_product')->get();

        $published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();

        $all_sub_category = DB::table('tbl_sub_category')
//                ->where('publication_status', 1)
                ->get();
        
//        echo '<pre>';
//        print_r($published_sub_category);
//        exit();

        $published_merchant = DB::table('tbl_merchant')
                ->where('publication_status', 1)
                ->get();

        $manage_product_content = view('admin.pages.manage_product')
                ->with('all_product_info', $product_info)
                ->with('all_published_category', $published_category)
                ->with('all_sub_category', $all_sub_category)
                ->with('all_published_merchant', $published_merchant);

        return view('admin.dashboard')
                        ->with('content', $manage_product_content);
    }

    public function published_product($product_id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }
        DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update(['publication_status' => 1]);

        Session::put('message', 'Publication Status Changed Published Successfully');
        return Redirect::to('/manage-product');
    }

    public function unpublished_product($product_id) {
        $admin_id = Session::get('admin_id');

        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update(['publication_status' => 0]);

        Session::put('message', 'Publication Status Changed Unpublished Successfully');
        return Redirect::to('/manage-product');
    }

    public function edit_product($product_id) {

        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();

        $published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();

        $published_sub_category = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();

        $published_merchant = DB::table('tbl_merchant')
                ->where('publication_status', 1)
                ->get();

        $edit_product_content = view('admin.pages.edit_product')
                ->with('all_product_info', $product_info)
                ->with('published_category', $published_category)
                ->with('published_sub_category', $published_sub_category)
                ->with('published_merchant', $published_merchant);

        return view('admin.dashboard')
                        ->with('content', $edit_product_content);
    }

    public function view_product($product_id) {

        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();

        $published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();

        $all_sub_category = DB::table('tbl_sub_category')
//                ->where('publication_status', 1)
                ->get();

        $published_merchant = DB::table('tbl_merchant')
                ->where('publication_status', 1)
                ->get();

        $view_product_content = view('admin.pages.view_product')
                ->with('all_product_info', $product_info)
                ->with('published_category', $published_category)
                ->with('all_sub_category', $all_sub_category)
                ->with('published_merchant', $published_merchant);

        return view('admin.dashboard')
                        ->with('content', $view_product_content);
    }

    public function update_product(Request $request) {
        $product_id = $request->product_id;
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['merchant_id'] = $request->merchant_id;
        $data['product_price'] = $request->product_price;
        $data['product_old_price'] = $request->product_old_price;
        $data['is_slider'] = $request->is_slider;
        $data['is_recommended'] = $request->is_recommended;
        $data['product_description'] = $request->product_description;
        $data['publication_status'] = $request->publication_status;

//         echo "<pre>";
//         print_r($data);
//         exit();

        DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update($data);

        Session::put('message', 'product Updated Successfully');
        return Redirect::to('/manage-product');
    }

    public function delete_product($product_id) {

        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'product Deleted Successfully');

        return Redirect::to('/manage-product');
    }

    // This is for Picture Change
    public function change_picture($product_id) {

        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return Redirect::to('/admin-panel')->send();
        }

        $view_product_content = "<h1> Picture Changed </h1>";
        return view('admin.dashboard')
                        ->with('content', $view_product_content);
    }

    /*
     *   Product Management end
     */

    /*
     *   Logout start
     */

    public function logout() {
        Session::put('admin_id', null);
        Session::put('admin_name', null);
        Session::put('message', 'You are successfully logged out!');
        return Redirect::to('/admin-panel');
    }

    /*
     *   Logout start
     */

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
