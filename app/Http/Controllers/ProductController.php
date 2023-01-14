<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index ()
    {
        $products = Product::all();
        if (
            $products->count() > 0
        ) {
            return response()->json([
                'products' => $products
            ], 200);
        } else {
            return response()->json([
                'message' => 'No products found'
            ], 404);
        }
    }


    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'product' => $product
        ]);
    }

    public function  show_serial($serial_number)
    {
        $product = Product::where('serial_number', $serial_number)->first();
        return response()->json([
            'product' => $product
        ], 200);
    }

    public function show_name($name)
    {
        $product = Product::where('name', $name)->first();
        return response()->json([
            'product' => $product
        ], 200);
    }

    public  function show_description($description)
    {
        $product = Product::where('description', $description)->first();
        return response()->json([
            'product' => $product
        ], 200);
    }

    public function show_price($price)
    {
        $product = Product::where('price', $price)->first();
        return response()->json([
            'product' => $product
        ], 200);
    }

    
    public function create (Request $request){
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'serial_number' => 'required|string',
                'description' => 'required|string|max:255',
                'quantity' => 'required|integer',
                'feactured' => 'required|string',
            ]);

            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'serial_number' => $request->serial_number,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'feactured' => $request->feactures,
            ]);

            return response()->json([
                'product' => $product
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage('Error Create')
            ]);
        }
    }

    public function update (Request $request, $id){
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'serial_number' => 'required|string',
                'description' => 'required|string|max:255',
                'quantity' => 'required|integer',
                'feactured' => 'required|string',
            ]);

            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->serial_number = $request->serial_number;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->feactured = $request->feactured;
            $product->save();

            return response()->json([
                'product' => $product
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage('Error Update')
            ]);
        }
    }

    public function delete ($id){
        try {
            $product = Product::find($id);


            if (!$product) {
                return response()->json([
                    'message' => 'Product not found'
                ], 404);
            }
            $product->delete();

            return response()->json([
                'message' => 'Product Deleted successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage('Error Delete')
            ]);
        }
    }

}
