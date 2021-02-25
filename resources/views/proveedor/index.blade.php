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


<a href="{{ url('proveedor/create') }}" class="btn btn-success"> Registrar nuevo proveedor</a>
<br/>
<br/>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Empresa</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>RUC</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedors as $proveedor)
        <tr>
            <td>{{ $proveedor -> id }}</td>
            <td>{{ $proveedor -> empresa }}</td>
            <td>{{ $proveedor -> direccion }}</td>
            <td>{{ $proveedor -> email }}</td>
            <td>{{ $proveedor -> telefono }}</td>
            <td>{{ $proveedor -> ruc }}</td>
            <td>
            
            <a href="{{ url('/proveedor/'.$proveedor->id.'/edit') }}" class="btn btn-primary">
                Editar
            </a>
             | 
            <form action="{{ url('/proveedor/'.$proveedor->id ) }}" class="d-inline" method="post">
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
