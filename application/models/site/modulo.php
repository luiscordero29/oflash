<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	function menu($id_menu)
	{
	    
	    $sql = "SELECT * FROM elementos WHERE 
	    	id_menu = ".$id_menu." ORDER BY orden ASC";

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

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT c.*, j.categoria FROM contenidos c 
	    	LEFT JOIN categorias j ON j.id_categoria = c.id_categoria WHERE 
	    	c.activo = 'SI' AND
	    	j.id_categoria = 2 ORDER BY c.fecha_publicado DESC
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
	    	c.activo = 'SI' AND
	    	j.id_categoria = 2 ORDER BY c.fecha_publicado DESC";

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

	function set_row_contenido($id)
	{		
	    $sql = "SELECT c.*, j.categoria FROM contenidos c 
	    		LEFT JOIN categorias j ON c.id_categoria = j.id_categoria 
	    		WHERE c.id_contenido = ".$id;

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

	function registrarse()
	{
	   	
	   	$identidad = $this->input->post('identidad');
	   	$usuario = $this->input->post('usuario');	   	
	   	$clave = MD5($usuario);
	   	$apellidos = $this->input->post('apellidos');
	   	$nombres = $this->input->post('nombres');	   		   	
	   	$telefono = $this->input->post('telefono');	   	
	   	$direccion = $this->input->post('direccion');	   	
	   	$tipo = 'USUARIO';
	   	$activo = 'SI';
	   	$correo = $this->input->post('correo');

	   	$date_array_fn = explode('/',$this->input->post('fecha_nacimiento'));
		$date_array_fn = array_reverse($date_array_fn);		
		$fecha_nacimiento = date(implode('-', $date_array_fn));
		

	    $sql = "INSERT INTO usuarios (	    			
	    			usuario, 
	    			clave, 
	    			identidad, 
	    			apellidos, 
	    			nombres,		    		
		    		fecha_nacimiento, 		    		
		    		direccion,
	    			telefono, 
	    			activo,	    			
	    			tipo,
	    			correo
	    			)
	    		VALUES(	    			
	    			'".$usuario."',
	    			'".$clave."',
	    			'".$identidad."',
	    			'".$apellidos."',
	    			'".$nombres."',	    			
	    			'".$fecha_nacimiento."',	    			
	    			'".$direccion."',
	    			'".$telefono."',
	    			'".$activo."',	    			
	    			'".$tipo."',
	    			'".$correo."'
	    			)";

	    $this->db->query($sql);

	    return true;
	} 

}