@extends('layouts.app')

@section('content')

@if(session('cart-success'))
    <div class="alert bg-warning">
        <p>{{session('cart-success')}}</p>
    </div>
@endif
<section class="landing container pt-mb-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h1 class="display-5 mb-2">Lorem, ipsum.</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum, odio tempore hic blanditiis, repellat possimus expedita quibusdam excepturi dolores culpa? Quos dolorem, similique voluptatem nihil cumque odit dicta, vel suscipit.</p>
            <a href="productos.html" class="btn btn-naranja">Ver productos</a>
        </div>
        <div class="col-12 col-md-6 d-none d-md-block">
            <img src="img/banner.png" alt="">
        </div>
    </div>
</section>
<section class="home-cards container my-5">
    <h2 class="text-center pb-5 text-naranja">Presentación 195 g</h2>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($cats_195 as $cat_195)
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('/fotos/'.$cat_195->foto)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$cat_195->nombre}}</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: {{$cat_195->precio}}</p>

                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                                <a href=""><img src="img/eye.png" alt="" width="40"></a>
                                <a href=""><img src="img/love.png" alt="" width="40"></a>
                                <input type="hidden" value="{{$cat_195->id}}" name="product_id">
                                <button type="submit" class="bg-transparent border-0">
                                    <img class="ml-auto" src="img/add-cart.png" alt="">
                                </button>
                                <!-- <a href=""></a> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="ver-mas text-naranja" href="">Ver más</a>
    </div>
</section>
<section class="home-cards container my-5">
    <h2 class="text-center pb-5 text-naranja">Presentación 300 g</h2>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="img/avellana-195.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Avellana</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: $200</p>

                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <a href=""><img src="img/eye.png" alt="" width="40"></a>
                            <a href=""><img src="img/love.png" alt="" width="40"></a>
                            <a href="" class="add-cart"><img class="ml-auto" src="img/add-cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/horneado-195.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Cacahuate horneado</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: $200</p>
                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <a href=""><img src="img/eye.png" alt="" width="40"></a>
                            <a href=""><img src="img/love.png" alt="" width="40"></a>
                            <a href="" class="add-cart"><img class="ml-auto" src="img/add-cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/cacahuate-cacao-195.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Cacahuate cacao</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: $200</p>
                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <a href=""><img src="img/eye.png" alt="" width="40"></a>
                            <a href=""><img src="img/love.png" alt="" width="40"></a>
                            <a href="" class="add-cart"><img class="ml-auto" src="img/add-cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="ver-mas text-naranja" href="">Ver más</a>
    </div>
</section>
<section class="home-cards container my-5">
    <h2 class="text-center pb-5 text-naranja">Kits</h2>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="img/avellana-195.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Avellana</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: $200</p>

                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <a href=""><img src="img/eye.png" alt="" width="40"></a>
                            <a href=""><img src="img/love.png" alt="" width="40"></a>
                            <a href="" class="add-cart"><img class="ml-auto" src="img/add-cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/horneado-195.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Cacahuate horneado</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: $200</p>
                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <a href=""><img src="img/eye.png" alt="" width="40"></a>
                            <a href=""><img src="img/love.png" alt="" width="40"></a>
                            <a href="" class="add-cart"><img class="ml-auto" src="img/add-cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/cacahuate-cacao-195.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Cacahuate cacao</h4>
                        <p class="card-text">195g</p>
                        <p>Precio: $200</p>
                    </div>
                    <div class="card-footer d-flex">
                        <div class="card-footer_tags">
                        </div>
                        <div class="card-footer_btn">
                            <a href=""><img src="img/eye.png" alt="" width="40"></a>
                            <a href=""><img src="img/love.png" alt="" width="40"></a>
                            <a href="" class="add-cart"><img class="ml-auto" src="img/add-cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="ver-mas text-naranja" href="">Ver más</a>
    </div>
</section>
@endsection
