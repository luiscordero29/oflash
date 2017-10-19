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

	function articles()
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

	function get_category($id_category)
	{
	    $query = $this->db->get_where('categorias', array('id_categoria' => $id_category) );
	    if($query->num_rows() > 0){
	      	return $query->row_array();
	    }else{
	      	return false;
	    }
	}

	function table_articles($limit,$start,$id_category)
	{
	    $this->db->order_by('contenidos.fecha_publicado', 'DESC');
	    $this->db->where('categorias.id_categoria',$id_category);
	    $this->db->join('categorias', 'contenidos.id_categoria = categorias.id_categoria', 'left');
	    $query = $this->db->get('contenidos', $start, $limit);

	    if($query->num_rows() > 0){
	      	return $query->result_array();
	    }else{
	      	return false;
	    }
	}

	function table_articles_counts($id_category)
	{
	    $this->db->where('id_categoria',$id_category);
	    $this->db->from('contenidos');
	    return $this->db->count_all_results();
	}

	function get_article($id_article)
	{
	    $this->db->where('id_contenido', $id_article);
	    $this->db->join('categorias', 'contenidos.id_categoria = categorias.id_categoria', 'left');
	    $query = $this->db->get('contenidos');
	    if($query->num_rows() > 0){
	      	return $query->row_array();
	    }else{
	      	return false;
	    }
	}

	function contact()
	{
      	$this->load->library("email");    
		
		$name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $comment = $this->input->post('comment');
        	
        # Send Mail
        $this->email->from($email, $name.' - tel: '.$phone);
        $this->email->to('info@oflash.com.ve');
        $this->email->cc('info@luiscordero29.com');
        $this->email->subject('Contacto Homa Page');
        $this->email->message($comment);
        $this->email->send();

        $data['success'] = 
			array( 
				'Envio de Mensaje',				
			);

		return $data;
	}

	function table_articles_search()
	{
	    $s = $this->input->post('s');
	    
	    $this->db->limit(30);
	    $this->db->order_by('contenidos.fecha_publicado', 'DESC');
	    $this->db->like('contenidos.titulo',$s);
	    $this->db->or_like('contenidos.resumen',$s);
	    $this->db->or_like('contenidos.contenido',$s);
	    $this->db->join('categorias', 'contenidos.id_categoria = categorias.id_categoria', 'left');
	    $query = $this->db->get('contenidos');

	    if($query->num_rows() > 0){
	      	return $query->result_array();
	    }else{
	      	return false;
	    }
	}
}