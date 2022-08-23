<?php

namespace App\Http\Controllers;

use App\Models\Meniu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeniuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
            $menius = Meniu::all();
            return view('meniu.index', ['menius' => $menius]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bars = Restaurant::all();
        return view('meniu.create', ['bars' => $bars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMeniuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meniu = new Meniu;
        $meniu->meniu_name = $request->meniu_name;
        $meniu->place_id = $request->place_id;
        $meniu->save();
        return redirect()->route('meniu-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function show(Meniu $meniu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function edit(Meniu $meniu)
    {
        $bars = Restaurant::all();
        return view('meniu.edit', ['meniu' => $meniu, 'bars' => $bars]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeniuRequest  $request
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meniu $meniu)
    {
        $meniu->meniu_name = $request->meniu_name;
        $meniu->place_id = $request->place_id;
        $meniu->save();
        return redirect()->route('meniu-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meniu $meniu)
    {
        if($meniu->dishes->count()){
            return redirect()->back()->with('deleted', 'You cant delete, still dishes on sale!');
        }
        $meniu->delete();
        return redirect()->back();
    }
}
