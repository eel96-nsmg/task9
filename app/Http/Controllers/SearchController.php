<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Category;
use App\Tag;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        return view('searches.index', [
            'search' => $search,
            'clients' => Client::where('name', 'like', '%' . $search . '%')->orderByDesc('id')->get(),
            'categories' => Category::where('name', 'like', '%' . $search . '%')->orderByDesc('id')->get(),
            'tags' => Tag::where('name', 'like', '%' . $search . '%')->orderByDesc('id')->get(),
        ]);
    }

    public function byCategory(Request $request, $id)
    {
        $category = Category::find($id);

        return view('searches.by-category', [
            'clients' => $category->clients()->orderByDesc('id')->get(),
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }

    public function byTag(Request $request, $id)
    {
        $tag = Tag::find($id);

        return view('searches.by-tag', [
            'clients' => $tag->clients()->orderByDesc('id')->get(),
            'tag' => $tag,
            'categories' => Category::all(),
        ]);
    }
}
