<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


function randomPassword() {
	  $chars = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	  $ret = '';
	  for($i = 0; $i < 8; ++$i) {
		$random = str_shuffle($chars);
		$ret .= $random[0];
	  }
	  return $ret;
}



function generateCouponCode($length = 8) {
  $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $ret = '';
  for($i = 0; $i < $length; ++$i) {
    $random = str_shuffle($chars);
    $ret .= $random[0];
  }
  return $ret;
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
		if(trim(base64_encode($plainPassword)) == trim($hashedPassword))
		{
			return true;
		}
		else
		{
			return false;
		}
        //return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        $CI = setProtocol();              
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}


function getplan_info($id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_category` WHERE id='".$id."'"; 
	$query = $ci->db->query($sql);
	return ($query->result());
}

function geruser_info_email($email = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_users` WHERE email='".$email."'"; 
	$query = $ci->db->query($sql);
	return ($query->result());
}

function getstallion_info($id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_stallion` WHERE id='".$id."'"; 
	$query = $ci->db->query($sql);
	return ($query->result());
}
function getBooking_by_user_id($user_id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_booking` WHERE user_id='".$user_id."'"; 
	$query = $ci->db->query($sql);
	return ($query->result());
}


function getuser_info($id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_users` WHERE userId='".$id."'"; 
	$query = $ci->db->query($sql);
	$data = $query->result_array();
	return $data[0];
}


function getproject_info($id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `project` WHERE id='".$id."'"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data[0];
}

function getbooking_info($id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_booking` WHERE id='".$id."'"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data;
}

function getorder_by_booking($booking_id = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `orders` WHERE booking_id='".$booking_id."'"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data;
}


function getuser_info_otp_login($email = "")
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_users` WHERE email='".$email."'"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data[0];
}




function getcategory()
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_category` WHERE status='0'"; 
	$query = $ci->db->query($sql);
	return ($query->result_array());
}


function getproject()
{
	$ci =& get_instance(); 
	$ci->load->database();
	if($ci->session->userdata('role') > 1){
	$sql = "SELECT * FROM `project` WHERE user_id='".$ci->session->userdata('userId')."'"; 
	}else{
	$sql = "SELECT * FROM `project`"; 
	} 
	$query = $ci->db->query($sql);
	$data = $query->result_array();
	return $data;
}








function getStaffList()
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_users` WHERE roleId='3' order by createdDtm DESC LIMIT 0,5"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data;
}

function getSMList()
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_users` WHERE roleId='2' order by createdDtm DESC LIMIT 0,5"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data;
}

function getBookingList()
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_booking` order by created_at DESC LIMIT 0,5"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data;
}

function getLeadListDash()
{
	$ci =& get_instance(); 
	$ci->load->database();
	$sql = "SELECT * FROM `tbl_leads` LIMIT 0,5"; 
	$query = $ci->db->query($sql);
	$data = $query->result();
	return $data;
}

?>