<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Categories'];
        return view('admin.inventory.categories.home', $data);
    }
}
