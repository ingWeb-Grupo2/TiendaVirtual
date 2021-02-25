<h1> {{ $modo }} articulo </h1>

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
value="{{ isset($articulo-> nombre)?$articulo-> nombre:old('nombre') }}" id="nombre">
</div>

<div class="form-group">
<label for="descripcion"> Descripcion </label>
<input type="text" class="form-control" name="descripcion" 
value="{{ isset($articulo-> descripcion)?$articulo-> descripcion:old('descripcion') }}" id="descripcion">
</div>

<div class="form-group">
<label for="precio"> Precio </label>
<input type="text" class="form-control" name="precio" 
value="{{ isset($articulo-> precio)? $articulo-> precio:old('precio') }}" id="precio">
</div>

<div class="form-group">
<label for="codMarca"> Codigo Marca </label>
<input type="text" class="form-control" name="codMarca" 
value="{{ isset($articulo-> codMarca)?$articulo-> codMarca:old('codMarca') }}" id="codMarca">
</div>

<div class="form-group">
<label for="codCategoria"> Codigo Categoria </label>
<input type="text" class="form-control" name="codCategoria" 
value="{{ isset($articulo-> codCategoria)?$articulo-> codCategoria:old('codCategoria') }}" id="codCategoria">
</div>

<div class="form-group">
<label for="stock"> Stock </label>
<input type="text" class="form-control" name="stock" 
value="{{ isset($articulo-> stock)?$articulo-> stock:old('stock') }}" id="stock">
</div>

<div class="form-group">

<label for="foto"> </label>
@if (isset($articulo->foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$articulo->foto }}" width="100" alt="">
@endif
<input type="file" class="form-control" name="foto" value="" id="foto">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('articulo/') }}"> Regresar </a>

<br>