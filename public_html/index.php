<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edición de Profesores</title>
	<meta charset="utf-8">

	<!-- Importación de librerías de estilo: Bootstrap, Alertify y FontAwesome -->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="iconos/fontawesome-web/css/all.css">

	<!-- Importación de librerías de JavaScript: JQuery, Bootstrap y Alertify -->
	<script src="librerias/jquery-3.3.1.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
	<script src="js/cargar_tabla.js"></script>
	<script src="js/funciones.js"></script>

</head>


<body>
	<div class="container">	<!-- Clase de bootstrap "container" es un contenedor de ancho fijo sensible -->
		<br>
		<div class="form-group"><!-- Clase de bootstrap que garantiza los margenes adecuados para los formularios -->
      		<label for="buscar">Ingrese el nombre del profesor, RFC u homoclave: </label>
      		<br>
      		<input type="text" class="form-control-sm" id="buscador" placeholder="Busqueda..." name="">
    	</div>

		<div id="tabla"></div>	<!-- En esta caja se mostrará la tabla con los datos respectivos -->
	</div>


	<!-- MODAL PARA REGISTROS NUEVOS -->

<!-- <div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nueva persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Nombre</label>
        <input type="text" name="" id="nombre" class="form-control input-sm">
        <label>Apellido</label>
        <input type="text" name="" id="apellido" class="form-control input-sm">
        <label>Email</label>
        <input type="text" name="" id="email" class="form-control input-sm">
        <label>Telefono</label>
        <input type="text" name="" id="telefono" class="form-control input-sm">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar_nuevo">Agregar</button>
      </div>
    </div>
  </div>
</div> -->


	<!-- MODAL PARA EDICIÓN DE REGISTROS -->
	
	<div class="modal fade" id="modal_edicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Datos de Profesor</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         	<span aria-hidden="true">&times;</span>
	        </button>
	      </div>


	      <div class="modal-body">

				<div>
	    			<form>
  						<div class="custom-control custom-switch">
    						<input type="checkbox" class="custom-control-input" id="switch1"
    							onclick="edita_datos()">
    						<label class="custom-control-label" for="switch1">
    							Editar   								
  									<i data-toggle="tooltip"
    									title="Permite editar nombre, RFC u homoclave y actualizar los cambios en todos los registros que coincida el nombre del profesor"
    									class="fas fa-info-circle">
   									</i>								
    						</label>
    						
  						</div>
					</form>
	    		</div>

	    		<div>
	    			<form>
  						<div class="custom-control custom-switch">
    						<input type="checkbox" class="custom-control-input" id="switch2"
    							onclick="reemplaza_datos()">
    						<label class="custom-control-label" for="switch2">
    							Reemplazar
    							<i data-toggle="tooltip"
    									title="Permite reemplazar nombre, RFC u homoclave de un profesor por los datos de otro profesor sin afectar otros registros"
    									class="fas fa-info-circle">
   									</i>
    						</label>
  						</div>
					</form>
	    		</div>

	
	      	<input type="text" hidden="" id="identificador_grupo_modal" name="">
	      	<!-- num_registro -->
	      	<br>

  				<label><small>Carrera:</small></label>
	        	<input disabled type="text" name="" id="nombre_carrera_modal"
	        	class="form-control form-control-sm">

	        	<label><small>Grupo:</small></label>
	        	<input disabled type="text" name="" id="grupo_modal"
	        	class="form-control form-control-sm">
	     
	        	<label><small>ID:</small></label>
	        	<input disabled type="text" name="" id="id_materia_modal"
	        	class="form-control form-control-sm">
	     
	        	<label><small>Materia:</small></label>
	        	<input disabled type="text" name="" id="nombre_materia_modal"
	        	class="form-control form-control-sm">
	     
	        	<label><small>Profesor:</small></label>
	        	<input disabled type="text" name="" id="nombre_profesor_modal"
	        	class="form-control form-control-sm">
	    
	        	<label><small>RFC:</small></label>
	        	<input disabled type="text" name="" id="rfc_profesor_modal"
	        	class="form-control form-control-sm">
	     
	        	<label><small>Homoclave:</small></label>
	        	<input disabled type="text" name="" id="homo_profesor_modal"
	        	class="form-control form-control-sm">
	  

	      </div>


	      <div class="modal-footer">	

	        <button type="button" class="btn btn-warning btn-sm" id="boton_cancelar"
	        	data-dismiss="modal">Cancelar
			</button>

	        <button disabled type="button" class="btn btn-primary btn-sm" id="actualiza_datos"
	        	data-dismiss="modal">Actualizar
	        </button>

	        <button disabled type="button" class="btn btn-primary btn-sm" id="actualiza_datos_reemplazo"
	        	data-dismiss="modal">Actualizar
	        </button>
	        
	      </div>
	    </div>
	  </div>
	</div>
	

</body>
</html>
