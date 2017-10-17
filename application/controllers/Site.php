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
		$data['slides'] = $this->Site_model->slides();
		$data['articles'] = $this->Site_model->articles();
		$this->load->view('site/index',$data);
	}

	public function eventos()
	{			
		# get category = 2
		$id_category = 1;
		$data['category'] = $this->Site_model->get_category($id_category);

		# table articles
		$table_rows_limit = 4;
		$table_page_current = ($this->uri->segment(3))? $this->uri->segment(3) : 0;		
		$data['table'] = $this->Site_model->table_articles($table_rows_limit*$table_page_current,$table_rows_limit,$id_category);
		$data['table_counts'] = $this->Site_model->table_articles_counts($id_category);
		$data['table_page_current'] = $table_page_current;
		$data['table_rows_limit'] = $table_rows_limit;
		
		$this->load->view('site/eventos', $data);
		/*
		if ($data['table_counts']>0){
		}else{
			show_404();
		}*/
	}

	public function oflash_news()
	{			
		# get category = 4
		$id_category = 4;
		$data['category'] = $this->Site_model->get_category($id_category);

		# table articles
		$table_rows_limit = 4;
		$table_page_current = ($this->uri->segment(3))? $this->uri->segment(3) : 0;		
		$data['table'] = $this->Site_model->table_articles($table_rows_limit*$table_page_current,$table_rows_limit,$id_category);
		$data['table_counts'] = $this->Site_model->table_articles_counts($id_category);
		$data['table_page_current'] = $table_page_current;
		$data['table_rows_limit'] = $table_rows_limit;
		
		if ($data['table_counts']>0){
			$this->load->view('site/oflash_news', $data);
		}else{
			show_404();
		}
	}

	public function blog($id_category=false)
	{			
		if($id_category===FALSE){
			show_404();
		}

		# get category
		$data['category'] = $this->Site_model->get_category($id_category);

		# table articles
		$table_rows_limit = 4;
		$table_page_current = ($this->uri->segment(4))? $this->uri->segment(4) : 0;		
		$data['table'] = $this->Site_model->table_articles($table_rows_limit*$table_page_current,$table_rows_limit);
		$data['table_counts'] = $this->Site_model->table_articles_counts();
		$data['table_page_current'] = $table_page_current;
		$data['table_rows_limit'] = $table_rows_limit;
		
		if ($data['table_counts']>0){
			$this->load->view('site/blog', $data);
		}else{
			show_404();
		}
	}

	public function post($id_article=false)
	{
		$this->load->helper('directory');

		if($id_article===FALSE)
		{
			show_404();
		}

		$data['article'] = $this->Site_model->get_article($id_article);
		
		if (!$data['article'])
		{
			show_404();
		}

		$this->load->view('site/post', $data);

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
		$this->load->view('site/one_to_one');
	}
}
