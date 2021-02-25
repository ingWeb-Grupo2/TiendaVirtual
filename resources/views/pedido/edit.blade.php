@extends ('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/pedido/'.$pedido->id) }}" method="post">
@csrf
{{ method_field('PATCH') }} 

@include('pedido.form',['modo'=>'Editar']);

</form>
</div>
@endsection