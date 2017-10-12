<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Comentarios extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM comentarios c 
	    	LEFT JOIN contenidos j ON c.id_contenido = j.id_contenido
	    	LEFT JOIN usuarios u ON u.id_usuario = c.id_usuario
	    	WHERE 
	    	(c.comentario LIKE '%".$s."%' OR 
	    	j.titulo LIKE '%".$s."%' OR 
	    	u.nick LIKE '%".$s."%') 	    	
	    	ORDER BY fecha_publicado DESC
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
	    $sql = "SELECT * FROM comentarios c 
	    	LEFT JOIN contenidos j ON c.id_contenido = j.id_contenido
	    	LEFT JOIN usuarios u ON u.id_usuario = c.id_usuario
	    	WHERE 
	    	(c.comentario LIKE '%".$s."%' OR 
	    	j.titulo LIKE '%".$s."%' OR 
	    	u.nick LIKE '%".$s."%') 	    	
	    	ORDER BY fecha_publicado DESC";

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

	function set_row($id)
	{		
	    $sql = "SELECT * FROM comentarios c
	    	LEFT JOIN contenidos j ON c.id_contenido = j.id_contenido
	    	LEFT JOIN usuarios u ON u.id_usuario = c.id_usuario
	    	WHERE id_comentario = ".$id;

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
	    $id_comentario = $this->input->post('id_comentario');
	    $comentario = $this->input->post('comentario');	  	   	
	   	$activo = $this->input->post('activo');	   		   	
	    	    
	    $sql = "SELECT * FROM comentarios WHERE id_comentario = ".$id_comentario;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	$sql = "UPDATE comentarios SET 	    			
	    			comentario = '".$comentario."',
	    			activo = '".$activo."'
	    			WHERE id_comentario = ".$id_comentario;
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
	   
	    $sql = "SELECT * FROM comentarios WHERE id_comentario = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM comentarios WHERE id_comentario = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}
	

}