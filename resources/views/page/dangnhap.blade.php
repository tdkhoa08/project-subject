@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index">Trang chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
	
<div class="container" style="margin-top:-40px">
    <div id="content">
        
        <form action="dang-nhap" method="post" class="beta-form-checkout">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errorrs->all() as $error)
                                {{$errors}}</br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('matb'))
                        @if(Session::get('matb')=='1')
                            <div class="alert alert-success">{{Session::get('noidung')}}</div>                    
                        @else
                            <div class="alert alert-danger">{{Session::get('noidung')}}</div>
                        @endif
                    @endif
                    <div class="form-block">
                        <label for="email">Địa chỉ email<span style="color:red">*</span></label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="password">Mật khẩu<span style="color:red">*</span></label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="text-center" >
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection