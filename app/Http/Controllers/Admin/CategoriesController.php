<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $data = ['title' => 'Categories', 'categories' => $categories];
        return view('admin.inventory.categories.home', $data);
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        if($category->save()){
            return redirect()->back()->with('message', 'Category added successfully')->with('typealert', 'success');
        }
        else{
            return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        
        return $category;
    }

    public function postCategoryEdit(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        if($category->update()){
            return redirect()->back()->with('message', 'Category updated successfully')->with('typealert', 'success');
        }
        else{
            return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            return redirect()->back()->with('message', 'Category deleted successfully')->with('typealert', 'warning');
        }
        else{
            return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
        }
    }
}
