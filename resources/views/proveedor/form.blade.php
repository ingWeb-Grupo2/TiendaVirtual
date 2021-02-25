<h1> {{ $modo }} proveedor </h1>
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
<label for="empresa"> Empresa </label>
<input type="text" class="form-control" name="empresa" 
value="{{ isset($proveedor->empresa)?$proveedor->empresa:old('empresa') }}" id="empresa">
</div>

<div class="form-group">
<label for="direccion"> Direccion </label>
<input type="text" class="form-control" name="direccion" 
value="{{ isset($proveedor->direccion)?$proveedor->direccion:old('direccion') }}" id="direccion">
</div>

<div class="form-group">
<label for="email"> Email </label>
<input type="text" class="form-control" name="email" 
value="{{ isset($proveedor->email)?$proveedor->email:old('email') }}" id="email">
</div>

<div class="form-group">
<label for="telefono"> Telefono </label>
<input type="text" class="form-control" name="telefono" 
value="{{ isset($proveedor->telefono)?$proveedor->telefono:old('telefono') }}" id="telefono">
</div>

<div class="form-group">
<label for="ruc"> RUC </label>
<input type="text" class="form-control" name="ruc" 
value="{{ isset($proveedor->ruc)?$proveedor->ruc:old('ruc') }}" id="ruc">
</div>

<input class="btn btn-primary" type="submit" 
value="{{ $modo }} datos">

<a class="btn btn-secondary" href="{{ url('proveedor/') }}"> Regresar</a>

<br>