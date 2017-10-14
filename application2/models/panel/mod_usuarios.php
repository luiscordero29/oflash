<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Usuarios extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM usuarios WHERE 
	    	(usuario LIKE '%".$s."%' OR
	    	nick LIKE '%".$s."%' OR
	    	identidad LIKE '%".$s."%' OR
	    	apellidos LIKE '%".$s."%' OR
	    	nombres LIKE '%".$s."%') AND
	    	tipo = 'ADMINISTRADOR'	    	
	    	ORDER BY apellidos  ASC, nombres ASC
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
	    $sql = "SELECT * FROM usuarios WHERE 
	    	(usuario LIKE '%".$s."%' OR
	    	nick LIKE '%".$s."%' OR
	    	identidad LIKE '%".$s."%' OR
	    	apellidos LIKE '%".$s."%' OR
	    	nombres LIKE '%".$s."%') AND
	    	tipo = 'ADMINISTRADOR'
	    	ORDER BY apellidos  ASC, nombres ASC";

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
	   	$identidad = $this->input->post('identidad');
	   	$usuario = $this->input->post('usuario');
	   	$nick = $this->input->post('nick');
	   	$clave = MD5($usuario);
	   	$apellidos = $this->input->post('apellidos');
	   	$nombres = $this->input->post('nombres');
	   	$activo = $this->input->post('activo');	   	
	   	$sexo = $this->input->post('sexo');	   	
	   	$telefono = $this->input->post('telefono');	   	
	   	$direccion = $this->input->post('direccion');	   	
	   	$tipo = $this->input->post('tipo');
	   	$correo = $this->input->post('correo');

	   	$date_array_fn = explode('/',$this->input->post('fecha_nacimiento'));
		$date_array_fn = array_reverse($date_array_fn);		
		$fecha_nacimiento = date(implode('-', $date_array_fn));
		

	    $sql = "INSERT INTO usuarios (
	    			nick, 
	    			usuario, 
	    			clave, 
	    			identidad, 
	    			apellidos, 
	    			nombres,
		    		sexo, 
		    		fecha_nacimiento, 		    		
		    		direccion,
	    			telefono, 
	    			activo,	    			
	    			tipo,
	    			correo
	    			)
	    		VALUES(
	    			'".$nick."',
	    			'".$usuario."',
	    			'".$clave."',
	    			'".$identidad."',
	    			'".$apellidos."',
	    			'".$nombres."',
	    			'".$sexo."',
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

	function set_row($id)
	{		
	    $sql = "SELECT * FROM usuarios WHERE tipo = 'ADMINISTRADOR' AND id_usuario = ".$id;

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

	    $identidad = $this->input->post('identidad');
	   	$usuario = $this->input->post('usuario');
	   	$nick = $this->input->post('nick');
	   	$clave = MD5($usuario);
	   	$apellidos = $this->input->post('apellidos');
	   	$nombres = $this->input->post('nombres');
	   	$activo = $this->input->post('activo');	   	
	   	$sexo = $this->input->post('sexo');	   	
	   	$telefono = $this->input->post('telefono');	   	
	   	$direccion = $this->input->post('direccion');	   	
	   	$tipo = $this->input->post('tipo');
	   	$correo = $this->input->post('correo');

	   	$date_array_fn = explode('/',$this->input->post('fecha_nacimiento'));
		$date_array_fn = array_reverse($date_array_fn);		
		$fecha_nacimiento = date(implode('-', $date_array_fn));
	    
	    
	    $sql = "SELECT * FROM usuarios WHERE tipo = 'ADMINISTRADOR' AND id_usuario = ".$id_usuario;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      	$sql = "UPDATE usuarios SET 
	    			nick = '".$nick."',
	    			usuario ='".$usuario."',
	    			clave = '".$clave."',
	    			identidad = '".$identidad."',
	    			apellidos = '".$apellidos."', 
	    			nombres ='".$nombres."',
		    		sexo = '".$sexo."', 
		    		fecha_nacimiento = '".$fecha_nacimiento."', 		    		
		    		direccion = '".$direccion."',
	    			telefono = '".$telefono."', 
	    			activo = '".$activo."',
	    			correo = '".$correo."' 
	    			WHERE id_usuario = ".$id_usuario;
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
	   
	    $sql = "SELECT * FROM usuarios WHERE tipo = 'ADMINISTRADOR' AND id_usuario = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM usuarios WHERE id_usuario = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}	

	function usuario_check()
	{		
	    $usuario = $this->input->post('usuario');
	    $id_usuario = $this->input->post('id_usuario');

	    $sql = "SELECT * FROM usuarios 
	    		WHERE tipo = 'ADMINISTRADOR' AND 
	    		usuario = '".$usuario."' AND id_usuario <> ".$id_usuario;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

	function identidad_check()
	{		
	    $identidad = $this->input->post('identidad');
	    $id_usuario = $this->input->post('id_usuario');

	    $sql = "SELECT * FROM usuarios 
	    		WHERE tipo = 'ADMINISTRADOR' AND 
	    		identidad = '".$identidad."' AND id_usuario <> ".$id_usuario;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

	function set_usuario_check()
	{
	    
	    $id_usuario = $this->input->post('id_usuario');
	    $identidad = $this->input->post('identidad');

	    $sql = " SELECT * FROM usuarios WHERE id_usuario <> ".$id_usuario." AND identidad = ".$identidad;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	} 
	

}