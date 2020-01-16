<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function likes()
    {
        return view('users.likes', [
            'clients' => auth()->user()->likes,
        ]);
    }
}