<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
   public function index(): \Illuminate\View\View
   {
        $data = ['title' => 'Inventory'];
        $countOfProducts = Product::count();
        $countOfCategories = Category::count();
        $countOfSales = Sale::count();
        $data['countOfCategories'] = $countOfCategories;
        $data['countOfProducts'] = $countOfProducts;
        $data['countOfSales'] = $countOfSales;
      return view('admin.inventory.home', $data);
   }


}
