<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function indexCategory(){
        $category = category::all();
        return view('admin.category.indexCategory', compact('category'));
    }

    public function createCategory(Request $request)
    {
        Category::create([
            'category' => $request->category,
            'slug' => Str::slug($request->category),
        ]);

        return redirect()->back()->with('success', "Data $request->category Berhasil Ditambahkan!");
    }

    public function updateCategory(Request $request){
        $category = Category::findorfail($request->id);
        $category->update([
            'category' => $request->category,
            'slug' => Str::slug($request->category),
        ]);

        return redirect()->back()->with('success', "Data $request->category Berhasil DIupdate!");
    }

    public function deleteCategory(Request $request){
        $category = Category::findOrFail($request->id);
        $category->delete();

        return redirect()->back()->with('Delete', "Data $category->category berhasil dihapus!");
    }


}
