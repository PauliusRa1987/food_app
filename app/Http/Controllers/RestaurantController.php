<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants  = Restaurant::all();
    return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->place_kode = $request->place_kode;
        $restaurant->save();
        return redirect()->route('restaurant-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->place_kode = $request->place_kode;
        $restaurant->save();
        return redirect()->route('restaurant-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->menius->count()){
            return redirect()->back()->with('deleted', 'You cant delete, still have open restaurant!');
        }
        
        $restaurant->delete();
        return redirect()->back();
    }
}
