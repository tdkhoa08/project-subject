@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh Sách Sản Phẩm</h1>
    </div>
    @if(Session::has("thongbao"))
    <div class="col-lg-12">
        <div class="alert alert-danger">
            {{Session::get("thongbao")}}
        </div>
    </div>
    @endif
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th with="20%">STT</th>
                <th with="20%">Tên</th>
                <th with="20%">Mã loại</th>
                <th with="20%">Mô tả</th>
                <th with="20%">Giá gốc</th>
                <th with="20%">Giá khuyến mãi</th>
                <th with="20%">Đơn vị tính</th>
                <th with="20%">Hình</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sanpham as $sp)
            <tr class="odd gradeX" align="center">
                <td>{{$sp->id}}</td>
                <td>{{$sp->name}}</td>
                <td>{{$sp->id_type}}</td>
                <td align="justify">{{$sp->description}}</td>
                <td>{{$sp->unit_price}}</td>
                <td>{{$sp->promotion_price}}</td>
                <td>{{$sp->unit}}</td>
                <td><img src="frontend/image/product/{{$sp->image}}" width="100" height="100"></td>
                <td class="center"><i class="fa fa-trash-o fa-fw">
                    </i><a href="admin/xoasp/{{$sp->id}}">Delete</a>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/suasp/{{$sp->id}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" align="center">{{$sanpham->links()}}</div>
</div>
<!-- /.row -->
    
@endsection