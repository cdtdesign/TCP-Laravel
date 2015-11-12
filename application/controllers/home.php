<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// Loads the views for navbar.php, header.php, home_view.php and footer.php
		$viewData['title'] = 'TCP Passport';
		$this->load->view('template/navbar_signin');
		$this->load->view('template/header', $viewData);
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}
}
