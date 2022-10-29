<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\Feature;
use DB;

=======
use DB;
>>>>>>> 3f9301f2baeb879c86953ee331874d091ef56e3f
=======
use App\Models\Feature;
use DB;

>>>>>>> fe9aac39bfae5ac1397248d2054ff5873ecdbd1d

class HomeController extends Controller
{
    function home() {
        $newArrivals = Product::where('feature_id','=',1)->get();
        $bestSellers = Product::where('feature_id','=',2)->get();
        $hotSales = Product::where('feature_id','=',3)->get();
        // $paginate = Product::paginate(6);
        $feature_product = Product::all();
        return view('index')->with('newArrivals',$newArrivals)
                            ->with('bestSellers',$bestSellers)
                            ->with('hotSales',$hotSales)
                            ->with('feature_product',$feature_product);
                            // ->with('phan-trang',$paginate);
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
