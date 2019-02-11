<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Phone;


class SearchController extends Controller
{
    public function GetBy()
    {

        $value = Input::get ('manufacturer');
        $phones=DB::table('phones')
            ->join('manufacturers', 'phones.manufacturer_id', '=', 'manufacturers.id')
            ->select('phones.id', 'phones.name', 'phones.releaseDate', 'manufacturers.name as manufacturer')
            ->where('phones.name', '=', $value )
            ->orWhere('manufacturers.name','=', $value)
            ->get();

        return view('index',compact('phones'));
    }


}
