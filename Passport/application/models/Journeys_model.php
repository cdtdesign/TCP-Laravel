<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journeys_model extends CI_Model {
	
	public $fname;
	public $title;
	public $date;
	public $body;
	public $htags;
	public $img;
	
	public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
	
	// Sending user input into DB
	public function insert_entry($post)
	{
		$post['travelerid'] = '2';
		$this->db->insert('journeys', $post);
	}
	
	// Gets latest 10 records from DB, desc order by date, limit 10
	public function getTenLatestPosts()
	{
		$journeys = $this->db->order_by('date', 'desc')->get('journeys', 10)->result();
		foreach ($journeys as $journey) {
			$journey->user = $this->db->get_where('travelers', array('id' => $journey->travelerid))->result()[0];
		}
		return $journeys;
	}
	
	// Get journey data
	public function journey_with_id($id)
	{
		return json_encode($this->db->get_where('journeys', array('id' => $id))->result());
	}
	
	// Updates DB with edited post
	public function update_record($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('journeys', $data);
	}
	
	// Deletes selected post from DB
	public function delete($id)
	{
		$this->db->delete('journeys', array('id' => $id));
	}
}