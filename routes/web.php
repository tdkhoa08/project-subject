<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index", [PageController::class, "getIndex"]);
Route::get("/loai-sanpham/{id}", [PageController::class, "getLoaisanpham"]);
Route::get("/chitiet-sanpham/{id}", [PageController::class, "getChitietsanpham"])->name("detailproduct");
Route::get("/lien-he", [PageController::class, "getLienhe"]);
Route::get("/gioi-thieu", [PageController::class, "getGioithieu"]);
Route::get("/them-vao-gio-hang/{id}", [PageController::class, "getThemgiohang"]);
Route::get("/xoa-gio-hang/{id}", [PageController::class, "getXoagiohang"]);
Route::get("/dat-hang", [PageController::class, "getDathang"]);
Route::post("/dat-hang", [PageController::class, "postDathang"]);
Route::get("/dang-nhap", [PageController::class, "getDangnhap"]);
Route::post("/dang-nhap", [PageController::class, "postDangnhap"]);
Route::get("/dang-ky", [PageController::class, "getDangky"]);
Route::post("/dang-ky", [PageController::class, "postDangky"]);
Route::get("/dang-xuat", [PageController::class, "getDangxuat"]);
Route::get("/tim-kiem", [PageController::class, "getTimkiem"]);

Route::group(["prefix" => "admin"],function(){
    Route::get("/index", [AdminController::class, "getLoginAdmin"]);
    Route::post("/index", [AdminController::class, "postLoginAdmin"]);
    Route::get("/dangxuat", [AdminController::class, "getLogoutAdmin"]);
    Route::get("/thongtin", [AdminController::class, "getUserInfo"]);
    
    Route::get("/danhsachloai", [AdminController::class, "getProductType"]);
    Route::get("/themloaisp", [AdminController::class, "getAddProductType"]);
    Route::post("/themloaisp", [AdminController::class, "postAddProductType"]);
    Route::get("/sualoaisp/{id}", [AdminController::class, "getEditProductType"]);
    Route::post("/sualoaisp/{id}", [AdminController::class, "postEditProductType"]);
    Route::get("/xoaloaisp/{id}", [AdminController::class, "getDeleteProductType"]);

    Route::get("/danhsachsp", [AdminController::class, "getProduct"]);
    Route::get("/themsp", [AdminController::class, "getAddProduct"]);
    Route::post("/themsp", [AdminController::class, "postAddProduct"]);
    Route::get("/suasp/{id}", [AdminController::class, "getEditProduct"]);
    Route::post("/suasp/{id}", [AdminController::class, "postEditProduct"]);
    Route::get("/xoasp/{id}", [AdminController::class, "getDeleteProduct"]);


    Route::get("/lietkedonhang",[AdminController::class, "getBills"]);
    Route::get("/capnhatdonhang/{id}",[AdminController::class, "getEditBills"]);
    Route::post("/capnhatdonhang/{id}",[AdminController::class, "postEditBills"]);


    Route::get("/danhsachkh", [AdminController::class, "getCustomer"]);
    Route::get("/xoakhachhang/{id}", [AdminController::class, "deleteCustomer"]);
});







