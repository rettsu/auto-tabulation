<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This controller is to configure the account of user that will login.

class Admin extends CI_Controller {

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

	public function tabulate()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/tabulate');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function participants()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/participants');
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

	public function active_user()
	{
		$data = array(
			'permission' => $this->session->permission,
			'username' => $this->session->username,
			'id'			 => $this->session->IDNumber
		);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar', $data);
		$this->load->view('admin/active_user');
		$this->load->view('includes/script');
		$this->load->view('includes/footer');
	}

	public function addPartcipant()
	{
		$addPartcipant = $this->Admin_model->addParticipantModel();

		if ( $addPartcipant == "error" ) 
		{
			echo "0";
		}
		else
		{
			echo "1";
		}
	}

	public function showBranchesCode()
	{
		$BranchCode = $this->Admin_model->showBranchesCodeModel();
		$res = array('result' => $BranchCode);

		$this->load->view('admin/loadParticipants', $res);
	}

	public function showParticipants()
	{
		$BranchCode = $this->Admin_model->showBranchesCodeModel();
		$res = array('result' => $BranchCode);

		$this->load->view('admin/showParticipants', $res);
	}

	public function searchBranch()
	{
		$data = $this->input->post('searchBranch');
		$res = array('result' => $this->Admin_model->searchBranchModel($data) );

		$this->load->view('admin/search', $res);
	}

	public function deleteParticipant()
	{
		$id = $this->input->post('delID');
		$res = $this->Admin_model->deleteParticipant($id);

		echo $res;
	}

	public function AddTabulation()
	{
		$IDNumber = $this->input->post("IDNumber");
		$getDay = $this->Admin_model->getDayByID($IDNumber);
		$updateDayByID = $this->Admin_model->updateDayByID($IDNumber);

		foreach ($getDay as $i => $val) {
			if ( $val->day > 0 ) 
			{
				$getDay = $val->day + 1;
				$res = $this->Admin_model->AddTabulation($getDay);

				if ( $res ) 
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else
			{
				$getDay = 1;
				$res = $this->Admin_model->AddTabulation($getDay);

				if ( $res ) 
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
		}
	}

	public function editInformation()
	{
		$editStatus = $this->Admin_model->editInformationModal();
		
		if ( $editStatus )
			echo "success";
		else
			echo "error";
	}

	public function deleteInformation()
	{
		$editStatus = $this->Admin_model->deleteInformationModal();
		
		if ( $editStatus )
			echo "success";
		else
			echo "error";
	}

	public function searchParticipants()
	{
		$data = $this->input->post('searchBranch');
		$res = array('result' => $this->Admin_model->searchBranchModel($data) );

		$this->load->view('admin/search_part', $res);
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

	public function AddAdmin()
	{
		$data = array(
  		'IDNumber' => $this->input->post('companyID'),
  		'password' => $this->input->post('password'),
  		'first_name' => $this->input->post('firstName'), 
  		'middle_name' => $this->input->post('middleName'), 
  		'last_name' => $this->input->post('lastName'),
  		'permission' => 'admin', 
  	);

  	$dataCheck = array(
  		'IDNumber' => $this->input->post('companyID'),
  		'first_name' => $this->input->post('firstName'), 
  		'middle_name' => $this->input->post('middleName'), 
  		'last_name' => $this->input->post('lastName'),
  	);

  	$check = $this->Admin_model->checkIfAccountExisted($dataCheck);
		// echo json_encode($data);

		if ( !$check ) 
		{
			$result = $this->Admin_model->AddAdminModel($data);
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

	public function showAdminsCont()
	{
		$data = array('admin' => $this->Admin_model->showAdminsModal() );

		$this->load->view("admin/showAdminsResult", $data);
	}

	public function deleteAdmin()
	{
		$result = $this->Admin_model->deleteAdminModel();

		if ( $result ) 
			echo "success";
		else
			echo "error";

	}

	public function showUsersCont()
	{
		$data = array(
			'admin' => $this->Admin_model->showUsersModal(),
			'permission' => $this->session->permission
		);

		$this->load->view("admin/showUsersResult", $data);
	}

	public function logout()
	{
		$this->Login_model->destroy_login_session();
		redirect('/');
	}

}
