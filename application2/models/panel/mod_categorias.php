<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Categorias extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM categorias WHERE 
	    	(categoria LIKE '%".$s."%') 	    	
	    	ORDER BY categoria ASC, fecha_publicado DESC
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
	    $sql = "SELECT * FROM categorias WHERE 
	    	(categoria LIKE '%".$s."%') 	    	
	    	ORDER BY categoria ASC, fecha_publicado DESC";

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
	   	$categoria = $this->input->post('categoria');
	   	$descripcion = $this->input->post('descripcion');	  
	   	$imagen_path = $this->input->post('imagen_path'); 	
	   	$autor = $this->input->post('autor');		   		   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha_publicado'));
		$date_array = array_reverse($date_array);		
		$fecha_publicado = date(implode('-', $date_array));		

		$meta_des = $this->input->post('meta_des');		   	
	   	$meta_key = $this->input->post('meta_key');		   	
	   	$config_categoria = $this->input->post('config_categoria');		   	
	   	$config_descripcion = $this->input->post('config_descripcion');		   	
	   	$config_fecha = $this->input->post('config_fecha');		   	
	   	$config_autor = $this->input->post('config_autor');		   	
	   	$config_imagen = $this->input->post('config_imagen');		   	


	    $sql = "INSERT INTO categorias (
	    			id_usuario, 
	    			categoria,
	    			descripcion,
	    			imagen_path,
	    			autor,
	    			fecha_creado, 	    			
	    			fecha_publicado, 
	    			activo,
	    			meta_des,
	    			meta_key,
	    			config_categoria,
	    			config_descripcion,
	    			config_fecha,
	    			config_autor,
	    			config_imagen
	    			)
	    		VALUES(
	    			".$id_usuario.",
	    			'".$categoria."',
	    			'".$descripcion."',
	    			'".$imagen_path."',
	    			'".$autor."',
	    			now(),	    			
	    			'".$fecha_publicado."',
	    			'".$activo."',
	    			'".$meta_des."',
	    			'".$meta_key."',
	    			'".$config_categoria."',
	    			'".$config_descripcion."',
	    			'".$config_fecha."',
	    			'".$config_autor."',
	    			'".$config_imagen."'
	    			)";

	    $this->db->query($sql);

	    return true;
	} 

	function set_row($id)
	{		
	    $sql = "SELECT * FROM categorias WHERE id_categoria = ".$id;

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
	    $id_categoria = $this->input->post('id_categoria');
	   	$categoria = $this->input->post('categoria');
	   	$descripcion = $this->input->post('descripcion');	  
	   	$imagen_path = $this->input->post('imagen_path'); 	
	   	$autor = $this->input->post('autor');		   		   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha_publicado'));
		$date_array = array_reverse($date_array);		
		$fecha_publicado = date(implode('-', $date_array));		

		$meta_des = $this->input->post('meta_des');		   	
	   	$meta_key = $this->input->post('meta_key');		   	
	   	$config_categoria = $this->input->post('config_categoria');		   	
	   	$config_descripcion = $this->input->post('config_descripcion');		   	
	   	$config_fecha = $this->input->post('config_fecha');		   	
	   	$config_autor = $this->input->post('config_autor');		   	
	   	$config_imagen = $this->input->post('config_imagen');
	    	    
	    $sql = "SELECT * FROM categorias WHERE id_categoria = ".$id_categoria;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	$sql = "UPDATE categorias SET 
	    			id_usuario = ".$id_usuario.",
	    			categoria = '".$categoria."',
	    			descripcion = '".$descripcion."',	    			
	    			imagen_path = '".$imagen_path."',
	    			autor = '".$autor."',
	    			activo = '".$activo."',
	    			fecha_editado = now(),
	    			fecha_publicado = '".$fecha_publicado."',
	    			meta_des = '".$meta_des."',
	    			meta_key = '".$meta_key."',
	    			config_categoria = '".$config_categoria."',
	    			config_descripcion = '".$config_descripcion."',
	    			config_fecha = '".$config_fecha."',
	    			config_autor = '".$config_autor."',
	    			config_imagen = '".$config_imagen."'	    			
	    			WHERE id_categoria = ".$id_categoria;
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
	   
	    $sql = "SELECT * FROM categorias WHERE id_categoria = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM categorias WHERE id_categoria = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}
	

}