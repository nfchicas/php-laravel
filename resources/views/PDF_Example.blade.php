<center><strong>Gobierno de El Salvador </strong></center>
<center><strong>Instituto Salvadoreño del Seguro Social<strong></center>
<br>
<center><strong>Listado de Proyectos<strong></center>
Fecha: <?php
     $mytime = Carbon\Carbon::now();
     echo $mytime->toDateTimeString();
    ?>
<br>
Autor: Nelson Francisco Chicas

<table class="table table-stripped table-hover">
    
    <tr>
        <th>#</th>
        <th>Nombre del Proyecto</th>
        <th>Fuente de Fondos</th> 
        <th>Monto Planificado</th>
        <th>Monto Patrocinado</th>
        <th>Monto Fondos Propios</th>
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
        @endforeach

    </tbody>
</table>