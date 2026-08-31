<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;



class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtengo todos los pedidos de la base de datos

       try {
            $orders = orders::with('user', 'orderItems', 'payment')->get();
            return response()->json($orders);
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
            'user_id' => 'required|integer',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|max:50',
            'order_number' => 'required|string|max:100|unique:orders',
        ]);

        $order = orders::create([
            'orders_id' =>$request->orders_id,
            'user_id' => $request->user_id,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
            'order_number' => $request->order_number,
        ]);
        return response()->json(['message' => 'Order created successfully'], 201);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }       
    }

    /**
     * Display the specified resource.
     */
    public function show(orders $id)
    {
        //
        try {
            $orders = orders::with('user', 'orderItems', 'payment')->findOrFail($id);
            return response()->json($orders);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }       
    }   
    
        
    
      
            


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $orders = orders::findOrFail($id);
            $request->validate([
                'user_id' => 'sometimes|required|integer',
                'total_amount' => 'sometimes|required|numeric',
                'status' => 'sometimes|required|string|max:50',
                'order_number' => 'sometimes|required|string|max:100|unique:orders,order_number,' . $orders->id,
            ]);

            $orders->update($request->all());
            return response()->json($orders);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        
    }   
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $orders = orders::findOrFail($id);
            $orders->delete();
            return response()->json(['mensaje' => 'Pedido eliminado correctamente']);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }   
    
    
        
        
    
 }
}
