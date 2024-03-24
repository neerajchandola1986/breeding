<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';
define('SMTP_SERVER', 'smtp.hostinger.com');
define('SMTP_USER', 'info@ittechsolution.in');
define('SMTP_PASSWD', 'Welcome!1');
define('SMTP_PORT', '465');
define('EMAIL_FROM', 'chandola.neeraj@gmail.com');

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
    public function forgot_password()
    {
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			    $this->load->library('form_validation');
			    $this->form_validation->set_rules('email','Email','trim|required|valid_email');			
				if ($this->form_validation->run() == TRUE)
				{
					    $userdetails = geruser_info_email(trim($this->input->post('email')));
					if(count($userdetails)==0)
					{
						$this->session->set_flashdata('error','Invalid Email Address');
						redirect("/login/forgot_password");
					}

					$email = trim($this->input->post('email'));
						
						
						$emailtext = "Hi ".$userdetails[0]->name.",<br><br>Below are the login details.";
						$emailtext .= "<br><br>Email : ".trim($this->input->post('email'))."<br>Password : ".base64_decode($userdetails[0]->password)."<br>";


						$subject = "Greg Broderick : Retreive Password";
		$message = '
                    <!DOCTYPE html>
                    <html>
                    <head>
                      <title></title>  
                    </head>
                    <body bgcolor="#A2A2A2">
                      <table cellpadding="0" cellpadding="0" width="100%" bgcolor="#a2a2a2">
                        <tr>
                          <td height="70"></td>
                        </tr>
                        <tr>
                          <td class="middle" align="center">
                              

                          <table cellspacing="0" cellpadding="0" width="700" bgcolor="#ffffff" style="border-radius:10px;overflow:hidden;">
                            <tr>
                              <td>

        			 
                                  <table cellpadding="0" cellspacing="0" width="700" bgcolor="#e6e6e6">
                                    <tr>
                                      <td colspan="5" height="20"></td>
                                    </tr>
                                    <tr>
                                      <td width="50"></td>
                                      <td width="200"></td>
                                      <td width="100" align="center">
                                        
										<img src="https://ittechsolution.in/breeding/assets/images/favicon.png" class="logo" width="100">
                                      </td>
                                      <td width="200" valign="top" align="right" style="font-family: Arial;font-size:25px;">
                                        
                                      </td>
                                      <td width="50"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="5" height="20"></td>
                                    </tr>
                                  </table>
					<!-- Email Header - End -->


                    <!-- Subject Line Banner - Start-->
                                  <table cellpadding="0" cellspacing="0" width="700" bgcolor="#1B3665"><!-- Dark Blue -->
                                    <tr><td height="30"></td></tr>
                                    <tr>
                                      <td width="700" align="center" style="font-family: Arial;font-size:20px;color:#ffffff;">
                                          '.$subject.'
                                      </td>              
                                    </tr>
                                    <tr><td height="18"></td></tr>
                                  </table>
								  <table cellpadding="0" cellspacing="0" width="700" bgcolor="#ffffff">
                                          <tr><td colspan="3" height="20"></td></tr>
                                          <tr>
                                            <td width="50"></td>
                                            <td width="600"> 
                                              
                                                                    
                                              <p style="font-family: Arial;font-size:15px;line-height:24px;">
                                               '.$emailtext.'
                                              </p>

                                              
                                            </td>
                                            <td width="50"></td>
                                          </tr>
                                          <tr><td colspan="3" height="10"></td></tr>
                                          <tr>
                                            <td width="50"></td>
                                            <td width="600">
                                        

                                            </td>              
                                            <td width="50"></td>
                                          </tr>

                                          <tr><td colspan="3" height="50"></td></tr>            
                                        </table>




                                     <!-- Email Footer Starts-->

									 <!--Grey Box -->
                                     <table cellpadding="0" cellspacing="0" width="700" bgcolor="grey">

									 <!--Thin Red line -->
                                      <tr><td height="4" bgcolor="#DC323C"></td></tr>
                                      <tr><td height="30"></td></tr>
                                      
                                     
                                     <!-- --> 
                                      <tr>
                                        <td height="6"></td><!--Grey Box Height--> 
                                      </tr>
                                      <tr>
                                        <td width="700" align="center" style="font-family: Arial;color:#000000;font-size:12px;">
                                           &#x00A9; 2024 Greg Broderick. All rights reserved.
                                        </td>
                                      </tr>
                                      <tr><td height="15"></td></tr>
                                    </table>


                              
                              </td>
                            </tr>
                          </table>




                          </td>
                        </tr>
                        <tr>
                          <td height="70"></td>
                        </tr>
                      </table>
                    </body>
                    </html>
                    ';	
					
					

					$mail= new PHPMailer();
					
					//$email = 'chitranshravi1@gmail.com';
					
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";  
					$mail->isSMTP();
					$mail->Host     = SMTP_SERVER;
					//$mail->SMTPDebug  = 2;  
					$mail->SMTPAuth = true;
					$mail->Username = SMTP_USER;
					$mail->Password = SMTP_PASSWD;
					$mail->SMTPSecure = 'ssl';
					$mail->Port     = SMTP_PORT;
					$mail->setFrom(SMTP_USER,"Greg Broderick");
					$mail->addAddress($email);	
					$mail->Subject = $subject;
					$mail->isHTML(true);
					$mail->CharSet="utf-8";
					$mail->Body = $message;
					$mail->send();

					//echo $message;

					///////////////// Send EMail End ////////////////
					$this->session->set_flashdata('success',"Login details sent to registered email successfully.");
					redirect(base_url());

				}
				
				
		}
        $this->load->view('forgot_password');
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