<?php
/*
 * This file can be deleted
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Traveler_model extends CI_Model {
	/* Properties */
	public $first_name;
	public $last_name;
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

	/**
	 * Save a traveler to the database through
	 * the parameter value passed
	 */
	public function saveTraveler($traveler) {

		$this->db->insert('travelers', $traveler);
	}

	/**
	 * Set that a traveler has
	 * signed in with Facebook
	 */
	public function setFacebookerLoggedIn($facebooker) {
		$this->db->update('travelers', [
			'facebookID' => $facebooker['uid'],
			'last_known_token' => $facebooker['token'],
			'in' => $facebooker['in']
		]);
	}
}
