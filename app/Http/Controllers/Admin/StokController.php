<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Stock;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "status" => "success",
            "data" => Stock::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'productName' => 'required|min:3|max:255',
                'barcodeNo' => 'required|max:11|min:11',
                'stocksQuantity' => 'required',
                'purchasePrice' => 'required',
                'salePrice' => 'required',
                'invoiceDate' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "warning",
                    "message" => $validator->errors()
                ]);
    }
    Stock::create($request->all());

    return response()->json([
        'status' => 'success'
    ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            "status" => "success",
            "data" => Stock::findOrFail($id)
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //Burası kaldı güncelleme
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        return response()->json([
            "status" =>"success",
            "data"=> Stock::destroy($id)
       
         ]);
       
        }
}
