<?php 

	class Paginas extends Controlador{
	
		public function __construct(){
			//echo 'paginas';
			$this->articuloModelo= $this->modelo('Articulo');
		}
		public function index(){
			$articulos =$this->articuloModelo->obtenerArticulos();

			$datos = [
				'titulo'=> 'Bienvenidos a mi pagina',
				'articulos'=>$articulos	 ];

			$this->vista('paginas/Inicio',$datos);
		}
		public function articulo(){	
			//$this->vista('paginas/Articulo');
		}
		public function actualizar($num_registro){
			echo $num_registro;
		}
	}
