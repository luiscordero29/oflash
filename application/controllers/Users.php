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
		$this->load->model('Users_model','',TRUE); 
		// Control Sessión
		if(!$this->session->has_userdata('user_uid'))
   		{     						
		    //If no session, redirect to login page
		    redirect('account/logout');

		}
	}
		

	public function index($table_page=null,$id=null,$search=null)
	{
					
		$data = 
			array(
				'title' => 'Content Manager System | Panel de Control | Tabla de Usuarios', 
				'module_title' => 'Cuenta', 
				'module_description' => 'Tabla de Usuarios', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Content Manager System' => 'dashboard/index',
						'<i class="fa fa-user"></i> Tabla de Usuarios' => $this->controller.'/index',
	            		'Tabla de Usuarios' => '', 
					),
			);
				
		$table_limit = 30;
		$table_page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;		

		$s = trim($this->input->post('s'));
		$search = trim($search);
		if(!empty($s)){
			$data['search'] = $s;
			$data['search_url'] = '/'.$s;					
		}elseif(!empty($search)){
			$data['search'] = urldecode($search);
			$data['search_url'] = '/'.$search;
		}else{
			$data['search'] = $s;
			$data['search_url'] = '';
		}

		$data['controller'] 	= $this->controller;				
		$data['table'] 			= $this->Users_model->table($table_page*$table_limit,$table_limit,$data['search']);
		$data['table_rows'] 	= $this->Users_model->table_rows($data['search']);
		$data['table_page'] 	= $table_page;
		$data['table_limit'] 	= $table_limit;

		$this->load->view($this->controller.'/index',$data);			
		
	}



	public function create()
	{
	
		// Control de Acceso
		if(!($this->session->userdata('tipo')=='ADMINISTRADOR'))
   		{     						
		    //If no session, redirect to login page
		    redirect('administradores');
		    
		}

		# Data
		$data['meta'] = 'APA ROSA MOLAS | Administradores - Lista de Administradores';
		$data['title'] = '<i class="fa fa-user-plus"></i> Administradores';
		$data['subtitle'] = 'Nuevo Registro';
		$data['breadcrumbs'] = 
			array(
              	'<i class="fa fa-dashboard"></i> Home'				=> 'panel/index',
              	'<i class="fa fa-user-plus"></i> Administradores'	=> 'administradores/index',
              	'Nuevo Registro'									=> '',              	
            );            
			
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|is_unique[usuarios.usuario]|min_length[6]|max_length[15]|alpha_numeric');
		$this->form_validation->set_rules('activo', 'Activo', 'required');
		$this->form_validation->set_rules('correo', 'E-mail', 'trim|valid_email');		

		if($this->form_validation->run() == FALSE)
		{
				
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

	public function view($id_usuario=false)
	{			

		# Data
		$data['meta'] = 'APA ROSA MOLAS | Administradores - Lista de Administradores';
		$data['title'] = '<i class="fa fa-user-plus"></i> Administradores';
		$data['subtitle'] = 'Ver Información';
		$data['breadcrumbs'] = 
			array(
              	'<i class="fa fa-dashboard"></i> Home'				=> 'panel/index',
              	'<i class="fa fa-user-plus"></i> Administradores'	=> 'administradores/index',
              	'Ver Información'									=> '',              	
            );
			
		$data['row'] = $this->Users_model->read($id_usuario);
		
		if(empty($data['row']))
		{
			$data['alert']['danger'] = 
				array( 
					'No exite registro ó No puede ser eliminado',				
				);

			$this->load->view($this->controller.'/message',$data);
		
		}else{

			$this->load->view($this->controller.'/view',$data);
		
		}
			
	}

	public function update($id_usuario=false)
	{			
		// Control de Acceso
		if(!($this->session->userdata('tipo')=='ADMINISTRADOR'))
   		{     						
		    //If no session, redirect to login page
		    redirect('administradores');
		    
		}
		# Data
		$data['meta'] = 'APA ROSA MOLAS | Administradores - Lista de Administradores';
		$data['title'] = '<i class="fa fa-user-plus"></i> Administradores';
		$data['subtitle'] = 'Editar Información';
		$data['breadcrumbs'] = 
			array(
              	'<i class="fa fa-dashboard"></i> Home'				=> 'panel/index',
              	'<i class="fa fa-user-plus"></i> Administradores'	=> 'administradores/index',
              	'Editar Información'								=> '',              	
            );
			
		$data['row'] = $this->Users_model->read($id_usuario);
			
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|min_length[6]|max_length[15]|alpha_numeric|callback_usuario_check');
		$this->form_validation->set_rules('activo', 'Activo', 'required');
		$this->form_validation->set_rules('correo', 'E-mail', 'trim|valid_email');				

		$this->form_validation->set_message('usuario_check', 'El campo Usuario ingresado ya se encuentra ocupado.');
			

		if($this->form_validation->run() == FALSE)
		{
			$data['row'] = $this->Users_model->read($id_usuario);
			if(empty($data['row']))
			{
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
				
			$data['row'] = $this->Users_model->read($id_usuario);
			if(empty($data['row']))
			{
				$data['alert']['danger'] = 
					array( 
						'No exite registro ó No puede ser eliminado',				
					);

				$this->load->view($this->controller.'/message',$data);
			}else{

				$data['alert']['success'] = 
					array( 
						'Registrado Correctamente',				
					);

				$this->load->view($this->controller.'/update',$data);			
			
			}

		}			
	}

	public function delete($id_usuario=false)
	{
		
		// Control de Acceso
		if(!($this->session->userdata('tipo')=='ADMINISTRADOR'))
   		{     						
		    //If no session, redirect to login page
		    redirect('administradores');
		    
		}

		# Data
		$data['meta'] = 'APA ROSA MOLAS | Administradores - Lista de Administradores';
		$data['title'] = '<i class="fa fa-user-plus"></i> Administradores';
		$data['subtitle'] = 'Eliminar Información';
		$data['breadcrumbs'] = 
			array(
              	'<i class="fa fa-dashboard"></i> Home'				=> 'panel/index',
              	'<i class="fa fa-user-plus"></i> Administradores'	=> 'administradores/index',
              	'Eliminar Información'								=> '',              	
            );


        if($id_usuario===FALSE)
		{
			$data['alert']['danger'] = 
				array( 
					'No exite registro ó No puede ser eliminado',				
				);

			$this->load->view($this->controller.'/message',$data);			
		}else{
			
			$check = $this->Users_model->delete($id_usuario);
			
			if($check)
		    {
		        $data['alert']['success'] = 
				array( 
					'Registro Eliminado Correctamente',				
				);
		    }
		    else
		    {         
		        $data['alert']['danger'] = 
				array( 
					'No exite registro ó No puede ser eliminado',				
				);
		    }
				
			$this->load->view($this->controller.'/message',$data);
		}			
			
	}

	public function usuario_check()
  	{
      	$check = $this->Users_model->usuario_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

}