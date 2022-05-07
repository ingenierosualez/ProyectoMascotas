<?php 

	$nombre=isset($_POST["nombre"])? $_POST['nombre'] : '';
	$id = (isset($_POST['id'])) ? $_POST['id'] : '';
	$opcion=isset($_POST["opcion"])? $_POST['opcion'] : '';

	//Prevenir ataques XSS
	$nombre= htmlentities($nombre);
	
	//Sanitización
	$nombre= filter_var($nombre, FILTER_UNSAFE_RAW);

	require_once "../Models/TiposMascotas.php";
	
	$tipoMascota = new TiposMascotas();
	
		switch ($opcion){
			case 'mostrar':
				$tipoMascotas=$tipoMascota->obtenerTipos();
				print_r(json_encode($tipoMascotas));
			break;
			case 'crear':
				$tipoMascotas=$tipoMascota->crearTipo($nombre);
				print_r(json_encode($tipoMascotas));
			break;
			case 'editar':
				$tipoMascotas=$tipoMascota->editarTipo($id,$nombre);
				print_r(json_encode($tipoMascotas));
			break;
			case 'borrar':
				$tipoMascotas=$tipoMascota->eliminarTipo($id);
				print_r(json_encode($tipoMascotas));
			break;
			default:
			echo "";
			break;
		}

	

?>