<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class phonesController extends Controller
{
    public function index()
    {
        $phones=Phone::all();
        return view('index',compact('phones'));
    }

    public function GetByName($value)
    {

            $column = 'name';

            $phones = Phone::where($column , '=', $value)->get();

        return view('index',compact('phones'));
    }

    public function GetByManufacturer($value)
    {

        $column = 'manufacturer';

        $phones = Phone::where($column , '=', $value)->get();

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
        $phone->releaseDate = $request->get('releaseDate');
        $phone->filename=$name;
        $phone->save();

        return redirect('phones')->with('success', 'Information has been added');
    }
    public function edit($id)
    {
        $phone = \App\Phone::find($id);
        return view('EditPhone',compact('phone','id'));
    }

    public function destroy($id)
    {
        $phone = \App\Phone::find($id);
        $phone->delete();
        return redirect('phones')->with('success','Information has been  deleted');
    }
}
