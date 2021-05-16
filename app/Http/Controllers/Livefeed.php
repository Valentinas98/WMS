<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Livefeed extends Controller
{
    public function index()
    {
        return view('livefeed.index');
    }
}
