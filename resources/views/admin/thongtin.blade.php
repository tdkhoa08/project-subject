@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">THÔNG TIN NGƯỜI DÙNG</h3>
            </div>
            <div class="panel-body">
                <form>
                    <fieldset>
                        <div class="form-group">
                            <label class="form-control">{{Auth::user()->full_name}}</label>
                        </div>
                        <div class="form-group">
                            <label class="form-control">{{Auth::user()->email}}</label>
                        </div>
                        <div class="form-group">
                            <label class="form-control">{{Auth::user()->phone}}</label>
                        </div>
                        <div class="form-group">
                            <label class="form-control">{{Auth::user()->address}}</label>
                        </div>
                        <a href="admin/danhsachloai" class="btn btn-lg btn-success btn-block">Trở về</a>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection