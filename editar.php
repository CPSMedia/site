<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&family=Nunito:wght@600&family=Raleway:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/registro.css">
	<title>Editar datos del visitante</title>
</head>
<body>
	<header class="encabezado">
		<div class="logo">
			<img src="img/logo1.jpg" alt="Logo">
		</div>
		<nav class="menu">
        <a href="registro.php" class="menu-item">Nuevo registro</a>
        <a href="consulta.php" class="menu-item">Consultar registros</a>
    </nav>
	</header>
	<h1>Editar datos del visitante</h1>

	<?php 
		if (isset($_POST["enviar"])) {
		 	$id=$_POST["id"];
		 	$nombre_completo=$_POST["nombre_completo"];
		 	$telefono=$_POST["telefono"];
		 	$correo=$_POST["correo"];
		 	$empresa=$_POST["empresa"];
		 	$departamento=$_POST["departamento"];
		 	$asunto=$_POST["asunto"];
		 	$identificacion=$_POST["identificacion"];
		 	$observaciones=$_POST["observaciones"];

		 	require_once("conexion.php");

		 	$actualizar=mysqli_query($conexion, 
		 			"
		 			UPDATE
		 				registro
		 					SET 
		 						nombre_completo='$nombre_completo',
		 						telefono='$telefono',
		 						correo='$correo',
		 						empresa='$empresa',
		 						departamento='$departamento',
		 						asunto='$asunto',
		 						identificacion='$identificacion',
		 						observaciones='$observaciones',
		 						`fecha_hora` = CURRENT_TIMESTAMP
		 					WHERE 
		 						id='$id'
		 		");
		 	echo "<h2 class='registrado'>Datos del visitante actualizados con éxito</h2>";
		 } 

		if (isset($_GET["id"])) {
			$id=$_GET["id"];

			require_once("conexion.php");

			$consulta=mysqli_query($conexion, "SELECT * FROM registro WHERE id='$id' ");
			$fila=mysqli_fetch_array($consulta);
			$departamento=$fila["departamento"];
			$asunto=$fila["asunto"];
			$identificacion=$fila["identificacion"];

			if ($departamento=="Tribuna de la Bahía") {
				$departamentos='
					<option value="Radiante FM">Radiante FM</option>
					<option value="Tribuna de la Bahía" selected>Tribuna de la Bahía</option>
					<option value="TV Mar">TV Mar</option>
					<option value="Ventas">Ventas</option>
					<option value="Dirección">Dirección</option>
					<option value="Digital">Digital</option>
				';
			} elseif ($departamento=="TV Mar") {
				$departamentos='
					<option value="Radiante FM">Radiante FM</option>
					<option value="Tribuna de la Bahía">Tribuna de la Bahía</option>
					<option value="TV Mar" selected>TV Mar</option>
					<option value="Ventas">Ventas</option>
					<option value="Dirección">Dirección</option>
					<option value="Digital">Digital</option>
				';
			} elseif ($departamento=="Ventas") {
				$departamentos='
					<option value="Radiante FM">Radiante FM</option>
					<option value="Tribuna de la Bahía">Tribuna de la Bahía</option>
					<option value="TV Mar">TV Mar</option>
					<option value="Ventas" selected>Ventas</option>
					<option value="Dirección">Dirección</option>
					<option value="Digital">Digital</option>
				';
			} elseif ($departamento=="Dirección") {
				$departamentos='
					<option value="Radiante FM">Radiante FM</option>
					<option value="Tribuna de la Bahía">Tribuna de la Bahía</option>
					<option value="TV Mar">TV Mar</option>
					<option value="Ventas">Ventas</option>
					<option value="Dirección" selected>Dirección</option>
					<option value="Digital">Digital</option>
				';
			} elseif ($departamento=="Digital") {
				$departamentos='
					<option value="Radiante FM">Radiante FM</option>
					<option value="Tribuna de la Bahía">Tribuna de la Bahía</option>
					<option value="TV Mar">TV Mar</option>
					<option value="Ventas">Ventas</option>
					<option value="Dirección">Dirección</option>
					<option value="Digital" selected>Digital</option>
				';
			} else {
    $departamentos = '
        <option value="Radiante FM">Radiante FM</option>
        <option value="Tribuna de la Bahía">Tribuna de la Bahía</option>
        <option value="TV Mar">TV Mar</option>
        <option value="Ventas">Ventas</option>
        <option value="Dirección">Dirección</option>
        <option value="Digital">Digital</option>
    ';
}

			if ($asunto=="Reunión") {
				$asuntos='
					<option value="visita">Visita</option>
					<option value="Reunión" selected>Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Entrevista") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista" selected>Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Programa de TV") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV" selected>Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Programa de Radio") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio" selected>Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Prácticas") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas" selected>Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Evento") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento" selected>Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Casting") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting" selected>Casting</option>
					<option value="Capacitación">Capacitación</option>
				';
			} elseif ($asunto=="Capacitación") {
				$asuntos='
					<option value="Visita">Visita</option>
					<option value="Reunión">Reunión</option>
					<option value="Entrevista">Entrevista</option>
					<option value="Programa de TV">Programa de TV</option>
					<option value="Programa de Radio">Programa de Radio</option>
					<option value="Prácticas">Prácticas</option>
					<option value="Evento">Evento</option>
					<option value="Casting">Casting</option>
					<option value="Capacitación" selected>Capacitación</option>
				';
			} else {
    $asuntos = '
        <option value="Visita">Visita</option>
        <option value="Reunión">Reunión</option>
        <option value="Entrevista">Entrevista</option>
        <option value="Programa de TV">Programa de TV</option>
        <option value="Programa de Radio">Programa de Radio</option>
        <option value="Prácticas">Prácticas</option>
        <option value="Evento">Evento</option>
        <option value="Casting">Casting</option>
        <option value="Capacitación">Capacitación</option>
    ';
}



			if ($identificacion=="Licencia de conducir") {
				$identificaciones='
					<option value="Credencial INE">Credencial INE</option>
					<option value="Licencia de conducir" selected>Licencia de conducir</option>
					<option value="Credencial de estudiante">Credencial de estudiante</option>
					<option value="otro">Otro</option>
				';
			} elseif ($identificacion=="Credencial de estudiante") {
				$identificaciones='
					<option value="Credencial INE">Credencial INE</option>
					<option value="Licencia de conducir">Licencia de conducir</option>
					<option value="Credencial de estudiante" selected>Credencial de estudiante</option>
					<option value="otro">Otro</option>
				';
			} elseif ($identificacion=="Otro") {
				$identificaciones='
					<option value="Credencial INE">Credencial INE</option>
					<option value="Licencia de conducir">Licencia de conducir</option>
					<option value="Credencial de estudiante">Credencial de estudiante</option>
					<option value="Otro" selected>Otro</option>
				';
			} else {
    $identificaciones = '
        <option value="Credencial INE">Credencial INE</option>
        <option value="Licencia de conducir">Licencia de conducir</option>
        <option value="Credencial de estudiante">Credencial de estudiante</option>
        <option value="Otro">Otro</option>
    ';
}

			printf('
<div class="contenedor-formulario">
<form action="#" method="post">
			<table>
				<tr>
					<td><label>Nombre:</label></td>
					<td><input type="text" name="nombre_completo" required value="%s"></td>
				</tr>
				<tr>
					<td><label>Teléfono:</label></td>
					<td><input type="text" name="telefono" required value="%s"></td>
				</tr>
				<tr>
					<td><label>Correo:</label></td>
					<td><input type="text" name="correo" required value="%s"></td>
				</tr>
				<tr>
					<td><label>De que empresa nos visita:</label></td>
					<td><input type="text" name="empresa" required value="%s"></td>
				</tr>
				<tr>
					<td><label>Departamento que visita:</label></td>
					<td>
						<select name="departamento" value="%s">
							'.$departamentos.'
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Asunto:</label></td>
					<td>
						<select name="asunto" value="%s">
							'.$asuntos.'
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Identificación:</label></td>
					<td>
						<select name="identificacion" value="%s">
							'.$identificaciones.'
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Observaciones:</label></td>
						<td><textarea name="observaciones"> %s</textarea></td>
				</tr>

				<td><input type="hidden" value="%s" name="id"></td>
				<td><input type="submit" value="Actualizar" name="enviar"></td>
			</table>
	</form>
</div>
	', $fila["nombre_completo"], $fila["telefono"], $fila["correo"], $fila["empresa"], $fila["departamento"], $fila["asunto"], $fila["identificacion"], $fila["observaciones"], $fila["id"]);	
		}
	?>
</body>
</html>