<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Site_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	} 

	public function slides()
	{
	    $this->db->limit(5);
	    $this->db->order_by('contenidos.fecha_publicado', 'DESC');
	    $this->db->join('categorias', 'contenidos.id_categoria = categorias.id_categoria', 'left');
	    $query = $this->db->get('contenidos');
	    if($query->num_rows() > 0){
	      	return $query->result_array();
	    }else{
	      	return false;
	    }
	}  

	function articulos()
	{
	    $this->db->limit(18, 5);
	    $this->db->order_by('contenidos.fecha_publicado', 'DESC');
	    $this->db->join('categorias', 'contenidos.id_categoria = categorias.id_categoria', 'left');
	    $query = $this->db->get('contenidos');
	    if($query->num_rows() > 0){
	      	return $query->result_array();
	    }else{
	      	return false;
	    }
	}

	function categorias()
	{
	    $query = $this->db->get('categorias');
	    if($query->num_rows() > 0){
	      	return $query->result_array();
	    }else{
	      	return false;
	    }
	}

	function login($username, $password)
	{
	    
	    $this->db->select('id_admin, nick, user ');
	    $this->db->from('admins');
	    $this->db->where('user', $username);
	    $this->db->where('pass', MD5($password));
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



	function get_blog_rows($id_categoria)
	{
	    
	    $sql = "
	    	SELECT a.*, c.categoria FROM
	    	contenidos a 
	    	LEFT JOIN categorias c ON c.id_categoria = a.id_categoria
	    	WHERE
	    	c.id_categoria = ".$id_categoria;

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


	function get_blog($id_categoria,$limit,$start)
	{
	    
	    $sql = "
	    	SELECT a.*, c.categoria FROM
	    	contenidos a 
	    	LEFT JOIN categorias c ON c.id_categoria = a.id_categoria
	    	WHERE
	    	c.id_categoria = ".$id_categoria."
	    	ORDER BY a.fecha_publicado DESC 
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

	function get_blog_search()
	{
	    
	    $s = $this->input->post('s');
	    $sql = "
	    	SELECT a.*, c.categoria FROM
	    	contenidos a 
	    	LEFT JOIN categorias c ON c.id_categoria = a.id_categoria
	    	WHERE
	    	titulo LIKE '%".$s."%' OR resumen LIKE '%".$s."%' OR contenido LIKE '%".$s."%'
	    	ORDER BY a.fecha_publicado DESC 
	    	";

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

	function get_categoria($id_categoria)
	{
	    
	    $sql = "
	    	SELECT * FROM
	    	categorias
	    	WHERE 
	    	id_categoria = ".$id_categoria;

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

	function get_articulo($id_articulo)
	{
	    
	    $sql = "
	    	SELECT a.*, c.categoria FROM
	    	contenidos a 
	    	LEFT JOIN categorias c ON c.id_categoria = a.id_categoria
	    	WHERE 
	    	a.id_contenido = ".$id_articulo;

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


}