<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
    //Lấy id sản phẩm và type_id
    public function show_details($id, $type_id)
    {
        $shop = Product::where('product_id', '=', $id)->select('*')->first();
        // $review_ratings = ReviewRating::where('post_id', '=',$id)->get();
        // $des = html_entity_decode($shop->description);
        $related_product = DB::table('products')->orderBy('product_id','DESC')->Paginate(4);
        return view('shop-details', compact('shop','related_product'));
    }
}
