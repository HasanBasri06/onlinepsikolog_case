<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class BasketController extends Controller
{
    public function addToBasket(Request $request)
    {

        $minProduct = DB::table('products')->min('numberOfProducts');
        $someProduct =  DB::table('products')->avg('numberOfProducts');



        $reqBasket = DB::table('products')->where('numberOfProducts', $minProduct)->get();



        if($reqBasket[0]->id == $request->input('productId')){
            return back()->withErrors(['message' => 'Stoklarımızdaki en az ürünü seçtiğiniz için ürünü sepete ekleyemiyoruz']);
        }

        DB::table('basket')->insert([
            'product_id' => $request->input('productId'),
            'user_id' => $request->input('userId')
        ]);


        DB::table('products')
            ->where('id', $request->input('productId'))
            ->decrement('numberOfProducts', 1);

        return back()->withErrors(['message' => 'Ürün sepetinize eklenmiştir']);
    }

    public function main(Request $request)
    {

        $baskets = DB::table('basket')
            ->join('products', 'basket.product_id' , '=', 'products.id');

        return view('user.basket', [
            'baskets' => $baskets->get(),
            'totalPrice' => $baskets->sum('price')
        ]);
    }

    public function finish()
    {
        DB::table('basket')->where('user_id', Auth::id())->delete();
        return back()->withErrors(['message' => 'Ürünler Başarılı Bir Şekilde Alınmıştır']);
    }
}
