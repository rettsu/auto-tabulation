<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This for the Login Model - Configure/Authenticate Users/Voters
 */
class Login_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function checking_acc_model()
  {
    $IDNumber = $this->input->post('userID');
    $acc_id = array(
      'IDNumber' => $this->input->post('userID'),
      'password' => $this->input->post('password')
    );

    $query = $this->db->get_where('users', $acc_id);

    if ( $query->num_rows() > 0 )
    {
      foreach ($query->result() as $row) 
      {
        $permission = $row->permission;
        if ($row->permission == 'admin') 
        {
          $username = $row->first_name." ".$row->last_name;
          $this->session->set_userdata('permission', $permission);
          $this->session->set_userdata('username', $username);
          $this->session->set_userdata('IDNumber', $this->input->post('userID'));
          $this->session->set_userdata('isLoggedin', true);

          echo "admin";
        }
        else if($row->permission == 'super_admin')
        {
          $username = $row->first_name." ".$row->last_name;
          $this->session->set_userdata('permission', $permission);
          $this->session->set_userdata('username', $username);
          $this->session->set_userdata('IDNumber', $this->input->post('userID'));
          $this->session->set_userdata('isLoggedin', true);

          echo "admin";
        }
        else
        {
          $username = $row->first_name." ".$row->last_name;
          $this->session->set_userdata('permission', $permission);
          $this->session->set_userdata('username', $username);
          $this->session->set_userdata('IDNumber', $this->input->post('userID'));
          $this->session->set_userdata('isLoggedin', true);

          echo "user";
        }
      }

      $status = array('status' => 1);

      $this->db->where('IDNumber', $IDNumber);
      $this->db->update('users', $status);
    }
    else
    {
      return "error";
    }
  }

  public function check_login_session()
  {
    if($this->session->has_userdata('isLoggedin') == false )
    {
      redirect('/');
    }
  }

  public function destroy_login_session()
  {
    $IDNumber = $this->session->IDNumber;
    $status = array('status' => 0);

    $this->db->where('IDNumber', $IDNumber);
    $this->db->update('users', $status);

    $this->session->unset_userdata('permission');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('IDNumber');
    $this->session->unset_userdata('isLoggedin');
  }

    public function SignupModel($data)
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
}

?>
