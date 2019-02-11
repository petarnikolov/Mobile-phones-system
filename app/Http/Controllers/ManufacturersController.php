<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;


class ManufacturersController extends Controller
{
    public function index()
    {
        $manufacturers=Manufacturer::all();
        return view('manufacturers/index',compact('manufacturers'));
    }





    public function create()
    {

        return view('manufacturers/CreateManufacturer');
    }

    public function store(Request $request)
    {
        $manufacturer= new Manufacturer;
        $manufacturer->name=$request->get('name');
        $manufacturer->save();

        return redirect('manufacturers')->with('success', 'Information has been added');
    }
    public function edit($id)
    {
        $manufacturer = \App\Manufacturer::Find($id);
        return view('manufacturers/EditManufacturer',compact('manufacturer','id'));
    }
    public function update(Request $request, $id){
        $manufacturer=Manufacturer::Find($id);
        $manufacturer->name=$request->get('name');
        $manufacturer->save();

        return redirect('manufacturers')->with('success', 'Information has been updated');
    }

    public function destroy($id)
    {
        $manufacturer = \App\Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('manufacturers')->with('success','Information has been  deleted');
    }
}
