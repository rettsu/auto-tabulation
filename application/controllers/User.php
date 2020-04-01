<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This controller is to configure the account of user that will login.

class User extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
    	$this->Login_model->check_login_session();
  	}

	// For the main admin page
	public function index()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/index');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function overall()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);
		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/overall');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function creativity()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/creativity');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function music()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/music');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function originality()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/originality');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function showAllBranchNames()
	{
		
	}

	public function showOverAll()
	{
		$data = array(
			'result' => $this->Admin_model->showOverAllModal()
		);

		$this->load->view('admin/overall_result', $data);		
	}

	public function showCreativity()
	{
		$data = array(
			'result' => $this->Admin_model->showCreativityModal()
		);

		$this->load->view('admin/creativity_result', $data);	
	}

	public function showMusic()
	{
		$data = array(
			'result' => $this->Admin_model->showMusicModal()
		);

		$this->load->view('admin/music_result', $data);
	}

	public function showOriginality()
	{
		$data = array(
			'result' => $this->Admin_model->showOriginalityModal()
		);

		$this->load->view('admin/originality_result', $data);
	}

	public function logout()
	{
		$this->Login_model->destroy_login_session();
		redirect('/');
	}

}
