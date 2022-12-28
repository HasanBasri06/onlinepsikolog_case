<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function singlePage(string $product)
    {

        $product = Product::where('slug', $product)->get();

        return view('product', [
            'product' => $product
        ]);
    }
}
