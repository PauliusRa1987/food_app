<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Meniu;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Meniu $meniu)
    {
        return view('order.create', ['meniu' => $meniu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dish $dish)
    {
        
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->place_id = $dish->getMeniuInfo->getInfo->id;
        $order->dish_id = $dish->id;
        $order->stics= $request->stics;
        $order->save();
        return redirect()->route('order-show', Auth::user()->id)->with('success', 'Your order has been send to the kichen!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $userId)
    {
        $orders = Order::where('user_id', $userId)->orderBy('id', 'desc')->get();
        return view('order.show', ['orders' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orders = Order::all();
        return view('order.edit', ['orders' => $orders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('deleted', 'Your order has been deleted!');
    }
}
