<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Authentication.
	 *
	 * author: Luis Cordero
	 * site: http://luiscordero29.com/
	 * mail: info@luiscordero29.com
	 *
	 **/

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Authentication_model');
		if($this->session->has_userdata('user_uid'))
   		{     						
		    //If no session, redirect to login page
		    redirect('dashboard');
		}
	}

	public function index()
	{
		# rules
		$this->form_validation->set_rules('user_email', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('user_password', 'Contraseña', 'required|callback_check_email|callback_check_password|callback_check_authentication');
		# message
		$this->form_validation->set_message('check_email', 'El Usuario ó Email no existe');
		$this->form_validation->set_message('check_password', 'Contraseña invalidad');
		$this->form_validation->set_message('check_authentication', 'No tiene acceso temporalmente');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('authentication/login');	
		}else{			
	        redirect('dashboard');	     
		}
	}

	public function check_email()
	{
		return $this->Authentication_model->check_email();
	}

	public function check_password()
	{
		return $this->Authentication_model->check_password();
	}

	public function check_authentication()
	{
		return $this->Authentication_model->check_authentication();
	}

	public function register()
	{
		# rules
		$this->form_validation->set_rules('user_email', 'E-mail', 'trim|required|is_unique[users.user_email]|valid_email');
		$this->form_validation->set_rules('user_password', 'Clave', 'required');
		$this->form_validation->set_rules('user_password_matches', 'Repetir Clave', 'required|matches[user_password]');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('authentication/register');	
		}else{	
			$data = $this->Authentication_model->register();
	        $this->load->view('authentication/register_alerts',$data);
		}
	}

	public function password_recovery()
	{
		# rules
		$this->form_validation->set_rules('user_email', 'E-mail', 'trim|required|valid_email|callback_check_password_recovery');
		# message
		$this->form_validation->set_message('check_password_recovery', 'El Email no existe');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('authentication/password_recovery');	
		}else{	
			$data = $this->Authentication_model->password_recovery();
	        $this->load->view('authentication/password_recovery_alerts',$data);
		}
	}

	public function check_password_recovery()
	{
		return $this->Authentication_model->check_password_recovery();
	}

	public function validation($dus_ruta)
	{
		if (!empty($dus_ruta)) {
			$data = $this->Authentication_model->validation($dus_ruta);
		    $this->load->view('authentication/validation_alerts',$data);
		}else{
			redirect('authentication');
		}
	}
}
