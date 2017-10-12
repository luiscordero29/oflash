<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Site_login extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	public function session()
 	{
	    $user = $this->input->post('user',true);
	    $pass = md5($this->input->post('pass',true));
	    $this->db->select('id_usuario, identidad, apellidos, nombres, sexo, fecha_nacimiento, direccion, correo, telefono');
	    $this->db->from('usuarios');
	    $this->db->where('usuario', $user);
	    $this->db->where('clave', $pass);
	    $this->db->where('activo', 'SI');
	    $this->db->limit(1);

	    $query = $this->db->get();

	    if($query->num_rows() == 1)
	    {
	    	return $query->result();
	    }
	    else
	    {
	    	return false;
	    }
 	}
}