<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats_195 = Producto::all()->where('categoria','195g');

        if( Auth::check() ){
            $user_id = auth()->user()->id;
            $cart = Cart::all()->where('user_id',$user_id)->count();
            return view('home', compact('cats_195','cart'));
        }
        return view('home', compact('cats_195'));
    }
    public function vendedorHome()
    {
        return view('vendedor.home');
    }

    public function adminHome()
    {
        return view('admin.users.home');
    }

}
