
<?php 
	//cargamos las librerias 
	require_once 'config/Configurar.php';

	//autoload
	spl_autoload_register(function($nombreClase){
		require_once 'librerias/'.$nombreClase.'.php';

	});
	//require_once 'librerias/Base.php';
	//require_once 'librerias/Controlador.php';
	//require_once 'librerias/Core.php';