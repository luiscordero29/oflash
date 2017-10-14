<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	function set_usuario($id_usuario)
	{
	    
	    $sql = " SELECT * FROM usuarios WHERE id_usuario = ".$id_usuario;

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

	function update_usuario()
	{
	    $id_usuario = $this->input->post('id_usuario');
	    $usuario = strtoupper($this->input->post('usuario'));
	    $nick = strtoupper($this->input->post('nick'));
	    $apellidos = strtoupper($this->input->post('apellidos'));
	    $nombres = strtoupper($this->input->post('nombres'));
	    $direccion = strtoupper($this->input->post('direccion'));
	    $identidad = $this->input->post('identidad');
	    $sexo = $this->input->post('sexo');
	    $telefono = $this->input->post('telefono');
	    
	    $date_array_fn = explode('/',$this->input->post('fecha_nacimiento'));
		$date_array_fn = array_reverse($date_array_fn);			
		$fecha_nacimiento = date(implode('-', $date_array_fn));
		

	    
	    $sql = "SELECT * FROM usuarios WHERE id_usuario = ".$id_usuario;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = 
	      		"UPDATE usuarios SET 
	      		nick = '".$nick."',
	      		usuario = '".$usuario."',
	      		apellidos = '".$apellidos."',
	      		nombres = '".$nombres."', 
	      		direccion = '".$direccion."', 
	      		identidad = '".$identidad."', 
	      		sexo = '".$sexo."', 
	      		telefono = '".$telefono."',
	      		fecha_nacimiento = '".$fecha_nacimiento."' 
	      		WHERE id_usuario = ".$id_usuario;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	} 

	function update_usuario_clave()
	{
	    $id_usuario = $this->input->post('id_usuario');
	    $pass = MD5($this->input->post('pass'));
	    
	    $sql = "SELECT * FROM usuarios WHERE id_usuario = ".$id_usuario;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "UPDATE usuarios SET clave = '".$pass."' WHERE id_usuario = ".$id_usuario;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

}