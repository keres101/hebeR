<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //
    public function showCreate()
    {
        return Inertia::render('Product/Create');
    }

    public function create(Request $req)
    {
        try {
            $req->validate([

                'name' => 'required | max:40',
                'stock' => 'required | integer | min:0 ',
                'price' => 'required | numeric | min:0 ',
                'type' => 'required | max:10'
                // 'descripcion' => 'required',
                //'cantidad'=>'required',

            ]);
            Product::create([
                'name' => $req['name'],
                'price' => $req['price'],
                'type' => $req['type'],
                'stock' => $req['stock']
            ]);
            return redirect('/product');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["error" => $th]);
        }
    }

    public function show()
    {
        return Inertia::render('Product/Show', ['products' => Product::all()]);
    }
}
