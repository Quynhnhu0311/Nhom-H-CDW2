<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Feature;
use DB;


class HomeController extends Controller
{
    function home() {
        $newArrivals = Product::where('feature_id','=',1)->get();
        $bestSellers = Product::where('feature_id','=',2)->get();
        $hotSales = Product::where('feature_id','=',3)->get();
        $feature_product = Product::all();
        return view('index')->with('newArrivals',$newArrivals)
                            ->with('bestSellers',$bestSellers)
                            ->with('hotSales',$hotSales)
                            ->with('feature_product',$feature_product);
    }
    //Detail Product and Related Product
    public function show_details($id)
    {
        $detail = DB::table('products')->join('protypes','protypes.type_id','=','products.type_id')->where('products.product_id',$id)->get();
        foreach($detail as $related) {
            $type_id = $related->type_id;
        }
        $related_product = DB::table('products')->join('protypes','protypes.type_id','=','products.type_id')->where('protypes.type_id',$type_id)->paginate(8);
        return view('shop-details')->with('detail', $detail)->with('related_product', $related_product);
    }
}
