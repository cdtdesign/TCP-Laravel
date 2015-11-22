<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include the autoload.php from Facebook directory
require_once __DIR__ . '../../../assets/Facebook/autoload.php';

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		/* Ion Auth */
		$this->load->library('ion_auth');

		/* Facebook API */
		$this->fb = new Facebook\Facebook([
				  'app_id' => '1660831194160373',
				  'app_secret' => '7a2c2ba7ec16c0f7c757375220d356c2',
				  'default_access_token' => '{access-token}',
				  'enable_beta_mode' => true,
				  'default_graph_version' => 'v2.5',
				  // 'http_client_handler' => 'guzzle',
				  'persistent_data_handler' => 'session' // Other option is 'memory'
				  // 'url_detection_handler' => new MyUrlDetectionHandler(),
				  // 'pseudo_random_string_generator' => new MyPseudoRandomStringGenerator(),
				  ]);
		$helper = $this->fb->getRedirectLoginHelper();
		$permissions = ['email', 'public_profile']; // Optional permissions
		$loginUrl = $helper->getLoginUrl('http://tcp.dev/', $permissions);
		$this->fbook = '<a href="' . htmlspecialchars($loginUrl) . '">Sign Up with Facebook!</a>';
		$jsHelper = $this->fb->getJavaScriptHelper();
		// $this->access_token = $jsHelper->getAccessToken();
		// echo $loginUrl;
		
		// Config for the upload library
		$upload_config['upload_path'] = '/assets/uploads/';
		$upload_config['allowed_types'] = 'gif|jpg|png';
		$upload_config['max_size']	= '100';
		$upload_config['max_width']  = '1024';
		$upload_config['max_height']  = '768';
		
		// Load some libraries
		$this->load->model('Traveler_model');
		$this->load->model('Home_model');
		$this->load->library('upload', $upload_config);
		$this->load->helper('url');
	}
	
	public function index()
	{
		// When the user visits the root, send them to /home
		redirect('home');
	}
	
	public function home()
	{
		// $this->output->enable_profiler(TRUE);
		// var_dump($this->ion_auth->logged_in());
		$viewData['title'] = 'TCP Passport';
		$viewData['fbook'] = $this->fbook;
		$this->load->view('template/header', $viewData);
		$viewData['userLoggedIn'] = $this->ion_auth->logged_in();
		if ($viewData['userLoggedIn']) {
			$id = $this->ion_auth->user()->row()->id;
			// Active Record Query to post Traveler to Passport Profile
			$viewData['traveler'] = $this->Traveler_model->getTraveler($id);
			// Loads the views for navbar.php + header.php, home_view.php and footer.php
			$this->load->view('template/navbar', $viewData);
		} else {
			// Loads view for navbar_signin.php + header.php, home_view.php and footer.php
			$this->load->view('template/navbar_signin', $viewData);
		}
		$this->load->view('home_view', $viewData);
		$this->load->view('template/footer');
	}
	
	public function register()
	{
		$identity = $_POST['email'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$_POST['gender'] = 3;
		$_POST['first_name'] = $_POST['first_name'];
		$_POST['last_name'] = $_POST['last_name'];
		$this->ion_auth->register($identity, $password, $email, $_POST);
		redirect('home');
	}
	
	// Send info retreived from model to Home view
	public function fetchLocationData()
	{
		$type = $this->input->post('type');
		$location = $this->input->post('location');
		$destination = $this->Home_model->getDestinations($type, $location);
		header("Content-Type: application/json");
		echo $destination;
	}
	
	public function getUserData($id)
	{
		header("Content-Type: application/json");
		echo json_encode($this->ion_auth->user($id)->row());
	}
	
	public function edit($id)
	{
		$data = $this->input->traveler();
		$data['id'] = $id;
		
		// $data['pic'] = $_FILES['pic']['name'];
		// Move file to 'uploads' folder
		// move_uploaded_file($_FILES['pic']['tmp_name'], '/Users/Christina/Sites/TCP/assets/uploads/' . $_FILES['pic']['name']);
		
		$this->Traveler_model->update_record($data);
		redirect('home');
	}
	
	// Deletes Traveler Passport
	public function delete($id)
	{
		$this->Traveler_model->delete($id);
		redirect('/auth/logout');
	}
}
