<?php

namespace App\Http\Controllers;

use App\Models\payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtengo todos los pagos de la base de datos
       try {
            $payments = payments::all();
            return response()->json($payments);
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
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);
        $payment = payments::create($request->all());
        return response()->json($payment, 201);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(payments $payments)
    {
        //
        try {
            return response()->json($payments);
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
            $payment = payments::findOrFail($id);
            $request->validate([
                'order_id' => 'sometimes|required|integer',
                'amount' => 'sometimes|required|numeric',
                'payment_method' => 'sometimes|required|string|max:50',
                'status' => 'sometimes|required|string|max:50',
            ]);
            $payment->update($request->all());
            return response()->json($payment);
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
            $payment = payments::findOrFail($id);
            $payment->delete();
            return response()->json(['mensaje' => 'Pago eliminado correctamente']);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }
}
