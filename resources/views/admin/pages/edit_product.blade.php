
@extends('admin.dashboard')
@section('content')

<div class="inner-block">
    <div class="inbox">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="{{URL::to('/manage-product')}}"> Manage Product </a></li>
        </ul>

        <div class="col-md-12 compose-right">

            <div class="form-group">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Edit Product
                    </div>
                    <div class="inbox-details-body">
                        <!-- <div class="alert alert-info">
                            Please re-check details for Updating Product
                        </div> -->
                        {!! Form::open(['url' => '/update-product', 'method' => 'post', 'name' => 'edit_to_update_product', 'class' => 'com-mail']) !!}
                        <fieldset>
                            <input name="product_id" id="focusedInput" class="input-xlarge focused" type="hidden" value="{{$all_product_info->product_id}}" >
                            Product Name: <input  type="text"  value="{{$all_product_info->product_name}}"  name="product_name" required="required" >
                            <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Category Name</label>
                                <div class="form" style="float: left;">
                                    <select name="category_id" id="category_id" required="required">
                                        @foreach($published_category as $category)
                                        @if($all_product_info->category_id == $category->category_id)
                                        <option selected="selected" value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endif
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/><br/>  
                            <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Sub Category Name</label>
                                <div class="form" style="float: left;">
                                    <select name="sub_category_id" id="sub_category_id" required="required">
                                        @foreach($published_sub_category as $sub_category)
                                        @if($all_product_info->sub_category_id == $sub_category->sub_category_id)
                                        <option selected="selected" value="{{$sub_category->sub_category_id}}">{{$sub_category->sub_category_name}}</option>
                                        @endif
                                        <option value="{{$sub_category->sub_category_id}}">{{$sub_category->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Merchant Name</label>
                                <div class="form" style="float: left;">
                                    <select name="merchant_id" id="selectError3" required="required">
                                        @foreach($published_merchant as $merchant)
                                        @if($all_product_info->merchant_id == $merchant->merchant_id)
                                        <option selected="selected" value="{{$merchant->merchant_id}}"> {{$merchant->merchant_name}}</option>
                                        @endif
                                        <option value="{{$merchant->merchant_id}}"> {{$merchant->merchant_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                            Product Price: <input  type="text"  name="product_price" value="{{$all_product_info->product_price}}">
                            Product Old Price: <input  type="text"  name="product_old_price" value="{{$all_product_info->product_old_price}}">
                            <label> Product Is Slider ? </label>
                            <div class="readability">
                                <style>#radioBtn .notActive{
                                        color: #3276b1;
                                        background-color: #fff;
                                    }</style>
                                @if($all_product_info->is_slider == 0)
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_slider" value="0" checked> No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_slider" value="1">Yes
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_slider" value="0" > No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_slider" value="1"checked >Yes
                                </label>
                                @endif
                            </div></br>
                            <label> Product Is Recommended ? </label>
                            <div class="readability">
                                <style>#radioBtn .notActive{
                                        color: #3276b1;
                                        background-color: #fff;
                                    }</style>
                                @if($all_product_info->is_recommended == 0)
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_recommended" value="0" checked> No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_recommended" value="1">Yes
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_recommended" value="0" > No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_recommended" value="1" checked >Yes
                                </label>
                                @endif
                            </div></br>
                            Product Description: <textarea rows="6" name="product_description">{{$all_product_info->product_description}}</textarea>
                            <br/><br/>

                            <!-- This is for upload images -->

                            <!--  <div class="control-group">
                             <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> product Image</label>
                             <div class="form" style="float: left">
                                 <input type="file" name="product_image" id="focusedInput" class="input-xlarge focused">
                             </div>
                             </div> -->
                            <!-- This is for upload images -->

                            <!-- This is for viewing images -->
                            <!--  <?php
                            //                        echo '<pre>';
                            //                        print_r($all_product_info->product_image);
                            //                        exit();

                            if (file_exists($all_product_info->product_image)) {
                                ?>
                                                                <img src="{{URL::to('/'.$all_product_info->product_image)}}" alt="" width="150" height="150" >
                            <?php } else { ?>
                                                                                 <img src="{{asset('public/product_images/noimages.jpg')}}" alt="" width="150" height="150" >
                            <?php } ?> -->
                            <!-- This is for viewing images -->

                            <br/><br/>
                            <div class="form-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Publication Status </label>
                                <div class="form" style="float: left">
                                    <select name="publication_status" id="selectError3" required="required">
                                        <option value="0"> Unpublished </option>
                                        <option value="1"> Published </option>
                                    </select>
                                </div>
                            </div>

                            <br/><br/>

                            <div class="form-group" style="float: right; margin-top: -10px;">
                                <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
                                <button type="reset" class="btn" >Cancel</button>
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                document.forms['edit_to_update_product'].elements['publication_status'].value = '<?php echo $all_product_info->publication_status ?>'
            </script>    
        </div>

        <div class="clearfix"> </div>     
    </div>
</div>
@endsection



