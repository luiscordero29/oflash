<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Menus extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM menus WHERE 
	    	(menu LIKE '%".$s."%') 	    	
	    	ORDER BY menu ASC
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
	    $sql = "SELECT * FROM menus WHERE 
	    	(menu LIKE '%".$s."%') 	    	
	    	ORDER BY menu ASC";

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
	   	$menu = $this->input->post('menu');	   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha'));
		$date_array = array_reverse($date_array);		
		$fecha = date(implode('-', $date_array));		

	    $sql = "INSERT INTO menus (
	    			id_usuario, 
	    			menu, 
	    			fecha, 
	    			activo
	    			)
	    		VALUES(
	    			".$id_usuario.",
	    			'".$menu."',
	    			'".$fecha."',
	    			'".$activo."'
	    			)";

	    $this->db->query($sql);

	    return true;
	} 

	function set_row($id)
	{		
	    $sql = "SELECT * FROM menus WHERE id_menu = ".$id;

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
	    $id_menu = $this->input->post('id_menu');
	   	$menu = $this->input->post('menu');	   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha'));
		$date_array = array_reverse($date_array);		
		$fecha = date(implode('-', $date_array));
	    	    
	    $sql = "SELECT * FROM menus WHERE id_menu = ".$id_menu;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	$sql = "UPDATE menus SET 
	    			id_usuario = ".$id_usuario.",
	    			menu ='".$menu."',
	    			fecha = '".$fecha."',
	    			activo = '".$activo."' 
	    			WHERE id_menu = ".$id_menu;
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
	   
	    $sql = "SELECT * FROM menus WHERE id_menu = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM menus WHERE id_menu = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}	
	

}