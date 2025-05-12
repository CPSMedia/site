<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de Visitas</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&family=Nunito:wght@600&family=Raleway:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/registro.css">
</head>
<body>
	<header class="encabezado">
		<div class="logo">
			<img src="img/logo1.jpg" alt="Logo">
		</div>
		<nav class="menu">
        <a href="registro.php" class="menu-item active">Nuevo registro</a>
        <a href="consulta.php" class="menu-item">Consultar registros</a>
    </nav>
	</header>
	<h1>Registro de Visitante</h1>

	<?php  
		if (isset($_POST["enviar"])) {
			$nombre_completo=$_POST["nombre_completo"];
			$telefono=$_POST["telefono"];
			$correo=$_POST["correo"];
			$empresa=$_POST["empresa"];
			$departamento=$_POST["departamento"];
			$asunto=$_POST["asunto"];
			$identificacion=$_POST["identificacion"];
			$observaciones=$_POST["observaciones"];

			require_once("conexion.php");

			$insertar = mysqli_query($conexion, "INSERT INTO registro (
				    nombre_completo,
				    telefono,
				    correo,
				    empresa,
				    departamento,
				    asunto,
				    identificacion,
				    observaciones
				) VALUES (
					'$nombre_completo',
					'$telefono',
					'$correo',
					'$empresa',
					'$departamento',
					'$asunto',
					'$identificacion',
					'$observaciones'
			)");
			
			if (!$insertar) {
    		die("Error al insertar: " . mysqli_error($conexion));
			}

			echo "<h2 class='registrado'>Visitante registrado con éxito</h2>";
		}
	?>
<div class="contenedor-formulario">
	<form action="#" method="post">
			<div class="form-row">
    <div class="form-group">
        <label>Nombre del visitante:</label>
        <input type="text" name="nombre_completo" required>
    </div>
    <div class="form-group">
        <label>Teléfono:</label>
        <input type="text" name="telefono" required>
    </div>
    <div class="form-group">
        <label>Correo electrónico:</label>
        <input type="text" name="correo" class="input-largo" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label>Empresa proveniente:</label>
        <input type="text" name="empresa" required>
    </div>
    <div class="form-group">
        <label>Área que visita:</label>
        <select name="departamento">
            <option value="Radiante FM">Radiante FM</option>
            <option value="Tribuna de la Bahía">Tribuna de la Bahía</option>
            <option value="TV Mar">TV Mar</option>
            <option value="Ventas">Ventas</option>
            <option value="Dirección">Dirección</option>
            <option value="Digital">Digital</option>
        </select>
    </div>
    <div class="form-group">
        <label>Asunto:</label>
        <select name="asunto">
            <option value="Visita">Visita</option>
            <option value="Reunión">Reunión</option>
            <option value="Entrevista">Entrevista</option>
            <option value="Programa de TV">Programa de TV</option>
            <option value="Programa de Radio">Programa de Radio</option>
            <option value="Prácticas">Prácticas</option>
            <option value="Evento">Evento</option>
            <option value="Casting">Casting</option>
            <option value="Capacitación">Capacitación</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label>Identificación:</label>
        <select name="identificacion">
            <option value="Credencial INE">Credencial INE</option>
            <option value="Licencia de conducir">Licencia de conducir</option>
            <option value="Credencial de estudiante">Credencial de estudiante</option>
            <option value="otro">Otro</option>
        </select>
    </div>
    <div class="form-group">
        <label>Observaciones:</label>
        <textarea name="observaciones" class="input-largo"></textarea>
    </div>
</div>

<input type="submit" value="Registrar" name="enviar">
	</form>
</div>
</body>
</html>