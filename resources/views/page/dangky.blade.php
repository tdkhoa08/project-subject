@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title" align="center">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index">Trang chủ</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
	
<div class="container" style="margin-top:-50px">
    <div id="content">
        
        <form action="dang-ky" method="post" class="beta-form-checkout">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Nhập thông tin đăng ký</h4>
                    <div class="space20">&nbsp;</div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}} </br>
                        @endforeach
                    </div>
                    @endif
                    @if(Session::has("thongbao"))
                        <div class="alert alert-success">{{Session::get("thongbao")}}</div>
                    @endif
                    <div class="form-block">
                        <label for="email">Địa chỉ email<span style="color:red">*</span></label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ tên<span style="color:red">*</span></label>
                        <input type="text" name="fullname" id="your_last_name" required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ<span style="color:red">*</span></label>
                        <input type="text" name="address" id="adress"  required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Số điện thoại<span style="color:red">*</span></label>
                        <input type="text" name="phone" id="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="password">Mật khẩu<span style="color:red">*</span></label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-block">
                        <label for="repassword">Nhập lại mật khẩu<span style="color:red">*</span></label>
                        <input type="password" name="repassword" id="repassword" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection