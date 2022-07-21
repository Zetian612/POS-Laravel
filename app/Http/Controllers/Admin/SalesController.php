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

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'user_id' => 'required',
            'customer_name' => 'required',
            'total_amount' => 'required',
        ]);
        
        $sale = new Sale();
        $sale->date = $request->date;
        $sale->user_id = $request->user_id;
        $sale->customer_name = $request->customer_name;
        $sale->total_amount = $request->total_amount;
        $sale->save();
        
        if($sale->save()){
            return redirect()->back()->with('message', 'Success added')->with('typealert', 'success');
        }
        else{
            return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
        }
    }
}
