<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Admin extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
		$this->load->model('user_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        if($this->session->userdata('is_logged_in')){
			redirect(base_url().'dashboard');
        }else{
        	$this->load->view('login');	
        }
    }
	
	
	public function adminloginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->login_model->loginMe($email, $password);
            //echo "<pre>";print_r($result);die;
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res->userId,                    
                                            'role'=>$res->roleId,
                                            'roleText'=>$res->role,
                                            'name'=>$res->name,
                                            'isLoggedIn' => TRUE
                                    );
					$this->session->set_userdata($sessionArray);
					//if($res->roleId == '1' || $res->roleId == '5')
					{
						
						/*$email_otp = $email;
						$otp_send = rand(1111,9999);
						$this->session->set_userdata(array("otp_session"=>$otp_send,'otp_email'=>$email_otp));
						$from = 'info@anganrajpura.com';
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: '.$from."\r\n".
							'Reply-To: '.$from."\r\n" .
							'X-Mailer: PHP/' . phpversion();
						$blog_title = "https://aanganrajpura.com/";
						$blog_title_footer = "https://aanganrajpura.com/";
						$admin_email = $from;
						$email_subject = "OTP Login Requested";
						$emailtext = "Hi User,<br><br>Below are the OTP details.";
						$emailtext .= "<br><br>OTP : ".trim($otp_send);
						$body ="<html><body style='color:#0e0e0e; font-size:11px; font-family:Tahoma, Geneva, sans-serif;'> <center><div style='border:1px solid #e2e1dd; border-bottom:none; margin:0; padding:0; width:650px;'> <table width='100%' border='1' cellspacing='0' cellpadding='10'> <tr> <td width='100%' align='left' valign='middle' height='100' style='background-color:#000'><img src='".base_url()."assets/images/Aanganlogo.png' alt='Aanganrajpura' height='150px'></td></tr> <tr> <td colspan='2' align='center' valign='top' style='font-size:18px; color:#ffffff; font-family:Tahoma, Geneva, sans-serif; line-height:22px; background-color:#4e545d; padding:7px 0; text-transform:uppercase;'><strong>".$email_subject."</strong></td> </tr> <tr> <td colspan='2' align='left' valign='top' style='font-size:12px;color:#0e0e0e; font-family:Tahoma, Geneva, sans-serif; line-height:20px;'><div style='margin:0; padding:0;'> <div style='margin:0; padding:0; line-height:20px;'>".$emailtext."</div>  <div style='font-family:Tahoma, Geneva, sans-serif; color:#010101; font-size:11px; line-height:22px;border-top:1px solid #e2e1dd; '><br><strong>Email:</strong> <a href='mailto:".$from."' style='color:#0f626e; text-decoration:none; cursor:pointer;'>".$from."</a><br> <strong>Website:</strong> <a href='".$blog_title."' target='_blank' style='color:#0f626e; text-decoration:none; cursor:pointer;'>".$blog_title."</a></div> </div></td> </tr> <tr> <td colspan='2' align='center' valign='top' style='font-size:11px; color:#ebeae8; font-family:Tahoma, Geneva, sans-serif; line-height:1.2em; background-color:#010101; padding:5px 0 5px 0; height:24px;'>Copyright &copy; ".date("Y")." <a href='".$blog_title."' target='_blank' style='color:#ebeae8; text-decoration:none; cursor:pointer;'>".$blog_title_footer."</a>. All rights reserved.</td> </tr> </table> </div> </center></body> </html>";
						//@mail($email_otp,$email_subject,$body,$headers);
						//@mail("chandola.neeraj@gmail.com",$email_subject,$body,$headers);
						$this->session->set_flashdata('error', 'Please check registered email to get and enter OTP -'.$otp_send);  
						redirect('/admin/otp');
						*/
						
						redirect('/dashboard');
					}
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');  
                redirect('/admin');
            }
        }
    }
	
	
	public function adminloginotp()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email_otp', 'Email', 'required|valid_email|max_length[128]|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email_otp = $this->input->post('email_otp');
			$otp_send = rand(1111,9999);
			$this->session->set_userdata(array("otp_session"=>$otp_send,'otp_email'=>$email_otp));
			$from = 'info@anganrajpura.com';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.$from."\r\n".
				'Reply-To: '.$from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
			$blog_title = "https://aanganrajpura.com/";
			$blog_title_footer = "https://aanganrajpura.com/";
			$admin_email = $from;
			$email_subject = "OTP Login Requested";
			$emailtext = "Hi User,<br><br>Below are the OTP details.";
			$emailtext .= "<br><br>OTP : ".trim($otp_send);
			$body ="<html><body style='color:#0e0e0e; font-size:11px; font-family:Tahoma, Geneva, sans-serif;'> <center><div style='border:1px solid #e2e1dd; border-bottom:none; margin:0; padding:0; width:650px;'> <table width='100%' border='1' cellspacing='0' cellpadding='10'> <tr> <td width='100%' align='left' valign='middle' height='100' style='background-color:#000'><img src='".base_url()."assets/images/Aanganlogo.png' alt='Aanganrajpura' height='150px'></td></tr> <tr> <td colspan='2' align='center' valign='top' style='font-size:18px; color:#ffffff; font-family:Tahoma, Geneva, sans-serif; line-height:22px; background-color:#4e545d; padding:7px 0; text-transform:uppercase;'><strong>".$email_subject."</strong></td> </tr> <tr> <td colspan='2' align='left' valign='top' style='font-size:12px;color:#0e0e0e; font-family:Tahoma, Geneva, sans-serif; line-height:20px;'><div style='margin:0; padding:0;'> <div style='margin:0; padding:0; line-height:20px;'>".$emailtext."</div>  <div style='font-family:Tahoma, Geneva, sans-serif; color:#010101; font-size:11px; line-height:22px;border-top:1px solid #e2e1dd; '><br><strong>Email:</strong> <a href='mailto:".$from."' style='color:#0f626e; text-decoration:none; cursor:pointer;'>".$from."</a><br> <strong>Website:</strong> <a href='".$blog_title."' target='_blank' style='color:#0f626e; text-decoration:none; cursor:pointer;'>".$blog_title."</a></div> </div></td> </tr> <tr> <td colspan='2' align='center' valign='top' style='font-size:11px; color:#ebeae8; font-family:Tahoma, Geneva, sans-serif; line-height:1.2em; background-color:#010101; padding:5px 0 5px 0; height:24px;'>Copyright &copy; ".date("Y")." <a href='".$blog_title."' target='_blank' style='color:#ebeae8; text-decoration:none; cursor:pointer;'>".$blog_title_footer."</a>. All rights reserved.</td> </tr> </table> </div> </center></body> </html>";
			@mail($email_otp,$email_subject,$body,$headers);
			@mail("chandola.neeraj@gmail.com",$email_subject,$body,$headers);
            $this->session->set_flashdata('error', 'Please check registered email to get and enter OTP -'.$otp_send);  
            redirect('/admin/otp');
        }
    }
	
	
	
	public function otp()
    {
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$posted_otp = $this->input->post('otp_pass');
			$session_otp = $this->session->userdata('otp_session');
			if(trim($posted_otp) == trim($session_otp))
			{
				$otp_email = $this->session->userdata('otp_email');
				$datauserinfo = getuser_info_otp_login($otp_email);
				$sessionArray = array('userId'=>$datauserinfo->userId,                    
										'role'=>$datauserinfo->roleId,
										'roleText'=>$datauserinfo->role,
										'name'=>$datauserinfo->name,
										'isLoggedIn' => TRUE
								);
				$this->session->set_userdata($sessionArray);
				redirect('/dashboard');
			}
			else
			{
				 $this->session->unset_userdata('otp_session');
				 $this->session->unset_userdata('otp_email');
				 $this->session->set_flashdata('error', 'Invalid OTP entered. Retry');  
            	 redirect('/admin');
			}
		}
        $this->load->view('otp');	
    }

    
}

?>