@extends("admin.layout")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Sản Phẩm
                    <small>Thêm Thông Tin</small>
                </h1>
            </div>
<!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}} <br />
                    @endforeach
                    </div>
                @endif
                @if(Session::has("thongbao"))
                    <div class="alert alert-success">{{Session::get("thongbao")}}</div>
                @endif
                <form action="admin/themloaisp" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên Phân Loại</label>
                        <input class="form-control" name="name" placeholder="nhập tên phân loại"/>

                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <input class="form-control" name="description" placeholder="Nhập mô tả" />
                    </div>

                    <div class="form-group">
                        <label>Hình Loại Sản Phẩm</label>
                        <input type="file" class="form-control" name="image" placeholder="Chọn hình"/>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm Phân Loại</button>
                    <button type="reset" class="btn btn-default">Nhập Lại</button>
                <form>
            </div>
        </div>
<!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection