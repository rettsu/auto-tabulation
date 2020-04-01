<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This controller is to configure the account of user that will login.

class Login_controller extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
  }
	// For the main login page
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('login/index');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
		// echo "This is for Login";
	}

	// This is for logging in of users
	public function check_user()
	{
		$login_model = $this->Login_model->checking_acc_model();

		if ( $login_model == "admin" ) 
			echo "admin";
		else if( $login_model == "user" )
			echo "user";
	}

	public function SignUp()
	{
		$data = array(
  		'IDNumber' => $this->input->post('companyID'),
  		'first_name' => $this->input->post('firstName'), 
  		'middle_name' => $this->input->post('middleName'), 
  		'last_name' => $this->input->post('lastName'),
  		'permission' => 'user', 
  	);

  	$dataCheck = array(
  		'IDNumber' => $this->input->post('companyID'),
  		'first_name' => $this->input->post('firstName'), 
  		'middle_name' => $this->input->post('middleName'), 
  		'last_name' => $this->input->post('lastName'),
  	);

  	$check = $this->Login_model->checkIfAccountExisted($dataCheck);
		// echo json_encode($data);

		if ( !$check ) 
		{
			$result = $this->Login_model->SignupModel($data);
			if ( $result )
				echo "success";
			else
				echo "error";
		}
		else
		{
			echo "exist";
		}
	}
}
