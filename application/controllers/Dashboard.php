<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Dashboard.
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
		# Control Sessión
		if(!$this->session->has_userdata('user_uid'))
   		{     						
		    # If no session, redirect to login page
		    redirect('account/logout');
		}
	}

	public function index()
	{
		$data = 
			array(
				'title' => 'Sistema Integral de Salud | Panel de Control', 
				'module_title' => 'Sistema Integral de Salud', 
				'module_description' => 'Panel de Control', 
				'breadcrumb' => 
					array(
						'<i class="fa fa-dashboard"></i> Sistema Integral de Salud' => 'dashboard/index',
	            		'Panel de Control' => '', 
					),
			);
		$this->load->view('dashboard/index',$data);	
	}
}
