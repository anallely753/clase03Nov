@extends('layouts.app')

@section('content')
    <section class="home-cursos container my-5">
        <div class="admin-users_title">
            <h2 class="text-center">Tu carrito</h2>
        </div>
        @if(session('success'))
            {{session('success')}}
        @endif
        <section class="container show-curso_lista">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subotal</th>
                </tr>
                </thead>
                <tbody>
                    <!-- {{$duplicados}} -->
                    @foreach($duplicados as $duplicado)
                        @if($duplicado->carts_count>0)
                            <tr>
                                <td><img src="{{asset('img/'.$duplicado->foto)}}" alt="">{{$duplicado->nombre}}</td>
                                <td>{{$duplicado->precio}}</td>
                                <td>
                                    <form action="{{route('cart.update',$duplicado->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" value="{{$duplicado->id}}" name="producto_id">
                                        <input type="number" value="{{$duplicado->carts_count}}" name="cantidad">
                                        <input type="submit" value="Actualizar">
                                    </form>
                                    <!-- <form action="{{route('cart.update',$duplicado->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" value="{{$duplicado->id}}" name="producto_id">
                                        <input type="hidden" value="0" name="cantidad">
                                        <input type="submit" value="Eliminar">
                                    </form> -->
                                    <form action="{{route('cart.destroy',$duplicado->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" value="{{$duplicado->id}}" name="producto_id">
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </td>
                                <td>{{$duplicado->carts_count * $duplicado->precio}}</td>
                                <span class="invisible">{{$subtotal = $duplicado->carts_count * $duplicado->precio}}</span>
                                <span class="invisible">{{$total=$total+$subtotal}}</span>
                            </tr>
                        @endif
                    @endforeach
                    <!-- @foreach($items as $item)
                        <tr>
                            <td><img src="{{asset('img/'.$item->producto->foto)}}" alt="">{{$item->producto->nombre}}</td>
                            <td>{{$item->producto->precio}}</td>
                            <td>3</td>
                            <td>$1600</td>
                        </tr>
                    @endforeach -->
                <tr>
                    <td colspan="2"></td>
                    <td >Total</td>
                    <td>${{$total}}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{route('order.index')}}" class="btn btn-naranja float-end">Checkout</a>
        </section>
    </section>
@endsection