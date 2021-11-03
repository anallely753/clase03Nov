@extends('layouts.app')

@section('content')

@if(session('success'))
    <h2>{{session('success')}}</h2>
@endif
<section class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="display-5 mb-2">Bienvenido, admin</h1>
        </div>
        <!-- <div class="col">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('adminuser.index')}}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adminproducto.index')}}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-socios.html">Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reporte</a>
                </li>
            </ul>
        </div> -->
        <x-package-test/>
    </div>
</section>
<section class="home-cursos container my-5">
    <div class="admin-users_title">
        <h2 class="text-center">Usuarios</h2>
        <form class="d-flex w-75 float-right">
           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success" type="submit">Search</button>
         </form>
    </div>
    <section class="container show-curso_lista">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Dirección</th>
              <th scope="col">#Tickets</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->tel}}</td>
              <td>{{$user->dir}}</td>
              <td>3</td>
              <td>
                <a href="{{route('adminuser.show',$user->id)}}"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                <!-- <a href="admin-user-edit.html"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a> -->

                <form action="{{route('adminuser.destroy', $user->id)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></button>
                </form>
                

              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
    </section>
</section>
@endsection
