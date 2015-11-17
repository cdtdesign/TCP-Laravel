<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journeys extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		// Config for the upload library
		$upload_config['upload_path'] = '/assets/uploads/';
		$upload_config['allowed_types'] = 'gif|jpg|png';
		$upload_config['max_size']	= '100';
		$upload_config['max_width']  = '1024';
		$upload_config['max_height']  = '768';
		
		// Load some libraries
		$this->load->model('Journeys_model');
		$this->load->library('upload', $upload_config);
		$this->load->helper('url');
	}
	
	public function index()
	{		
		// Loads the views for navbar.php, header.php, journeys_view.php and footer.php
		$viewData['title'] = 'TCP Passport';
		$this->load->view('template/navbar');
		$this->load->view('template/header', $viewData);
		
		// Active Record Query to post journeys to Journey Blog
		$viewData['ten_posts'] = $this->Journeys_model->getTenLatestPosts();
		$this->load->view('journeys_view', $viewData);
		$this->load->view('template/footer');
	}
	
	// Returns journey data for one journey as JSON
	public function show($id)
	{
		echo $this->Journeys_model->journey_with_id($id);
	}
	
	public function create()
	{
		// Store the submitted data
		$submittedPostData = $this->input->post();
		$submittedPostData['img'] = $_FILES['img']['name'];
		
		// Move file to 'uploads' folder
		move_uploaded_file($_FILES['img']['tmp_name'], '/Applications/MAMP/htdocs/assets/uploads/' . $_FILES['img']['name']);
		
		// Save the image uploaded and get its' filename
		// var_dump($this->upload->display_errors());
		$this->Journeys_model->insert_entry($submittedPostData);
		$this->load->view('journeys_view');
		redirect('journeys');
	}
	
	public function edit($id)
	{
		$data = $this->input->post();
		$data['id'] = $id;
		$data['img'] = $_FILES['img']['name'];
		
		// Move file to 'uploads' folder
		move_uploaded_file($_FILES['img']['tmp_name'], '/Applications/MAMP/htdocs/assets/uploads/' . $_FILES['img']['name']);
		
		$this->Journeys_model->update_record($data);
		redirect('journeys');
	}
	
	public function delete($id)
	{
		$this->Journeys_model->delete($id);
		redirect('journeys');
	}
}