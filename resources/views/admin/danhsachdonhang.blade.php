@extends("admin.layout")
@section("content")
<!-- Page Content -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH ĐƠN ĐẶT HÀNG</h1>
    </div>
<!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr align="center">
                <th>Mã Đơn Hàng</th>
                <th>Mã khách hàng</th>
                <th>Ngày Đặt Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Tổng Tiền</th>
                <th>Hình Thức Thanh Toán</th>
                <th>Ghi Chú</th>
                <th>Trạng Thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donhang as $dh)
            <tr class="odd gradeX" align="center">  
                <td>{{$dh->id}}</td>
                <td>{{$dh->id_customer}}</td>
                <td>{{$dh->date_order}}</td>
                <td>{{$dh->Customer->name}}</td>
                <td>{{$dh->total}}</td>
                <td>{{$dh->payment}}</td>
                <td>{{$dh->note}}</td>
                <td>{{$dh->state==0? "Chưa giao hàng": "Đã giao hàng"}}</td>
                <td class="center">
                    <i class="fa fa-pencil fa-fw"></i>
                    <a href="admin/capnhatdonhang/{{$dh->id}}">Cập nhật</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.row -->
@endsection