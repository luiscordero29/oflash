<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mod_Fotos extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start)
	{
	    $s = $this->input->post('s');
	    $sql = "SELECT * FROM fotos f
	    	LEFT JOIN albumes a ON a.id_album = f.id_album
	    	WHERE 
	    	(f.file_name LIKE '%".$s."%' OR a.album LIKE '%".$s."%') 	    	
	    	ORDER BY f.fecha DESC 
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
	    $sql = "SELECT * FROM fotos f
	    	LEFT JOIN albumes a ON a.id_album = f.id_album
	    	WHERE 
	    	(f.file_name LIKE '%".$s."%' OR a.album LIKE '%".$s."%') 	    	
	    	ORDER BY f.fecha DESC ";

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

	function add($upload)
	{
	   	$id_usuario = $this->input->post('id_usuario');
	   	$id_album = $this->input->post('id_album');	   		   	

	   	$file_name = $upload['file_name'];
    	$file_type = $upload['file_type'];
    	$file_path = $upload['file_path'];
    	$full_path = $upload['full_path'];
    	$raw_name = $upload['raw_name'];
    	$orig_name = $upload['orig_name'];
    	$client_name = $upload['client_name'];
    	$file_ext = $upload['file_ext'];
    	$file_size =$upload['file_size'];
    	$is_image = $upload['is_image'];
    	$image_width = $upload['image_width'];
    	$image_height = $upload['image_height'];
    	$image_type = $upload['image_type'];
    	$image_size_str = $upload['image_size_str'];
	   	

	    $sql = "INSERT INTO fotos (
	    			id_usuario, 	    			
	    			id_album,
	    			fecha, 
	    			file_name,
	    			file_type,
	    			file_path,
	    			full_path,
	    			raw_name,
	    			orig_name,
	    			client_name,
	    			file_ext,
	    			file_size,
	    			is_image,
	    			image_width,
	    			image_height,
	    			image_type,
	    			image_size_str
	    			)
	    		VALUES(
	    			".$id_usuario.",
	    			".$id_album.",	    			
	    			now(),
	    			'".$file_name."',
	    			'".$file_type."',
	    			'".$file_path."',
	    			'".$full_path."',
	    			'".$raw_name."',
	    			'".$orig_name."',
	    			'".$client_name."',
	    			'".$file_ext."',
	    			'".$file_size."',
	    			'".$is_image."',
	    			'".$image_width."',
	    			'".$image_height."',
	    			'".$image_type."',
	    			'".$image_size_str."'
	    			)";

	    $this->db->query($sql);

	    return true;
	} 

	function set_row($id)
	{		
	    $sql = "SELECT * FROM fotos WHERE id_foto = ".$id;

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

	function delete($id)
	{
	   
	    $sql = "SELECT * FROM fotos WHERE id_foto = ".$id;

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {	      
	      $sql = "DELETE  FROM fotos WHERE id_foto = ".$id;
	      $this->db->query($sql);
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}
	
	function table_albumes()
	{
	    
	    $sql = "SELECT * FROM albumes ORDER BY album ASC";

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