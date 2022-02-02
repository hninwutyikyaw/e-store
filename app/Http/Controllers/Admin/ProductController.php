<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\fileExists;
use App\Http\Requests\Admin\ProductFormValidation;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    private function save(Product $product,Request $request )
    {
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->status = $request->input('status') == TRUE? '1': '0';
        $product->trending = $request->input('trending') ==TRUE? '1': '0';
        $product->quantity= $request->input('quantity');
        $product->tax = $request->input('tax');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');

    if($request->hasFile('image'))
        {
            $destination = 'assets/uploads/product/'.$product->image;
            if(fileExists($destination))
            {
                file::delete($destination);
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;
        }
        $product->save();
    }

    public function store(ProductFormValidation $request)
    {
        $product = new Product;
        $this->save($product, $request);
        return redirect('/products')->with('status', 'product added successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('categories', 'product'));
    }

    public function update(ProductFormValidation $request, $id)
    {
        $product = Product::find($id);
            $this->save($product, $request);
        return redirect('/products')->with('status', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $destination = 'assets/uploads/product/'.$product->image;
        if(fileExists($destination))
        {
            file::delete($destination);
        }
        $product->delete();
        return redirect('/products')->with('status', 'Product deleted successfully');
    }
}
