@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh Sách Loại Sản Phẩm</h1>
    </div>
<!-- /.col-lg-12 -->

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th with="15%">Mã Phân Loại</th>
                <th width="15%">Tên Phân Loại</th>
                <th width="50%">Mô tả</th>
                <th width="10%">Hình</th>
                <th width="10%" colspan="2">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loai_sp as $lsp)
            <tr class="odd gradeX" align="center">
                <td>{{$lsp->id}}</td>
                <td>{{$lsp->name}}</td>
                <td align="justify">{{$lsp->description}}</td>
                <td><img src="frontend/image/product/{{$lsp->image}}" width="100" height="100"></td>
                <td class="center"><i class="fa fa-trash-o fa-fw">
                    </i><a href="admin/xoaloaisp/{{$lsp->id}}">Delete</a>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sualoaisp/{{$lsp->id}}">Edit</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection