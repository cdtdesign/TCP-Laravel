<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function setup_login_form($data) 
	{
		$this->db->where('travelers', $data['user_id']);
	}
		
	
}