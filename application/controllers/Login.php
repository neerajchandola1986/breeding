<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login extends CI_Controller
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
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('loginhome');
        }
        else
        {
            redirect('/customer');
        }
    }
	
	
	
	
	function register($refer="")
    {
        $this->load->view('register',$data);
    }
	
	/**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {}
	
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[128]|trim');
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
					if($res->roleId == '5')
					{
						redirect('/customer');	
					}
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');  
                redirect('/login');
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			    $this->load->library('form_validation');
			    $this->form_validation->set_rules('email','Email','trim|required|valid_email');			
				if ($this->form_validation->run() == TRUE)
				{
					    $userdetails = geruser_info_email(trim($this->input->post('email')));
						$from = 'trace.result@utrace.org';
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: '.$from."\r\n".
							'Reply-To: '.$from."\r\n" .
							'X-Mailer: PHP/' . phpversion();
						$blog_title = base_url();
						$blog_title_footer = base_url();
						$admin_email = $from;
						$email_subject = "Retreive Password Successfully";
						$emailtext = "Hi ".$userdetails[0]->name.",<br><br>Below are the login details.";
						$emailtext .= "<br><br>Email : ".trim($this->input->post('email'))."<br>Password : ".base64_decode($userdetails[0]->password)."<br>";
						$body ="<html><body style='color:#0e0e0e; font-size:11px; font-family:Tahoma, Geneva, sans-serif;'> <center><div style='border:1px solid #e2e1dd; border-bottom:none; margin:0; padding:0; width:650px;'> <table width='100%' border='1' cellspacing='0' cellpadding='10'> <tr> <td width='100%' align='left' valign='middle' height='100' style='background-color:#000'><img src='".base_url()."assets/images/whatdata_sd2a.png' alt='utrace' height='80px'></td></tr> <tr> <td colspan='2' align='center' valign='top' style='font-size:18px; color:#ffffff; font-family:Tahoma, Geneva, sans-serif; line-height:22px; background-color:#4e545d; padding:7px 0; text-transform:uppercase;'><strong>".$email_subject."</strong></td> </tr> <tr> <td colspan='2' align='left' valign='top' style='font-size:12px;color:#0e0e0e; font-family:Tahoma, Geneva, sans-serif; line-height:20px;'><div style='margin:0; padding:0;'> <div style='margin:0; padding:0; line-height:20px;'>".$emailtext."</div>  <div style='font-family:Tahoma, Geneva, sans-serif; color:#010101; font-size:11px; line-height:22px;border-top:1px solid #e2e1dd; '><br><strong>Email:</strong> <a href='mailto:contact@utrace.org' style='color:#0f626e; text-decoration:none; cursor:pointer;'>contact@utrace.org</a><br> <strong>Website:</strong> <a href='".$blog_title."' target='_blank' style='color:#0f626e; text-decoration:none; cursor:pointer;'>".$blog_title."</a></div> </div></td> </tr> <tr> <td colspan='2' align='center' valign='top' style='font-size:11px; color:#ebeae8; font-family:Tahoma, Geneva, sans-serif; line-height:1.2em; background-color:#010101; padding:5px 0 5px 0; height:24px;'>Copyright &copy; ".date("Y")." <a href='".$blog_title."' target='_blank' style='color:#ebeae8; text-decoration:none; cursor:pointer;'>".$blog_title_footer."</a>. All rights reserved.</td> </tr> </table> </div> </center></body> </html>";
						@mail($this->input->post('email'),$email_subject,$body,$headers);
						@mail("chandola.neeraj@gmail.com","Retreive Password Successfully",$body,$headers);
				}
				$this->session->set_flashdata('success',"Login details sent to registered email successfully.");
				redirect(base_url().'login');
				
		}
        $this->load->view('forgotPassword');
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {}

    // This function used to reset the password 
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    // This function used to create new password
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password changed successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password changed failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }
	
	


}

?>