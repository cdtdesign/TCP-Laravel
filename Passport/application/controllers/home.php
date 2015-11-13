<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

//include the autoload.php from Facebook directory
require_once __DIR__ . '../../../assets/Facebook/autoload.php';

class Home extends CI_Controller {
	
	public function __construct()
	{
	parent::__construct();
	$this->config->load('config_fb');
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
	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);
	// echo '<a href="' . htmlspecialchars($loginUrl) . '">Sign-In with Facebook!</a>';
	$fbook['fbook'] = '<a href="' . htmlspecialchars($loginUrl) . '">Sign-In with Facebook!</a>';
	}
	
	public function index()
	{
		// Loads the views for navbar.php, header.php, home_view.php and footer.php
		$title['title'] = 'TCP Passport';
		$this->load->view('template/navbar_signin');
		$this->load->view('template/header', $title);
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}
	/*
	public function logout() {
	$signed_request_cookie = 'fbsr_' . $this->config->item('appID');
	setcookie($signed_request_cookie, '', time() - 3600, "/");
	$this->session->sess_destroy();  //session destroy
	redirect('/fb/index', 'refresh');  //redirect to the home page
	}
 
	public function fblogin() {
 
	$facebook = new Facebook(array(
	'appId' => $this->config->item('appID'),
	'secret' => $this->config->item('appSecret'),
	));
	// We may or may not have this data based on whether the user is logged in.
	// If we have a $user id here, it means we know the user is logged into
	// Facebook, but we don't know if the access token is valid. An access
	// token is invalid if the user logged out of Facebook.
	$user = $facebook->getUser(); // Get the facebook user id
	$profile = NULL;
	$logout = NULL;
 
	if ($user) {
	try {
	$profile = $facebook->api('/me');  //Get the facebook user profile data
	$access_token = $facebook->getAccessToken();
	$params = array('next' => base_url('fb/logout/'), 'access_token' => $access_token);
	$logout = $facebook->getLogoutUrl($params);
 
	} catch (FacebookApiException $e) {
	error_log($e);
	$user = NULL;
	}
 
	$data['user_id'] = $user;
	$data['name'] = $profile['name'];
	$data['logout'] = $logout;
	$this->session->set_userdata($data);
	redirect('/fb/test');
	}
	}
 
	public function test() {
	$this->load->view('test');
	} */
	
}
