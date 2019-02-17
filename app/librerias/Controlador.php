<?php 

	//Clase controlador principal
	//se encarga de crear los modelos y las vistas
	class Controlador{
		
		//cargar modelo 
		public function modelo($modelo){
			//carga
			require_once '../app/modelos/'. $modelo .'.php';
			//instanceado el modelo 
			return new $modelo();
		} 
	
		//cargar vista
		public function vista($vista,$datos=[]){
			//ver si vista existe
			if (file_exists('../app/vistas/'. $vista .'.php')){
				require_once '../app/vistas/'. $vista .'.php';
			}else{
				//si no existe vista marca advertencia
				die('la vista no existe');
			}
		} 
	}





 ?>