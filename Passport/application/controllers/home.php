<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include the autoload.php from Facebook directory
require_once __DIR__ . '../../../assets/Facebook/autoload.php';
require_once APPPATH . 'core/Auth_Controller.php';

class Home extends Auth_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->config->load('config_fb');
		// session_start();
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
		$loginUrl = $helper->getLoginUrl('http://tcp.dev/ASL/Passport/', $permissions);
		$this->fbook = '<a href="' . htmlspecialchars($loginUrl) . '">Sign Up with Facebook!</a>';
		$jsHelper = $this->fb->getJavaScriptHelper();
		$this->access_token = $jsHelper->getAccessToken();
		// echo $loginUrl;
	
		// $this->load->model('Traveler_model');
		
		// Load some libraries
		$this->load->model('Home_model');
		// $this->load->library('upload', $upload_config);
		$this->load->helper('url');
	}
	
	// public function index() {
// 		redirect('home');
// 	}
	
	public function home()
	{
		$viewData['title'] = 'TCP Passport';
		$viewData['fbook'] = $this->fbook;
		$viewData['userLoggedIn'] = false;
		
		if (isset($_SESSION['auth_identifiers'])) {
			$viewData['userLoggedIn'] = true;
		}
		
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
	
	// Returns journey data for one journey as JSON
	public function show($id)
	{
		echo $this->Home_model->profile_with_id($id);
	}
	
	// public function create_traveler() {
		/**
		 * Create a new Traveler and save their information
		 * to the database by sending it to the model
		 */
		// $traveler = $this->input->post();
// 		$traveler['street'] = "";
// 		$traveler['city'] = "";
// 		$traveler['state'] = "";
// 		$traveler['zip'] = "";
// 		$traveler['birthday'] = "";
// 		$traveler['pic'] = "";
// 		$this->Traveler_model->save_traveler($traveler);
// 	}
	
	////////// This is all Community Auth stuff copied from 'Examples.php' //////////
    /**
     * This login method only serves to redirect a user to a
     * location once they have successfully logged in. It does
     * not attempt to confirm that the user has permission to
     * be on the page they are being redirected to.
     */
    public function login()
    {
        if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
        {
            $this->require_min_level(1);
        }
		
        $this->setup_login_form();

        // $html = $this->load->view('examples/page_header', '', TRUE);
//         $html .= $this->load->view('examples/login_form', '', TRUE);
//         $html .= $this->load->view('examples/page_footer', '', TRUE);
		
		$html = $this->load->view('template/navbar', '', TRUE);
		$html .= $this->load->view('template/header', '', TRUE);
		$html .= $this->load->view('home_view', '', TRUE);
		$html .= $this->load->view('template/footer', '', TRUE);

        echo $html;
    }
	
    /**
     * Log out
     */
    public function logout()
    {
        $this->authentication->logout($logout);

        redirect( secure_site_url( LOGIN_PAGE . '?logout=1') );
    }
	
    /**
     * User recovery form
     */
    public function recover()
    {
        // Load resources
        $this->load->model('examples_model');

        /// If IP or posted email is on hold, display message
        if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
        {
            $view_data['disabled'] = 1;
        }
        else
        {
            // If the form post looks good
            if( $this->tokens->match && $this->input->post('user_email') )
            {
                if( $user_data = $this->examples_model->get_recovery_data( $this->input->post('user_email') ) )
                {
                    // Check if user is banned
                    if( $user_data->user_banned == '1' )
                    {
                        // Log an error if banned
                        $this->authentication->log_error( $this->input->post('user_email', TRUE ) );

                        // Show special message for banned user
                        $view_data['user_banned'] = 1;
                    }
                    else
                    {
                        /**
                         * Use the string generator to create a random string
                         * that will be hashed and stored as the password recovery key.
                         */
                        $this->load->library('generate_string');
                        $recovery_code = $this->generate_string->set_options(
                            array( 'exclude' => array( 'char' ) )
                        )->random_string(64)->show();

                        $hashed_recovery_code = $this->_hash_recovery_code( $user_data->user_salt, $recovery_code );

                        // Update user record with recovery code and time
                        $this->examples_model->update_user_raw_data(
                            $user_data->user_id,
                            array(
                                'passwd_recovery_code' => $hashed_recovery_code,
                                'passwd_recovery_date' => date('Y-m-d H:i:s')
                            )
                        );

                        $view_data['special_link'] = secure_anchor(
                            'examples/recovery_verification/' . $user_data->user_id . '/' . $recovery_code,
                            secure_site_url( 'examples/recovery_verification/' . $user_data->user_id . '/' . $recovery_code ),
                            'target ="_blank"'
                        );

                        $view_data['confirmation'] = 1;
                    }
                }

                // There was no match, log an error, and display a message
                else
                {
                    // Log the error
                    $this->authentication->log_error( $this->input->post('user_email', TRUE ) );

                    $view_data['no_match'] = 1;
                }
            }
        }

        echo $this->load->view('examples/page_header', '', TRUE);

        echo $this->load->view('examples/recover_form', ( isset( $view_data ) ) ? $view_data : '', TRUE );

        echo $this->load->view('examples/page_footer', '', TRUE);
    }

    // --------------------------------------------------------------

    /**
     * Verification of a user by email for recovery
     *
     * @param  int     the user ID
     * @param  string  the passwd recovery code
     */
    public function recovery_verification( $user_id = '', $recovery_code = '' )
    {
        /// If IP is on hold, display message
        if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
        {
            $view_data['disabled'] = 1;
        }
        else
        {
            // Load resources
            $this->load->model('examples_model');

            if(
                /**
                 * Make sure that $user_id is a number and less
                 * than or equal to 10 characters long
                 */
                is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

                /**
                 * Make sure that $recovery code is exactly 64 characters long
                 */
                strlen( $recovery_code ) == 64 &&

                /**
                 * Try to get a hashed password recovery
                 * code and user salt for the user.
                 */
                $recovery_data = $this->examples_model->get_recovery_verification_data( $user_id ) )
            {
                /**
                 * Check that the recovery code from the
                 * email matches the hashed recovery code.
                 */
                if( $recovery_data->passwd_recovery_code == $this->_hash_recovery_code( $recovery_data->user_salt, $recovery_code ) )
                {
                    $view_data['user_id']       = $user_id;
                    $view_data['user_name']     = $recovery_data->user_name;
                    $view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
                }

                // Link is bad so show message
                else
                {
                    $view_data['recovery_error'] = 1;

                    // Log an error
                    $this->authentication->log_error('');
                }
            }

            // Link is bad so show message
            else
            {
                $view_data['recovery_error'] = 1;

                // Log an error
                $this->authentication->log_error('');
            }

            /**
             * If form submission is attempting to change password
             */
            if( $this->tokens->match )
            {
                $this->examples_model->recovery_password_change();
            }
        }

        echo $this->load->view('examples/page_header', '', TRUE);

        echo $this->load->view( 'examples/choose_password_form', $view_data, TRUE );

        echo $this->load->view('examples/page_footer', '', TRUE);
    }

    // --------------------------------------------------------------

    /**
     * Hash the password recovery code (uses the authentication library's hash_passwd method)
     */
    private function _hash_recovery_code( $user_salt, $recovery_code )
    {
        return $this->authentication->hash_passwd( $recovery_code, $user_salt );
    }

    // --------------------------------------------------------------

    /**
     * Get an unused ID for user creation
     *
     * @return  int between 1200 and 4294967295
     */
    private function _get_unused_id()
    {
        // Create a random user id
        $random_unique_int = 2147483648 + mt_rand( -2147482447, 2147483647 );

        // Make sure the random user_id isn't already in use
        $query = $this->db->where('user_id', $random_unique_int)
            ->get_where(config_item('user_table'));

        if ($query->num_rows() > 0) {
            $query->free_result();

            // If the random user_id is already in use, get a new number
            return $this->_get_unused_id();
        }

        return $random_unique_int;
    }

    // --------------------------------------------------------------
}
