<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllPostinganController extends Controller
{
    public function index(Request $request)
    {
        return view('all-postingan');
    }
}
