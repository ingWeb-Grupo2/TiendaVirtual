@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{  url('/categoria/'.$categoria->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}

@include('categoria.form',['modo'=>'Editar']);

</form>
</div>
@endsection

