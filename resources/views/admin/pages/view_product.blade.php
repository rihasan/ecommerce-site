
@extends('admin.dashboard')
@section('content')

<div class="col-md-12 compose-right">
    <div class="inner-block">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a>
                <i class="icon-angle-right"></i> 
            </li>
            <li>
                <i class="icon-edit"></i>
                <a href="{{URL::to('/manage-product')}}"> Manage Product </a> 
            </li>
        </ul>

        <div class="row-fluid sortable">        
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span> View Product Details</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <tr>
                            <td>Product Id</td>
                            <td>{{$all_product_info->product_id}}</td>
                        </tr>                   
                        <tr>
                            <td>Product Name</td>
                            <td>{{$all_product_info->product_name}}</td>
                        </tr>                   
                        <tr>
                            <td>Category Name</td>
                            <td>
                                @foreach( $published_category as $category)
                                @if($all_product_info->category_id == $category->category_id)
                                {{$category->category_name}}
                                @endif
                                @endforeach
                            </td>
                        </tr> 
                        <tr>
                            <td>Sub Category Name</td>
                            <td>
                                @foreach( $all_sub_category as $sub_category)
                                @if($all_product_info->sub_category_id == $sub_category->sub_category_id)
                                {{$sub_category->sub_category_name}}
                                @endif
                                @endforeach
                            </td>
                        </tr>                   
                        <tr>
                            <td>Merchant Name</td>
                            <td>
                                <?php
                                foreach ($published_merchant as $merchant) {

                                    if ($all_product_info->merchant_id == $merchant->merchant_id) {
                                        echo $merchant->merchant_name;
                                    }
                                }
                                ?>
                            </td>
                        </tr>                  
                        <tr>
                            <td>Product Is Slider</td>
                            <td>@if($all_product_info->is_slider == 0)<?php echo "No"  ?> @else <?php echo "No"  ?> @endif</td>
                        </tr>                   
                        <tr>
                            <td>Product Is Recommended</td>
                            <td>@if($all_product_info->is_recommended == 0)<?php echo "No"  ?> @else <?php echo "No"  ?> @endif</td>
                        </tr>                   
                        <tr>
                            <td>product Description</td>
                            <td><?php echo $all_product_info->product_description; ?></td>
                        </tr>                   
                        <tr>
                            <td>product Image</td>
                            <td>
                                <table>
                                    <td> <?php
                                        // echo '<pre>';
                                        // print_r($all_product_info->product_image);
                                        // exit();

                                        if (file_exists($all_product_info->product_image)) {
                                            ?>
                                            <img src="{{URL::to('/'.$all_product_info->product_image)}}" alt="" width="150" height="150" >
                                        <?php } else { ?>
                                            <img src="{{asset('public/product_images/no-images.png')}}" class="Image-responsive" alt="" width="150" height="150" >
                                        <?php } ?></td>
                                    <td><a href="{{URL::to('/change-picture/')}}"> Change Picture </a></td>
                                </table>
                            </td>
                        </tr>                   
                        <tr>
                            <td>Publication Status</td>
                            <td>
                                <?php
                                if ($all_product_info->publication_status == 1) {
                                    echo "Published";
                                } else {
                                    echo "Unpublished";
                                }
                                ?>

                            </td>
                        </tr>                   
                    </table>     
                </div>
            </div><!--/span-->
        </div><!--/row-->
    </div>
</div>
@endsection