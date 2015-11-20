<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		/* Libraries */
		$this->load->library('ion_auth'); // Ion auth
		$this->load->library('parser'); // Template parser
		$this->load->library('session'); // Session object

		/* Helpers */
		$this->load->helper('url');

		/* Models */
		$this->load->model('Traveler_model');
	}

	/**
	 * Redirect users to '/home' When
	 * they request '/'
	 */
	public function index()
	{
		// When the user visits the root, send them to /home
		redirect('home');
	}

	/**
	 * Home page
	 */
	public function home()
	{
		// Data for the 'template/header' view
		$headerViewData = [
			'title' => 'TCP Passport'
		];

		$facebookAPIData = [
			// Determine whether the user has used
			// Facebook to sign up. This value is
			// passed to 'FacebookAPI.js' later
			// which is the reason the values
			// need to be strings
			'facebooker' => ($this->session->userdata('facebooker')) ? $facebooker = 'true' : $facebooker = 'false'
		];

		$masterTemplateData = [
			// This array contains values sent to 'MasterTemplate.php'
			// which is a view. This view will have access to all of
			// the values we define in this array through enclosing
			// them in curly brackets. If you look at
			// '/application/views/MasterTemplate.php' you'll see
			// these array keys are called between curly brackets
			//
			// Each of those curly-bracket enclosed variables are
			// going to be replaced with the values we set right
			// here before they're sent to the requesting browser
			//
			// The first value directly below this comment returns
			// a boolean to indicate whether the user has logged in
			// through our native authentication
			//
			'userLoggedIn' => $this->logged_in(),

			// This is the content between the 'head' elements
			// to which we're passing the values in '$headerViewData'
			// meaning the 'title' is available in the page as '$title'
			//
			// The last argument -- 'TRUE' -- says that we don't want
			// the view to be added to the output buffer yet. The
			// output buffer is -- of course -- the data send back to
			// the browser. We'll load this 'head' in 'MasterTemplate'
			'head' => $this->parser->parse('template/header', $headerViewData, TRUE),

			// Again, we load a view to the '$masterTemplateData'
			// although we don't need to pass any variables this
			// time so we say 'NULL' (you can't just send two
			// parameters), and we lastly make sure we don't
			// add this view to the output buffer
			'content' => $this->load->view('template/navbar', [
				'userLoggedIn' => $this->logged_in()
			], TRUE)
				// We can append more views with a
				// period for string concatenation
				// starting with the home view
				. $this->load->view('home_view', NULL, TRUE)
				. $this->load->view('template/footer', NULL, TRUE)
				. $this->load->view('FacebookAPI.php', $facebookAPIData, TRUE)
		];

		/**
		 * Because the Facebook API has to be embedded
		 * in the HTML we'll link to a view specifially
		 * designated to hold Facebook's JavaScript API
		 * but only if the user has signed in through it
		 */
		// if ($this->session->userdata('facebooker')) {
			// $masterTemplateData['content'] .= $this->load->view('FacebookAPI.html', NULL, TRUE);
		// }

		/**
		 * Now we'll mix it all together in the 'MasterTemplate'
		 */
		$this->parser->parse('MasterTemplate', $masterTemplateData);

		/**
		 * This time, we'll use '->view()' rather than
		 * '->parse()' because '->parse()' doesn't send
		 * anything to the PHP within this view. That
		 * means we can't send values surrounded by
		 * brackets to the view and expect the bits
		 * of PHP spread throughout it to understand
		 * what we expect it to do.
		 */
		// $this->load->view('template/navbar', $masterTemplateData);

		// $this->parser->parse('home_view', $masterTemplateData);
		// $this->parser->parse('template/footer', $masterTemplateData);
	}

	/**
	 * Save a record in the database for those
	 * who have chosen native authentication
	 */
	public function register()
	{
		$identity = $_POST['email'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$_POST['gender'] = 3;
		$_POST['first_name'] = $_POST['first_name'];
		$_POST['last_name'] = $_POST['last_name'];
		$userWasSaved = $this->ion_auth->register($identity, $password, $email, $_POST);

		if($userWasSaved) {
			redirect('home');
		} else {
			view('You weren\'t created');
		}
	}

	/**
	 * Save a record in the database for those
	 * who have signed up with Facebook
	 */
	public function registerFacebooker() {
		// Remember that the user has chosen
		// authentication through Facebook
		$this->session->set_userdata('facebooker', true);

		// Save the data of the new traveler
		// to the database for use later
		$this->Traveler_model->saveTraveler([
			'username' => str_replace(' ', '', $this->input->post('first_name') .$this->input->post('last_name')),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),
			'facebooker' => TRUE
		]);
	}

	/**
	 * Return user information from
	 * the database as JSON
	 */
	public function getUserData($id)
	{
		header("Content-Type: application/json");
		echo json_encode($this->ion_auth->user($id)->row());
	}

	/**
	 * Return a boolean to say whether
	 * a user has logged in
	 */
	public function logged_in() {
		if ($this->session->userdata('facebooker') || $this->ion_auth->logged_in()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Tell the database that a user
	 * authenticated with Facebook
	 * and also set a value in the
	 * session to indicate that a
	 * user has signed in through it
	 */
	public function facebookerLoggedIn() {
		$this->session->set_userdata('facebooker', true);
		$this->Traveler_model->setFacebookerLoggedIn($this->input->post('uid'));
	}

	/**
	 * Tell the database that a user
	 * has deauthenticated from TCP
	 * and remember it in the session
	 */
	public function facebookerLoggedOut() {
		$this->session->set_userdata('facebooker', false);
		$this->Traveler_model->setFacebookerLoggedOut($this->input->post('uid'));
	}
}
