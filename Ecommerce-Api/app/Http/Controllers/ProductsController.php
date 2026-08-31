<?php

namespace App\Http\Controllers;

 
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtengo todos los productos de la base de datos
       try {
            $products = products::all();
            return response()->json($products);
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
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $product = products::create($request->all());
        return response()->json($product, 201);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
        try {
            return response()->json($products);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        //
        try {
            $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'description' => 'sometimes|required|string|max:500',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);
        $products->update($request->all());
        return response()->json($products);
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
            $products = products::findOrFail($id);
            $products->delete();
            return response()->json(['mensaje' => 'Producto eliminado correctamente']);
        } catch (\Exception $error) {
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }       
    
}
