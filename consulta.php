<?php
if (isset($_GET["id"])) {
	require_once("conexion.php");
	$id = $_GET["id"];
	$eliminar = mysqli_query($conexion, "DELETE FROM registro WHERE id='$id' ");
	header("Location: consulta.php?eliminado=1");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consulta de Visitas</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&family=Nunito:wght@600&family=Raleway:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/consulta.css">
	<script>
		function confirmacion(){
			if (confirm("¿Deseas eliminar a este visitante?")) {
				return true;
			} return false;
		}
	</script>
</head>
<body>
	<header class="encabezado">
		<div class="logo">
			<img src="img/logo1.jpg" alt="Logo">
		</div>
		<nav class="menu">
        <a href="registro.php" class="menu-item">Nuevo registro</a>
        <a href="consulta.php" class="menu-item active">Consultar registros</a>
    </nav>
	</header>

	<table>
		<thead>
			<tr>
				<th>Entrada</th>
				<th>Nombre Completo</th>
				<th>Teléfono</th>
				<th>Correo electrónico</th>
				<th>Empresa</th>
				<th>Departamento</th>
				<th>Asunto</th>
				<th>Identificación</th>
				<th>Observaciones</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				require_once("conexion.php");

				$consulta=mysqli_query($conexion, "SELECT * FROM registro");
				while ($fila=mysqli_fetch_array($consulta)) {
					printf('
							<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td><a href="editar.php?id=%s"><img src="img/editar.png"></a> <a href="consulta.php?id=%s" onclick="return confirmacion()"><img src="img/eliminar.webp"></a></td>
							</tr>
						', $fila["fecha_hora"], $fila["nombre_completo"], $fila["telefono"], $fila["correo"], $fila["empresa"], $fila["departamento"], $fila["asunto"], $fila["identificacion"], $fila["observaciones"], $fila["id"], $fila["id"]);	
				}
		?>

		<?php if (isset($_GET["eliminado"])): ?>
	<h2 class="eliminado">Visitante eliminado con éxito</h2>
<?php endif; ?>
		</tbody>
	</table>
</body>
</html>