@extends("admin.layout")
@section("content")
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Thông Tin
                    <small>{{$sanpham->name}}</small>
                </h1>
            </div>
<!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}} <br/>
                        @endforeach
                    </div>
                @endif
                @if(Session::has("thongbao"))
                    <div class="alert alert-success">{{Session::get("thongbao")}}</div>
                @endif

                <form action="admin/suasp/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input class="form-control" name="name" value="{{$sanpham->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá Gốc</label>
                        <input class="form-control" name="unit_price" value="{{$sanpham->unit_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá Khuyến Mãi</label>
                        <input class="form-control" name="promotion_price" value="{{$sanpham->promotion_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea class="form-control" rows="4" name="description">{{$sanpham->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p>
                            <img src="frontend/image/product/{{$sanpham->image}}" height="250px" alt="{{$sanpham->image}}"/>
                        </p>
                        <input type="file" class="form-control" name="image" />
                    </div>

                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                <form>
            </div>
        </div>
<!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection