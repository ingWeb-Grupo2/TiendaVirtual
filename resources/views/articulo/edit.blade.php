@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/articulo/'.$articulo-> id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }}

@include('articulo.form',['modo'=>'Editar']);
</form>
</div>
@endsection
