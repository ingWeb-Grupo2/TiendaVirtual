@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{  url('/categoria') }}" method="post">
@csrf
@include('categoria.form',['modo'=>'Crear']);

</form>
</div>
@endsection