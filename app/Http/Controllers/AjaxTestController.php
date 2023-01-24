<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;


class AjaxTestController extends Controller
{
    public function index(){
        $Product=Product::all();
        return response($Product);

    }
    public function productStore(Request $request){
      dd($request->all());

    }
}
