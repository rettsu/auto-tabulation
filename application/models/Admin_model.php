<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This for the Login Model - Configure/Authenticate Users/Voters
 */
class Admin_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function addParticipantModel()
  {
  	$branch = array(
			'branchCode' => "B".$this->input->post('branchCode'),
			'branchName' => strtoupper($this->input->post('branchName')),
			'dayEntry' => 1
		);

  	$name = array(
  		'branchCode' => "B".$this->input->post('branchCode'),
			'branchName' => strtoupper($this->input->post('branchName'))
		);
  	$query = $this->db->get_where('participants', $name);

  	if ( $query->num_rows() > 0 ) 
  	{
  		return "error";
  	}
  	else
  	{
  		$this->db->insert('participants', $branch);
			return $this->db->insert_id();
  	}
  }

  public function showBranchesCodeModel()
  {
  	$this->db->order_by('branchCode', 'ASC');
  	$query = $this->db->get('participants');

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function searchBranchModel($data)
  {

  	$this->db->like('branchName', $data);
  	$this->db->or_like('branchCode', $data);
  	$query = $this->db->get('participants');

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function deleteParticipant($id)
  {
  	$this->db->where('id', $id);
  	$query = $this->db->delete('participants');

  	return $this->db->affected_rows(); 
  }

  public function getDayByID($IDNumber)
  {
  	$this->db->select_max("day");
  	$this->db->where("IDNumber", $IDNumber);
  	$query = $this->db->get("standings");

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function AddTabulation($getDay)
  {
  	$tabInfo = array(
  		'IDNumber' => $this->input->post('IDNumber'),
  		'day' => $getDay,
  		'overall' => $this->input->post('overall'),
  		'creativity' => $this->input->post('creativity'),
  		'music' => $this->input->post('music'),
  		'originality' => $this->input->post('originality') 
  	);

  	$query = $this->db->insert('standings', $tabInfo);
  	return $this->db->insert_id();
  }

  public function updateDayByID($id)
  {
  	$branchID = array('branchCode' => $id);
  	$query = $this->db->get_where('participants', $branchID);

  	if ( $query->num_rows() > 0 ) 
  	{
  		foreach ($query->result() as $row) 
  		{
  			$day = $row->dayEntry + 1;
  			$upDay = array('dayEntry' => $day );
  		}

  		$this->db->where('branchCode', $id);
			$this->db->update('participants', $upDay);

  		return $this->db->affected_rows();
  	}
  }

  public function editInformationModal()
  {
  	$id = $this->input->post('id');
  	$data = array(
  		'branchCode' => $this->input->post("branchCode"), 
  		'branchName' => $this->input->post("branchName")
  	);

  	$this->db->where('id', $id);
  	$query = $this->db->update('participants', $data);

  	return $this->db->affected_rows();
  }

  public function deleteInformationModal()
  {
  	$id = $this->input->post('id');

  	$this->db->where('id', $id);
  	$query = $this->db->delete('participants');

  	return $this->db->affected_rows();
  }

  public function getAllBranchNames()
  {
  	$this->db->order_by('branchCode', 'ASC');
  	$query = $this->db->get('participants');

  	if ( $query->num_rows() > 0 ) 
  		return $query->result();
  	else
  		return false;
  }

  public function showOverAllModal()
  {
  	$this->db->select('IDNumber');
  	$this->db->select_sum('overall');
  	$this->db->select_max("day");
  	$this->db->group_by('IDNumber');

  	$query = $this->db->get('standings');

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function showCreativityModal()
  {
  	$this->db->select('IDNumber');
  	$this->db->select_sum('creativity');
  	$this->db->select_max("day");
  	$this->db->group_by('IDNumber', 'ASC');

  	$query = $this->db->get('standings');

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function showMusicModal()
  {
  	$this->db->select('IDNumber');
  	$this->db->select_sum('music');
  	$this->db->select_max("day");
  	$this->db->group_by('IDNumber', 'ASC');

  	$query = $this->db->get('standings');

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function showOriginalityModal()
  {
  	$this->db->select('IDNumber');
  	$this->db->select_sum('originality');
  	$this->db->select_max("day");
  	$this->db->group_by('IDNumber', 'ASC');

  	$query = $this->db->get('standings');

  	if ( $query->num_rows() > 0 ) 
  	{
  		return $query->result();
  	}
  	else
  	{
  		return false;
  	}
  }

  public function AddAdminModel($data)
  {
  	$this->db->insert('users', $data);
		return $this->db->insert_id();
  }


  public function checkIfAccountExisted($dataCheck)
  {
  	$query = $this->db->get_where('users', $dataCheck);

  	if ( $query->num_rows() > 0 ) 
  		return true;
  	else
  		return false;
  }

  public function showAdminsModal()
  {
  	$permission = array("permission" => "admin");
  	$query = $this->db->get_where('users', $permission);

  	if ( $query->num_rows() > 0 ) 
  		return $query->result();
  	else
  		return false;
  }

  public function deleteAdminModel()
  {
  	$this->db->where("id", $this->input->post("id"));
  	$query = $this->db->delete("users");

  	if ( $query )
      return true;
    else
      return false;
  }

  public function showUsersModal()
  {
  	$permission = array("permission" => "user");
  	$query = $this->db->get_where('users', $permission);

  	if ( $query->num_rows() > 0 ) 
  		return $query->result();
  	else
  		return false;

  }
}

?>
