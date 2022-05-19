

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
            <li><a href="{{URL::to('/manage-category')}}"> Manage Category </a></li>
        </ul>

        <div class="form-group">
            <div class="inbox-details-default">
                <div class="inbox-details-heading">
                    Edit Category
                </div>
                <div class="inbox-details-body">
                    <!-- <div class="alert alert-info">
                        Please re-check details for Updating Category
                    </div> -->
                    {!! Form::open(['url' => '/update-category', 'method' => 'post', 'class' => 'com-mail', 'name' => 'edit_category']) !!}

                    <fieldset>
                        <input class="input-xlarge focused" name="category_id" id="focusedInput" type="hidden"  value="{{$category_info->category_id}}">

                        Category Name: <input  type="text" name="category_name" type="text" value="{{$category_info->category_name}}">

                        <div class="form-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Publication Status </label>
                            <div class="form" style="float: left">
                                <select name="publication_status" id="selectError3" required="required">
                                    <option value="0"> Unpublished </option>
                                    <option value="1"> Published </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="float: right; margin-top: -10px;">
                            <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn" >Cancel</button>
                        </div>
                    </fieldset>
                    {!! Form::close() !!}
                </div>
                <script type="text/javascript">
                    document.forms['edit_category'].elements['publication_status'].value = '<?php echo $category_info->publication_status ?>'
                </script> 

            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection