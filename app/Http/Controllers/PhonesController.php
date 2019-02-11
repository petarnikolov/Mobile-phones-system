<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class phonesController extends Controller
{
    public function index()
    {
        $phones=DB::table('phones')
            ->join('manufacturers', 'phones.manufacturer_id', '=', 'manufacturers.id')
            ->select('phones.id', 'phones.name', 'phones.releaseDate', 'manufacturers.name as manufacturer')
            ->get();
        return view('index',compact('phones'));
    }





    public function create()
    {
        $manufacturers =DB::table('manufacturers')->select('id','name')->get();
        return view('CreatePhone',compact('manufacturers'));
    }

    public function store(Request $request)
    {

        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        else
            return redirect ('phones')->with('success','No file provided');


        $phone= new \App\Phone;
        $phone->name=$request->get('name');
        $phone->manufacturer_id=$request->get('manufacturer');
        $phone->releaseDate = $request->get('releaseDate');
        $phone->filename=$name;
        $phone->save();

        return redirect('phones')->with('success', 'Information has been added');
    }
    public function edit($id)
    {
        $phone = \App\Phone::Find($id);
        $manufacturers =DB::table('manufacturers')->select('id','name')->get();

        return view('EditPhone',compact('phone','id', 'manufacturers'));
    }
    public function update(Request $request, $id){
        $phone=Phone::Find($id);
        $phone->name=$request->get('name');
        $phone->manufacturer_id=$request->get('manufacturer');
        $phone->releaseDate = $request->get('releaseDate');
        $phone->save();

        return redirect('phones')->with('success', 'Information has been updated');
    }

    public function destroy($id)
    {
        $phone = \App\Phone::find($id);
        $phone->delete();
        return redirect('phones')->with('success','Information has been  deleted');
    }
}
