
@extends('admin.dashboard')
@section('content')

<div class="container">
    <div class="inner-block">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="{{URL::to('/add-product')}}"> Add Product </a></li>
        </ul>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered bootstrap-datatable datatable ">
                    <center>
                        <?php
                        $message = Session::get('message');
                        if (isset($message)) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h2 style="color: green;"> <?php
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </h2>
                        </div>
                    </center>

                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Merchant Name</th>
                            <th>IS Slider?</th>
                            <th>Is Feature?</th>
                            <th>Publication Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($all_product_info as $product_info)
                        <tr>
                            <td class="center">{{$product_info->product_id}}</td>
                            <td class="center">{{$product_info->product_name}}</td>
                            <td class="center">
                                @foreach($all_published_category as $category_info)
                                <?php
                                if ($product_info->category_id == $category_info->category_id) {
                                    echo $category_info->category_name;
                                }
                                ?>
                                @endforeach
                            </td>
                            <td class="center">
                                @foreach($all_sub_category as $sub_category_info)
                                @if($product_info->sub_category_id == $sub_category_info->sub_category_id)
                                {{$sub_category_info->sub_category_name}}
                                @endif
                                @endforeach
                            </td>
                            <td class="center">
                                @foreach ($all_published_merchant as $merchant_info)
                                <?php
                                if ($product_info->merchant_id == $merchant_info->merchant_id) {
                                    echo $merchant_info->merchant_name;
                                }
                                ?>
                                @endforeach
                            </td>
                            <td class="center">
                                @if($product_info->is_slider == 0)<?php echo "No" ?> @else <?php echo "Yes" ?> @endif
                            </td>
                            <td class="center">
                                @if($product_info->is_recommended == 0)<?php echo "No" ?> @else <?php echo "Yes" ?> @endif
                            </td>
                            <td class="center">
                                <?php if ($product_info->publication_status == 0) { ?>
                                    <span class="label label-danger">Unpublished</span>
                                <?php } else { ?>
                                    <span class="label label-success">Published</span>
                                <?php } ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="{{URL::to('/view-product/'.$product_info->product_id)}}" title="View Product">
                                    <i class="glyphicon glyphicon-zoom-in white"></i>  
                                </a>
                                <?php if ($product_info->publication_status == 0) { ?>
                                    <a class="btn btn-success" href="{{URL::to('/published-product/'.$product_info->product_id)}}" title="Unpublished">
                                        <i class="glyphicon glyphicon-arrow-up"></i>  
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="{{URL::to('/unpublished-product/'.$product_info->product_id)}}" title="Published">
                                        <i class="glyphicon glyphicon-arrow-down"></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="{{URL::to('/edit-product/'.$product_info->product_id)}}" title="Edit product">
                                    <i class="glyphicon glyphicon-edit"></i>  
                                </a>

                                <?php
                                $access_label = Session::get('access_label');
                                if ($access_label == 1) {
                                    ?>
                                    <a class="btn btn-danger" onclick="return confirm('Are You Sure To Delete?')" href="{{URL::to('/delete-product/'.$product_info->product_id)}}" onclick = "return confirm_delete()" title="Delete" >
                                        <i class="glyphicon glyphicon-trash"></i> 
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div><!--/row-->
</div>

@endsection
