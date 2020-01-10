<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\History;

class HistoryController extends Controller
{
    public function store(Request $request)
    {
        auth()->user()->histories()->create($request->all());

        return redirect()->route('clients.show', $request->client_id);
    }
    
    public function update(Request $request, $id)
    {
        History::find($id)->update($request->all());

        return back();
    }

    public function destroy(Request $request, $id)
    {
        History::destroy($id);

        return back();
    }
}
