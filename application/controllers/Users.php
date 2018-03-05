<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {

	/**
	 * Controller: Panel
	 * Comments: Gestor de Users - Pagina Privada
	 *
	 * 
	 */

	public $controller = "users";

	public function __construct()
	{
		parent::__construct();		
		$this->load->driver('session');
		$this->load->model('Dashboard_model');
		$this->load->model('Users_model'); 
		// Control Sessión
		if(!$this->session->has_userdata('user_uid'))
   		{     						
		    //If no session, redirect to login page
		    redirect('account/logout');

		}
	}
		

	public function index()
	{
					
		$data = 
			array(
				'title' => 'Content Manager System | Panel de Control | Usuarios', 
				'module_title' => 'Usuarios', 
				'module_description' => 'Tabla de Usuarios', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Content Manager System' => 'dashboard/index',
						'<i class="fa fa-users"></i> Usuarios' => $this->controller.'/index',
	            		'Tabla de Usuarios' => '', 
					),
			);

		if ($this->input->post('Users_search')) {
            $data['Users_search'] = $this->input->post('Users_search');
            $this->session->set_userdata('Users_search', $data['Users_search']);	                
        }else{
            $data['Users_search'] = '';
            $this->session->unset_userdata('Users_search');
        }
        if ($this->input->post('Users_field')) {
            $data['Users_field'] = $this->input->post('Users_field');
            $this->session->set_userdata('Users_field', $data['Users_field']);	                
        }else{
            $data['Users_field'] = 'users.user_id';
            $this->session->unset_userdata('Users_field');
        }
        if ($this->input->post('Users_orderby')) {
            $data['Users_orderby'] = $this->input->post('Users_orderby');
            $this->session->set_userdata('Users_orderby', $data['Users_orderby']);	                
        }else{
            $data['Users_orderby'] = 'desc';
            $this->session->unset_userdata('Users_orderby');
        }           
				
		$data['table_limit'] 	= 30;
		$data['table_page'] 	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;		
		$data['table'] 			= $this->Users_model->table($data);
		$data['table_rows'] 	= $this->Users_model->table_rows($data);

		$this->load->view($this->controller.'/index',$data);					
	}



	public function create()
	{
	
		$data = 
			array(
				'title' => 'Content Manager System | Panel de Control | Usuarios', 
				'module_title' => 'Usuarios', 
				'module_description' => 'Crear Usuario', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Content Manager System' => 'dashboard/index',
						'<i class="fa fa-user"></i> Usuarios' => $this->controller.'/index',
	            		'Crear Usuario' => '', 
					),
			);         
			
		$this->form_validation->set_rules('user_firstname', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('user_lastname', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Usuario', 'trim|required|is_unique[users.user_email]|valid_email');
		$this->form_validation->set_rules('user_password', 'Clave', 'required');
		$this->form_validation->set_rules('user_password_matches', 'Repetir Clave', 'required|matches[user_password]');
		$this->form_validation->set_rules('user_activated', 'Activo', 'required');
		$this->form_validation->set_rules('user_validated', 'Validado', 'required');		

		if($this->form_validation->run() == FALSE){
			$this->load->view($this->controller.'/create',$data);		
		}else{
			$this->Users_model->create();
		
			$data['alert']['success'] = 
			array( 
				'Registrado Correctamente',				
			);

			$this->load->view($this->controller.'/create',$data);
		}			
	}

	public function view($user_uid=false)
	{			

		$data = 
			array(
				'title' => 'Content Manager System | Panel de Control | Usuarios', 
				'module_title' => 'Usuarios', 
				'module_description' => 'Ver Usuario', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Content Manager System' => 'dashboard/index',
						'<i class="fa fa-user"></i> Usuarios' => $this->controller.'/index',
	            		'Ver Usuario' => '', 
					),
			);   
			
		$data['row'] = $this->Users_model->read($user_uid);
		
		if(empty($data['row'])){
			$data['alert']['danger'] = 
				array( 
					'No exite registro ó No puede ser eliminado',				
				);
			$this->load->view($this->controller.'/message',$data);
		}else{
			$this->load->view($this->controller.'/view',$data);
		}
	}

	public function update($user_uid=false)
	{			
		$data = 
			array(
				'title' => 'Content Manager System | Panel de Control | Usuarios', 
				'module_title' => 'Usuarios', 
				'module_description' => 'Editar Usuario', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Content Manager System' => 'dashboard/index',
						'<i class="fa fa-user"></i> Usuarios' => $this->controller.'/index',
	            		'Editar Usuario' => '', 
					),
			); 
			
		$data['row'] = $this->Users_model->read($user_uid);
			
		$this->form_validation->set_rules('user_firstname', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('user_lastname', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Usuario', 'trim|required|callback_check_email|valid_email');
		$this->form_validation->set_rules('user_activated', 'Activo', 'required');
		$this->form_validation->set_rules('user_validated', 'Validado', 'required');				

		$this->form_validation->set_message('check_email', 'El campo E-mail ingresado ya se encuentra ocupado.');
			
		if($this->form_validation->run() == FALSE){
			$data['row'] = $this->Users_model->read($user_uid);
			if(empty($data['row'])){
				$data['alert']['danger'] = 
					array( 
						'No exite registro ó No puede ser eliminado',				
					);
				$this->load->view($this->controller.'/message',$data);
			}else{
				$this->load->view($this->controller.'/update',$data);			
			}

		}else{
				
			$this->Users_model->update();
	
			$data['row'] = $this->Users_model->read($user_uid);

			$data['alert']['success'] = 
				array( 
					'Registrado Guardado',				
				);

			$this->load->view($this->controller.'/update',$data);			
		}			
	}

	public function delete($user_uid=false)
	{
		
		$data = 
			array(
				'title' => 'Content Manager System | Panel de Control | Usuarios', 
				'module_title' => 'Usuarios', 
				'module_description' => 'Eliminar Usuario', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Content Manager System' => 'dashboard/index',
						'<i class="fa fa-user"></i> Usuarios' => $this->controller.'/index',
	            		'Eliminar Usuario' => '', 
					),
			); 

		$data['row'] = $this->Users_model->read($user_uid);
		if(empty($data['row'])){
			$data['alert']['danger'] = 
				array( 
					'No exite registro ó No puede ser eliminado',				
				);
			$this->load->view($this->controller.'/message',$data);
		}else{

			$this->Users_model->delete($user_uid);
			
		    $data['alert']['success'] = 
				array( 
					'Registro Eliminado Correctamente',				
				);
				
			$this->load->view($this->controller.'/message',$data);
		
		}				
	
	}

	public function check_email()
  	{
      	return $this->Users_model->check_email();
  	}

}