<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Account.
	 *
	 * author: Ing. Luis Cordero
	 * site: http://luiscordero29.com/
	 * mail: info@luiscordero29.com
	 *
	 **/

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Dashboard_model'); 
		$this->load->model('Account_model'); 
		# Control Sessión
		if(!$this->session->has_userdata('user_uid'))
   		{     						
		    # If no session, redirect to login page
		    redirect('authentication');
		}
	}

	public function index()
	{
		$data = 
			array(
				'title' => 'Sistema Integral de Salud | Panel de Control | Ver Cuenta', 
				'module_title' => 'Cuenta', 
				'module_description' => 'Ver Cuenta', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Sistema Integral de Salud' => 'dashboard/index',
						'<i class="fa fa-user"></i> Cuenta' => 'account/index',
	            		'Ver Cuenta' => '', 
					),
			);
		$data['row'] = $this->Account_model->read();	
		$this->load->view('account/index',$data);
	}

	public function update()
	{
		$data = 
			array(
				'title' => 'Sistema Integral de Salud | Panel de Control | Editar Cuenta', 
				'module_title' => 'Cuenta', 
				'module_description' => 'Editar Cuenta', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Sistema Integral de Salud' => 'dashboard/index',
						'<i class="fa fa-user"></i> Cuenta' => 'account/update',
	            		'Editar Cuenta' => '', 
					),
			);
		# rules
		$this->form_validation->set_rules('dus_apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('dus_nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('dus_direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('dus_telefono', 'Teléfono', 'trim|required|is_natural');
		$this->form_validation->set_rules('dus_email', 'E-mail', 'trim|required|callback_check_email|valid_email');
		# message
		$this->form_validation->set_message('check_email', 'El campo Email duplicado');
		# views
		if ($this->form_validation->run() == FALSE)
		{
			$data['row'] = $this->Account_model->read();	
			$this->load->view('account/update',$data);	
		}else{	
			$data['alert'] = $this->Account_model->update();		
			$data['row'] = $this->Account_model->read();	
	        $this->load->view('account/update',$data);	     
		}
	}

	public function check_email()
	{
		return $this->Account_model->check_email();
	}

	public function password()
	{
		$data = 
			array(
				'title' => 'Sistema Integral de Salud | Panel de Control | Cambiar Clave', 
				'module_title' => 'Cuenta', 
				'module_description' => 'Cambiar Clave', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Sistema Integral de Salud' => 'dashboard/index',
						'<i class="fa fa-user"></i> Cuenta' => 'account/password',
	            		'Cambiar Clave' => '', 
					),
			);
		# rules
		$this->form_validation->set_rules('dus_clave', 'Clave', 'required');
		$this->form_validation->set_rules('dus_clave_repetir', 'Repetir Clave', 'required|matches[dus_clave]');
		# views
		$data['row'] = $this->Account_model->read();	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('account/password',$data);	
		}else{	
			$data['alert'] = $this->Account_model->password();			
	        $this->load->view('account/password',$data);	     
		}
	}

	public function logout()
 	{
	   	$this->Account_model->logout();	   	
	   	redirect('authentication');
 	}
}
