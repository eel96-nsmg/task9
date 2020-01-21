<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Category;
use App\Tag;

class ClientController extends Controller
{
    public function index()
    {
       return view('clients.index', [
        'clients' => Client::orderBy('id', 'desc')->paginate(10),
        'categories' => Category::all(),
    ]);
    }

    public function create()
    {
       return view('clients.create',[
           'categories' => Category::all(),
           'tags' => Tag::all(),
           'client' => Client::all(),
       ]);
//        return response(null, 204);
    }

    public function store(Request $request)
    {
        // 검증(validation)
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'company' => 'required',
        ]);

        // client 생성
        $client = auth()->user()->clients()->create($request->all());

        // client와 category 연결
        $client->categories()->sync($request->categories);

        // tag 파싱
        $tags = array_filter(preg_split("/[\s,]+/", str_replace('#', '', $request->tags)));

        foreach($tags as $tag) {
            // tag name이 존재하지 않을 경우 생성
            $createdTag = Tag::firstOrCreate(['name' => $tag]);

            // client와 tag 연결
            $client->tags()->attach($createdTag->id);
        }

        return redirect()->route('clients.index');
//        return response(null, 204);
    }

    public function show(Client $client)         //원래는 Client $client
    {
//        return view('clients.show', [
//            'client' => $client,
//        ]);
        return response()->json([
            'client' => $client,
            'categories' => $client->categories,
            'tags' => $client->tags,
        ]);
    }

    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client,
            'categories' => Category::all(),
            'tags' => '#' . implode(', #', $client->tags->pluck('name')->toArray()),
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'company' => 'required',
        ]);

        $client->update($request->all());

        $client->categories()->sync($request->categories);

        // tag 파싱
        $tags = array_filter(preg_split("/[\s,]+/", str_replace('#', '', $request->tags)));

        // 기존 연결된 tag 제거
        $client->tags()->sync([]);

        foreach($tags as $tag) {
            // tag name이 존재하지 않을 경우 생성
            $createdTag = Tag::firstOrCreate(['name' => $tag]);

            // client와 tag 연결
            $client->tags()->attach($createdTag->id);
        }

//        return back();
    }

    public function destroy($id)
    {
        Client::destroy($id);

//        return redirect()->route('clients.index');
        return response(null, 204);
    }

    public function likes($id)
    {
        auth()->user()->likes()->toggle($id);

//        return redirect()->route('clients.show', $id);
        return response(null, 204);
    }
}
