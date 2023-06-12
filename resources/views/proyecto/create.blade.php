
@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/proyecto/almacenar')}}" method="post">
    @csrf
    @include('proyecto.form',['tipo'=>'Crear'])
    
</form>

</div>
@endsection


