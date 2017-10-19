<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Dashboard_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
	    $url = 'https://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    return $url;
	}
}