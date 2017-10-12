<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->helper('text');
		$this->load->helper('string');
		

		$this->load->model('site/site_model','',TRUE);
	}

	public function index()
	{
		$data['slide'] = $this->site_model->slide();
		$data['articulos'] = $this->site_model->articulos();
		$data['categorias'] = $this->site_model->categorias();
		$this->load->view('site/public/home',$data);

	}

	public function post($id_articulo=false)
	{
		$this->load->helper('directory');

		if($id_articulo===FALSE)
		{
			show_404();
		}

		$data['articulo'] = $this->site_model->get_articulo($id_articulo);
		$data['categorias'] = $this->site_model->categorias();
		
		if (empty($data['articulo']))
		{
			show_404();
		}
		
		$this->load->view('site/public/post', $data);

	}

	public function blog($id_categoria=false)
	{		
			
		if($id_categoria===FALSE)
		{
			show_404();
		}

		$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
	
		$data['categorias'] = $this->site_model->categorias();
		$data['categoria'] = $this->site_model->get_categoria($id_categoria);
		$data['articulos'] = $this->site_model->get_blog($id_categoria,$page*4,4);
		$data['rows'] = $this->site_model->get_blog_rows($id_categoria);
		$data['page'] = $page;
		
		
		if (empty($data['articulos']))
		{
			show_404();
		}
		
		$this->load->view('site/public/blog', $data);
		
	}

	public function search()
	{		
		$this->form_validation->set_rules('s', 'Cédula de Identidad', 'trim|required');	
		if($this->form_validation->run() == FALSE)
		{
			
			show_404();			

		}else{
			
			$data['categorias'] = $this->site_model->categorias();
			$data['articulos'] = $this->site_model->get_blog_search();				
				
			$this->load->view('site/public/search', $data);

		}
		
	}

	public function contacts()
	{		
			

		$this->form_validation->set_rules('nombre','Nombre','required|trim|xss_clean');
        $this->form_validation->set_rules('email','E-mail','required|valid_email|trim|xss_clean');
        $this->form_validation->set_rules('telefono','Teléfono','trim|xss_clean');
        $this->form_validation->set_rules('texto','Comentario','required|trim|xss_clean');
            
            //SI HAY ALGÚNA REGLA DE LAS ANTERIORES QUE NO SE CUMPLE MOSTRAMOS EL MENSAJE
            //EL COMODÍN %s SUSTITUYE LOS NOMBRES QUE LE HEMOS DADO ANTERIORMENTE, EJEMPLO,
            //SI EL NOMBRE ESTÁ VACÍO NOS DIRÍA, EL NOMBRE ES REQUERIDO, EL COMODÍN %s
            //SERÁ SUSTITUIDO POR EL NOMBRE DEL CAMPO
        
        $this->form_validation->set_message('required', 'El %s es requerido');
        $this->form_validation->set_message('valid_email', 'El %s no es válido');
            
            //SI ALGO NO HA IDO BIEN NOS DEVOLVERÁ AL INDEX MOSTRANDO LOS ERRORES
        if($this->form_validation->run()==FALSE)
        {
            
            $data['categorias'] = $this->site_model->categorias();		
			$this->load->view('site/public/contacts',$data);

        }else{
        //EN CASO CONTRARIO PROCESAMOS LOS DATOS
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');
            $telefono = $this->input->post('telefono');
            $texto = $this->input->post('texto');
        	
        	$this->load->library("email");    
            
            $this->email->from($email,$nombre);
            $this->email->to('info@oflash.com.ve');
            //super importante, para poder envíar html en nuestros correos debemos ir a la carpeta
            //system/libraries/Email.php y en la línea 42 modificar el valor, en vez de text debemos poner html
            $this->email->subject('Contacto Homa Page');
            $this->email->message($texto);
            $this->email->send();
            // home page
            $this->index();
        }

		
	}

	public function faq()
	{		
			$data['categorias'] = $this->site_model->categorias();		
			$this->load->view('site/public/faq',$data);
		
	}
	
	/*	public function insta()
	{				
			$this->load->view('instagram.php');
		
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function verifylogin()
 	{
   		//This method will have the credentials validation 		

		$this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
		    //Field validation failed.&nbsp; User redirected to login page		    		    
		    $this->load->view('login');		    
		}else{
			//Go to private area
		   	redirect('panel', 'refresh');
		}
 	}

	public function check_database($password)
	{
	    //Field validation succeeded.&nbsp; Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->site_model->login($username, $password);

		if($result)
		{
		    $sess_array = array();
		    foreach($result as $row)
		    {
		       	$sess_array = array(
		         	'id_admin' => $row->id_admin,
		         	'nick' => $row->nick,
		         	'user' => $row->user
		       	);
		       	$this->session->set_userdata('logged_in_oflash', $sess_array);
		    }
		    return TRUE;
		}
	   	else
		{
		    $this->form_validation->set_message('check_database', 'Usuario ó Contraseña Incorrecta.');
		    return false;
		}
	}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */