@extends ('layouts.app')
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


<a href="{{ url('pedido/create') }}" class="btn btn-success"> Registrar nuevo pedido</a>
<br/>
<br/>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Codigo</th>
            <th>Fecha Pedido</th>
            <th>Entregado</th>
            <th>Precio Total</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
            <td>{{ $pedido -> id }}</td>
            <td>{{ $pedido -> Codigo }}</td>
            <td>{{ $pedido -> Fecha_Pedido }}</td>
            <td>{{ $pedido -> Entregado }}</td>
            <td>S/ {{ $pedido -> PrecioTotal }}</td>
        
            <td>
            
            <a href="{{ url('/pedido/'.$pedido->id.'/edit') }}" class="btn btn-primary">
                Editar
            </a>
             | 
            <form action="{{ url('/pedido/'.$pedido->id ) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-dark" type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">

            </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection
