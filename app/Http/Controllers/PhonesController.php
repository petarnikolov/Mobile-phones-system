<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class phonesController extends Controller
{
    public function index()
    {
        $phones=\App\Phone::all();
        return view('index',compact('phones'));
    }

    public function create()
    {
        return view('CreatePhone');
    }

    public function store(Request $request)
    {
        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $phone= new \App\Phone;
        $phone->name=$request->get('name');
        $phone->manufacturer=$request->get('manufacturer');
        $date=date_create($request->get('releaseDate'));
        $format = date_format($date,"Y-m-d");
        $phone->releaseDate = strtotime($format);
        $phone->filename=$name;
        $phone->save();

        return redirect('phones')->with('success', 'Information has been added');
    }
}
