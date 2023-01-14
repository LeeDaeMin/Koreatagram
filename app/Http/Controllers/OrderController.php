<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
     public function index()
        {
            try {
                $order = Order::with(['order_items', 'user'])->get();

            } catch (\Throwable $th) {
                return response()->json($th->getMessage(), 500);
            }
     }
     public  function show ($reference)
        {
            try {
                $order = Order::with(['order_items', 'user'])->where('reference', $reference)->first();

            } catch (\Throwable $th) {
                return response()->json($th->getMessage(), 500);
            }
        }


    public function create(Request $request)
    {
        try {
            $reference = Str::random(10) . '_' . Carbon::now();
            $request->validate([
                'user_id' => 'required|numeric',
            ]);
            $order = Order::create([
                'reference' => $reference,
                'user_id' => $request->user_id,
            ]);
            $subtotal = 0;
            foreach ($request->items as $item) {
                $product = Product::find($item['id']);
                $orderItem = Order_Items::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                ]);
                $subtotal = $subtotal + ($product  * $orderItem->quantity);
            }
                $total = 0;
                $total = $total + ($subtotal * 1.19);
                $order ->total = $total;
                $order -> subtotal =  $subtotal;
                $order->save();

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }}

