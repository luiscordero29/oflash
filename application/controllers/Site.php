<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
	}

	/*
	*  Pages
	*/
	
	public function index()
	{
		$data['slide'] = $this->Site_model->slide();
		$data['articulos'] = $this->Site_model->articulos();
		$data['categorias'] = $this->Site_model->categorias();
		$this->load->view('site/index',$data);
	}

	public function post($id_articulo=false)
	{
		$this->load->helper('directory');

		if($id_articulo===FALSE)
		{
			show_404();
		}

		$data['articulo'] = $this->Site_model->get_articulo($id_articulo);
		$data['categorias'] = $this->Site_model->categorias();
		
		if (empty($data['articulo']))
		{
			show_404();
		}
		
		$this->load->view('site/post', $data);

	}

	public function blog($id_categoria=false)
	{		
			
		if($id_categoria===FALSE)
		{
			show_404();
		}

		$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0;
	
		$data['categorias'] = $this->Site_model->categorias();
		$data['categoria'] = $this->Site_model->get_categoria($id_categoria);
		$data['articulos'] = $this->Site_model->get_blog($id_categoria,$page*4,4);
		$data['rows'] = $this->Site_model->get_blog_rows($id_categoria);
		$data['page'] = $page;
		
		
		if (empty($data['articulos']))
		{
			show_404();
		}
		
		$this->load->view('site/blog', $data);
		
	}

	public function search()
	{		
		$this->form_validation->set_rules('s', 'Cédula de Identidad', 'trim|required');	
		if($this->form_validation->run() == FALSE)
		{
			
			show_404();			

		}else{
			
			$data['categorias'] = $this->Site_model->categorias();
			$data['articulos'] = $this->Site_model->get_blog_search();				
				
			$this->load->view('site/search', $data);

		}
		
	}

	public function contact()
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
            
            $data['categorias'] = $this->Site_model->categorias();		
			$this->load->view('site/contacts',$data);

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
			$data['categorias'] = $this->Site_model->categorias();		
			$this->load->view('site/faq',$data);
		
	}

	public function one_to_one()
	{		
			$data['categorias'] = $this->Site_model->categorias();		
			$this->load->view('site/one_to_one',$data);
		
	}
}
