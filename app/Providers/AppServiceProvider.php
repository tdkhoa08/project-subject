<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\ProductType;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer("layouts.header", function($view){
            $loai_sanpham = ProductType::all();
            $view->with("loai_sanpham", $loai_sanpham);
        });

        view()->composer(['layouts.header', 'page.dathang'], function($view){
            if(Session('cart'))
            {
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items,
                        'totalprice' => $cart->totalPrice,
                        'totalqty' => $cart->totalQty]);
            }
        });
    }
}
