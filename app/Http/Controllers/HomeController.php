<?php

namespace App\Http\Controllers;
use App\Models\Meniu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(isset(Auth::user()->role) && Auth::user()->role  == 1){
            $menius = Meniu::all();
        return view('meniu.index',['menius' => $menius]);
        }
        return view('home');
    }
}
