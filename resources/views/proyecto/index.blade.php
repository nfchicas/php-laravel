
@extends('layouts.app')

@section('content')
<div class="container">

<center><h1> Mantenimiento de Proyectos <h1> </center>
<br>
    @if(Session::has('mensaje'))
        {{ Session::get('mensaje') }}
    @endif

<br>
<a href="{{url('proyecto/create')}}" class="btn btn-success"> Adicionar nuevo Proyecto </a>
<a href="{{url('proyecto/pdf')}}" class="btn btn-primary"> Descargar Listado </a>

<br>
<br>

<table class="table table-stripped table-hover">
    
    <tr>
        <th>#</th>
        <th>Nombre del Proyecto</th>
        <th>Fuente de Fondos</th> 
        <th>Monto Planificado</th>
        <th>Monto Patrocinado</th>
        <th>Monto Fondos Propios</th>
        <th>Acciones</th>
    </tr>
    <tbody>
        @foreach($proyectos as $proyecto)
        <tr>
            <td>{{$proyecto->id}}</td>
            <td>{{$proyecto->NombreProyecto}} </td>
            <td>{{$proyecto->FuenteFondos}}</td>
            <td align="right">
                
                {{$proyecto->MontoPlanificado}}
            
            </td>
            <td align="right">{{$proyecto->MontoPatrocinado}}</td>
            <td align="right">{{$proyecto->MontoFondosPropios}}</td>
            <td>
                <a href="{{url('/proyecto/'.$proyecto->id.'/edit')}}" class="btn btn-warning">

            Editar
</a>
            
            | <form
                    action="{{url('/proyecto/eliminar/'.$proyecto->id)}}"  class="d-inline" method="post">
                    @csrf 
                    {{ method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Desea eliminar el registro?')" value = "Borrar" class="btn btn-danger">
                </form></td>

        </tr>
        @endforeach

    </tbody>



</table>
{!! $proyectos->links() !!}
</div>
@endsection
