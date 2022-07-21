<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\Category;

use  Str, Config;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();
        $data = ['title' => 'Products', 'products' => $products, 'categories' => $categories];
        return view('admin.inventory.products.home', $data);
    }

    public function store(Request $request)
    {
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('image')->getClientOriginalExtension());
        // $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('image')->getClientOriginalName()));
        $fileName = rand(1, 999).'-'.$name.'.'.$fileExt;
        // $file_file = $upload_path.'/'.$path.''.$fileName;

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->file_path = date('Y-m-d');
        $product->slug = Str::slug($request->name);
        $product->image = $fileName;
        $product->price = $request->price;

       if($product->save()){
           if($request->hasFile('image')){
            $request->image->storeAs($path, $fileName, 'uploads');
       }
       return redirect()->back()->with('message', 'Product added successfully')->with('typealert', 'success');
       }
         else{
                return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
            }
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return $data;
    }
    public function postProductEdit(Request $request, $id)
    {
       
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('image')){
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('image')->getClientOriginalExtension());
            // $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('image')->getClientOriginalName()));
            $fileName = rand(1, 999).'-'.$name.'.'.$fileExt;
            // $file_file = $upload_path.'/'.$path.''.$fileName;
            $product->file_path = date('Y-m-d');
            $product->image = $fileName;
        }
      
        
        if ($product->update()) {
            if($request->hasFile('image')){
                $request->image->storeAs($path, $fileName, 'uploads');
            }
            return redirect()->back()->with('message', 'Product updated successfully')->with('typealert', 'success');
        }
        return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function searchProducts(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->search.'%')->take(8)->get();
        return json_encode($products);
    }

}
