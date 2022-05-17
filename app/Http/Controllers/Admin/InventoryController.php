<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
   public function index()
   {
      $data = ['title' => 'Inventory'];
      return view('admin.inventory.home', $data);
   }

   
}
