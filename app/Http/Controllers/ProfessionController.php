<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Profession::all();

        return view('admin.profession.index', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.profession.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:professions,name',
            'status' => 'required|boolean',
        ]);
        // dd($request->all());
        $profession = new Profession();
        $profession->name = $request->name;
        $profession->status = $request->status;
        if ($profession->save()) {
            return redirect()->route('admin.config.profession.index')->with('success', 'Profession created successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profession = Profession::findOrFail($id);
        return view('admin.profession.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:professions,name,' . $id,
            'status' => 'required|boolean',
        ]);
        // dd($request->all());
        $profession =  Profession::findOrFail($id);
        $profession->name = $request->name;
        $profession->status = $request->status;
        if ($profession->save()) {
            return redirect()->route('admin.config.profession.index')->with('success', 'Profession updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        //
    }
}
