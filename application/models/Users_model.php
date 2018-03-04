<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Users_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($data)
	{
	    
	   	$search = $data['Users_search'];
	   	$limit = $data['table_limit']*($data['table_page']-1);
	   	$start = $data['Users_search'];
	    $sql = "
	    	SELECT * FROM users WHERE 
	    	(user_status = 'yes') AND
	     	(
	     		user_email LIKE '%".$search."%' ESCAPE '!' OR 
	     		user_firstname LIKE '%".$search."%' OR 
	     		user_lastname LIKE '%".$search."%'
	     	)
	     	ORDER BY ". $data['Users_field'] ." ". $data['Users_orderby'] ."
	     	LIMIT  ".$limit.",".$start."
	    ";

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0){
	      	return $query->result_array();
	    }else{
	      	return false;
	    }
	}

	function table_rows()
	{
	    
	    $search = $data['Users_search'];

	    $sql = "
	    	SELECT * FROM users WHERE 
	    	(user_status = 'yes') AND
	     	(
	     		user_email LIKE '%".$search."%' ESCAPE '!' OR 
	     		user_firstname LIKE '%".$search."%' OR 
	     		user_lastname LIKE '%".$search."%'
	     	)
	     	ORDER BY ". $data['Users_field'] ." ". $data['Users_orderby'];

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0){
	      	return $query->num_rows();
	    }else{
	      	return false;
	    }
	}

	function create()
	{ 
	    $user_uid = $this->uuid->v5(uniqid());   
	   	$user_firstname = $this->input->post('user_firstname');
	   	$user_lastname = $this->input->post('user_lastname');
	   	$user_email = $this->input->post('user_email');	 
	   	$user_password = hash('sha512', $this->input->post('user_password')); 
	   	$user_activated = $this->input->post('user_activated');
	    $user_validated = $this->input->post('user_validated');
	    $user_route = $this->uuid->v5(uniqid());   
	    $user_status = 'yes';
	    $user_created = date('Y-m-d H:i:s');
	    $user_update = date('Y-m-d H:i:s');
	    $user_deleted = date('Y-m-d H:i:s');   	

	   	$data = array(
		   'user_uid' => $user_uid,
		   'user_firstname' => $user_firstname,
		   'user_lastname' => $user_lastname,
		   'user_email' => $user_email,
		   'user_password' => $user_password,
		   'user_activated' => $user_activated,
		   'user_validated' => $user_validated,
		   'user_route' => $user_route,
		   'user_status' => $user_status,
		   'user_created' => $user_created,
		   'user_update' => $user_update,
		   'user_deleted' => $user_deleted,
		);

		$this->db->insert('users', $data); 
	    
	    return true;
	} 

	function read($user_uid)
	{			    
	    $query = $this->db->get_where('users', array('user_status' => 'yes', 'user_uid' => $user_uid));	    

	    if($query->num_rows() > 0){	      
	      	return $query->row_array();
	    }else{
	      	return false;
	    }
	}

	function update()
	{   
	    $user_uid = $this->input->post('user_uid');   
	   	$user_firstname = $this->input->post('user_firstname');
	   	$user_lastname = $this->input->post('user_lastname');
	   	$user_email = $this->input->post('user_email');	 
	   	$user_activated = $this->input->post('user_activated');
	    $user_validated = $this->input->post('user_validated');
	    $user_update = date('Y-m-d H:i:s');
	    $user_deleted = date('Y-m-d H:i:s');   	

	   	$data = array(
		   'user_firstname' => $user_firstname,
		   'user_lastname' => $user_lastname,
		   'user_email' => $user_email,
		   'user_activated' => $user_activated,
		   'user_validated' => $user_validated,
		   'user_update' => $user_update,
		   'user_deleted' => $user_deleted,
		);
	    
	    $query = $this->db->get_where('users', array('user_status' => 'yes', 'user_uid' => $user_uid));	    

	    if($query->num_rows() > 0){	      	      	
	      	$this->db->where('user_uid', $user_uid);
			$this->db->update('users', $data); 
	      	return true;
	    }else{
	      	return false;
	    }
	} 

	function delete($user_uid)
	{
	    $query = $this->db->get_where('users', array('user_status' => 'yes', 'user_uid' => $user_uid));	    
	    if($query->num_rows() > 0){	      
		    $user_status = 'no';   	
		    $user_deleted = date('Y-m-d H:i:s');   	
		   	$data = array(
			   'user_status' => $user_status,
			   'user_deleted' => $user_deleted,
			);
	    	$this->db->where('user_uid', $user_uid);
			$this->db->delete('users'); 
	      	return true;
	    }else{
	      	return false;
	    }
	}	
}