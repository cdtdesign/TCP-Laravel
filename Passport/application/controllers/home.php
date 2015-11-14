<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

//include the autoload.php from Facebook directory
require_once __DIR__ . '../../../assets/Facebook/autoload.php';

class Home extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	// $this->config->load('config_fb');
	$fb = new Facebook\Facebook([
			  'app_id' => '1660831194160373',
			  'app_secret' => '7a2c2ba7ec16c0f7c757375220d356c2',
			  'default_access_token' => '{access-token}',
			  'enable_beta_mode' => true,
			  'default_graph_version' => 'v2.3',
			  // 'http_client_handler' => 'guzzle',
			  'persistent_data_handler' => 'session', // Other option is 'memory'
			  // 'url_detection_handler' => new MyUrlDetectionHandler(),
			  // 'pseudo_random_string_generator' => new MyPseudoRandomStringGenerator(),
			  ]);
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email', 'public_profile', 'user_friends']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('http://tcp.dev/ASL/Passport/home#signupModal', $permissions);
	$this->fbook = '<a href="' . htmlspecialchars($loginUrl) . '">Sign In with Facebook!</a>';
	// echo $loginUrl;
	}
		
	public function index()
	{
		// Loads the views for navbar.php, header.php, home_view.php and footer.php
		$viewData['title'] = 'TCP Passport';
		$viewData['fbook'] = $this->fbook;
		$this->load->view('template/navbar_signin', $viewData);
		$this->load->view('template/header');
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}
	public function logout() {
	$signed_request_cookie = 'fbsr_' . $this->config->item('appID');
	setcookie($signed_request_cookie, '', time() - 3600, "/");
	$this->session->sess_destroy();  //session destroy
	redirect('home', 'refresh');  //redirect to the home page
	}
}
