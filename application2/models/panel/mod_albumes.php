<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Albumes extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM albumes WHERE 
	    	(album LIKE '%".$s."%' OR	    	
	    	fecha LIKE '%".$s."%' OR
	    	activo LIKE '%".$s."%') 	    	
	    	ORDER BY album ASC
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
	    $sql = "SELECT * FROM albumes WHERE 
	    	(album LIKE '%".$s."%' OR	    	
	    	fecha LIKE '%".$s."%' OR
	    	activo LIKE '%".$s."%') 	    	
	    	ORDER BY album ASC";

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
	   	$album = $this->input->post('album');	   	
	   	$descripcion = $this->input->post('descripcion');		   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha'));
		$date_array = array_reverse($date_array);		
		$fecha = date(implode('-', $date_array));		

	    $sql = "INSERT INTO albumes (
	    			id_usuario, 
	    			album,
	    			descripcion, 	    			
	    			fecha, 
	    			activo
	    			)
	    		VALUES(
	    			".$id_usuario.",
	    			'".$album."',
	    			'".$descripcion."',	    			
	    			'".$fecha."',
	    			'".$activo."'
	    			)";

	    $this->db->query($sql);

	    return true;
	} 

	function set_row($id)
	{		
	    $sql = "SELECT * FROM albumes WHERE id_album = ".$id;

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
	    $id_album = $this->input->post('id_album');
	   	$album = $this->input->post('album');	   	
	   	$descripcion = $this->input->post('descripcion');		   	
	   	$activo = $this->input->post('activo');	     		   	

	   	$date_array = explode('/',$this->input->post('fecha'));
		$date_array = array_reverse($date_array);		
		$fecha = date(implode('-', $date_array));
	    	    
	    $sql = "SELECT * FROM albumes WHERE id_album = ".$id_album;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	$sql = "UPDATE albumes SET 
	    			id_usuario = ".$id_usuario.",
	    			album ='".$album."',
	    			descripcion ='".$descripcion."',	    			
	    			fecha = '".$fecha."',
	    			activo = '".$activo."' 
	    			WHERE id_album = ".$id_album;
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
	   
	    $sql = "SELECT * FROM albumes WHERE id_album = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM albumes WHERE id_album = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}
	

}