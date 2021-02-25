@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
    </div>
    @endif


<a href="{{ url('articulo/create') }}" class="btn btn-success" > Registrar nuevo articulo </a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio Unitario</th>
            <th>Codigo Marca</th>
            <th>Codigo Categoria</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
        <tr>
            <td>{{ $articulo->id }}</td>
            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$articulo->foto }}" width="100" alt="">
            
            </td>

            <td>{{ $articulo->nombre }}</td>
            <td>{{ $articulo->descripcion }}</td>
            <td>S/ {{ $articulo->precio }}</td>
            <td>{{ $articulo->codMarca }}</td>
            <td>{{ $articulo->codCategoria }}</td>
            <td>{{ $articulo->stock }}</td>
            <td>

            <a href="{{ url('/articulo/'.$articulo->id.'/edit') }}" class="btn btn-primary">
                Editar
            </a>
            |

            <form action="{{ url('/articulo/'.$articulo->id ) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" 
            value="Borrar">
            </form>
            
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{!! $articulos-> links() !!}
</div>
@endsection
