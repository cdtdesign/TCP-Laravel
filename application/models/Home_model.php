<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	/* Properties - Dest Type */
	public $dname;
	public $dtype;
	public $dscrptn;
	public $dstreet;
	public $dcity;
	public $dstate;
	public $dzip;
	public $adult_cost;
	public $child_cost;
	public $discount;

	/* Methods */
	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
	
	// Gets latest 10 destinations from DB, asc order by name, limit 10
	public function getDestinations($type, $location)
	{
		$locations = $this->db
			->order_by('dname', 'asc')
			->join('categories', 'categories.id = destinations.dtype')
			->join('locations', 'locations.id = destinations.location')
			->get_where('destinations', array(
				'dtype' => $type,
				'location' => $location
			))
			->result();
		return json_encode($locations);
	}
	
	// public function dest()
// 	{
// 		$data['venue'] = $this->db->get('destinations');
// 	}
}