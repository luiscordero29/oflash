<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Authentication.
	 *
	 * author: Ing. Luis Cordero
	 * site: http://luiscordero29.com/
	 * mail: info@luiscordero29.com
	 *
	 **/

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Authentication_model');
		if($this->session->has_userdata('dus_id'))
   		{     						
		    //If no session, redirect to login page
		    redirect('dashboard');
		}
	}

	public function index()
	{
		# rules
		$this->form_validation->set_rules('dus_usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('dus_clave', 'Contraseña', 'required|callback_check_usuario|callback_check_clave|callback_check_authentication|callback_check_authentication');
		# message
		$this->form_validation->set_message('check_usuario', 'El Usuario ó Email no existe');
		$this->form_validation->set_message('check_clave', 'Contraseña invalidad');
		$this->form_validation->set_message('check_authentication', 'No tiene acceso temporalmente');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('authentication/login');	
		}else{			
	        redirect('dashboard');	     
		}
	}

	public function check_usuario()
	{
		return $this->Authentication_model->check_usuario();
	}

	public function check_clave()
	{
		return $this->Authentication_model->check_clave();
	}

	public function check_authentication()
	{
		return $this->Authentication_model->check_authentication();
	}

	public function register()
	{
		# rules
		$this->form_validation->set_rules('dus_identidad', 'Cedula de Identidad', 'trim|required|is_natural_no_zero|min_length[6]|max_length[9]|is_unique[usuarios.dus_identidad]');
		$this->form_validation->set_rules('dus_apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('dus_nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('dus_telefono', 'Teléfono', 'trim|required|is_natural');
		$this->form_validation->set_rules('dus_direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('dus_usuario', 'Usuario', 'trim|required|alpha_numeric|min_length[6]|max_length[15]|is_unique[usuarios.dus_usuario]');
		$this->form_validation->set_rules('dus_email', 'E-mail', 'trim|required|is_unique[usuarios.dus_email]|valid_email');
		$this->form_validation->set_rules('dus_clave', 'Clave', 'required');
		$this->form_validation->set_rules('dus_clave_repetir', 'Repetir Clave', 'required|matches[dus_clave]');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('authentication/register');	
		}else{	
			$data = $this->Authentication_model->register();
	        $this->load->view('authentication/register_alerts',$data);
		}
	}

	public function passwordrecovery()
	{
		# rules
		$this->form_validation->set_rules('dus_email', 'E-mail', 'trim|required|callback_check_passwordrecovery|valid_email');
		# message
		$this->form_validation->set_message('check_passwordrecovery', 'El Email no existe');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('authentication/passwordrecovery');	
		}else{	
			$data = $this->Authentication_model->passwordrecovery();
	        $this->load->view('authentication/passwordrecovery_alerts',$data);
		}
	}

	public function check_passwordrecovery()
	{
		return $this->Authentication_model->check_passwordrecovery();
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
