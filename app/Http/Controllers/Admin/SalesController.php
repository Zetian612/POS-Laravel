<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;

class SalesController extends Controller
{
    public function index()
    {
        return view('admin.sales.home');
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $sale = new Sale();
        $sale->date = $request->date;
        $sale->user_id = $request->user_id;
        $sale->customer_name = $request->customer_name;
        $sale->total_amount = $request->total_amount;
        $sale->save();

        if($sale->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'Sale created successfully'
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Sale not created'
            ]);
        }
    }

    public function history(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $sales = Sale::all();
        return view('admin.sales.history', ['sales' => $sales]);
    }
}
