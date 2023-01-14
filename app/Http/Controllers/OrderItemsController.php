<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        try {
            if ($orderItems->count() > 0) {
                return response()->json([
                    'orderItems' => $orderItems
                ], 200);
            } else {
                return response()->json([
                    'message' => 'No orderItems found'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong'
            ], 500);
        }
    }
    public  function show ($id)
    {
        try {
            $orderItem = OrderItem::find($id);
            return response()->json([
                'orderItem' => $orderItem
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong'
            ], 500);
        }
    }
    public function create(Request $request)
    {
        $orderItem = OrderItem::create([
            'quantity' => $request->quantity,
            'order_id' => $request->order_id,
            'product_id' => $request->product_id
        ]);
        return response()->json([
            'orderItem' => $orderItem
        ], 201);
    }
    public function delete($id)
    {
        try {
            $orderItem = OrderItem::find($id);
            $orderItem->delete();
            return reponse()->json([
                'message' => 'OrderItem deleted',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e -> getMessage()
            ], 500);
        }
    }
}
