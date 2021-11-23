<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\User;





class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duplicados=Producto::withCount(['carts'=>function(Builder $query){
            $query->where('user_id', auth()->user()->id);
        }])->get();

        $total=0;
        $subtotal=0;

        return view('order.index', compact('duplicados','total','subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=auth()->user()->id;

        $validated = $request->validate([
            'dir' => 'required',
            'tel' => 'required',
            'pago' => 'required',
        ]);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->total = $request->total;
        $order->pago = $request->pago;
        $order->status = "pendiente";

        $order->save();

        // $items = Cart::where('user_id',auth()->user()->id)->get()->count();
        // for($i,$i<$items,$i++){

        // }

        $items = Cart::where('user_id',auth()->user()->id)->get();
        foreach($items as $item){
            $orderitem = new OrderItem;
            $orderitem->order_id = $order->id;
            $orderitem->producto_id = $item->producto_id;
            $orderitem->save();
        }


        $user = User::findOrFail($user_id);
        $user->tel = $request->tel;
        $user->dir = $request->dir;
        $user->update();

        Cart::where('user_id',auth()->user()->id)->delete();

        if($order->pago == "oxxo"){
            return view('order.oxxo');
        }else if($order->pago == "paypal"){
            return redirect('/paypal/pay');
        }else if($order->pago == "tarjeta"){
            return view('order.tarjeta');
        }

        return "asd";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
