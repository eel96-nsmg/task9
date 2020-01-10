<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Category;
use App\Tag;

class ClientController extends Controller
{
    // 리스트 페이지
    public function index()
    {
       return view('clients', [
        'clients' => Client::orderBy('id', 'desc')->paginate(10),
    ]);
    }

    // 등록 페이지
    public function create()
    {
       return view('client-create',[
           'categories' => Category::all(),
           'tags' => Tag::all(),
       ]);

    }

    // 등록
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
        $tags = array_filter(preg_split("/[\s,]+/", $request->tags));

        foreach($tags as $tag) {
            // tag name이 존재하지 않을 경우 생성
            $createdTag = Tag::firstOrCreate(['name' => str_replace('#', '', $tag)]);

            // client와 tag 연결
            $client->tags()->attach($createdTag->id);
        }

        return redirect()->route('clients.index');
    }

    // 상세 페이지
    public function show(Client $client)         //원래는 $id였다  , History $history
    {
        return view('client-show', [
            'client' => $client,
        ]);

    }

    // 수정 페이지
    public function edit(Client $client)        //원래는 $id였다
    {
        return view('client-edit', [
            'client' => $client,
            'categories' => Category::all(),
            'tags' => '#' . implode(', #', $client->tags->pluck('name')->toArray()),
        ]);

        //return view('client-edit', [
        //'clients' => Client::orderBy('id', 'desc')->paginate(10),
        //]);
    }

    // 수정
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
        $tags = array_filter(preg_split("/[\s,]+/", $request->tags));

        // 기존 연결된 tag 제거
        $client->tags()->sync([]);

        foreach($tags as $tag) {
            // tag name이 존재하지 않을 경우 생성
            $createdTag = Tag::firstOrCreate(['name' => str_replace('#', '', $tag)]);

            // client와 tag 연결
            $client->tags()->attach($createdTag->id);
        }

        return back();

    }

    // 삭제
    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('clients.index');
    }

    public function likes($id)
    {
        auth()->user()->likes()->toggle($id);

        return redirect()->route('clients.show', $id);
    }
}