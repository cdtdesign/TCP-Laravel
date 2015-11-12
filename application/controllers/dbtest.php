<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Class name always begins with a Capital letter
class Dbtest extends CI_Controller {

	public function index() {
		// Standard SQL Query
		// $sql = "SELECT * FROM 'destinations'";
		// $data['query_sql'] = $this->db->query($sql);
		// Active Record Query
		$data['query_ar'] = $this->db->get('destinations');
		// Load view
		$this->load->view('dbtest_view', $data);
	}
}
