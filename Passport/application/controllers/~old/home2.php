<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {
	
	public function index()
	{
		// Loads the views for navbar.php, header.php, home_view.php and footer.php
		$data['title'] = 'TCP Passport';
		$this->load->view('template/navbar');
		$this->load->view('template/header', $data);
		$this->load->view('home_view_2');
		$this->load->view('template/footer');
	}
}
