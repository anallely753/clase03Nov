@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
<section class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="display-5 mb-2">Agrega un producto</h1>
        </div>
        <div class="col">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin-index.html">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-productos.html">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-socios.html">Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reporte</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="show-curso_desc container my-5">
    <div class="card w-75 shadow-lg edit-course_card">
        <form class="row g-3" action="{{route('adminproducto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="foto" class="form-label">Foto</label><br>
                <div class="row">
                    <div class="col">
                        <input name="foto" type="file" class="form-control" id="foto" value="Cacao">
                    </div>
                    <div class="col">
                        <img src="" alt="">
                    </div>
							
                </div>
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Nombre</label>
                <input name="name" type="text" class="form-control" id="name" >
            </div>
            <div class="col-md-6">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                  <option selected>Open this select menu</option>
                  <option value="195g">195g</option>
                  <option value="360g">300g</option>
                  <option value="Kits">Kits</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input name="precio" type="text" class="form-control" id="precio" >
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Stock</label>
                <input name="stock" type="number" class="form-control" id="precio">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-negro">Agregar</button>
            </div>
        </form>
    </div>
</section>
@endsection