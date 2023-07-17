<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductType;
use App\Models\Bill_detail;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Customer;

class AdminController extends Controller
{
    public function getLoginAdmin()
    {
        return view("admin.dangnhap");
    }

    public function postLoginAdmin(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:16'
        ],[
            'email.required' => "Chưa nhập địa chỉ email",
            'email.email' => "Đại chỉ email không đúng định dạng",
            'password.required' => "Chưa nhập mật khẩu",
            'password.min' => "Mật khẩu tối thiểu 6 ký tự",
            'password.max' => "Mật khẩu tối đa 16 ký tự"
        ]);
        $xacthuc = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($xacthuc))
        {
            if (Auth::user()->role ==1)
                return redirect("admin/lietkedonhang"); 
            else
                return redirect()->back()->with(['matb'=>'0', 'noidung' => 'Bạn không phải là nhà quản trị !']);        
        }
        else
            return redirect()->back()->with(['matb'=>'0', 'noidung' => 'Đăng nhập thất bại !']);        
    }

    public function getProductType()
    {
        $loai_sp = ProductType::all();
        return view("admin.danhsachloai", compact("loai_sp"));
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect("admin/index");
    }

    public function getUserInfo()
    {
        if (Auth::check())
        {
            return view("admin.thongtin");
        }
        return redirect("admin/index");
    }

    public function getAddProductType()
    {
        if(Auth::check())
        {
            $loai_sp = ProductType::all();
            return view("admin.themloaisanpham", compact("loai_sp"));
        }
        else
        {
            return view("admin.dangnhap");
        }
    }

    public function postAddProductType(Request $req)
    {
        $val = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'name.required' => 'Chưa nhập tên loại sản phẩm',
            'description.required' => 'Chưa nhập mô tả loại sản phẩm',
            'image.required' => 'Chưa chọn hình loại sản phẩm',
            'image.mimes' => 'Chỉ chọn phép tập tin có định dạng:jpg, png, jpeg, gif, svg',
            'image.max' => 'Tệp hình không vượt quá 2048MB'
        ]);
    $filename = $req->file("image")->getClientOriginalName();
    $prot = new ProductType;
    $prot->name = $req->name;
    $prot->description = $req->description;
    $prot->image = $filename;
    $prot->save();
    $path = $req->file('image')->move('frontend/image/product', $filename);
    return redirect()->back()->with("thongbao", "Thêm loại sản phẩm thành công");
    }

    public function getEditProductType($id)
    {
        if(Auth::check())
        {
            $loai_sp = ProductType::find($id);
            return view("admin.sualoaisanpham", compact("loai_sp"));
        }
        else
        {
            return view("admin.dangnhap");
        }
    }

    public function postEditProductType(Request $req, $id)
    {
        $loai_sp = ProductType::find($id);
        $this->validate($req,[
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'name.required' => 'Chưa nhập tên loại sản phẩm',
            'description.required' => 'Chưa nhập mô tả loại sản phẩm',
            'image.required' => 'Chưa chọn hình loại sản phẩm',
            'image.mimes' => 'Chỉ chọn phép tập tin có định dạng:jpg, png, jpeg, gif, svg',
            'image.max' => 'Tệp hình không vượt quá 2048MB'
        ]);
        $filename = $req->file("image")->getClientOriginalName();
        $loai_sp->name = $req->name;
        $loai_sp->description = $req->description;
        $loai_sp->image = $filename;
        $loai_sp->save();
        $path = $req->file('image')->move('frontend/image/product', $filename);

        return redirect()->back()->with("thongbao", "Cập nhật thành công");
    }

    public function getDeleteProductType($id)
    {
        $loai_sp = ProductType::find($id);
        $loai_sp->delete();

        return redirect("admin/danhsachloai")->with("thongbao", "Đã xóa thành công");
    }

    public function getProduct()
    {
        $sanpham = Product::orderBy("id", "DESC")->paginate(5);
        return view("admin.danhsachsanpham", compact("sanpham"));
    }

    public function postAddProduct(Request $req)
    {
        $val = $req->validate([
            'name' => 'required',
            'id_type' => 'required',
            'unit_price' => 'required|numeric',
            'unit' => 'required',
            'promotion_price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'name.required' => 'Chưa nhập tên sản phẩm',
            'id_type' => 'Chưa nhập mã loại sản phẩm',
            'unit_price.required' => 'Chưa nhập đơn giá',
            'unit_price.numeric' => 'Đơn giá không hợp lệ',
            'promotion_price.required' => 'Chưa nhập đơn giá khuyến mãi',
            'promotion_price.numeric' => 'Giá khuyến mãi không hợp lệ',
            'image.required' => 'Chưa chọn hình loại sản phẩm',
            'image.mimes' => 'Chỉ chọn phép tập tin có định dạng:jpg, png, jpeg, gif, svg',
            'image.max' => 'Tệp hình không vượt quá 2048MB'
        ]);
    $filename = $req->file("image")->getClientOriginalName();
    $prot = new Product;
    $prot->name = $req->name;
    $prot->id_type = $req->id_type;
    $prot->unit_price = $req->unit_price;
    $prot->promotion_price = $req->promotion_price;
    $prot->unit = $req->unit;
    $prot->image = $filename;
    $prot->save();
    $path = $req->file('image')->move('frontend/image/product', $filename);
    return redirect()->back()->with("thongbao", "Thêm sản phẩm thành công");
    }

    public function getAddProduct()
    {
        if(Auth::check())
        {
            return view("admin.themsanpham");
        }
        else
        {
            return view("admin.dangnhap");
        }
    }

    public function getEditProduct($id)
    {
        if(Auth::check())
        {
            $sanpham = Product::find($id);
            return view("admin.suasanpham", compact("sanpham"));
        }
        else
        {
            return view("admin.dangnhap");
        }
    }

    public function postEditProduct(Request $req, $id)
    {
        $sanpham = Product::find($id);
        $this->validate($req,[
            'name' => 'required',
            'description' => 'required',
            'promotion_price' => 'required',
            'unit_price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'name.required' => 'Chưa nhập tên loại sản phẩm',
            'description.required' => 'Chưa nhập mô tả loại sản phẩm',
            'unit_price.required' => 'Chưa nhập giá gốc sản phẩm',
            'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
            'image.required' => 'Chưa chọn hình loại sản phẩm',
            'image.mimes' => 'Chỉ chọn phép tập tin có định dạng:jpg, png, jpeg, gif, svg',
            'image.max' => 'Tệp hình không vượt quá 2048MB'
        ]);
        $filename = $req->file("image")->getClientOriginalName();
        $sanpham->name = $req->name;
        $sanpham->description = $req->description;
        $sanpham->unit_price = $req->unit_price;
        $sanpham->promotion_price = $req->promotion_price;
        $sanpham->image = $filename;
        $sanpham->save();
        $path = $req->file('image')->move('frontend/image/product', $filename);

        return redirect()->back()->with("thongbao", "Cập nhật thành công");
    }

    public function getDeleteProduct($id)
    {
        $sold = Bill_detail::where("id_product", "=", $id)->count();
        
        if($sold==0)
        {
            $sanpham = Product::find($id);
            $sanpham->delete();
            return redirect()->back()->with("thongbao", "Đã xóa sản phẩm thành công");
        }
        else
            return redirect("admin/danhsachsp")->with("thongbao", "Sản phẩm đã được bày bán");
    }


    public function getBills()
    {
        if(Auth::check())
        {
            $donhang = Bill::all();
            return view("admin.danhsachdonhang", compact("donhang"));
        }
        else
        {
            return view("admin.dangnhap");  
        }
    }
    
    public function getEditBills($id)
    {
        $dhg = Bill::find($id);
        $cus = Customer::find($dhg->id_customer);
        $ct_dhg = Bill_detail::where("id_bill", "=", $dhg->id)
                                ->join("products", "products.id", "=", "bill_detail.id_product")
                                ->get(['products.name', 'bill_detail.quantity', 'bill_detail.unit_price']);
        return view("admin.chitietdonhang", compact("dhg","cus", "ct_dhg"));
    }

    public function postEditBills(Request $req, $id)
    {
        $dhg = Bill::find($id);
        $dhg->state = $req->state;
        $dhg->save();
        return redirect()->back()->with("thongbao", "Đã cập nhật đơn hàng");
    }

    public function getCustomer()
    {
        if(Auth::check())
        {
            $customer = Customer::all();
            return view("admin.lietkekhachhang", compact("customer"));
        }
        else
        {
            return view("admin.dangnhap");
        }
    }

    public function deleteCustomer($id)
    {
        $cusnum = Bill::where("id_customer", "=", $id)->count();
        if($cusnum ==0)
        {
            $cus = Customer::find($id);
            $cus->delete();
            return redirect()->back()->with("thongbao", "Đã xóa khách hàng thành công");
        }
        else
        {
            return redirect()->back()->with("thongbao", "Khách hàng đã có đơn hàng, không xóa được !");
        }
    }
}
