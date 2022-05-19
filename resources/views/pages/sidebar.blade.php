
@section('sidebar')
<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php
        $category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();

        $subcategory = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();
        ?>

        @foreach ($category as $v_cat)

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$v_cat->category_id}}">
                        <?php echo $v_cat->category_name; ?>
                        <i class="badge pull-right @foreach($subcategory as $sub) @if($sub->category_id === $v_cat->category_id) fa fa-plus @endif @endforeach"></i>
                    </a>
                </h4>
            </div>
            <div id="{{$v_cat->category_id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        <li class="panel panel-title"><a href="{{URL::to('/flowers-category/'.$v_cat->category_name)}}">{{$v_cat->category_name}} Link </a></li>
                    </ul>
                    @foreach($subcategory as $sub) @if($sub->category_id === $v_cat->category_id) <?php if(print("<h5>SubCategory</h5>")) break;?> @endif @endforeach
                    <ul>
                        @foreach($subcategory as $sub)
                        @if ($sub->category_id === $v_cat->category_id)
                        <li><a href="{{URL::to('/flowers-sub-category/'.$sub->sub_category_name)}}">{{$sub->sub_category_name}}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--/category-productsr-->

    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name col-sm-12">
            <?php
            $merchant = DB::table('tbl_merchant')
                    ->where('publication_status', 1)
                    ->get();
           // echo '<pre>';
           // print_r($merchant);
           // exit();
            ?>
            <ul class="nav nav-pills nav-stacked dynamic">
                @foreach($merchant as $m)
                <?php
                $product_info = DB::table('tbl_product')
                ->join('tbl_merchant', 'tbl_merchant.merchant_id', '=', 'tbl_product.merchant_id')
                ->where('tbl_product.publication_status', 1)
                ->where('merchant_name', $m->merchant_name)
                ->select('tbl_product.*', 'tbl_merchant.merchant_name')
                ->get();

                    // echo "<pre>";
                    // print_r($product_info);
                    // exit();
                ?>
                <li class="brands_products"><span class="pull-left"> <a href="{{URL
                    ::to('/merchant-profile/'.$m->merchant_name)}}">{{$m->merchant_name}}</a></span>
                    <span class="pull-right"><a href="{{URL
                    ::to('product-by-merchant/'.$m->merchant_name)}}"> (@foreach($product_info as $p)<?php if(print($loop->count+1)) break; ?> @endforeach)</a></span>
                </li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->


    <div class="price-range col-sm-12"><!--price-range-->
        <h2>Price Range Search</h2>
        <div class="row col-sm-12">
         {!! Form::open(['url' => '/price-range-search', 'method' => 'post', 'name' => 'myform', 'class' => 'price-range col-sm-12',]) !!}  

            <input type="text"  name="price_range" class="span2" value="10500,30500" data-slider-min="1000" data-slider-max="50000" data-slider-step="5" data-slider-value="[10500,30500]" id="price_range" ><br />
            <b>৳ 1000</b> <b class="pull-right">৳ 50000</b>
            <script type="text/javascript">
                $(document).ready(function(){
                    const slider = $('#price_range').slider({
                      formatter: function(value) {
                        return 'Current value: ' + value;
                      }
                    });

                    slider.on('slideStop', function(e) {
                        console.log('value = ' + e.value);
                    });
                });
            </script>
             <div class="text-center">
                 <button type="button" class="btn btn-default get" ><input type="submit" name="btn" value="Search"></button>
             </div>
            {!! Form::close() !!}
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="{{URL::to('/public/images/home/shipping.jpg')}}" alt="" />
    </div><!--/shipping-->

</div>
@endsection
