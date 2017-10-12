<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Panel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	


	public function index()
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			$data['session'] = $this->session->userdata('logged_in_cms');
   				    	
	    	$this->load->view('panel/theme/header');			
			$this->load->view('panel/theme/nav',$data);
			$this->load->view('panel/home');
			$this->load->view('panel/theme/footer');	        
	        
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}


	public function profile($type=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/modulo');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/profile/profile
   			if($type==='profile')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Editar Perfil'          => '',              	
	            );	            
				
				$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
				$this->form_validation->set_rules('nick', 'nick', 'trim|required|xss_clean');
				$this->form_validation->set_rules('identidad', 'Cédula de Identidad', 'trim|required|xss_clean|min_length[6]|max_length[10]|is_natural_no_zero|callback_identidad_check');
				$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean|alpha');
				$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|xss_clean|alpha');
				$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required|xss_clean');
				$this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacieminto', 'trim|required|xss_clean');
				$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|xss_clean|is_natural');
				$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required|xss_clean');

				

				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->modulo->set_usuario($data['session']['id_usuario']);    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/profile');
					$this->load->view('panel/theme/footer');		

				}else{

					$this->modulo->update_usuario();
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
					$data['row'] = $this->modulo->set_usuario($data['session']['id_usuario']);    
				    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/profile');
					$this->load->view('panel/theme/footer');
		        }
	    	// panel/profile/pass
	    	}elseif ($type==='pass') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Cambiar Contraseña'          => '',              	
	            );	            

				$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|matches[veryfi]');

				if($this->form_validation->run() == FALSE)
				{
					$data['usuario'] = $this->modulo->set_usuario($data['session']['id_usuario']);    

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/pass');
					$this->load->view('panel/theme/footer');		

				}else{

					$this->modulo->update_usuario_clave();
					
					$data['alert']['success'] = 
					array( 
						'Guardado Exitosamente',				
					);
					
					$data['usuario'] = $this->modulo->set_usuario($data['session']['id_usuario']);    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/pass');
					$this->load->view('panel/theme/footer');
				}
	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function identidad_check()
	{
		if($this->modulo->set_usuario_check())  
	    {  
	        $this->form_validation->set_message('identidad_check', 'The %s field can not be the word "test"');
	        return false;  
	    }  
	    else  
	    {  
	        return true;  
	    }		
	}

	public function usuarios($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_usuarios');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/usuarios/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Usuarios'          => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/usuarios';
				$data['table'] = $this->mod_usuarios->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_usuarios->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/usuarios/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/usuarios/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        		=> 'panel/index',
	              	'Gestor de Usuarios'		=> 'panel/usuarios/table',
	              	'Registrar Usuario'       => '',              	
	            );
	            
	            $data['controller'] = 'panel/usuarios';
				
				$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|is_unique[usuarios.usuario]|min_length[6]|max_length[15]|alpha_numeric');
				$this->form_validation->set_rules('nick', 'Nick', 'trim|required');
				$this->form_validation->set_rules('identidad', 'Cédula de Identidad', 'trim|required|is_unique[usuarios.identidad]|min_length[6]|max_length[10]|alpha_numeric');			
				$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
				$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				$this->form_validation->set_rules('sexo', 'Sexo', 'required');
				$this->form_validation->set_rules('fecha_nacimiento', 'Fecha de Nacimiento', 'required');
				$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural');
				$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');						
				$this->form_validation->set_rules('tipo', 'Tipo de Usuario', 'required');		
				$this->form_validation->set_rules('correo', 'Correo Electrónico', 'required|valid_email|is_unique[usuarios.correo]');		

				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/usuarios/add',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->mod_usuarios->add();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/usuarios/add',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/usuarios/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/usuarios');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Usuarios'      => 'panel/usuarios/table',
	              	'Editar Usuario'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/usuarios';
				
				$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|min_length[6]|max_length[15]|alpha_numeric|callback_usuario_check2');
				$this->form_validation->set_rules('nick', 'Nick', 'trim|required');
				$this->form_validation->set_rules('identidad', 'Cédula de Identidad', 'trim|required|min_length[6]|max_length[10]|alpha_numeric|callback_identidad_check2');			
				$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
				$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				$this->form_validation->set_rules('sexo', 'Sexo', 'required');
				$this->form_validation->set_rules('fecha_nacimiento', 'Fecha de Nacimiento', 'required');
				$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural');
				$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');						
				$this->form_validation->set_rules('tipo', 'Tipo de Usuario', 'required');
				$this->form_validation->set_rules('correo', 'Correo Electrónico', 'required|valid_email|is_unique[usuarios.correo]');		

				$this->form_validation->set_message('usuario_check', 'El campo Usuario ingresado ya se encuentra ocupado.');
				$this->form_validation->set_message('identidad_check', 'El campo Cédula de Identidad ingresado ya se encuentra ocupado.');


				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_usuarios->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/usuarios');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/usuarios/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->mod_usuarios->update();
					
					$data['row'] = $this->mod_usuarios->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/usuarios');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/usuarios/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/usuarios/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/usuarios');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      	=> 'panel/index',
	              	'Gestor de Usuarios' 		=> 'panel/usuarios/table',
	              	'Eliminar Usuario' 	=> '',              	
	            );

				$check = $this->mod_usuarios->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function identidad_check2()
	{	
		if($this->mod_usuarios->set_usuario_check())  
	    {  
	        $this->form_validation->set_message('identidad_check', 'Registro Dulicado');
	        return false;  
	    }  
	    else  
	    {  
	        return true;  
	    }		
	}

	public function usuario_check2()
  	{      
      	$check = $this->mod_usuarios->usuario_check();
      	if($check)
      	{
           	$this->form_validation->set_message('identidad_check', 'Registro Dulicado');
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

  	public function menus($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_menus');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/menus/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Menus'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/menus';
				$data['table'] = $this->mod_menus->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_menus->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/menus/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/menus/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      => 'panel/index',
	              	'Gestor de Menus'		=> 'panel/menus/table',
	              	'Registrar Menu'       	=> '',              	
	            );
	            
	            $data['controller'] = 'panel/menus';
				
				$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
				$this->form_validation->set_rules('fecha', 'Fecha', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				
				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/menus/add',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->mod_menus->add();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/menus/add',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/menus/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/menus');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     => 'panel/index',
	              	'Gestor de Menus'      => 'panel/menus/table',
	              	'Editar Menu'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/menus';
				
				$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
				$this->form_validation->set_rules('fecha', 'Fecha', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');


				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_menus->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/menus');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/menus/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->mod_menus->update();
					
					$data['row'] = $this->mod_menus->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/menus');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/menus/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/menus/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/menus');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de Menus' 		=> 'panel/menus/table',
	              	'Eliminar Menu' 		=> '',              	
	            );

				$check = $this->mod_menus->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function elementos($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_elementos');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/elementos/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Elementos'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/elementos';
				$data['table'] = $this->mod_elementos->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_elementos->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/elementos/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/elementos/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      => 'panel/index',
	              	'Gestor de Elementos'		=> 'panel/elementos/table',
	              	'Registrar Elemento'       	=> '',              	
	            );
	            
	            $data['controller'] = 'panel/elementos';
	            $data['table_menus'] = $this->mod_elementos->table_menus();
				
				$this->form_validation->set_rules('elemento', 'Elemento', 'trim|required');
				$this->form_validation->set_rules('id', 'Id', 'trim|required|is_natural');	
				$this->form_validation->set_rules('orden', 'Orden', 'trim|required|is_natural_no_zero');
				$this->form_validation->set_rules('url', 'Url', 'trim');
				$this->form_validation->set_rules('metodo', 'Método', 'required');							
				$this->form_validation->set_rules('id_menu', 'Menu', 'required');
				$this->form_validation->set_rules('tipo', 'Tipo', 'required');
				$this->form_validation->set_rules('fecha', 'Fecha', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				
				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/elementos/add',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->mod_elementos->add();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/elementos/add',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/elementos/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/elementos');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     => 'panel/index',
	              	'Gestor de Elementos'      => 'panel/elementos/table',
	              	'Editar Elemento'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/elementos';
	            $data['table_menus'] = $this->mod_elementos->table_menus();
				
				$this->form_validation->set_rules('elemento', 'Elemento', 'trim|required');
				$this->form_validation->set_rules('id', 'Id', 'trim|required|is_natural');	
				$this->form_validation->set_rules('orden', 'Orden', 'trim|required|is_natural_no_zero');
				$this->form_validation->set_rules('url', 'Url', 'trim');
				$this->form_validation->set_rules('metodo', 'Método', 'required');							
				$this->form_validation->set_rules('id_menu', 'Menu', 'required');
				$this->form_validation->set_rules('tipo', 'Tipo', 'required');
				$this->form_validation->set_rules('fecha', 'Fecha', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');


				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_elementos->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/elementos');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/elementos/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->mod_elementos->update();
					
					$data['row'] = $this->mod_elementos->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/elementos');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/elementos/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/elementos/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/elementos');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de elementos' 		=> 'panel/elementos/table',
	              	'Eliminar Menu' 		=> '',              	
	            );

				$check = $this->mod_elementos->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function albumes($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_albumes');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/albumes/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Albumes'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/albumes';
				$data['table'] = $this->mod_albumes->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_albumes->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/albumes/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/albumes/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      => 'panel/index',
	              	'Gestor de Albumes'		=> 'panel/albumes/table',
	              	'Registrar Album'       	=> '',              	
	            );
	            
	            $data['controller'] = 'panel/albumes';	            
				
				$this->form_validation->set_rules('album', 'Album', 'trim|required');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'trim');				
				$this->form_validation->set_rules('fecha', 'Fecha', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				
				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/albumes/add',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->mod_albumes->add();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/albumes/add',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/albumes/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/albumes');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     => 'panel/index',
	              	'Gestor de albumes'      => 'panel/albumes/table',
	              	'Editar Elemento'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/albumes';	            
				
				$this->form_validation->set_rules('album', 'Album', 'trim|required');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'trim');				
				$this->form_validation->set_rules('fecha', 'Fecha', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');


				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_albumes->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/albumes');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/albumes/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->mod_albumes->update();
					
					$data['row'] = $this->mod_albumes->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/albumes');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/albumes/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/albumes/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/albumes');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de Albumes' 	=> 'panel/albumes/table',
	              	'Eliminar Album' 		=> '',              	
	            );

				$check = $this->mod_albumes->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function fotos($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_fotos');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/fotos/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de fotos'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/fotos';
				$data['table'] = $this->mod_fotos->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_fotos->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/fotos/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/fotos/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      => 'panel/index',
	              	'Gestor de Fotos'		=> 'panel/fotos/table',
	              	'Registrar Foto'       	=> '',              	
	            );
	            
	            $data['controller'] = 'panel/fotos';	            
				$data['table_albumes'] = $this->mod_fotos->table_albumes();

				$this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/fotos/add',$data);
				$this->load->view('panel/theme/footer');
			

	    	
	    	// panel/fotos/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/fotos');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de Fotos' 	=> 'panel/fotos/table',
	              	'Eliminar Foto' 		=> '',              	
	            );

	            $this->load->helper('file');

	            $row = $this->mod_fotos->set_row($id);
				$check = $this->mod_fotos->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}

		      	delete_files($row['full_path'], TRUE);
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function categorias($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_categorias');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/categorias/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Categorias'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/categorias';
				$data['table'] = $this->mod_categorias->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_categorias->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/categorias/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/categorias/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      	=> 'panel/index',
	              	'Gestor de Categorias'		=> 'panel/categorias/table',
	              	'Registrar Categoria'       => '',              	
	            );
	            
	            $data['controller'] = 'panel/categorias';	            
				
				$this->form_validation->set_rules('categoria', 'Categoria', 'trim|required');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'trim');				
				$this->form_validation->set_rules('imagen_path', 'Imagen Path (URL)', 'trim|prep_url');				
				$this->form_validation->set_rules('autor', 'Autor', 'trim');				
				$this->form_validation->set_rules('fecha_publicado', 'Fecha Publicado', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				$this->form_validation->set_rules('meta_des', 'Meta Descripción', 'trim|required');
				$this->form_validation->set_rules('meta_key', 'Meta Palabras Claves', 'trim|required');
				$this->form_validation->set_rules('config_categoria', 'Publicar Categoria', 'required');
				$this->form_validation->set_rules('config_descripcion', 'Publicar Descripción', 'required');
				$this->form_validation->set_rules('config_fecha', 'Publicar Fecha', 'required');
				$this->form_validation->set_rules('config_autor', 'Publicar Autor', 'required');
				$this->form_validation->set_rules('config_imagen', 'Publicar Imagen', 'required');
				
				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/categorias/add',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->mod_categorias->add();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/categorias/add',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/categorias/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/categorias');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     => 'panel/index',
	              	'Gestor de Categorias'      => 'panel/categorias/table',
	              	'Editar Categoria'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/categorias';	            
				
				$this->form_validation->set_rules('categoria', 'Categoria', 'trim|required');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'trim');				
				$this->form_validation->set_rules('imagen_path', 'Imagen Path (URL)', 'trim|prep_url');				
				$this->form_validation->set_rules('autor', 'Autor', 'trim');				
				$this->form_validation->set_rules('fecha_publicado', 'Fecha Publicado', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				$this->form_validation->set_rules('meta_des', 'Meta Descripción', 'trim|required');
				$this->form_validation->set_rules('meta_key', 'Meta Palabras Claves', 'trim|required');
				$this->form_validation->set_rules('config_categoria', 'Publicar Categoria', 'required');
				$this->form_validation->set_rules('config_descripcion', 'Publicar Descripción', 'required');
				$this->form_validation->set_rules('config_fecha', 'Publicar Fecha', 'required');
				$this->form_validation->set_rules('config_autor', 'Publicar Autor', 'required');
				$this->form_validation->set_rules('config_imagen', 'Publicar Imagen', 'required');


				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_categorias->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/categorias');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/categorias/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->mod_categorias->update();
					
					$data['row'] = $this->mod_categorias->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/categorias');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/categorias/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/categorias/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/categorias');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de Categorias' 	=> 'panel/categorias/table',
	              	'Eliminar Categoria' 		=> '',              	
	            );

				$check = $this->mod_categorias->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function contenidos($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->model('panel/mod_contenidos');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/contenidos/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Contenidos'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/contenidos';
				$data['table'] = $this->mod_contenidos->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_contenidos->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/contenidos/table',$data);
				$this->load->view('panel/theme/footer');


	    	// panel/contenidos/add
	    	}elseif ($type==='add') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'      	=> 'panel/index',
	              	'Gestor de Contenidos'		=> 'panel/contenidos/table',
	              	'Registrar Contenido'       => '',              	
	            );
	            
	            $data['controller'] = 'panel/contenidos';
	            $data['table_categorias'] = $this->mod_contenidos->table_categorias();	 
	            $data['table_albumes'] = $this->mod_contenidos->table_albumes(); 	            
				
				$this->form_validation->set_rules('id_categoria', 'Categoria', 'trim|required');
				$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required');				
				$this->form_validation->set_rules('resumen', 'Resumen', 'trim|required');				
				$this->form_validation->set_rules('contenido', 'contenido', 'trim|required');				
				$this->form_validation->set_rules('imagen_path', 'Imagen Path (URL)', 'trim|prep_url');								
				$this->form_validation->set_rules('autor', 'Autor', 'trim');				
				$this->form_validation->set_rules('fecha_publicado', 'Fecha Publicado', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				$this->form_validation->set_rules('meta_des', 'Meta Descripción', 'trim|required');
				$this->form_validation->set_rules('meta_key', 'Meta Palabras Claves', 'trim|required');
				$this->form_validation->set_rules('config_titulo', 'Publicar Categoria', 'required');
				$this->form_validation->set_rules('config_contenido', 'Publicar Descripción', 'required');
				$this->form_validation->set_rules('config_fecha', 'Publicar Fecha', 'required');
				$this->form_validation->set_rules('config_autor', 'Publicar Autor', 'required');
				$this->form_validation->set_rules('config_album', 'Publicar Imagen', 'required');
				$this->form_validation->set_rules('config_imagen', 'Publicar Imagen', 'required');
				$this->form_validation->set_rules('config_categoria', 'Publicar Categoria', 'required');
				$this->form_validation->set_rules('config_comentario', 'Publicar Comentario', 'required');
				$this->form_validation->set_rules('config_comentario_estatus', 'Cerrar Comentarios', 'required');
				
				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/contenidos/add',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->mod_contenidos->add();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/contenidos/add',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/contenidos/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/contenidos');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     => 'panel/index',
	              	'Gestor de Contenidos'      => 'panel/contenidos/table',
	              	'Editar Contenido'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/contenidos';
	            $data['table_categorias'] = $this->mod_contenidos->table_categorias();	 
	            $data['table_albumes'] = $this->mod_contenidos->table_albumes();           
				
				$this->form_validation->set_rules('id_categoria', 'Categoria', 'trim|required');
				$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required');
				$this->form_validation->set_rules('resumen', 'Resumen', 'trim|required');								
				$this->form_validation->set_rules('contenido', 'contenido', 'trim|required');				
				$this->form_validation->set_rules('imagen_path', 'Imagen Path (URL)', 'trim|prep_url');								
				$this->form_validation->set_rules('autor', 'Autor', 'trim');				
				$this->form_validation->set_rules('fecha_publicado', 'Fecha Publicado', 'required');				
				$this->form_validation->set_rules('activo', 'Activo', 'required');
				$this->form_validation->set_rules('meta_des', 'Meta Descripción', 'trim|required');
				$this->form_validation->set_rules('meta_key', 'Meta Palabras Claves', 'trim|required');
				$this->form_validation->set_rules('config_titulo', 'Publicar Categoria', 'required');
				$this->form_validation->set_rules('config_contenido', 'Publicar Descripción', 'required');
				$this->form_validation->set_rules('config_fecha', 'Publicar Fecha', 'required');
				$this->form_validation->set_rules('config_autor', 'Publicar Autor', 'required');
				$this->form_validation->set_rules('config_album', 'Publicar Imagen', 'required');
				$this->form_validation->set_rules('config_imagen', 'Publicar Imagen', 'required');
				$this->form_validation->set_rules('config_categoria', 'Publicar Categoria', 'required');
				$this->form_validation->set_rules('config_comentario', 'Publicar Comentario', 'required');
				$this->form_validation->set_rules('config_comentario_estatus', 'Cerrar Comentarios', 'required');


				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_contenidos->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/contenidos');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/contenidos/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					
					$this->mod_contenidos->update();
					
					$data['row'] = $this->mod_contenidos->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/contenidos');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/contenidos/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/contenidos/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/contenidos');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de Contenidos' 	=> 'panel/contenidos/table',
	              	'Eliminar Contenido' 		=> '',              	
	            );

				$check = $this->mod_contenidos->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function comentarios($type=FALSE,$id=FALSE)
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

			// LoadModel
			$this->load->helper('text');			
			$this->load->model('panel/mod_comentarios');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   			// panel/comentarios/table
   			if($type==='table')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Gestor de Comentarios'         => '',              	
	            );
				
				$table_limit = 10;
				$table_page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;							
				$data['controller'] = 'panel/comentarios';
				$data['table'] = $this->mod_comentarios->table($table_page*$table_limit,$table_limit);
				$data['table_rows'] = $this->mod_comentarios->table_rows();
				$data['table_page'] = $table_page;
				$data['table_limit'] = $table_limit;

			    $this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/comentarios/table',$data);
				$this->load->view('panel/theme/footer');
	    	
	    	// panel/comentarios/edit
	    	}elseif ($type==='edit') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/comentarios');			
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     => 'panel/index',
	              	'Gestor de Comentarios'      => 'panel/comentarios/table',
	              	'Editar Comentario'          => '',              	
	            );
	            
	            $data['controller'] = 'panel/comentarios';	            
				
				$this->form_validation->set_rules('comentario', 'Comentario', 'trim|required');			
				$this->form_validation->set_rules('activo', 'Activo', 'required');				

				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->mod_comentarios->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/comentarios');			
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/comentarios/edit',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->mod_comentarios->update();
					
					$data['row'] = $this->mod_comentarios->set_row($id);
					if(empty($data['row']))
					{
						redirect('panel/comentarios');			
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
				    $this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/comentarios/edit',$data);
					$this->load->view('panel/theme/footer');
				}

	    	// panel/comentarios/delete
	    	}elseif ($type==='delete') {
	    		
	    		if($id===FALSE)
				{
					redirect('panel/comentarios');					
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'     	=> 'panel/index',
	              	'Gestor de Comentarios' 	=> 'panel/comentarios/table',
	              	'Eliminar Comentario' 		=> '',              	
	            );

				$check = $this->mod_comentarios->delete($id);

				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Registro Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Exite Registro',				
						);
		      	}
			
				$this->load->view('panel/theme/header');
			    $this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/theme/alert',$data);
				$this->load->view('panel/theme/footer');	

	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function logout()
 	{
	   	$this->session->unset_userdata('logged_in_cms');
	   	session_destroy();
	   	redirect('signin', 'refresh');
 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */