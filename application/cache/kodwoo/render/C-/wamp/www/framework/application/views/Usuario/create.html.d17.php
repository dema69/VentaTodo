<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, '../cabecera.html', null, null, null, '_root', null);?>

<body >
	<?php echo Dwoo_Plugin_include($this, '../menu.html', null, null, null, '_root', null);?>

	<div class="container">
	<div class="page-header">
       	 	<h1>Crear Nuevo Usuario</h1>
     </div>
		<form role="form" method="post" action="http://localhost/framework/index.php/Producto/new" id="form" >
			
			<div class="form-group">
				<label for="rut">Rut</label>
				<div class="input-group ancho ">
				<input type="text" class="form-control has-feedback" id="rut" 
				placeholder="Introduzca el rut del usuario" >
				</div>
			</div>
			<div class="form-group ">
				<label for="usuario">Usuario</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="usuario"
				placeholder="Introduzca el nombre del usuario" required >
				</div>
			</div>
			<div class="form-group ">
				<label for="nombre">Nombre</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="nombre"
				placeholder="Introduzca el nombre del usuario" required >
				</div>
			</div>
			<div class="form-group ">
				<label for="apellido">Apellido</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="apellido"
				placeholder="Introduzca el apellido del usuario" required >
				</div>
			</div>
			<div class="form-group ">
				<label for="password">Password</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="password"
				placeholder="Introduzca la password del usuario" required >
				</div>
			</div>
			<div class="form-group ">
				<label for="correo">Correo</label>
				<div class="input-group ancho ">
				
				<input type="email" class="form-control  has-feedback" id="correo"
				placeholder="Introduzca la correo del usuario" required >
				</div>
			</div>
			<div class="form-group">
				<label for="perfil">Pefil</label>
				<div class="input-group ancho ">		
				<select class="form-control has-feedback" id="perfil">
				<?php 
$_fh0_data = (isset($this->scope["tipos"]) ? $this->scope["tipos"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
				<option value='<?php echo $this->scope["row"]["codigo_perfil"];?>'> <?php echo $this->scope["row"]["nombre_perfil"];?> </option>
				<?php 
/* -- foreach end output */
	}
}?>

				</select>
				</div>
			</div>
			<div class="form-group ">
				<label for="fecha">Fecha Nacimiento</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="fecha"
				placeholder="Introduzca la fecha de nacimiento del usuario" required >
				</div>
			</div>	
			<button type="submit" class="btn btn-primary" id="crear"  data-target="#popupCrearUsuario">Crear</button>
			<button type="reset" class="btn btn-warning"  >Reset</button>
		</form>
		
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup producto -->
	<div class="modal fade" id="popupCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Creacion completada</h4> 
				</div> 
				<div  class="modal-body"> 
					<div class='panel panel-default'>   
						<div class='panel-body mensaje'>   
							
						</div>   
					</div>   
				</div> 
				<div class="modal-footer">
				 <button type="button" class="btn btn-info" data-dismiss="modal" >Seguir creado usuario</button> 
				 <a href="http://localhost/framework/index.php/Usuario/" role="button" class="btn btn-success">Volver a listar los usuario</a>
				</div>
			</div> 
			
		</div>
	</div>	

	<script>
		$(function() {

			$.validate();

			$('#fecha').datepicker({ dateFormat: 'dd-mm-yy' ,  maxDate: "+0M +0D +0Y" });
			function isDate(date) {
		        var valid = true;
		        if(date.length !=10)
		        	return false;

		        date = date.replace('-', '');
		        date = date.replace('-', '');
		        if(date.length !=8)
		        	return false;
		        var dia = parseInt(date.substring(0, 2),10);
		        var mes   = parseInt(date.substring(2, 4),10);
		        var anio  = parseInt(date.substring(4, 8),10);
		        

		        if((mes < 1) || (mes > 12)) 
		        	valid = false;
		        else if((dia < 1) || (dia > 31))
		         valid = false;
		        else if(((mes == 4) || (mes == 6) || (mes == 9) || (mes == 11)) && (dia > 30)) 
		        	valid = false;
		        else if((mes == 2) && (((anio % 400) == 0) || ((anio % 4) == 0)) && ((anio % 100) != 0) && (dia > 29)) 
		        	valid = false;
		        else if((mes == 2) && ((anio % 100) == 0) && (dia > 29)) 
		        	valid = false;

		    return valid;
		}
			$("#crear").click(function (event) {

				event.preventDefault();
				
				$('#rut').parent().removeClass("has-error"); 
				$('#usuario').parent().removeClass("has-error"); 
				$('#nombre').parent().removeClass("has-error");  
				$('#apellido').parent().removeClass("has-error");  
				$('#password').parent().removeClass("has-error"); 
				$('#correo').parent().removeClass("has-error");  
				$('#perfil').parent().removeClass("has-error");  
				$('#fecha').parent().removeClass("has-error");  
				$(".form-control-feedback").remove();
				$(".alert-danger").remove();

				if($('#rut').val() == ""){
					$('#rut').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#rut').parent().addClass("has-error"); 
					return;
				}


				else if($('#usuario').val() == ""){
					$('#usuario').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#usuario').parent().addClass("has-error"); 
					return;
				}

				else if($('#nombre').val() == ""){
					$('#nombre').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#nombre').parent().addClass("has-error"); 
					return;
				}

				else if($('#apellido').val() == ""){
					$('#apellido').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#apellido').parent().addClass("has-error"); 
					return;
				}
				else if($('#password').val() == ""){
					$('#password').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#correo').parent().addClass("has-error"); 
					return;
				}	

				else if($('#correo').val() == ""){
					$('#correo').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#correo').parent().addClass("has-error"); 
					return;
				}
				else if($('#perfil').val() == ""){
					$('#perfil').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#perfil').parent().addClass("has-error"); 
					return;
				}
				else if($('#fecha').val() == ""){
					$('#fecha').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#fecha').parent().addClass("has-error"); 
					return;
				}
				else if(!isDate($('#fecha').val())){
					$('#fecha').focus().after("<div class='alert alert-danger'>Ingrese una fecha valida</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#fecha').parent().addClass("has-error"); 
					return;
				}
				

				$.post("http://localhost/framework/index.php/Usuario/new2",
					{
						newRut : $('#rut').val(),
						newUsuario : $('#usuario').val(),
						newNombre : $('#nombre').val(),
						newApellido : $('#apellido').val(),
						newEmail : $('#correo').val(),
						newTipo : $('select#perfil option:selected').val(),
						newfecha : $('#fecha').val()

					}, function(data) {
					   
						if(data == "err1"){
							$(".mensaje").html
								("<p>El rut del usuario ya se encuentra registrado en el sistema.</p>");
								$('#popupCrearUsuario').modal('show');
						}

						else if(data == "err2"){
							$(".mensaje").html
								("<p>El username del usuario ya se encuentra registrado en el sistema.</p>");
								$('#popupCrearUsuario').modal('show');
						}


						else {
							var types = JSON.parse(data);
							$(".mensaje").html
								(" \
									<p>Rut: <strong> "+types[0].id_usuario+"</strong><p> \
									<p>Username:<strong> "+types[0].login_usuario+"</strong><p> \
									<p>Nombre:<strong> "+ types[0].nombre_usuario+"</strong><p> \
									<p>Apellido:<strong> "+types[0].apellido_usuario+"</strong></p>\
									<p>Correo:<strong> "+types[0].correo_usuario+"</strong></p>\
									<p>Perfil:<strong> "+types[0].nombre_perfil+"</strong></p>\
									<p>Fecha:<strong> "+types[0].fechaNacimiento_usuario+"</strong></p>\
								");
								$('#popupCrearUsuario').modal('show');
							
						}

						
					});
			});

		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>