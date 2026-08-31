<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtengo todos los elementos de pedido de la base de datos
       try {
            $orderItems = order_items::all();
            return response()->json($orderItems);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        $orderItem = order_items::create($request->all());
        return response()->json($orderItem, 201);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(order_items $order_items)
    {
        //
        try {
            return response()->json($order_items);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order_items $order_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $orderItem = order_items::findOrFail($id);
            $orderItem->delete();
            return response()->json(['mensaje' => 'Elemento de pedido eliminado correctamente']);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }   
    }           
    
    

    
}
