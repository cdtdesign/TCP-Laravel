<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '../../../assets/Facebook/autoload.php';

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		/* Libraries */
		$this->load->library('ion_auth'); // Ion auth
		$this->load->library('parser'); // Template parser

		/* Helpers */
		$this->load->helper('url');

		/* Models */
		// $this->load->model('Traveler_model');

		/**
		 * This Facebook stuff seems pretty useless considering
		 * Facebook wants us to use JavaScript anyway, but I'm
		 * leaving it here just in case. I don't think it's
		 * doing anything, so feel free to delete it if you
		 * are comfortable doing so. The JavaScript does NOT
		 * rely on these lines!
		 */

		/* Facebook API */
		// $this->fb = new Facebook\Facebook([
		// 		  'app_id' => '1660831194160373',
		// 		  'app_secret' => '7a2c2ba7ec16c0f7c757375220d356c2',
		// 		  'default_access_token' => '{access-token}',
		// 		  'enable_beta_mode' => true,
		// 		  'default_graph_version' => 'v2.5',
		// 		  'persistent_data_handler' => 'session'
		// 	  ]);
		// $helper = $this->fb->getRedirectLoginHelper();
		// $permissions = ['email', 'public_profile']; // Optional permissions
		// $loginUrl = $helper->getLoginUrl('https://tcp.dev/', $permissions);
		// $this->fbook = '<a href="' . htmlspecialchars($loginUrl) . '">Sign Up with Facebook!</a>';
		// $jsHelper = $this->fb->getJavaScriptHelper();
		// $this->access_token = $jsHelper->getAccessToken();
		// echo $loginUrl;
	}

	public function index()
	{
		// When the user visits the root, send them to /home
		redirect('home');
	}

	public function home()
	{
		// $viewData['title'] = 'TCP Passport';
		// $viewData['fbook'] = $this->fbook;

		// Data we want to be available in the views (we
		// can also use them here in the controller, too)
		$viewData = [
			'title' => 'TCP Passport',
			'userLoggedIn' => $this->ion_auth->logged_in()
		];

		$this->parser->parse('template/header', $viewData);

		/**
		 * Because the Facebook API has to be embedded
		 * in the HTML we'll link to a view specifially
		 * designated to hold Facebook's JavaScript API
		 */
		$this->load->view('FacebookAPI.html');

		/**
		 * This time, we'll use '->view()' rather than
		 * '->parse()' because '->parse()' doesn't send
		 * anything to the PHP within this view. That
		 * means we can't send values surrounded by
		 * brackets to the view and expect the bits
		 * of PHP spread throughout it to understand
		 * what we expect it to do.
		 */
		$this->load->view('template/navbar', $viewData);

		$this->parser->parse('home_view', $viewData);
		$this->parser->parse('template/footer', $viewData);
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

		// if ()) {
			// $this->Journeys_model->save_traveler($_POST);

			// The user was successfully created
			// $this->ion_auth->login($identity, $password);
			// redirect('home');
		// } else {
			// The user was not created for some reason
			// echo "You weren't created... :/";
		// }
	}

	public function getUserData($id)
	{
		header("Content-Type: application/json");
		echo json_encode($this->ion_auth->user($id)->row());
	}
}
