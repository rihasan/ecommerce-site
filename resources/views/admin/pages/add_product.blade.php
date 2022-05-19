
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
                        Add New Product
                    </div>
                    <div class="inbox-details-body">
                        <!-- <div class="alert alert-info">
                            <h4 class="text-center">Please fill details to add a new Product</h4>
                        </div> -->
                        {!! Form::open(['url' => '/save-product', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'com-mail']) !!}
                        <fieldset>
                            Product Name: <input  type="text"  placeholder=" Add Product Name " name="product_name" required="required" >
                            <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Product Category </label>
                                <div class="form" style="float: left;">
                                    <select name="category_id" id="category_id" required="required">
                                        <option>Choose Product Category</option>
                                        @foreach($published_category as $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Product Sub Category </label>
                                <div class="form" style="float: left;">
                                    <select name="sub_category_id" id="sub_category_id" required="required">
                                        <option value="0">Choose Category First</option>
                                        @foreach($published_sub_category as $sub_category)
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
                                        <option>Choose Marchent </option>
                                        @foreach($published_merchant as $merchant)
                                        <option value="{{$merchant->merchant_id}}">{{$merchant->merchant_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                            Product Price: <input  type="text"  placeholder=" Add Product New Price " name="product_price" required="required" >
                            Product Old Price: <input  type="text"  placeholder=" Add Product Old Price " name="product_old_price" required="required" >
<!--                            <div class="form-group">
                                <style>#radioBtn .notActive{
                                        color: #3276b1;
                                        background-color: #fff;
                                    }</style>
                                <label for="is_recommended" class="control-group custom-control custom-radio"> Product Is Recommended?</label>
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="is_recommended" data-title="No">No</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="is_recommended" data-title="Yes">Yes</a>
                                    </div>
                                    <input type="hidden" name="is_recommended" id="is_recommended">
                                </div>
                                <script>$('#radioBtn a').on('click', function () {
                                        var sel = $(this).data('title');
                                        var tog = $(this).data('toggle');
                                        $('#' + tog).prop('value', sel);
                                        $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
                                        $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
                                    })</script>
                            </div><br />-->
                            <label> Product Is Slider ? </label>
                            <div class="readability">
                                <style>#radioBtn .notActive{
                                        color: #3276b1;
                                        background-color: #fff;
                                    }</style>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_slider" value="0" checked> No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_slider" value="1">Yes
                                </label>
                            </div></br>
                            <label> Product Is Recommended ? </label>
                            <div class="readability">
                                <style>#radioBtn .notActive{
                                        color: #3276b1;
                                        background-color: #fff;
                                    }</style>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_recommended" value="0" checked> No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" class="btn btn-primary btn-sm active" name="is_recommended" value="1">Yes
                                </label>
                            </div></br>
                            Product Description: <textarea rows="6" name="product_description" required="required"></textarea>
                            <br/><br/>
                            <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Product Image</label>
                                <div class="form" style="float: left">
                                    <input type="file" name="product_image" id="focusedInput" class="input-xlarge focused">
                                </div>
                            </div>
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
        </div>

        <div class="clearfix"> </div>     
    </div>
</div>
@endsection
