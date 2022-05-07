<?php 

	$nombre=isset($_POST["nombre"])? $_POST['nombre'] : '';
    $tipo=isset($_POST["tipo"])? $_POST['tipo'] : '';
    $edad=isset($_POST["edad"])? $_POST['edad'] : '';
    $enfermedades=isset($_POST["enfermedades"])? $_POST['enfermedades'] : '';
	$id = (isset($_POST['id'])) ? $_POST['id'] : '';
	$opcion=isset($_POST["opcion"])? $_POST['opcion'] : '';

	//Prevenir ataques XSS
	$nombre= htmlentities($nombre);
	$tipo= htmlentities($tipo);
	$edad= htmlentities($edad);
	$enfermedades= htmlentities($enfermedades);

	//Sanitización
	$nombre= filter_var($nombre, FILTER_UNSAFE_RAW);
	$tipo= filter_var($tipo, FILTER_UNSAFE_RAW);
	$edad= filter_var($edad, FILTER_UNSAFE_RAW);
	$enfermedades= filter_var($enfermedades, FILTER_UNSAFE_RAW);

	require_once "../Models/Mascotas.php";
	
	$tipoMascota = new Mascotas();

		switch ($opcion){
			case 'mostrar':
				$tipoMascotas=$tipoMascota->obtenerMascotas();
				print_r(json_encode($tipoMascotas));
			break;
			case 'crear':
				$tipoMascotas=$tipoMascota->crearMascota($nombre,$tipo,$edad,$enfermedades);
				print_r(json_encode($tipoMascotas));
			break;
			case 'editar':
				$tipoMascotas=$tipoMascota->editarMascota($id, $nombre,$tipo,$edad,$enfermedades);
				print_r(json_encode($tipoMascotas));
			break;
			case 'borrar':
				$tipoMascotas=$tipoMascota->eliminarMascota($id);
				print_r(json_encode($tipoMascotas));
			break;
			default:
				echo "";
			break;
		}

	

?>