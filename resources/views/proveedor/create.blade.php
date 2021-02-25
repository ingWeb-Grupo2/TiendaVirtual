@extends ('layouts.app')
@section('content')
<div class="container">

<form action="{{  url('/proveedor') }}" method="post">
@csrf 
@include('proveedor.form', ['modo'=>'Crear']);

</form>
</div>
@endsection