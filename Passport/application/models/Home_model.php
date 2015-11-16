<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	public $user_name;
	public $lname;
	public $user_maile;
	public $street;
	public $city;
	public $state;
	public $zip;
	public $birth;
	public $gender;
	public $pic;
	
	public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

	// public function setup_login_form($data)
// 	{
// 		$this->db->where('travelers', $data['user_id']);
// 	}
	
	// Sending Traveler info to DB
	public function insert_entry($profile)
	{
		$profile['user_id'] = '';
		$this->db->insert('travelers', $profile);
	}
	
	// Get journey data
	public function profile_with_id($id)
	{
		return json_encode($this->db->get_where('travelers', array('user_id' => $id))->result());
	}
	
}