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

		// Load the 'Journeys_model', some libraries, and URL helpers
		$this->load->model('Journeys_model');
		$this->load->library('upload', $upload_config);
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		// Loads the views for navbar.php, header.php, journeys_view.php and footer.php
		$this->load->view('template/header', $viewData);
		$viewData['title'] = 'TCP Passport';
		$this->load->view('template/navbar');

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
		$submittedPostData['img'] = $_FILES['journey_header_image']['name'];
		echo "CREATE";
		print_r($_FILES['journey_header_image']['tmp_name']);
		// Move file to 'uploads' folder

		/**
		 * Remember to make sure the 'uploads' directory has
		 * write permisson. On my machine 764 wasn't enough.
		 *
		 * If you don't have write permission the image won't
		 * be uploaded in the first place.
		 */
		move_uploaded_file($_FILES['journey_header_image']['tmp_name'], '/Users/alexander/Sites/Traveling-Children-Project/assets/uploads/' . $_FILES['journey_header_image']['name']);

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

		if ($_FILES['journey_header_image']['size'] >= 2097152) {
			// The image  is larger than the 2MB limit; Refresh
			// the page they submitted from and tell the view
			// that the image wasn't successfully uploaded.
			//
			$image_uploaded = false;
		} else {
			// The image is not too large, so we'll store it
			move_uploaded_file($_FILES['journey_header_image']['tmp_name'], '/Users/alexander/Sites/Traveling-Children-Project/assets/uploads/' . $_FILES['journey_header_image']['name']);

			// Set the new image name in the database
			$data['img'] = $_FILES['journey_header_image']['name'];

			// The image should have uploaded, so we'll refresh
			// the page the user was viewing with the new data
			$image_uploaded = true;
		}

		// Update the rest of the data (i.e. with or without the image)
		$this->Journeys_model->update_record($data);

		$this->session->set_flashdata('image_uploaded', $image_uploaded);
		$this->session->set_flashdata('post_edited', $data['id']);
		redirect('journeys');
	}

	public function delete($id)
	{
		$this->Journeys_model->delete($id);
		redirect('journeys');
	}
}
