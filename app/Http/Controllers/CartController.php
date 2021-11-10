<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $cart = new Cart;
            $cart->producto_id = $request->product_id;
            $cart->user_id = auth()->user()->id;
            $cart->save();
            return redirect()->back()->with('cart-success','Tu producto se ha agregado al carrito');
        }
        return redirect('login')->with('error','Por favor inicia sesión para agregar productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $duplicados=Producto::withCount(['carts'=>function(Builder $query){
            $query->where('user_id', auth()->user()->id);
        }])->get();


        $items = Cart::all()->where('user_id',$id);
        $subtotal=0;
        $total=0;

        return view('cart', compact('items','duplicados','subtotal','total'));
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
        // Numero de carritos actuales
        $actual = Cart::where('user_id',auth()->user()->id)
        ->where('producto_id',$id)->get()->count();


        if($actual<$request->cantidad){
            $i=0;
            $diferencia = $request->cantidad - $actual;
            for($i;$i<$diferencia;$i++){
                $cart = new Cart;
                $cart->producto_id = $request->producto_id;
                $cart->user_id = auth()->user()->id;
                $cart->save();
            }
        }else{
            $i=0;
            $diferencia = $actual - $request->cantidad;
            for($i;$i<$diferencia;$i++){
                $carts =Cart::where('user_id',auth()->user()->id)
                ->where('producto_id',$id)->first()->delete();
            }
        }


        // dd($actual);

        return redirect()->back()->with('success','carrito actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carts = Cart::where('user_id',auth()->user()->id)
        ->where('producto_id',$id)->delete();

        return redirect()->back()->with('success','producto eliminado');

    }

    public function add(Request $request){
        return "add";
    }
}
