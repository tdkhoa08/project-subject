@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm </span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container" style="margin-top:-50px">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="frontend/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$sanpham->name}}</p>
                            <p class="single-item-price" style="font-size:18px">
                                @if($sanpham->promotion_price==0)
                                    <span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
                                @else
                                    <span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
                                    <span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
                                @endif
                            </p>
                            <div class="space10">&nbsp;</div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$sanpham->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                            <p>Đơn vị tính</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>ĐVT</option>
                                <option value="hộp" {{$sanpham->unit=="hộp"? "selected":""}}>hộp</option>
                                <option value="cái" {{$sanpham->unit=="cái"? "selected":""}}>cái</option>
                            </select>
                            <a class="add-to-cart" href="them-vao-gio-hang/{{$sanpham->id}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Đánh giá (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>Không đánh giá</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>

                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="row">
                    @foreach($sp_tuongtu as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                            @if($sptt->promotion_price!=0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                            @endif
                                <div class="single-item-header">
                                    <a href="chitiet-sanpham/{{$sptt->id}}">
                                        <img src="frontend/image/product/{{$sptt->image}}" height="250" alt="{{$sptt->image}}">
                                    </a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price" style="font-size:18px">
                                        @if($sptt->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
                                        @else
                                            <span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
                                            <span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
                                        @endif
                                    </p>
                                    <div class="space10">&nbsp;</div>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="them-vao-gio-hang/{{$sptt->id}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="chitiet-sanpham/{{$sptt->id}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row" align="center">{{$sp_tuongtu->links()}}</div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sp_banchay as $spbc)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('detailproduct', $spbc->id_product)}}">
                                    <img src="frontend/image/product/{{$spbc->Product->image}}" 
                                    alt=""></a>
                                <div class="media-body" style="font-size:15px;">
                                
                                {{$spbc->Product->name}}</br>
                                    @if($spbc->Product->promotion_price==0)
                                        <span class="beta-sales-price" style="font-size:15px;">{{number_format($spbc->Product->unit_price)}} đồng</span>
                                    @else
                                        <span class="flash-del" style="font-size:15px;">{{number_format($spbc->Product->unit_price)}} đồng</span>
                                        <span class="beta-sales-price" style="font-size:15px;">{{number_format($spbc->Product->promotion_price)}} đồng</span>
                                    @endif
                                
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sp_moi as $moi)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="chitiet-sanpham/{{$moi->id}}">
                                    <img src="frontend/image/product/{{$moi->image}}" alt="{{$moi->image}}"></a>
                                <div class="media-body" style="font-size:15px;">
                                    {{$moi->name}}</br>
                                    <span class="beta-sales-price" style="font-size:15px;">{{number_format($moi->unit_price)}} đồng</span>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection