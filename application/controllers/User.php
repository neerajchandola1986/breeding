<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		//$this->output->cache(CACHE_TIMEOUT);
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard'; 
		$this->session->unset_userdata('otp_session');
		$this->session->unset_userdata('otp_email');
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$data['startdate_compare'] = $_REQUEST['search_startdate'];
			$data['enddate_compare'] = $_REQUEST['search_enddate'];
		}
        $this->loadViews("dashboard", $this->global, $data , NULL);
    }
	
	
	/**
     * This function used to load the first screen of the user
     */
    public function landingindex()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard'; 
        $this->loadViews("landingdashboard", $this->global, NULL , NULL);
    }
	
	
	 function loadChangePass()
    {
        $this->global['pageTitle'] = 'CodeInsect : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('user/loadChangePass');
            }
            else
            {
                $usersData = array('password'=>base64_encode($newPassword), 'updatedBy'=>$this->vendorId,'updatedDtm'=>date('Y-m-d H:i:s'));         
                $result = $this->user_model->changePassword($this->vendorId, $usersData);      
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }               
                redirect('user/loadChangePass');
            }
        }
    }
	
	
	
	public function editprofile()
    {
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$phone = $this->input->post('phone');
			$data_to_store = array(
				'mobile' => $this->input->post('phone'),
				'email' => $this->input->post('email')
			);	
			$insertted_id = $this->user_model->update_user($data_to_store,$this->session->userdata('userId'));
			$this->session->set_flashdata('success', 'Phone updation successful');
			redirect('user/loadChangePass');
		}
	}

}

?>