<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Contenidos extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT c.*, j.categoria FROM contenidos c 
	    	LEFT JOIN categorias j ON j.id_categoria = c.id_categoria WHERE 
	    	(c.titulo LIKE '%".$s."%' OR j.categoria LIKE '%".$s."%') 	    	
	    	ORDER BY c.fecha_publicado DESC
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
	    $sql = "SELECT c.*, j.categoria FROM contenidos c 
	    	LEFT JOIN categorias j ON j.id_categoria = c.id_categoria WHERE 
	    	(c.titulo LIKE '%".$s."%' OR j.categoria LIKE '%".$s."%') 	    	
	    	ORDER BY c.fecha_publicado DESC";

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
	   	$id_categoria = $this->input->post('id_categoria');
	   	//$id_album = $this->input->post('id_album');
	   	$titulo = $this->input->post('titulo');	
	   	$resumen = $this->input->post('resumen');	  
	   	$contenido = $this->input->post('contenido');	  
	   	$imagen_path = $this->input->post('imagen_path'); 	
	   	$autor = $this->input->post('autor');		   		   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha_publicado'));
		$date_array = array_reverse($date_array);		
		$fecha_publicado = date(implode('-', $date_array));		

		$meta_des = $this->input->post('meta_des');		   	
	   	$meta_key = $this->input->post('meta_key');		   	
	   	$config_titulo = $this->input->post('config_titulo');		   	
	   	$config_contenido = $this->input->post('config_contenido');		   	
	   	$config_fecha = $this->input->post('config_fecha');		   	
	   	$config_autor = $this->input->post('config_autor');		   	
	   	$config_album = $this->input->post('config_album');		   	
	   	$config_imagen = $this->input->post('config_imagen');
	   	$config_categoria = $this->input->post('config_categoria');
	   	$config_comentario = $this->input->post('config_comentario');
	   	$config_comentario_estatus = $this->input->post('config_comentario_estatus');	

	   	$data = array(
               	'id_usuario' 	=> $id_usuario,
	    		'id_categoria' 	=> $id_categoria,
	    		//'id_album' 		=> $id_album,
	    		'titulo' 		=> $titulo,
	    		'resumen' 		=> $resumen,
	    		'contenido' 	=> $contenido,	    			
	    		'imagen_path' 	=> $imagen_path,
	    		'autor' 		=> $autor,
	    		'activo' 		=> $activo,
	    		'fecha_publicado' => $fecha_publicado,
	    		'meta_des' 		=> $meta_des,
	    		'meta_key' 		=> $meta_key,
	    		'config_titulo' => $config_titulo,
	    		'config_contenido' => $config_contenido,
	    		'config_fecha' 	=> $config_fecha,
	    		'config_autor' 	=> $config_autor,
	    		'config_album' 	=> $config_album,
	    		'config_imagen' => $config_imagen,	    			
	    		'config_categoria' => $config_categoria,	    			
	    		'config_comentario' => $config_comentario,	    			
	    		'config_comentario_estatus' => $config_comentario_estatus
            );
	   
		$this->db->insert('contenidos', $data); 

	    return true;
	} 

	function set_row($id)
	{		
	    $sql = "SELECT * FROM contenidos WHERE id_contenido = ".$id;

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
	    $id_contenido = $this->input->post('id_contenido');
	   	$id_categoria = $this->input->post('id_categoria');
	   	//$id_album = $this->input->post('id_album');
	   	$titulo = $this->input->post('titulo');	 
	   	$resumen = $this->input->post('resumen');	   
	   	$contenido = $this->input->post('contenido');	  
	   	$imagen_path = $this->input->post('imagen_path'); 	
	   	$autor = $this->input->post('autor');		   		   	
	   	$activo = $this->input->post('activo');	   		   	

	   	$date_array = explode('/',$this->input->post('fecha_publicado'));
		$date_array = array_reverse($date_array);		
		$fecha_publicado = date(implode('-', $date_array));		

		$meta_des = $this->input->post('meta_des');		   	
	   	$meta_key = $this->input->post('meta_key');		   	
	   	$config_titulo = $this->input->post('config_titulo');		   	
	   	$config_contenido = $this->input->post('config_contenido');		   	
	   	$config_fecha = $this->input->post('config_fecha');		   	
	   	$config_autor = $this->input->post('config_autor');		   	
	   	$config_album = $this->input->post('config_album');		   	
	   	$config_imagen = $this->input->post('config_imagen');
	   	$config_categoria = $this->input->post('config_categoria');
	   	$config_comentario = $this->input->post('config_comentario');
	   	$config_comentario_estatus = $this->input->post('config_comentario_estatus');

	   	$data = array(
               	'id_usuario' 	=> $id_usuario,
	    		'id_categoria' 	=> $id_categoria,
	    		//'id_album' 		=> $id_album,
	    		'titulo' 		=> $titulo,
	    		'resumen' 		=> $resumen,
	    		'contenido' 	=> $contenido,	    			
	    		'imagen_path' 	=> $imagen_path,
	    		'autor' 		=> $autor,
	    		'activo' 		=> $activo,
	    		'fecha_editado' => date("Y-m-d"),
	    		'fecha_publicado' => $fecha_publicado,
	    		'meta_des' 		=> $meta_des,
	    		'meta_key' 		=> $meta_key,
	    		'config_titulo' => $config_titulo,
	    		'config_contenido' => $config_contenido,
	    		'config_fecha' 	=> $config_fecha,
	    		'config_autor' 	=> $config_autor,
	    		'config_album' 	=> $config_album,
	    		'config_imagen' => $config_imagen,	    			
	    		'config_categoria' => $config_categoria,	    			
	    		'config_comentario' => $config_comentario,	    			
	    		'config_comentario_estatus' => $config_comentario_estatus
            );	
	    	    
	    $sql = "SELECT * FROM contenidos WHERE id_contenido = ".$id_contenido;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	
			$this->db->where('id_contenido', $id_contenido);
			$this->db->update('contenidos', $data); 
			
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	} 

	function delete($id)
	{
	   
	    $sql = "SELECT * FROM contenidos WHERE id_contenido = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM contenidos WHERE id_contenido = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}
	
	function table_categorias()
	{	   
	    $sql = "SELECT * FROM categorias WHERE activo = 'SI' ORDER BY categoria ASC";

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

	function table_albumes()
	{	   
	    $sql = "SELECT * FROM albumes WHERE activo = 'SI' ORDER BY album ASC";

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