<?php
/**
	* Modelo para el acceso a la base de datos y funciones de Paginación
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
/*function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "db_ms");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;
}*/

class Paginacion
{
	//var $sql,$records,$pages;	//variables que ingresan mediante el constructor(consulta,registros por pagina, paginas)
	//var $pagina,$total,$limit,$first,$previous,$next,$last,$start,$end;		//variables que serán calculadas dentro del constructor

	private $sql;		//consulta SQL
	private $records;	//registros por página
	private $pages;		//cantidad de páginas en función de los registros
	private $pagina;
	private $total;
	private $limit;
	private $first;
	private $previous;
	private $next;
	private $last;
	private $start;
	private $end;

	function __construct($sql, $records, $pages, $pagina, $total, $limit, $first, $previous, $next, $last, $start, $end)
	{
		$this->setsql($sql);
		$this->setrecords($records);
		$this->setpages($pages);
		$this->setpagina($pagina);
		$this->settotal($total);
		$this->setlimit($limit);
		$this->setfirst($first);
		$this->setprevious($previous);
		$this->setnext($next);
		$this->setlast($last);
		$this->setstart($start);
		$this->setend($end);
	}
	//Getters y Setters
	public function getsql(){
		return $this->sql;
	}
	public function setsql($sql){
		$this->sql = $sql;
	}
	public function getrecords(){
		return $this->records;
	}
	public function setrecords($records){
		$this->records = $records;
	}
	public function getpages(){
		return $this->pages;
	}
	public function setpages($pages){
		$this->pages = $pages;
	}
	public function getpagina(){
		return $this->pagina;
	}
	public function setpagina($pagina){
		$this->pagina = $pagina;
	}
	public function gettotal(){
		return $this->total;
	}
	public function settotal($total){
		$this->total = $total;
	}
	public function getlimit(){
		return $this->limit;
	}
	public function setlimit($limit){
		$this->limit = $limit;
	}
	public function getfirst(){
		return $this->first;
	}
	public function setfirst($first){
		$this->first = $first;
	}
	public function getprevious(){
		return $this->previous;
	}
	public function setprevious($previous){
		$this->previous = $previous;
	}
	public function getnext(){
		return $this->next;
	}
	public function setnext($next){
		$this->next = $next;
	}
	public function getlast(){
		return $this->last;
	}
	public function setlast($last){
		$this->last = $last;
	}
	public function getstart(){
		return $this->start;
	}
	public function setstart($start){
		$this->start = $start;
	}
	public function getend(){
		return $this->end;
	}
	public function setend($end){
		$this->end = $end;
	}

	public function calc($sql,$records=6,$pages=5){
		if($pages%2==0)
			$pages++;
		//$mysqli = getConn();	//acceder a la DB
		
		$db=Db::getConnect();
		$lista=$db->query($sql);
		//$lista = $mysqli->query($sql);
		$total=mysqli_num_rows($lista);	//guardar la cantidad de registros de la consulta
		$pagina=isset($_GET["pagina"])?$_GET["pagina"]:1;	//verificar que pagina existe. Si se cumple se almacena ese numero, sino se asigna 1
	
		$limit=($pagina-1)*$records;
		$sql.=" limit $limit,$records";
	
		$first=1;
		$previous=$pagina>1?$pagina-1:1;
		$next=$pagina+1;
		$last=ceil($total/$records);
		if($next>$last)
			$next=$last;
	
		$start=$pagina;
		$end=$start+$pages-1;
		if($end>$last)
			$end=$last;
		
		if(($end-$start+1)<$pages)
		{
			$start-=$pages-($end-$start+1);
			if($start<1)
				$start=1;
		}
		if(($end-$start+1)==$pages)
		{
			$start=$pagina-floor($pages/2);
			$end=$pagina+floor($pages/2);
			while($start<$first)
			{
				$start++;
				$end++;
			}
			while($end>$last)
			{
				$start--;
				$end--;
			}
		}
	}
	
	function ver_pagina($url,$params="")
	{
		$pagina2="";
		if($this->total>$this->records)
		{
			$pagina=$this->pagina;
			$first=$this->first;
			$previous=$this->previous;
			$next=$this->next;
			$last=$this->last;
			$start=$this->start;
			$end=$this->end;
			if($params=="")
				$params="?pagina=";
			else
				$params="?$params&pagina=";
			$pagina2.="<ul class='pagination paginador'>";
			$pagina2.="<li class='paginador-current btn btn-primary'>Página $pagina de $last</li>";
			if($pagina2==$first)
				$pagina2.="<li class='paginador-first paginador-disabled'><a href='javascript:void(0)'>&lt;&lt;</a></li>";
			else
				$pagina2.="<li class='paginador-first'><a href='$url$params$first'>&lt;&lt;</a></li>";
			if($pagina==$previous)
				$pagina2.="<li class='paginador-previous paginador-disabled'><a href='javascript:void(0)'>&lt;</a></li>";
			else
				$pagina2.="<li class='paginador-previous'><a href='$url$params$previous'>&lt;</a></li>";
			for($p=$start;$p<=$end;$p++)
			{
				$pagina2.="<li";
				if($pagina==$p)
					$pagina2.=" class='paginador-active'";
				$pagina2.="><a href='$url$params$p'>$p</a></li>";
			}
			if($pagina==$next)
				$pagina2.="<li class='paginador-next paginador-disabled'><a href='javascript:void(0)'>&gt;</a></li>";
			else
				$pagina2.="<li class='paginador-next'><a href='$url$params$next'>&gt;</a></li>";
			if($pagina==$last)
				$pagina2.="<li class='paginador-last paginador-disabled'><a href='javascript:void(0)'>&gt;&gt;</a></li>";
			else
				$pagina2.="<li class='paginador-last'><a href='$url$params$last'>&gt;&gt;</a></li>";
			$pagina2.="</ul>";
		}
		return $pagina2;
	}
}
?>