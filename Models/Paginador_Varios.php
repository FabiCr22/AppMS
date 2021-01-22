<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Producto
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Paginator
{
	private $_conn;
	private $_limit;
	private $_page;
	private $_query;
	private $_total;

	public function __construct( $conn, $query )	//($_conn, _limit, _page, _query, _total)
	{
		$this->_conn = $conn;
		$this->_query = $query;
		$rs= $this->_conn->query( $this->_query );
		$this->_total = $rs->num_rows;

		/*$this->set_conn($_conn);
		$this->set_limit($_limit);
		$this->set_page($_page);
		$this->set_query($_query);
		$this->set_total($_total);*/
    }

	//Getters y Setters
	public function get_conn(){
		return $this->Id_Prod;
	}
	public function set_conn($_conn){
		$this->_conn = $_conn;
	}
	public function get_limit(){
		return $this->_limit;
	}
	public function set_limit($_limit){
		$this->_limit = $_limit;
	}
	public function get_page(){
		return $this->_page;
	}
	public function set_page($_page){
		$this->_page = $_page;
	}
	public function get_query(){
		return $this->_query;
	}
	public function set_query($_query){
		$this->_query = $_query;
	}
	public function get_total(){
		return $this->_total;
	}
	public function set_total($_total){
		$this->_total = $_total;
	}
	//función para paginar datos
	public function getData( $limit = 10, $page = 1 ){
		$this->_limit = $limit;
		$this->_page = $page;
		if($this->_limit == 'all'){
			$query = $this->_query;
		}else{
			$query = $this->_query." LIMIT ".(($this->_page - 1)*$this->_limit).", $this->_limit";
		}
		$rs = $this->_conn->query($query);
		while ($row = $rs->fetch_assoc()){
			$results[]  = $row;
		}
		$result = new stdClass();
		$result->page   = $this->_page;
		$result->limit  = $this->_limit;
		$result->total  = $this->_total;
		$result->data   = $results;
		return $result;
	}
}