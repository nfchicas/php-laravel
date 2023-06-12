<h1> {{ $tipo }} Proyecto </h1>
<br>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
    @foreach( $errors->all() as $error)
       <li> {{ $error }} </li>
    @endforeach
</ul>

    </div>


   
@endif
<div class="form-group">

<label for="NombreProyecto"> Nombre del Proyecto </label>
<input type="text" class = "form-control" name="NombreProyecto" id="NombreProyecto" value="{{isset($proyecto->NombreProyecto)?$proyecto->NombreProyecto:old('NombreProyecto')}}">

</div>
<div class="form-group">

<label for="FuenteFondos"> Fuente de Fondos </label>
<input type="text" class = "form-control" name="FuenteFondos" id="FuenteFondos" value="{{isset($proyecto->FuenteFondos)?$proyecto->FuenteFondos:old('FuenteFondos')}}">

</div>

<div class="form-group">
<label for="MontoPlanificado"> Monto Planificado </label>
<input type="text" class = "form-control" name="MontoPlanificado" id="MontoPlanificado" value="{{isset($proyecto->MontoPlanificado)?$proyecto->MontoPlanificado:old('MontoPlanificado')}}">

</div>

<div class="form-group">
<label for="MontoPatrocinado"> Monto Patrocinado </label>
<input type="text" class = "form-control" name="MontoPatrocinado" id="MontoPatrocinado" value="{{isset($proyecto->MontoPatrocinado)?$proyecto->MontoPatrocinado:old('MontoPatrocinado')}}">


</div>

<div class="form-group">
<label for="MontoFondosPropios"> Monto Fondos Propios </label>
<input type="text" class = "form-control" name="MontoFondosPropios" id="MontoFondosPropios" value="{{isset($proyecto->MontoFondosPropios)?$proyecto->MontoFondosPropios:old('MontoFondosPropios')}}">

</div>

<br>
<input type="submit" value="{{ $tipo }} datos"  class="btn btn-success">
<a href="{{url('proyecto/')}}" class="btn btn-info"> Regresar </a>
