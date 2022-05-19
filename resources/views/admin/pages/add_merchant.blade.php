
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
            <li><a href="{{URL::to('/manage-merchant')}}"> Manage Merchant </a></li>
        </ul>

        <div class="col-md-12 compose-right">
            <div class="form-group">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Add Merchant
                    </div>
                    <div class="inbox-details-body">
                        <!-- <div class="alert alert-danger">
                            <h4 class="text-center">Please fill details to add a new Merchant</h4>
                        </div> -->
                        {!! Form::open(['url' => '/save-merchant', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'com-mail']) !!}
                        Merchant Name: <input  type="text"  placeholder=" Enter Merchant Name " name="merchant_name" required="required" >
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
                        Merchant Services: <textarea rows="6" name="merchant_services" required="required"></textarea>
                            <br/><br/>

                        <div class="control-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Merchant Profile Picture</label>
                            <div class="form" style="float: left">
                                <input type="file" name="m_profile_pic" id="focusedInput" class="input-xlarge focused">
                            </div>Picture Resolution 180X180 px
                        </div>
                            <br/><br/>

                        <div class="control-group">
                            <label class="form" for="selectError3"  style="float: left; margin-right: 20px;"> Merchant Banner Image</label>
                            <div class="form" style="float: left">
                                <input type="file" name="m_banner_pic" id="focusedInput" class="input-xlarge focused">
                            </div>Picture Resolution 640X280 px
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
