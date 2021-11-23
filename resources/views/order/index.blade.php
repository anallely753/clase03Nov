@extends('layouts.app')

@section('content')
		<section class="home-cursos container my-5">
			<div class="admin-users_title">
				<h2 class="text-center">Tu orden de compra</h2>
			</div>
			<div class="row">
				<div class="col-6">
					<h4>Productos:</h4>
					<table class="table table-hover w-75">
					  <thead>
					    <tr>
					      <th scope="col">Producto</th>
					      <th scope="col">Cantidad</th>
					      <th scope="col">Subotal</th>
					    </tr>
					  </thead>
					  <tbody>
                        @foreach($duplicados as $duplicado)
                        @if($duplicado->carts_count>0)
                            <tr>
                            <td><img src="img/195-1.jpg" alt="">{{$duplicado->nombre}}</td>
                            <td>{{$duplicado->carts_count}}</td>
                            <td>{{$duplicado->carts_count * $duplicado->precio}}</td>
                            <p class="d-none">{{$subtotal = $duplicado->carts_count * $duplicado->precio}}<p>
                            <p class="d-none">{{$total=$total + $subtotal}}</p>
                            </tr>
                        @endif
                        @endforeach
					  </tbody>
					</table>
					<h3>Total:{{$total}}</h3><br>	
					<form action="	">
						<input type="text" placeholder="Código de descuento">
						<input type="submit" value="Usar">
					</form>
				</div>
				<div class="col-6">
					<br>	
					<h4>Información del contacto</h4><br>	
					<!-- <h5>Dirección:</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.	</p> -->
					<form action="{{route('order.store')}}" method="POST">
                    @csrf
                        @if(auth()->user()->dir == null)
						<h5>Agregar dirección:</h5>
						<input name="dir" type="text" placeholder="Dirección de envío"  required><br><br>
                        @else
                        <h5>Dirección:</h5>
                        <input name="dir" type="text" placeholder="Dirección de envío" value="{{auth()->user()->dir}}" required><br><br>
                        @endif

                        @if(auth()->user()->tel == null)
                        <h5>Agregar teléfono:</h5>
                        <input name="tel" type="text" placeholder="Teléfono" required ><br><br>
                        @else
                        <h5>Teléfono:</h5>
                        <input name="tel" type="text" placeholder="Teléfono" value="{{auth()->user()->tel}}" required><br><br>
                        @endif

						<h5>Método de pago:</h5>
						<input required type="radio" name="pago" value="oxxo"><span>Oxxo</span>
						<input required type="radio" name="pago" value="paypal"><span>Paypal</span>
						<input required type="radio" name="pago" value="tarjeta"><span>Tarjeta de crédito/debito</span>
						<br><br>

                        <input type="hidden" value="{{$total}}" name="total">

						<input type="submit" value="Siguiente">
					</form>
				</div>
			</div>
		</section>
@endsection