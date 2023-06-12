@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/proyecto/actualizar/'.$proyecto->id)}}" method="post">
 @csrf 
 {{ method_field('PATCH')}}

@include('proyecto.form',['tipo'=>'Editar'])

</form>

</edit>
@endsection

