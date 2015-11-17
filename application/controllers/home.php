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
				  'default_graph_version' => 'v2.3',
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
		$this->access_token = $jsHelper->getAccessToken();
		// echo $loginUrl;
	
		// $this->load->model('Traveler_model');
		
		// $this->load->library('upload', $upload_config);
		$this->load->helper('url');
	}
	
	public function index()
	{
		// When the user visits the root, send them to /home
		redirect('home');
	}
	
	public function home()
	{
		var_dump($this->ion_auth->logged_in());
		$viewData['title'] = 'TCP Passport';
		$viewData['fbook'] = $this->fbook;
		$viewData['userLoggedIn'] = $this->ion_auth->logged_in();
		
		if ($viewData['userLoggedIn']) {
			// Loads the views for navbar.php + header.php, home_view.php and footer.php
			$this->load->view('template/navbar', $viewData);
		} else {
			// Loads view for navbar_signin.php + header.php, home_view.php and footer.php
			$this->load->view('template/navbar_signin', $viewData);
		}
		$this->load->view('template/header');
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}
	
	public function register()
	{
		// var_dump($_POST);
		$identity = $_POST['email'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$_POST['gender'] = (int) $_POST['gender'];
		if ($this->ion_auth->register($identity, $password, $email, $_POST)) {
			// The user was successfully created
			$this->ion_auth->login($identity, $password);
			redirect('home');
		} else {
			// The user was not created for some reason
			echo "You weren't created... :/";
		}
	}
}
