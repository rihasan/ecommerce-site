
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
            <li><a href="{{URL::to('/manage-sub-category')}}"> Manage Sub Category </a></li>
        </ul>

        <div class="col-md-12 compose-right">
            <div class="form-group">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Add New Sub Category
                    </div>
                    <div class="inbox-details-body">
                        <!-- <div class="alert alert-info">
                           <h4 class="text-center"> Please fill details to add a new Sub Category </h4>
                        </div> -->
                        {!! Form::open(['url' => '/save-sub-category', 'method' => 'post', 'class' => 'com-mail']) !!}
                        Sub Category Name: <input  type="text"  placeholder=" Sub Category Name " name="sub_category_name" required="required" >

                        <div class="form-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;">Under the Category </label>
                            <div class="form" style="float: left">
                                <!-- Here will be the select option code for Category selection -->
                                <?php
                                $all_published_category = DB::table('tbl_category')
                                        ->where('publication_status', 1)
                                        ->get();

                                // echo "<pre>";
                                // print_r($all_published_category);
                                // exit();
                                ?>
                                <select name="category_id" id="selectError3" required="required">
                                    @foreach($all_published_category as $category)
                                    <option value="{{$category->category_id}}"> {{$category->category_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br/><br/><br/>

                        <div class="form-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Publication Status </label>
                            <div class="form" style="float: left">
                                <select name="publication_status" id="selectError3" required="required">
                                    <option value="0"> Unpublished </option>
                                    <option value="1"> Published </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="float: right; margin-top: -30px;">
                            <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn" >Cancel</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>     
    </div>
</div>

@endsection
