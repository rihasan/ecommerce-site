
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
            <li><a href="{{URL::to('/add-category')}}"> Add Category </a></li>
        </ul>

        <div class="row-fluid sortable">
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

            <div class="box span12">
                <div class="box-header" data-original-title>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable ">
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>Publication Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>   
                            <tbody>
                                @foreach($all_category_info as $category_info)
                                <tr>
                                    <td>{{$category_info->category_id}}</td>
                                    <td class="center">{{$category_info->category_name}}</td>
                                    <td class="center">
                                        <?php if ($category_info->publication_status == 0) { ?>
                                            <span class="label label-danger">Unpublished</span>
<?php } else { ?>
                                            <span class="label label-success">Published</span>
                                        <?php } ?>
                                    </td>

                                    <td class="center">
                                        <?php if ($category_info->publication_status == 0) { ?>
                                            <a class="btn btn-success" href="{{URL::to('/published-category/'.$category_info->category_id)}}" title="Published">
                                                <i class="glyphicon glyphicon-arrow-up"></i>  
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-danger" href="{{URL::to('/unpublished-category/'.$category_info->category_id)}}" title="UnPublished">
                                                <i class="glyphicon glyphicon-arrow-down"></i>  
                                            </a>
                                        <?php } ?>
                                        <a class="btn btn-success" href="{{URL::to('/edit-category/'.$category_info->category_id)}}" title="Edit">
                                            <i class="glyphicon glyphicon-edit"></i>  
                                        </a>
                                        <?php
                                        $access_label = Session::get('access_label');
                                        if ($access_label == 1) {
                                            ?>
                                            <a class="btn btn-danger" href="{{URL::to('/delete-category/'.$category_info->category_id)}}" title="Delete?" onclick="return check_delete();" >
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 
                                            </a>
<?php } ?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/row-->
</div>

@endsection