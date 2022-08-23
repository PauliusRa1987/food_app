<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Meniu;
use App\Models\Restaurant;
use Intervention\Image\Facades\Image;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishs = Dish::all();
        return view('dish.index', ['dishs' => $dishs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $menius = Meniu::all();
        return view('dish.create', ['menius'=>$menius ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish;
        if ($request->file('dish_image')) {
            $photo = $request->file('dish_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(50, 50);
            $img->save(public_path().'/img/'.$file);
            $dish->photo = asset('/img') . '/' . $file;
        }
        $dish->dish_title = $request->dish_title;
        $dish->dish_text = $request->dish_text;
        $dish->meniu_id = $request->meniu_id;
        $dish->save();
        return redirect()->route('dish-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $menius = Meniu::all();
        return view('dish.edit', ['menius'=>$menius,'dish' =>$dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        if ($request->file('dish_image')) {
            if ($dish->photo) {
                $name = pathinfo($dish->photo, PATHINFO_FILENAME);
                $ext = pathinfo($dish->photo, PATHINFO_EXTENSION);
                $path = public_path('/img') . '/' . $name . '.' . $ext;
                if ($path) {
                    unlink($path);
                }
            }
            $photo = $request->file('dish_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(50, 50);
            $img->save(public_path().'/img/'.$file);
            $dish->photo = asset('/img') . '/' . $file;
        }
        $dish->dish_title = $request->dish_title;
        $dish->dish_text = $request->dish_text;
        $dish->meniu_id = $request->meniu_id;
        $dish->save();
        return redirect()->route('dish-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if ($dish->photo) {
            $name = pathinfo($dish->photo, PATHINFO_FILENAME);
            $ext = pathinfo($dish->photo, PATHINFO_EXTENSION);
            $path = public_path('/img') . '/' . $name . '.' . $ext;
            if ($path) {
                unlink($path);
            }
        }
        $dish->delete();
        return redirect()->back();
    }
}
