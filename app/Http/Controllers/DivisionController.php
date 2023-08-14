<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Models\Division;

class DivisionController extends Controller
{
    
    public function index()
    {
        $division = Division::all();
        return view('division.index',["divisions"=> $division]);
    }

    public function create()
    {
        return view('division.create');
    }

    public function store(Request $request)
    {
        Division::create($request->all());
        return redirect('division');
    }

    public function edit($division_id)
    {
        $division = Division::find($division_id);
        return view('division.update', ["divisions" => $division]);
    }

    public function update(Request $request, $division_id)
    {
        $division = Division::find($division_id);
        $division->update($request->all());
        return redirect('division');
    }


    public function destroy($division_id)
    {
        Division::destroy($division_id);
        return redirect('division');
    }

}
