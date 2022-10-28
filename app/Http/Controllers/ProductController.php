<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    function all_products() {
        $products = DB::table('products')->orderby('product_id','desc')->paginate(6);

        return view('shop')->with('data',$products);
    }
}
