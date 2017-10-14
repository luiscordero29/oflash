<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Upload extends CI_Controller {

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

   			// LoadModel
			$this->load->model('panel/mod_fotos');
   			$data['session'] = $this->session->userdata('logged_in_cms');

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
	        
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}


	

	public function do_upload()
	{
		if($this->session->userdata('logged_in_cms'))
   		{

   			
			// LoadModel
			$this->load->model('panel/mod_fotos');
   			$data['session'] = $this->session->userdata('logged_in_cms');
   			

   				
	    	$data['breadcrumbs'] = 
			array(
	            'Pagina Principal'      => 'panel/index',
	            'Gestor de Fotos'		=> 'panel/fotos/table',
	            'Registrar Foto'       	=> '',              	
	        );
	            
	        $data['controller'] = 'panel/fotos';	            
			$data['table_albumes'] = $this->mod_fotos->table_albumes();

			// UPLOAD            
            $config['upload_path'] = './assets/files/';
			$config['allowed_types'] = 'gif|jpg|png';			
			$config['max_width']  = '1024';
			$config['max_height']  = '768';			
			$this->load->library('upload', $config);

			$this->form_validation->set_rules('id_album', 'Album', 'trim|required');			
		
				
			if(!$this->upload->do_upload())
			{
				$data['alert']['danger'] = array('error' => $this->upload->display_errors());

				$this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/fotos/add',$data);
				$this->load->view('panel/theme/footer');			

			}else{

				// upload				
				$upload = $this->upload->data();				
				$this->mod_fotos->add($upload);
					
				$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

				$this->load->view('panel/theme/header');
				$this->load->view('panel/theme/nav',$data);
				$this->load->view('panel/theme/breadcrumbs',$data);
				$this->load->view('panel/fotos/add',$data);
				$this->load->view('panel/theme/footer');
			}

	    	
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */