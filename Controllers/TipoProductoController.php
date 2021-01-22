<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once('Models/Producto.php');
class TipoProductoController
{	
	function __construct(){}

	public function register(){
		$paciente=Paciente::getById($_GET['id']);
		require_once('Views/Consulta/register.php');
	}

	public function save(){
		$consulta= new Consulta(null,$_POST['fecha'],$_POST['enfactual'], $_POST['diagnostico'], $_POST['prescripcion'],$_POST['idpaciente']);
		Consulta::save($consulta);
		$this->saveSigVitales();
		$this->saveSistemas();
		$this->saveExaFisicos();
		$this->saveExaComplementarios();
		$this->saveRecetas();
		$_SESSION['mensaje']='Registro guardado satisfactoriamente';
		$this->show();
	}

	//muestra las consultas
	public function show(){
		$consultas=Consulta::all();
		$lista_consultas="";
		$registros=2; // debe ser siempre par
		if (count($consultas)>$registros) { // solo página si el número de registros mostrados es menor que los registros de la bd
			if ((count($consultas)%$registros)==0) {
				$botones=count($consultas)/$registros;
			}else{//si el total de registros de la bd es impar			
				$botones=(count($consultas)/$registros+1);
			}
			if (!isset($_GET['boton'])) {//la primera vez carga los registros del botón 1
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_consultas[]=$consultas[$i];
				}
			}else{
				//multiplica el número de botón por el número de registros mostrados
				$res=$registros*$_GET['boton'];
				//resta el valor mayor de registros a mostrar menos el número de registros mostrados
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($consultas)) {
						$lista_consultas[]=$consultas[$i];
					}				
				}
			}
		}else{// si no se presenta el paginador
			$botones=0;
			$lista_consultas=$consultas;
		}
		require_once('Views/Consulta/show.php');
	}

	public function error(){
		require_once('Views/User/error.php');
	}
}