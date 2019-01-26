<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class phonesController extends Controller
{
    public function create()
    {
        return view('CreatePhone');
    }
}
