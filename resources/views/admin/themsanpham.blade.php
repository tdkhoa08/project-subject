@extends("admin.layout")
@section("content")
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Thêm Thông Tin</small>
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
                <form action="admin/themsp" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input class="form-control" name="name" placeholder="nhập tên sản phẩm.." />
                    </div>
                    <div class="form-group">
                        <label>Mã Loại</label>
                        <input class="form-control" name="id_type" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Giá Gốc</label>
                        <input class="form-control" name="unit_price" placeholder="nhập giá gốc.." />
                    </div>
                    <div class="form-group">
                        <label>Giá Khuyến Mãi</label>
                        <input class="form-control" name="promotion_price" placeholder="nhập giá khuyến mãi.." />
                    </div>
                    <div class="form-group">
                        <label>Đơn Vị Tính</label>
                        <input class="form-control" name="unit" placeholder="đơn vị" />
                    </div>
                    <div class="form-group">
                        <label>Hình Sản Phẩm</label>
                        <input type="file" class="form-control" name="image" placeholder="Chọn hình"/>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
                    <button type="reset" class="btn btn-default">Nhập Lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection