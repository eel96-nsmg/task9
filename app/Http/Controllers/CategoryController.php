<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function create()
    {
       return view('categories.create',[
           'categories' => Category::all(),
       ]);
    }

    public function store(Request $request)
    {
        // 검증(validation)
        $request->validate([
            'name' => 'required|min:3|unique:categories',
        ]);

        // client 생성
        Category::create($request->all());

        return response(null, 204);
    }

    public function destroy($id)
    {
        category::destroy($id);

//        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $category->update($request->all());

        return response(null, 204);
    }

}
