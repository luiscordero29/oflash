<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
	}

	/*
	*  Pages Nav
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
		
		if ($data['table_counts']>0){
			$this->load->view('site/eventos', $data);
		}else{
			show_404();
		}
	}

	public function one_to_one()
	{		
		$this->load->view('site/one_to_one');
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

	public function faq()
	{		
		$this->load->view('site/faq');
	}

	public function contact()
	{		
		$this->form_validation->set_rules('name','Nombre','required|trim');
        $this->form_validation->set_rules('email','E-mail','required|valid_email|trim');
        $this->form_validation->set_rules('phone','Teléfono','trim');
        $this->form_validation->set_rules('comment','Comentario','required|trim');            
        if($this->form_validation->run()==FALSE){
			$this->load->view('site/contact');
        }else{
            $data['alert'] = $this->Site_model->contact();
			$this->load->view('site/contact',$data);
        }
	}

	/*
	* 	Search
	*/

	public function search()
	{		
		$this->form_validation->set_rules('s', '', 'trim|required');	
		if($this->form_validation->run() == FALSE){
			$this->index();		
		}else{
			# table articles
			$data['articles'] = $this->Site_model->table_articles_search();		
			$this->load->view('site/search', $data);
		}
	}

	/*
	*  Inside Pages
	*/

	public function post($id_article=false)
	{
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

	/*
	* 	Tests
	*/

	public function test_uid()
	{		
		echo $this->uuid->v3("ok")."<br>"; 
		echo $this->uuid->v4()."<br>"; 
		echo $this->uuid->v5("ok"); 
	}
}
