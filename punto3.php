<?php

include_once("clases/_MySQL.class.php");
$Database=new Database();

$listado = $Database->consultar();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jQuery UI Dialog - Default functionality</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		$( "#dialog_editar" ).dialog({draggable: false,modal: true,autoOpen: false,title:"Editar",closeOnEscape: true ,resizable: false,open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog || ui).hide(); }});
	} );
	</script>
    <title>Usuarios</title>
</head>
<body>
    <h1 align="center">Prueba de Desarrollo</h1>
    <table id="tablaUsuarios" border="1" align="center">
		<thead>
			<tr align="center">
				<td>Apellido</td>
				<td>Nivel de Educación</td>
				<td>Acciones</td>
			</tr>
		</thead>
		<tbody>
			<?php while($datos=$listado->fetch_array()){ ?>
			<tr>
				<input type="hidden" value="<?php echo $datos["id"]?>">
				<td><?php echo $datos["lastname"]?></td>
				<td><?php echo $datos["description"]?></td>
				<td><input type="button" name="btn_editar" class="pure-button pure-button-primary" value="Editar" onclick="$('#dialog_editar').dialog('open')"/></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br><br>
	<div align="center"> <button onclick="location.href='index.php'">Regresar</button> </div>
	
	<div id='dialog_editar'>
		<form name="frm_editar">
			<table>
				<input type="hidden" value="0" name="id_contenido">
				<tr><th>No hay tiempo para editar</th></tr>
			</table>
		</form>
	</div>
	
	
</body>
</html>