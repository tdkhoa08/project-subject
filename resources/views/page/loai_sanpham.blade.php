@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Loại {{$loai->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>{{$loai->name}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space10">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($danhsach_loai as $ds1)
                            <li><a href="loai-sanpham/{{$ds1->id}}">{{$ds1->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Danh sách sản phẩm thuộc loại {{$loai->name}}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sanpham_theoloai)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sanpham_theoloai as $sptl)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($sptl->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="chitiet-sanpham/{{$sptl->id}}"><img src="frontend/image/product/{{$sptl->image}}" 
                                        height="250" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sptl->name}}</p>
                                        <p class="single-item-price" style="font-size:18px">
                                            @if($sptl->promotion_price==0)
                                                <span class="flash-sale">{{number_format($sptl->unit_price)}} đồng</span>
                                            @else
                                                <span class="flash-del">{{number_format($sptl->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($sptl->promotion_price)}} đồng</span>
                                            @endif
                                        </p>
                                    <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="them-vao-gio-hang/{{$sptl->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="chitiet-sanpham/{{$sptl->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{$tong_spk}} sản phẩm </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sanpham_khac as $spk)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($spk->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="chitiet-sanpham/{{$spk->id}}"><img src="frontend/image/product/{{$spk->image}}" height="250" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spk->name}}</p>
                                        <p class="single-item-price" style="font-size:18px">
                                            @if($spk->promotion_price==0)
                                                <span class="flash-sale">{{number_format($spk->unit_price)}} đồng</span>
                                            @else
                                                <span class="flash-del">{{number_format($spk->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($spk->promotion_price)}} đồng</span>
                                            @endif
                                        </p>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                            </div>
                           @endforeach
                        </div>
                       <div class="row" align="center">{{$sanpham_khac->links()}}</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection