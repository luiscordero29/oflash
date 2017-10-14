<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Elementos extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM elementos e 
	    	LEFT JOIN menus m ON m.id_menu = e.id_menu WHERE 
	    	(m.menu LIKE '%".$s."%' OR	    	
	    	e.elemento LIKE '%".$s."%' OR
	    	e.id LIKE '%".$s."%' OR
	    	e.tipo LIKE '%".$s."%' OR
	    	e.fecha LIKE '%".$s."%' OR
	    	e.activo LIKE '%".$s."%') 	    	
	    	ORDER BY m.menu ASC, e.elemento ASC, e.orden ASC
	    	LIMIT ".$limit.",".$start;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_rows()
	{
	    
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM elementos e 
	    	LEFT JOIN menus m ON m.id_menu = e.id_menu  WHERE 
	    	(m.menu LIKE '%".$s."%' OR	    	
	    	e.elemento LIKE '%".$s."%' OR
	    	e.id LIKE '%".$s."%' OR
	    	e.tipo LIKE '%".$s."%' OR
	    	e.fecha LIKE '%".$s."%' OR
	    	e.activo LIKE '%".$s."%') 	    	
	    	ORDER BY m.menu ASC, e.elemento ASC, e.orden ASC";

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return false;
	    }
	}

	function add()
	{
	   	$id_usuario = $this->input->post('id_usuario');	
	   	$id = $this->input->post('id');   
	   	$orden = $this->input->post('orden');	
	   	$elemento = $this->input->post('elemento');	   	
	   	$id_menu = $this->input->post('id_menu');	   	
	   	$tipo = $this->input->post('tipo');	   	
	   	$activo = $this->input->post('activo');	
	   	$url = $this->input->post('url');
	   	$metodo = $this->input->post('metodo');   		   	

	   	$date_array = explode('/',$this->input->post('fecha'));
		$date_array = array_reverse($date_array);		
		$fecha = date(implode('-', $date_array));		

	    $sql = "INSERT INTO elementos (
	    			id_usuario,
	    			id, 	    			
	    			orden, 
	    			elemento, 
	    			id_menu, 
	    			tipo, 
	    			fecha, 
	    			activo,
	    			url,
	    			metodo
	    			)
	    		VALUES(
	    			".$id_usuario.",	    			
	    			".$id.",
	    			".$orden.",
	    			'".$elemento."',
	    			".$id_menu.",
	    			'".$tipo."',	    			
	    			'".$fecha."',
	    			'".$activo."',
	    			'".$url."',
	    			'".$metodo."'
	    			)";

	    $this->db->query($sql);

	    return true;
	} 

	function set_row($id)
	{		
	    $sql = "SELECT * FROM elementos WHERE id_elemento = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function update()
	{
	    $id_usuario = $this->input->post('id_usuario');
	    $id_elemento = $this->input->post('id_elemento');
	    $id = $this->input->post('id'); 	   	
	   	$orden = $this->input->post('orden');	   	
	   	$elemento = $this->input->post('elemento');	   	
	   	$id_menu = $this->input->post('id_menu');	   	
	   	$tipo = $this->input->post('tipo');	   	
	   	$activo = $this->input->post('activo');	
	   	$url = $this->input->post('url');
	   	$metodo = $this->input->post('metodo');    		   	

	   	$date_array = explode('/',$this->input->post('fecha'));
		$date_array = array_reverse($date_array);		
		$fecha = date(implode('-', $date_array));
	    	    
	    $sql = "SELECT * FROM elementos WHERE id_elemento = ".$id_elemento;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	$sql = "UPDATE elementos SET 
	    			id_usuario = ".$id_usuario.",	
	    			id ='".$id."',    			
	    			orden ='".$orden."',
	    			elemento ='".$elemento."',
	    			tipo ='".$tipo."',	    			
	    			fecha = '".$fecha."',
	    			activo = '".$activo."',
	    			url = '".$url."',
	    			metodo = '".$metodo."'  
	    			WHERE id_elemento = ".$id_elemento;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	} 

	function delete($id)
	{
	   
	    $sql = "SELECT * FROM elementos WHERE id_elemento = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM elementos WHERE id_elemento = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_menus()
	{	   
	    $sql = "SELECT * FROM menus WHERE activo = 'SI' ORDER BY menu ASC";

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}	
	

}