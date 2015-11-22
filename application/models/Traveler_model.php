<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traveler_model extends CI_Model {
	/* Properties */
	public $first_name;
	public $last_name;
	public $user_email;
	public $password;
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

	// Gets Traveler info from DB
	public function getTraveler($id)
	{
		return $traveler = $this->db->get_where('travelers', array('id' => $id))->result()[0];
	}
	
	// Updates DB with edited profile
	public function update_record($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('travelers', $data);
	}
	
	// Deletes selected Traveler from DB
	public function delete($id)
	{
		$this->db->delete('travelers', array('id' => $id));
	}
}