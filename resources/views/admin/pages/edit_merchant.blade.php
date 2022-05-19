

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
            <li><a href="{{URL::to('/manage-merchant')}}"> Manage Merchant </a></li>
        </ul>

        <div class="form-group">
            <div class="inbox-details-default">
                <div class="inbox-details-heading">
                    Edit Merchant
                </div>
                <div class="inbox-details-body">
                    <!-- <div class="alert alert-info">
                        Please re-check details for Updating Merchant
                    </div> -->
                    {!! Form::open(['url' => '/update-merchant', 'method' => 'post', 'class' => 'com-mail', 'name' => 'edit_merchant']) !!}

                    <fieldset>
                        <input class="input-xlarge focused" name="merchant_id" id="focusedInput" type="hidden"  value="{{$merchant_info->merchant_id}}">

                        Merchant Name: <input  type="text" name="merchant_name" type="text" value="{{$merchant_info->merchant_name}}">
                        <div class="control-group">
                                <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Merchant Type </label>
                                <div class="form" style="float: left;">
                                    <select name="merchant_type" id="merchant_type" required="required">
                                        <option>Choose Merchant Type</option>
                                        <option value="0">Normal Merchant</option>
                                        <option value="1">Booster Merchant</option>
                                        <option value="2">Super Booster Merchant</option>
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                        Merchant Services: <textarea rows="6" name="merchant_services" required="required">{{$merchant_info->merchant_services}}</textarea>
                            <br/><br/>
                         <div class="control-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Merchant Profile Picture</label>
                            <div class="form" style="float: left">
                                <img src="{{URL::to('/'.$merchant_info->m_profile_pic)}}" width="80px" height="80px">
                                <input type="file" name="m_profile_pic" id="focusedInput" class="input-xlarge focused">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Merchant Banner Image</label>
                            <div class="form" style="float: left">
                                <img src="{{URL::to('/'.$merchant_info->m_banner_pic)}}" width="180px" height="80px">
                                <input type="file" name="m_banner_pic" id="focusedInput" class="input-xlarge focused">
                            </div>
                        </div>
                            <br/><br/>
                            <br/><br/>
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
                        <div class="form-group" style="float: right; margin-top: -10px;">
                            <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn" >Cancel</button>
                        </div>
                    </fieldset>
                    {!! Form::close() !!}
                </div>
                <script type="text/javascript">
                    document.forms['edit_merchant'].elements['publication_status'].value = '<?php echo $merchant_info->publication_status ?>'
                </script> 
                <script type="text/javascript">
                    document.forms['edit_merchant'].elements['merchant_type'].value = '<?php echo $merchant_info->merchant_type ?>'
                 </script> 

            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection