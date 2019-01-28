<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Phone;


class SearchController extends Controller
{
    public function GetByManufacturer()
    {

        $column = 'manufacturer';
        $value = Input::get ('manufacturer');
        $phones = Phone::where($column , '=', $value)->get();

        return view('index',compact('phones'));
    }

    public function GetByName()
    {

        $column = 'name';
        $value = Input::get ('name');
        $phones = Phone::where($column , '=', $value)->get();

        return view('index',compact('phones'));
    }

}
