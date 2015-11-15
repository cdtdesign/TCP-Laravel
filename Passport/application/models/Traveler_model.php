<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traveler_model extends CI_Model {
	/* Properties */
	public $fname;
	public $lname;
	public $email;
	public $street;
	public $city;
	public $state;
	public $zip;
	public $birthday;
	public $gender;
	public $pic;
	
	/* Methods */
	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
	
	public function save_traveler($create_traveler) {
		/**
		 * Accept data from the controller method 'create_traveler()'
		 * then save the data to the database
		 */
		$this->db->insert('travelers', $create_traveler);
	}
}
