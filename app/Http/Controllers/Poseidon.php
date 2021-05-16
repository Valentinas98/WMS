<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Poseidon extends Controller
{
    public function index()
    {
        return view('poseidon.index');
    }
}
