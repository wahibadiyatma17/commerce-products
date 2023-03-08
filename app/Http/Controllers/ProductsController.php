<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $result = Products::all();
        if ($request -> title){
            $term = strtolower($request->query('title'));
            $result = Products::whereRaw('lower(title) like (?)',["%{$term}%"])->get();
        } else if ($request -> id){
            $term = $request->query('id');
            $result = Products::whereRaw('id like (?)',["%{$term}%"])->get();
        }
        return $result;
    }

}