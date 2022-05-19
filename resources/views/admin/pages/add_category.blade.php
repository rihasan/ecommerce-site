
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
            <li><a href="{{URL::to('/manage-category')}}"> Manage Category </a></li>
        </ul>

        <div class="col-md-12 compose-right">
            <div class="form-group">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Add New Category
                    </div>
                    <div class="inbox-details-body">
                        <!-- <div class="alert alert-info">
                            <h4 class="text-center">Please fill details to add a new Category</h4>
                        </div> -->
                        {!! Form::open(['url' => '/save-category', 'method' => 'post', 'class' => 'com-mail']) !!}
                        Category Name: <input  type="text"  placeholder=" Category Name " name="category_name" required="required" >

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
