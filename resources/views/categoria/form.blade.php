<h1>{{ $modo }} categoria </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul>
    </div>
    

@endif

<div class="form-group">
<label for="nombre"> Nombre </label>
<input type="text" class="form-control" name="nombre" 
value="{{ isset($categoria->nombre)?$categoria->nombre:old ('nombre') }}" id="nombre">
</div>

<div class="form-group">
<label for="descripcion"> Descripcion </label>
<input type="text" class="form-control" name="descripcion" 
value="{{ isset($categoria->descripcion)?$categoria->descripcion:old ('descripcion') }}" id="descripcion">
</div>

<input class="btn btn-primary" type="submit" value="{{ $modo }} datos">

<a class="btn btn-secondary" href="{{ url('categoria/') }}"> Regresar </a>
<br>
