<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
class RegionController extends Controller
{
    
    public function index()
    {
        $regions = Region::all();
        return view('region.index',compact('regions'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        Region::create(request(['name']));
        return redirect('region');
    }

    public function show($id)
    {
        return 'hello';
    }

    public function edit(Region $region)
    {
        $regions = Region::all();
        return view('region.edit',compact('regions'));
    }

   
    public function update(Request $request, $id)
    {
        $region->update(request(['name']));
        return redirect('/region');
    }

    
    public function destroy($id)
    {
        //
    }
}
