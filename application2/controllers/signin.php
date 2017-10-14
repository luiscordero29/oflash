<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	/**
	 * Login.
	 *
	 * 
	 * #autor: Ing. Luis Cordero
	 * #mail: info@luiscordero29.com
	 */

	function __construct()
  	{
    	parent::__construct();  
    	$this->load->model('signin/modulo');    	
  	}

	public function index()
	{
		// rules
		$this->form_validation->set_rules('user', 'Usuario', 'required');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required|callback_session');
		// message
		$this->form_validation->set_message('session', '1.- El usuario no existe <br />2.- Contraseña invalidad <br />3.- No tiene acceso temporalmente');
		// views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('signin/home');
		}
		else
		{			
	        redirect('panel', 'refresh');	     
		}
	}
	public function session()
	{
	    $result = $this->modulo->session();
	    if($result)
	    {
	      	$sess_array = array();
	      	foreach($result as $row)
	      	{           
		        $sess_array = array(
		        	'id_usuario' => $row->id_usuario,
		        	'usuario' => $row->usuario,
		          	'nick' => $row->nick,
		          	'tipo' => $row->tipo		          	
		        );
	        	$this->session->set_userdata('logged_in_cms', $sess_array);
	      	}
	      	return true;
	    }else{
	      	return false;
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */