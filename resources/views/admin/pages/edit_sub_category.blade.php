

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
            <li><a href="{{URL::to('/manage-sub-category')}}"> Manage Sub Category </a></li>
        </ul>

        <div class="form-group">
            <div class="inbox-details-default">
                <div class="inbox-details-heading">
                    Edit Sub Category
                </div>
                <div class="inbox-details-body">
                    <!--  <div class="alert alert-info">
                         <h4 class="text-center">Please re-check details for Updating Sub Category</h4>
                     </div> -->
                    {!! Form::open(['url' => '/update-sub-category', 'method' => 'post', 'class' => 'com-mail', 'name' => 'edit_sub_category']) !!}

                    <fieldset>
                        <input class="input-xlarge focused" name="sub_category_id" id="focusedInput" type="hidden"  value="{{$sub_category_info->sub_category_id}}">

                        Sub Category Name: <input  type="text" name="sub_category_name" type="text" value="{{$sub_category_info->sub_category_name}}">
                        <div class="form-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;">Under the Category </label>

                            <select name="category_id" id="selectError3" required="required">
                                <?php
                                $all_published_category = DB::table('tbl_category')
                                        ->where('publication_status', 1)
                                        ->get();

                                // echo "<pre>";
                                // print_r($all_published_category);
                                // exit();
                                ?>
                                @foreach($all_published_category as $category)
                                @if($sub_category_info->category_id == $category->category_id)
                                <option selected="selected" value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @else
                                <option value="{{$category->category_id}}"> {{$category->category_name}} </option>
                                @endif
                                @endforeach
                            </select>                            
                        </div>

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
            </div>
        </div>
        <script type="text/javascript">
            document.forms['edit_sub_category'].elements['publication_status'].value = '<?php echo $sub_category_info->publication_status ?>'
        </script> 
    </div>
</div>

@endsection