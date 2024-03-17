<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Records extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		//$this->output->cache(CACHE_TIMEOUT);
        $this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    
	
	
	
	public function search()
    {
        	$this->global['pageTitle'] = 'CodeInsect : Dashboard'; 
		
			//if (count($_GET)>0)
        	{
				$this->load->model('user_model'); 
				$searchText = $this->input->post('searchText');
				$data['searchText'] = $searchText;	
				$this->load->library('pagination');	
				$config = array();
				$config["base_url"] = base_url() . "records/search";
				$config["total_rows"] = $this->user_model->recordsCount($_REQUEST);
				$config["per_page"] = 200;
				$config["uri_segment"] = 3;
				$config ['num_links'] = 5;
				$config ['full_tag_open'] = '<nav><ul class="pagination">';
				$config ['full_tag_close'] = '</ul></nav>';
				$config ['first_tag_open'] = '<li class="arrow">';
				$config ['first_link'] = 'First';
				$config ['first_tag_close'] = '</li>';
				$config ['prev_link'] = 'Previous';
				$config ['prev_tag_open'] = '<li class="arrow">';
				$config ['prev_tag_close'] = '</li>';
				$config ['next_link'] = 'Next';
				$config ['next_tag_open'] = '<li class="arrow">';
				$config ['next_tag_close'] = '</li>';
				$config ['cur_tag_open'] = '<li class="active"><a href="#">';
				$config ['cur_tag_close'] = '</a></li>';
				$config ['num_tag_open'] = '<li>';
				$config ['num_tag_close'] = '</li>';
				$config ['last_tag_open'] = '<li class="arrow">';
				$config ['last_link'] = 'Last';
				$config ['last_tag_close'] = '</li>';
				$config['suffix'] = '?'.http_build_query($_REQUEST, '', "&");
				$config['first_url'] = $config['base_url'].'?'.http_build_query($_REQUEST);
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['userRecords'] = $this->user_model->recordsListing($_REQUEST,$config["per_page"], $page);
				$data["links"] = $this->pagination->create_links();
				$data["total_rows"] = $config["total_rows"];
			}
        	$this->loadViews("search", $this->global, $data , NULL);
    }
	
	
	
	public function details($id="")
	{
		$data['id']	=	$id;
		$this->loadViews("details", $this->global, $data , NULL);
	}
	
	
	public function planslist()
    {
        	$searchText = array();
			$this->load->model('user_model');
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
			
			$this->load->library('pagination');
			//print_r($_REQUEST);
			$config = array();
			$config["base_url"] = base_url() . "records/planslist";
			$config["total_rows"] = $this->user_model->recordsplansCount($searchText);
			$config["per_page"] = 200;
			$config["uri_segment"] = 3;
			$config['suffix'] = '?'.http_build_query($_REQUEST, '', "&");
			$config['first_url'] = $config['base_url'].'?'.http_build_query($_REQUEST);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['userRecords'] = $this->user_model->recordsplansListing($searchText,$config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data["total_rows"] = $config["total_rows"];
        	$this->loadViews("planslist", $this->global, $data , NULL);
    }
	
	
	public function expenseslist()
    {
		if ($this->input->server('REQUEST_METHOD') === 'GET')
        {
			$data['startdate'] = $_REQUEST['search_startdate'];
			$data['enddate'] = $_REQUEST['search_enddate'];
			$data['result'] = $this->user_model->expenses_listingdata($_REQUEST);
		}
        $this->loadViews("expenseslist", $this->global, $data , NULL);
    }
	
	
	public function manageproject()
    {  	
		$this->load->model('user_model');
		$searchText = $this->input->post('searchText');
		$data['searchText'] = $searchText;
		$this->load->library('pagination');		
		$config = array();
		$config["base_url"] = base_url() . "records/manageproject";
		$config["total_rows"] = $this->user_model->recordsmanageprojectCount($_REQUEST);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
		$config['suffix'] = '?'.http_build_query($_REQUEST, '', "&");
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_REQUEST);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['userRecords'] = $this->user_model->recordsmanageprojectListing($_REQUEST,$config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["total_rows"] = $config["total_rows"];
		$this->loadViews("manageproject", $this->global, $data , NULL);
    }
	
	
	
	public function deleteplan($id)
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
		if($id>0)
		{
		$userlist = $this->user_model->delete_plan($id);
		}
		$this->session->set_flashdata('success',"Agency deleted successfully.");
		redirect(base_url().'records/planslist');
	}
	
	
	public function addplan()
	{
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$data_to_store = array(
					'name' => $this->input->post('name'),
					'status' => '0',
					'created_on' => date('Y-m-d H:i:s')
			);		
			$insertted_id = $this->user_model->insert_plan($data_to_store);
			$this->session->set_flashdata('success',"Agency added successfully.");
			redirect(base_url().'records/planslist');
				
		}
		$this->global['pageTitle'] = 'Add User';
		$this->loadViews("addplan", $this->global, $data , NULL);
	}
	
	public function editplan($id="")
	{
		$data['toedit_planid'] = $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
				$data_to_store = array(
					'name' => $this->input->post('name'),
					'status' => $this->input->post('status')
				);	
				$insertted_id = $this->user_model->update_plan($data_to_store,$id);
				$this->session->set_flashdata('success',"Agency edited successfully.");
				redirect(base_url().'records/planslist');
				
		}
		$this->global['pageTitle'] = 'Edit Category';
		$this->loadViews("editplan", $this->global, $data , NULL);
	}
	
	
	public function setting()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$sms_text = $this->input->post('sms_text');
			$message_sms = $this->input->post('message_sms');
			$email = $this->input->post('email');
			$data_to_update = array(
			'admin_email' => $email,
			'email_text' => $message_sms,
			'sms_text' => $sms_text
			);	
			$this->user_model->update_settings($data_to_update,1);
			$this->session->set_flashdata('success',"Setting added successfully.");
			redirect(base_url().'records/setting');
		}
		$this->global['pageTitle'] = 'Edit Setting';
		$this->loadViews("setting", $this->global, $data , NULL);
	}
	
	
	public function addproject()
	{
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$data_to_store = array(
					'agency' => $this->input->post('agency'),
					'district' => $this->input->post('district'),
					'chapter' => $this->input->post('chapter'),
					'date' => $this->input->post('date_added'),
					'nwmile' => $this->input->post('nwmile'),
					'wmile' => $this->input->post('wmile'),
					'disabled' => 1,
					'user_id' => $this->session->userdata('userId')
			);		
			$insertted_id = $this->user_model->insert_project($data_to_store);
			$this->session->set_flashdata('success',"Project added successfully.");
			redirect(base_url().'records/addvolunteer/'.$insertted_id);
				
		}
		$this->global['pageTitle'] = 'Add Project';
		$this->loadViews("addproject", $this->global, $data , NULL);
	}
	
	public function editproject($id="")
	{
		$data['toedit_id'] = $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
				$data_to_store = array(
					'agency' => $this->input->post('agency'),
					'district' => $this->input->post('district'),
					'chapter' => $this->input->post('chapter'),
					'date' => $this->input->post('date_added'),
					'nwmile' => $this->input->post('nwmile'),
					'wmile' => $this->input->post('wmile'),
					'disabled' => 1,
					'user_id' => $this->session->userdata('userId')
				);	
				$insertted_id = $this->user_model->update_project($data_to_store,$id);
				$this->session->set_flashdata('success',"Project edited successfully.");
				redirect(base_url().'records/editproject/'.$id);
				
		}
		$this->global['pageTitle'] = 'Edit Project';
		$this->loadViews("editproject", $this->global, $data , NULL);
	}
	
	public function delete_project($id)
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
		if($id>0)
		{
		$userlist = $this->user_model->delete_project($id);
		$this->session->set_flashdata('success', 'Project deleted successfully');
		}
		redirect(base_url().'records/manageproject');
	}
	
	
	public function addstaff()
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$fname = ucwords(strtolower($this->input->post('fname')));
			$lname = ucwords(strtolower($this->input->post('lname')));
			$email = $this->input->post('email');
			$password = rand(111111,999999);
			$roleId = 3;
			$mobile = $this->input->post('mobile'); 
			$ref = 1;              
			$userInfo = array('email'=>$email, 'password'=>base64_encode($password), 'roleId'=>$roleId, 'name'=> $fname, 'last_name'=>$lname ,'mobile'=>$mobile, 'createdBy'=>$this->session->userdata('userId'), 'createdDtm'=>date('Y-m-d H:i:s'));
			$result_id_inserted = $this->user_model->addNewUser($userInfo);
			############################################			
			$this->session->set_flashdata('success', 'New staff member created successfully');
			redirect(base_url().'records/staffListing');
		}
		$data['roles'] = $this->user_model->getUserRoles();
		$this->loadViews("addstaff", $this->global, $data, NULL);
		
		
	}
	
	
	function staffListing()
    {
        if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
        else
        {
            $this->load->model('user_model');     
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;	
			$this->load->library('pagination');
			$config = array();
			$config["base_url"] = base_url() . "/records/staffListing/";
			$config["total_rows"] = $this->user_model->staffListingCount($_REQUEST);
			$config["per_page"] = 20;
			$config["uri_segment"] = 3;
			$config ['num_links'] = 5;
			$config ['full_tag_open'] = '<nav><ul class="pagination">';
			$config ['full_tag_close'] = '</ul></nav>';
			$config ['first_tag_open'] = '<li class="arrow">';
			$config ['first_link'] = 'First';
			$config ['first_tag_close'] = '</li>';
			$config ['prev_link'] = 'Previous';
			$config ['prev_tag_open'] = '<li class="arrow">';
			$config ['prev_tag_close'] = '</li>';
			$config ['next_link'] = 'Next';
			$config ['next_tag_open'] = '<li class="arrow">';
			$config ['next_tag_close'] = '</li>';
			$config ['cur_tag_open'] = '<li class="active"><a href="#">';
			$config ['cur_tag_close'] = '</a></li>';
			$config ['num_tag_open'] = '<li>';
			$config ['num_tag_close'] = '</li>';
			$config ['last_tag_open'] = '<li class="arrow">';
			$config ['last_link'] = 'Last';
			$config ['last_tag_close'] = '</li>';
			###########################################################################
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['userRecords'] = $this->user_model->staffListing($_REQUEST,$config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$data["total_rows"] = $config["total_rows"];
            $this->loadViews("staffs", $this->global, $data, NULL);
        }
	}
	
	public function editstaff($id="")
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$fname = (($this->input->post('fname')));
			$lname = (($this->input->post('lname')));
			$mobile = $this->input->post('mobile'); 
			$user_status = $this->input->post('user_status');   
			$email = $this->input->post('email');    
			$userInfo = array(
				'name' => $fname,
				'last_name' => $lname,
				'mobile' => $mobile,
				'updatedBy'=>$this->session->userdata('userId'),
				'isDeleted'=>$user_status,
				'updatedDtm'=>date('Y-m-d H:i:s'),
				'email'=>$email
			);
			$result = $this->user_model->editUser($userInfo,$id);
			
			if(trim($this->input->post('password')) !="")
			{
				$this->user_model->editUser(array("password"=>base64_encode(trim($this->input->post('password')))),$id);
			}
			############################################			
			$this->session->set_flashdata('success', 'Staff updated successfully');
			redirect(base_url().'records/editstaff/'.$id);
		}
		$data['roles'] = $this->user_model->getUserRoles();
		$data['userdata'] = $this->user_model->getUserInfo($id);
		$this->loadViews("editstaff", $this->global, $data, NULL);
		
		
	}
	
	public function deletestaff($id)
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
		if($id>0)
		{
		$userlist = $this->user_model->delete_staff($id);
		}
		redirect(base_url().'records/staffListing');
	}
	
	
	
	
	public function managevolunteer()
    {  	
		$this->load->model('user_model');
		$searchText = $this->input->post('searchText');
		$data['searchText'] = $searchText;
		$this->load->library('pagination');		
		$config = array();
		$config["base_url"] = base_url() . "records/managevolunteer";
		$config["total_rows"] = $this->user_model->recordsvolunteerCount($searchText);
		$config["per_page"] = 100;
		$config["uri_segment"] = 3;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
		$config['suffix'] = '?'.http_build_query($_REQUEST, '', "&");
		$config['first_url'] = $config['base_url'].'?'.http_build_query($searchText);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['userRecords'] = $this->user_model->recordsvolunteerListing($searchText,$config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["total_rows"] = $config["total_rows"];
		$this->loadViews("managevolunteer", $this->global, $data , NULL);
    }
	
	
	public function delete_volunteer($id)
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
		if($id>0)
		{
		$userlist = $this->user_model->delete_volunteer($id);
		$this->session->set_flashdata('success', 'Volunteer deleted successfully');
		}
		redirect(base_url().'records/managevolunteer');
	}
	
	
	public function addvolunteer($pid="")
	{
		$data['pid'] = $pid;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$data_to_store = array();
			$datatypeform = $_POST['addmore'];
			unset($_POST['addmore']);
			foreach($_POST as $key=>$dataposted)
			{
				$data_to_store[$key] = addslashes($dataposted);
			}
			$data_to_store['created_by'] = $this->session->userdata('userId');	
			$insertted_id = $this->user_model->insert_volunteer($data_to_store);
			$this->session->set_flashdata('success',"Volunter added successfully.");
			if(trim($datatypeform) == "Finish")
			{
				redirect(base_url().'records/manageproject');
			}
			else
			{
				redirect(base_url().'records/addvolunteer/'.$pid);
			}
				
		}
		$this->global['pageTitle'] = 'Add Volunteer';
		$this->loadViews("addvolunteer", $this->global, $data , NULL);
	}
	
	public function editvolunteer($v_id="")
	{
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			
			$data_to_store = array();
			foreach($_POST as $key=>$dataposted)
			{
				$data_to_store[$key] = addslashes($dataposted);
			}
			$data_to_store['created_by'] = $this->session->userdata('userId');	
			$insertted_id = $this->user_model->update_volunteer($data_to_store,$v_id);
			$this->session->set_flashdata('success',"Volunter updated successfully.");
			redirect(base_url().'records/editvolunteer/'.$v_id);
				
		}
		$data['userdata'] = $this->user_model->getVolunteerInfo($v_id);
		$this->global['pageTitle'] = 'Edit Volunteer';
		$this->loadViews("editvolunteer", $this->global, $data , NULL);
	}
	
	
	public function viewproject($id="")
	{
		$data['toedit_id'] = $id;
		$this->global['pageTitle'] = 'Edit Project';
		$this->loadViews("viewproject", $this->global, $data , NULL);
	}
	
	
	function downloadtotalreport()
    {
        if(!$this->session->userdata('userId'))
		{
			redirect(base_url());
		}
        else
        {
            $export_data = $this->user_model->recordsmanageprojectdownload($_REQUEST);
			//print_r($export_data);
			$delimiter = ","; 
			$filename = "project_" . date('Y-m-d') . ".csv"; 
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 
			// Set column headers 
			$fields = array('Project ID', 'Agency', 'District', 'Chapter', 'Date', 'Non- wilderness Miles', 'Wilderness Miles', 'Created By','Trail work hrs.- Basic','Trail work hrs.- Skilled','Non-trail Work Hrs','Round trip travel time','Round trip travel miles','Power eqipment','Heavy equipment','Stock days','Donation amount','Male 15-18','Male 19-24','Male 25-35','Male 36-54','Male 55+','Female 15-18','Female 19-24','Female 25-35','Female 36-54','Female 55+','Hispanic','Disabled'); 
			fputcsv($f, $fields, $delimiter); 		
			// Output each row of the data, format line as csv and write to file pointer 
			foreach($export_data as $record){
			$getvoldata =  getvolunteer_info($record->id);
			if(!empty($getvoldata))
			{
				$tbas = 0;
				$tskl = 0;
				$ntwork=0;
				$trtime=0;
				$tmile=0;
				$peq=0;
				$heq=0;
				$stkdays=0;
				$donate=0;
				
				$m15=0;
				$m18=0;
				$m25=0;
				$m35=0;
				$m55=0;
				$f15=0;
				$f18=0;
				$f25=0;
				$f35=0;
				$f55=0;
				$disabled=0;
				$eth=0;
							
				foreach($getvoldata as $records)
				{
					if(trim($records->gage) == "m15")
					{
						$gagevalue = "Male 15-18";
						$m15 = $m15+1;
					}
					if(trim($records->gage) == "m18")
					{
						$gagevalue = "Male 19-24";
						$m18 = $m18+1;
					}
					else if(trim($records->gage) == "m25")
					{
						$gagevalue = "Male 25-35";
						$m25 = $m25+1;
					}
					else if(trim($records->gage) == "m35")
					{
						$gagevalue = "Male 36-54";
						$m35 = $m35+1;
					}
					else if(trim($records->gage) == "m55")
					{
						$gagevalue = "Male 55+";
						$m55 = $m55+1;
					}
					else if(trim($records->gage) == "f15")
					{
						$gagevalue = "Female 15-18";
						$f15 = $f15+1;
					}
					else if(trim($records->gage) == "f18")
					{
						$gagevalue = "Female 19-24";
						$f18 = $f18+1;
					}
					else if(trim($records->gage) == "f25")
					{
						$gagevalue = "Female 25-35";
						$f25 = $f25+1;
					}
					else if(trim($records->gage) == "f35")
					{
						$gagevalue = "Female 36-54";
						$f35 = $f35+1;
					}
					else if(trim($records->gage) == "f55")
					{
						$gagevalue = "Female 55+";
						$f55 = $f55+1;
					}
					
					if($records->eth == 1)
					{
						$eth = $eth+1;
					}
					if($records->disabled == 1)
					{
						$disabled = $disabled+1;
					}
					$tbas = $tbas+$records->tbas;
					$tskl = $tskl+$records->tskl;
					$ntwork = $ntwork+$records->ntwork;
					$trtime = $trtime+$records->trtime;
					$tmile = $tmile+$records->tmile;
					$peq=$peq+$records->peq;
					$heq=$heq+$records->heq;
					$stkdays=$stkdays+$records->stkdays;
					$donate=$donate+$records->donate;
				}
			}
			$lineData = array($record->id,$record->categoryname,$record->district,$record->chapter,$record->date,$record->nwmile, $record->wmile,$record->name." ".$record->last_name,$tbas,$tskl,$ntwork,$trtime,$tmile,$peq,$heq,$stkdays,$donate,$m15,$m18,$m25,$m35,$m55,$f15,$f18,$f25,$f35,$f55,$eth,$disabled); 
			//echo "<pre>";print_r($lineData);
			fputcsv($f, $lineData, $delimiter); 
			} 
			// Move back to beginning of file 
			fseek($f, 0); 
			// Set headers to download file rather than displayed 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			//output all remaining data on a file pointer 
			fpassthru($f); 
			exit();
        }
	}
	

}

?>