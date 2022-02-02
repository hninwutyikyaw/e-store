<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormValidation;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    private function save(Category $category, Request $request)
    {
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE? '1': '0';
        $category->popular = $request->input('popular') ==TRUE? '1': '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        if($request->hasFile('image'))
        {
            $destination = 'assets/uploads/category/'.$category->image;
            if(fileExists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->save();
    }

    public function store(CategoryFormValidation $request)
    {
        $category = new Category;
        $this->save($category, $request);
        return redirect('/categories')->with('status', 'Category added successfully.');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update($id, CategoryFormValidation $request)
    {
        $category = Category::find($id);
        $this->save($category, $request);

        return redirect('/categories')->with('status', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = 'assets/uploads/category/'.$category->image;
        if(fileExists($destination))
        {
            file::delete($destination);
        }
        $category->delete();
        return redirect('categories')->with('status','Category data deleted successfully');
    }
}
