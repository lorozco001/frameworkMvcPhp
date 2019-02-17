<?php 

/*
Mapear la url ingresada en el navegador,
1.-controlador
2.-método
3.-Parametro
Ejemplo: /articulos/actualizar/4
*/

	class Core{
		protected $controladorActual = 'Paginas';
		protected $metodoActual = 'index';
		protected $parametros = [];	

		//constructor
		public function __construct(){
			//print_r($this->getUrl());
			$url = $this->getUrl();
		
			//buscar en controladores si el controlador en la url existe cargalo sino paginas
			if(file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {
				//si existe se setea como controlador por defecto
				$this->controladorActual= ucwords($url[0]);
		
				//unset indice
				unset($url[0]);
			
            }
			//requerir el controlador inicial paginas 
			require_once '../app/controladores/' . $this->controladorActual . '.php';
			$this->controladorActual = new $this->controladorActual;

			//setea la url en [1]
			if (isset($url[1])) {
				//verificar la segunda parte de la url que seria el metodo
				if (method_exists($this->controladorActual,$url[1])) {
					//si existe el metodo
					$this->metodoActual = $url[1];

					//unset indice
					unset($url[1]);
				}
			}
			//para probar
			//echo $this->metodoActual;

			//para obtener los parametros
			$this->parametros = $url ? array_values($url) : [];

			//llamar a callback con parametros de array
			call_user_func_array([$this->controladorActual, $this->metodoActual] ,$this->parametros); 
		}
		public function getUrl(){
			//echo $_GET['url'];

			if (isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url,FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}
?>