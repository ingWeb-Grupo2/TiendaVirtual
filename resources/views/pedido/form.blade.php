<h1> {{ $modo }} pedido </h1>
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
<label for="Codigo"> Codigo </label>
<input type="text" class="form-control" name="Codigo"" 
value="{{ isset($pedido->Codigo)?$pedido->Codigo:old('Codigo') }}" id="Codigo">
</div>

<div class="form-group">
<label for="Fecha_Pedido"> Fecha Pedido </label>
<input type="text" class="form-control" name="Fecha_Pedido" 
value="{{ isset($pedido->Fecha_Pedido)?$pedido->Fecha_Pedido:old('Fecha_Pedido') }}" id="Fecha_Pedido">
</div>

<div class="form-group">
<label for="Entregado"> Entregado </label>
<input type="text" class="form-control" name="Entregado" 
value="{{ isset($pedido->Entregado)?$pedido->email:old('Entregado') }}" id="Entregado">
</div>

<div class="form-group">
<label for="PrecioTotal"> Precio Total </label>
<input type="text" class="form-control" name="PrecioTotal" 
value="{{ isset($pedido->PrecioTotal)?$pedido->PrecioTotal:old('PrecioTotal') }}" id="PrecioTotal">
</div>

<input class="btn btn-primary" type="submit" 
value="{{ $modo }} datos">

<a class="btn btn-secondary" href="{{ url('pedido/') }}"> Regresar</a>

<br>