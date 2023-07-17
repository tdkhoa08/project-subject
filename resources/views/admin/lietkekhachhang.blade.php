@extends("admin.layout")
@section("content")
<!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">DANH SÁCH KHÁCH HÀNG</h1>
            @if(Session::has("thongbao"))
                <div class="alert alert-info">
                {{Session::get("thongbao")}}
                </div>
            @endif
        </div>
<!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr align="center">
                <th>Mã Khách Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Giới Tính</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện Thoại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customer as $cus)
            <tr class="odd gradeX" align="center">
                <td>{{$cus->id}}</td>
                <td>{{$cus->name}}</td>
                <td>{{$cus->gender}}</td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->address}}</td>
                <td>{{$cus->phone_number}}</td>
                <td class="center">
                    <i class="fa fa-trash-o fa-fw"></i>
                    <a href="admin/xoakhachhang/{{$cus->id}}"> Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<!-- /.row -->
@endsection