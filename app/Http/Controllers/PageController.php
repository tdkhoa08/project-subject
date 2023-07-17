<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Bill_detail;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $total_new = Product::where("new", "=",1)->count();
        $new_product = Product::where("new", "=",1)->paginate(4,'*',"newpropage");
        $total_product = Product::where("new", "=",0)->count();
        $product = Product::where("new", "=",0)->paginate(8,'*',"productpage");
        return view("page.trangchu", compact("slide", "new_product", "total_new", "total_product", "product"));
    }

    public function getLoaisanpham($id)
    {
        $loai = ProductType::where("id", "=", $id)->first();
        $danhsach_loai = ProductType::all();
        $sanpham_theoloai = Product::where("id_type", "=", $id)->get();
        $tong_spk = Product::where("id_type", "!=", $id)->count();
        $sanpham_khac = Product::where("id_type", "!=", $id)->paginate(6);

        return view("page.loai_sanpham", compact("sanpham_theoloai", "loai", "danhsach_loai", "sanpham_khac", "tong_spk"));
    }

    public function getChitietsanpham($id)
    {
        $sanpham = Product::where("id", "=", $id)->first();
        $sp_tuongtu = Product::where("id_type", "=", $sanpham->id_type)->paginate(3);
        $sp_moi = Product::where("new", "=", 1)->take(4)->get();
        $sp_banchay = Bill_detail::selectRaw("id_product, sum(quantity) as total")
                                   -> groupBy("id_product")
                                   -> orderByDesc("total")->take(4)->get();
        return view("page.chitiet_sanpham", compact("sanpham", "sp_tuongtu", "sp_moi", "sp_banchay"));
    }

    public function getLienhe()
    {
        return view("page.lienhe");
    }

    public function getGioithieu()
    {
        return view("page.gioithieu");
    }

    public function getThemgiohang(Request $req, $id)
    {
        $sanpham = Product::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($sanpham, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getXoagiohang($id)
    {
        $oldcart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getDathang()
    {
        return view('page.dathang');
    }

    public function postDathang(Request $req)
    {
        $cart = Session::get('cart');

        $cus = new Customer;
        $cus->name = $req->name;
        $cus->gender = $req->gender;
        $cus->email = $req->email;
        $cus->address = $req->address;
        $cus->phone_number = $req->phone_number;
        $cus->note = $req->notes;
        $cus->save();

        $bill = new Bill;
        $bill->id_customer = $cus->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->state = 0;
        $bill->save();

        foreach ($cart->items as $key => $value)
        {
            $bd = new Bill_detail;
            $bd->id_bill = $bill->id;
            $bd->id_product = $key;
            $bd->quantity = $value["qty"];
            $bd->unit_price = ($value["price"] / $value["qty"]);
            $bd->save();
        }
        Session::forget('cart');
        return view('page.thongbao');
    }

    public function getDangnhap()
    {
        return view("page.dangnhap");  
    }

    public function postDangnhap(Request $req)
    {
        $this->validate($req,[
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ],[
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không đúng định dạng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa 20 ký tự'
        ]);
        $chungthuc = array('email' => $req->email, 'password' => $req->password);
        if(Auth::attempt($chungthuc))
        {
            return redirect("index");
        }
        else
        {
            return redirect()->back()->with(['matb' => '0', 'noidung' => 'Đăng nhập thất bại']);
        }
    }

    public function getDangky()
    {
        return view("page.dangky");  
    }

    public function postDangky(Request $req)
    {
        $vali = $req->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'repassword' => 'required|same:password',
            'address' => 'required',
            'fullname' => 'required'
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email này đã có người đăng ký',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa 20 ký tự',
            'repassword.required' => 'Nhập lại mật khẩu',
            'repassword.same' => 'Mật khẩu chưa trùng khớp',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'fullname.required' => 'Vui lòng nhập họ tên'
        ]);
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->back()->with("thongbao", "Đăng ký thành công");
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect("index");
    }

    public function getTimkiem(Request $req)
    {
        $product = Product::where("name", "like", "%".$req->key."%")
                            ->orWhere("unit_price", $req->key)
                            ->get();
        return view("page.timkiem", compact("product"));
    }
}
