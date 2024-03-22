<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

	function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }
	
	function insert_plan($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_category', $userInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }

	function insert_reminder($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('reminders', $userInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }

	function insert_message($msg)
    {
        $this->db->trans_start();
        $this->db->insert('messages', $msg);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
    
	function insert_project($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('project', $userInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	
	function update_project($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('project',$params);
	}

	function insert_lead($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_leads', $userInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	function insert_lead_category($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('lead_to_category', $userInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	
	function update_lead($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('tbl_leads',$params);
	}

	function insert_domain($domainInfo)
    {
        $this->db->trans_start();
        $this->db->insert('domains', $domainInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	
	function update_domain($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('domains',$params);
	}

	function delete_domain($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('domains');
	}

	function insert_product($domainInfo)
    {
        $this->db->trans_start();
        $this->db->insert('products', $domainInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	
	function update_product($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('products',$params);
	}

	function delete_product($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('products');
	}

	function insert_invoice($domainInfo)
    {
        $this->db->trans_start();
        $this->db->insert('invoices', $domainInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }

	function insert_invoice_data($domainInfo)
    {
        $this->db->trans_start();
        $this->db->insert('product_to_invoice', $domainInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	
	function update_invoice($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('invoices',$params);
	}

	function delete_invoice($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('invoices');

		$this->db->where('invoice_id', $id);
    	$this->db->delete('product_to_invoice');

		$this->db->query("update tbl_leads set invoiced='0' where invoiced='".$id."'");

	}
	function delete_invoice_data($invoice_id)
	{	
		$this->db->where('invoice_id', $invoice_id);
    	$this->db->delete('product_to_invoice');
	}
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
	

	function update_plan($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('tbl_category',$params);
	}

	function update_reminder($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('reminders',$params);
	}
	
	
	function update_user($params = array(), $id = 0)
    {
		 $this->db->where('userId',$id);
   		 return $this->db->update('tbl_users',$params);
	}
	
	
	function update_expenses($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('tbl_expenses',$params);
	}
	
	
	function delete_plan($id="")
	{
		$this->db->delete('tbl_category', array('id' => $id)); 
	}

	function delete_reminder($id="")
	{
		$this->db->delete('reminders', array('id' => $id)); 
	}
	
	
	function delete_expenses($id="")
	{
		$this->db->delete('tbl_expenses', array('id' => $id)); 
	}


	function recordsplansCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
		if(!empty($searchText)) {
            $likeCriteria = "(title  LIKE '%".$searchText."%'
                            OR  details  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();     
        return count($query->result());
    }
    
    function recordsplansListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        if(!empty($searchText)) {
            $likeCriteria = "(title  LIKE '%".$searchText."%'
                            OR  details  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

	function reminderCount($searchText = '')
    {
		$user_id = $this->session->userdata('userId');
        $this->db->select('*');
        $this->db->from('reminders');
		if(!empty($searchText)) {
            $likeCriteria = "(reminder_date  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('user_id',$user_id);
        $query = $this->db->get();     
        return count($query->result());
    }
    
    function reminderListing($searchText = '', $page, $segment)
    {
		$user_id = $this->session->userdata('userId');
        $this->db->select('*');
        $this->db->from('reminders');
        if(!empty($searchText)) {
            $likeCriteria = "(reminder_date  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('user_id',$user_id);
		$this->db->order_by('reminder_date','DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function recordsplans_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query = $this->db->get();     
        return ($query->result());
    }
	
	
	
	
	function recordsmanageprojectCount($searchText = '')
    {
        $this->db->select('BaseTbl.*,Cat.name as categoryname');
        $this->db->from('project as BaseTbl');
		$this->db->join('tbl_category as Cat', 'Cat.id = BaseTbl.agency','left');
		$this->db->join('tbl_users as User', 'User.userId = BaseTbl.user_id','left');
		//$this->db->join('volunteer as Vol', 'Vol.p_id = BaseTbl.id','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.user_id',$this->session->userdata('userId'));
        }
		if(!empty($searchText['from_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] =="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d');
			$this->db->where('BaseTbl.date >=', $start_date);
			//$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] !="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.date >=', $start_date);
			$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] =="" && $searchText['to_date_search'] !="") {
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['project_id']) && $searchText['project_id'] !="") {
			$this->db->where('BaseTbl.id =', $searchText['project_id']);
		}
		if(!empty($searchText['agency_search']) && $searchText['agency_search'] !="") {
			$this->db->where('BaseTbl.agency =', $searchText['agency_search']);
		}
		if(!empty($searchText['chapter_search']) && $searchText['chapter_search'] !="") {
			$this->db->where('BaseTbl.chapter =', $searchText['chapter_search']);
		}
        $query = $this->db->get();     
        return count($query->result());
    }

	function recordsmanageleadCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_leads as BaseTbl');
		//$this->db->join('tbl_category as Cat', 'Cat.id = BaseTbl.category_id','left');
		//$this->db->join('tbl_users as User', 'User.userId = BaseTbl.user_id','left');
		//$this->db->join('volunteer as Vol', 'Vol.p_id = BaseTbl.id','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.user_id',$this->session->userdata('userId'));
        }
		if(!empty($searchText['from_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] =="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d');
			$this->db->where('BaseTbl.created_at >=', $start_date);
			//$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] !="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.created_at >=', $start_date);
			$this->db->where('BaseTbl.created_at <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] =="" && $searchText['to_date_search'] !="") {
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.created_at <=', $second_date);
		}
		if(!empty($searchText['project_id']) && $searchText['project_id'] !="") {
			$this->db->group_start();
			$this->db->where('BaseTbl.id =', $searchText['project_id']);
			$this->db->or_where('BaseTbl.customer_name =', $searchText['project_id']);
			$this->db->or_where('BaseTbl.customer_mobile =', $searchText['project_id']);
			$this->db->group_end();
		}
		if(!empty($searchText['category_id']) && $searchText['category_id'] !="") 
		{
			$getLeadId = getLead_by_category($searchText['category_id']);
			$lead_id[] = "0";
			if(count($getLeadId)>0)
			{
				foreach($getLeadId as $getLeadIdVal)
				{
					$lead_id[] = $getLeadIdVal['lead_id'];
				}
				
			}
			$this->db->where_in('BaseTbl.id', $lead_id);
		}
		if(!empty($searchText['pipeline']) && $searchText['pipeline'] !="") 
		{
			$getLeadId = getLead_by_Pipeline($searchText['pipeline']);
			$lead_id[] = "0";
			if(count($getLeadId)>0)
			{
				foreach($getLeadId as $getLeadIdVal)
				{
					$lead_id[] = $getLeadIdVal['lead_id'];
				}
				
			}
			$this->db->where_in('BaseTbl.id', $lead_id);
		}
		
        $query = $this->db->get();     
        return $query->result();
    }

	function recordsmanageleadListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_leads as BaseTbl');
		//$this->db->join('tbl_category as Cat', 'Cat.id = BaseTbl.category_id','left');
		//$this->db->join('tbl_users as User', 'User.userId = BaseTbl.user_id','left');
		//$this->db->join('volunteer as Vol', 'Vol.p_id = BaseTbl.id','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.user_id',$this->session->userdata('userId'));
        }
		if(!empty($searchText['from_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] =="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d');
			$this->db->where('BaseTbl.created_at >=', $start_date);
			//$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] !="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.created_at >=', $start_date);
			$this->db->where('BaseTbl.created_at <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] =="" && $searchText['to_date_search'] !="") {
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.created_at <=', $second_date);
		}
		if(!empty($searchText['project_id']) && $searchText['project_id'] !="") {
			$this->db->group_start();
			$this->db->where('BaseTbl.id =', $searchText['project_id']);
			$this->db->or_where('BaseTbl.customer_name =', $searchText['project_id']);
			$this->db->or_where('BaseTbl.customer_mobile =', $searchText['project_id']);
			$this->db->group_end();
		}
		if(!empty($searchText['category_id']) && $searchText['category_id'] !="") 
		{
			$getLeadId = getLead_by_category($searchText['category_id']);
			$lead_id[] = "0";
			if(count($getLeadId)>0)
			{
				foreach($getLeadId as $getLeadIdVal)
				{
					$lead_id[] = $getLeadIdVal['lead_id'];
				}
				
			}
			$this->db->where_in('BaseTbl.id', $lead_id);
		}
		if(!empty($searchText['pipeline']) && $searchText['pipeline'] !="") 
		{
			$getLeadId = getLead_by_Pipeline($searchText['pipeline']);
			$lead_id[] = "0";
			if(count($getLeadId)>0)
			{
				foreach($getLeadId as $getLeadIdVal)
				{
					$lead_id[] = $getLeadIdVal['lead_id'];
				}
				
			}
			$this->db->where_in('BaseTbl.id', $lead_id);
		}
		$this->db->order_by('BaseTbl.created_at','DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function recordsmanageprojectListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*,Cat.name as categoryname,User.name,User.last_name');
        $this->db->from('project as BaseTbl');
		$this->db->join('tbl_category as Cat', 'Cat.id = BaseTbl.agency','left');
		$this->db->join('tbl_users as User', 'User.userId = BaseTbl.user_id','left');
		//$this->db->join('volunteer as Vol', 'Vol.p_id = BaseTbl.id','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.user_id',$this->session->userdata('userId'));
        }
		if(!empty($searchText['from_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] =="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d');
			$this->db->where('BaseTbl.date >=', $start_date);
			//$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] !="" && $searchText['to_date_search'] !="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search']));
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.date >=', $start_date);
			$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search']) && $searchText['from_date_search'] =="" && $searchText['to_date_search'] !="") {
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search']));
			$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['project_id']) && $searchText['project_id'] !="") {
			$this->db->where('BaseTbl.id =', $searchText['project_id']);
		}
		if(!empty($searchText['agency_search']) && $searchText['agency_search'] !="") {
			$this->db->where('BaseTbl.agency =', $searchText['agency_search']);
		}
		if(!empty($searchText['chapter_search']) && $searchText['chapter_search'] !="") {
			$this->db->where('BaseTbl.chapter =', $searchText['chapter_search']);
		}
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

	function domainListingCount($searchText = '')
    {
        $this->db->select('id');
        $this->db->from('domains');       
		if($this->session->userdata('userId') > 1)
		{
			$this->db->where('user_id',$this->session->userdata('userId'));
		}	
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			$this->db->or_where('make LIKE','%'.$keywords.'%');
			$this->db->or_where('model LIKE','%'.$keywords.'%');
			$this->db->or_where('lic_plate LIKE','%'.$keywords.'%');
			$this->db->or_where('vin LIKE','%'.$keywords.'%');
			$this->db->or_where('color LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
        $query = $this->db->get();        
        return count($query->result());
    }
	
	
    function domainListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('domains');       
		if($this->session->userdata('userId') > 1)
		{
			$this->db->where('user_id',$this->session->userdata('userId'));
		}   
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			$this->db->or_where('make LIKE','%'.$keywords.'%');
			$this->db->or_where('model LIKE','%'.$keywords.'%');
			$this->db->or_where('lic_plate LIKE','%'.$keywords.'%');
			$this->db->or_where('vin LIKE','%'.$keywords.'%');
			$this->db->or_where('color LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
		$field = $this->uri->segment(3);
		$sortby = $this->uri->segment(4);
		if($field!='' && $field!='All')
		{
			if($sortby=='')
			{
				$sortby='ASC';
			}
			
			$this->db->order_by($field, $sortby);
		}

        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

	function searcheddomainListingCount($searchText = '')
    {
        $this->db->select('id');
        $this->db->from('searched_domain');       
		if($this->session->userdata('userId') > 1)
		{
			$this->db->where('user_id',$this->session->userdata('userId'));
		}   
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			$this->db->or_where('make LIKE','%'.$keywords.'%');
			$this->db->or_where('model LIKE','%'.$keywords.'%');
			$this->db->or_where('lic_plate LIKE','%'.$keywords.'%');
			$this->db->or_where('vin LIKE','%'.$keywords.'%');
			$this->db->or_where('color LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
		$field = $this->uri->segment(3);
		$sortby = $this->uri->segment(4);

		$this->db->group_by('searched_domain');

		/*if($field!='' && $field!='All')
		{
			if($sortby=='')
			{
				$sortby='ASC';
			}
			
			$this->db->order_by($field, $sortby);
		}
		else
		{
			$this->db->order_by('created_on', 'desc');
			$this->db->order_by('status', 'ASC');
		}*/
		$this->db->order_by('created_on', 'desc');
		$this->db->order_by('status', 'ASC');

        $this->db->limit($page, $segment);
        $query = $this->db->get();       
        return count($query->result());
    }
	
	
    function searcheddomainListing($searchText = '', $page, $segment)
    {
        $this->db->select('*, count(id) as search_count, MAX(status) as status');
        $this->db->from('searched_domain');       
		if($this->session->userdata('userId') > 1)
		{
			$this->db->where('user_id',$this->session->userdata('userId'));
		}   
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			$this->db->or_where('make LIKE','%'.$keywords.'%');
			$this->db->or_where('model LIKE','%'.$keywords.'%');
			$this->db->or_where('lic_plate LIKE','%'.$keywords.'%');
			$this->db->or_where('vin LIKE','%'.$keywords.'%');
			$this->db->or_where('color LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
		$field = $this->uri->segment(3);
		$sortby = $this->uri->segment(4);

		$this->db->group_by('searched_domain');

		/*if($field!='' && $field!='All')
		{
			if($sortby=='')
			{
				$sortby='ASC';
			}
			
			$this->db->order_by($field, $sortby);
		}
		else
		{
			$this->db->order_by('created_on', 'desc');
			$this->db->order_by('status', 'ASC');
		}*/

		$this->db->order_by('created_on', 'desc');
		$this->db->order_by('status', 'ASC');

        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function recordsvolunteerCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('volunteer as BaseTbl');
		$this->db->join('tbl_users as User', 'User.userId = BaseTbl.created_by','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.created_by',$this->session->userdata('userId'));
        }
        $query = $this->db->get();     
        return count($query->result());
    }
    
    function recordsvolunteerListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*,User.name,User.last_name');
        $this->db->from('volunteer as BaseTbl');
		$this->db->join('tbl_users as User', 'User.userId = BaseTbl.created_by','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.created_by',$this->session->userdata('userId'));
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

	function recordspatientCount($searchText = '', $start_date = '', $end_date = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('patients as BaseTbl');
		$this->db->join('tbl_users as User', 'User.userId = BaseTbl.created_by','left');
		if($this->session->userdata('role')> 1)
		{
         	//$this->db->where('BaseTbl.created_by',$this->session->userdata('userId'));
        }
		if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.first_name  LIKE '%".$searchText."%'
							OR  BaseTbl.last_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if(!empty($start_date) && empty($end_date)) 
		{
			$end_date = $start_date;
			$this->db->where('created>=',date('Y-m-d 00:00:01',strtotime($start_date)));
			$this->db->where('created<',date('Y-m-d 23:59:59',strtotime($end_date)));
		}
		if(empty($start_date) && !empty($end_date)) 
		{
			$start_date = $end_date;
			$this->db->where('created>=',date('Y-m-d 00:00:01',strtotime($start_date)));
			$this->db->where('created<',date('Y-m-d 23:59:59',strtotime($end_date)));
		}
		if(!empty($start_date) && !empty($end_date)) 
		{			
			$this->db->where('created>=',date('Y-m-d 00:00:01',strtotime($start_date)));
			$this->db->where('created<',date('Y-m-d 23:59:59',strtotime($end_date)));
		}
        $query = $this->db->get();     
        return count($query->result());
    }
    
    function recordspatientListing($searchText = '', $page, $segment, $start_date = '', $end_date = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('patients as BaseTbl');
		//$this->db->join('tbl_users as User', 'User.userId = BaseTbl.created_by','left');
		if($this->session->userdata('role')> 1)
		{
         	//$this->db->where('BaseTbl.created_by',$this->session->userdata('userId'));
        }
		if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.first_name  LIKE '%".$searchText."%'
							OR  BaseTbl.last_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if(!empty($start_date) && empty($end_date)) 
		{
			$end_date = $start_date;
			$this->db->where('created>=',date('Y-m-d 00:00:01',strtotime($start_date)));
			$this->db->where('created<',date('Y-m-d 23:59:59',strtotime($end_date)));
		}
		if(empty($start_date) && !empty($end_date)) 
		{
			$start_date = $end_date;
			$this->db->where('created>=',date('Y-m-d 00:00:01',strtotime($start_date)));
			$this->db->where('created<',date('Y-m-d 23:59:59',strtotime($end_date)));
		}
		if(!empty($start_date) && !empty($end_date)) 
		{			
			$this->db->where('created>=',date('Y-m-d 00:00:01',strtotime($start_date)));
			$this->db->where('created<',date('Y-m-d 23:59:59',strtotime($end_date)));
		}
		$this->db->order_by('created','DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

	function recordspatienthistoryCount($patient_id, $searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('patient_history as BaseTbl');		
		if($this->session->userdata('role')> 1)
		{
         	//$this->db->where('BaseTbl.staff_id',$this->session->userdata('userId'));
        }
		if($patient_id>0)
		{
			$this->db->where('BaseTbl.patient_id',$patient_id);
		}
        $query = $this->db->get();     
        return count($query->result());
    }
    
    function recordspatienthistoryListing($patient_id, $searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('patient_history as BaseTbl');
		
		if($this->session->userdata('role')== 3)
		{
         	//$this->db->where('BaseTbl.staff_id',$this->session->userdata('userId'));
        }
		if($patient_id>0)
		{
			$this->db->where('BaseTbl.patient_id',$patient_id);
		}
		
		$this->db->order_by('BaseTbl.created','DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

	function recordstaskCount($patient_id, $searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tickets as BaseTbl');		
		if($this->session->userdata('role')== 3)
		{
         	$this->db->where('BaseTbl.staff_id',$this->session->userdata('userId'));
        }
		if($patient_id>0)
		{
			$this->db->where('BaseTbl.patient_id',$patient_id);
		}
        $query = $this->db->get();     
        return count($query->result());
    }
    
    function recordstaskListing($patient_id, $searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tickets as BaseTbl');
		
		if($this->session->userdata('role')== 3)
		{
         	$this->db->where('BaseTbl.staff_id',$this->session->userdata('userId'));
        }
		if($patient_id>0)
		{
			$this->db->where('BaseTbl.patient_id',$patient_id);
		}
		
		$this->db->order_by('BaseTbl.created','DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	
	function delete_staff($id)
	{
		$this->db->where('userId', $id);
    	$this->db->delete('tbl_users');
	}

	function delete_user($id)
	{
		$this->db->where('userId', $id);
    	$this->db->delete('tbl_users');
	}
	
	
	function delete_project($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('project');
		$this->db->where('p_id', $id);
    	$this->db->delete('volunteer');
	}
	function delete_lead($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('tbl_leads');
	}
	
	function delete_volunteer($id)
	{
		$this->db->where('v_id', $id);
    	$this->db->delete('volunteer');
	}

	function delete_patient($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('patients');
	}

	function delete_patienthistory($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('patient_history');
	}
	function delete_task($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('tickets');
	}
	
	
	
	function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        $insert_id = $this->db->insert_id(); 
        $this->db->trans_complete();
        return $insert_id;
    }
	
	function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        return TRUE;
    }
	
	
	function staffListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
		$this->db->where('BaseTbl.roleId',3);
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") 
		{
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('BaseTbl.createdBy',$this->session->userdata('userId'));
        $query = $this->db->get();
        return count($query->result());
    }
	function staffListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
		$this->db->where('BaseTbl.roleId',3);
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") {
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('BaseTbl.createdBy',$this->session->userdata('userId'));
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

	function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_users as BaseTbl');
       // $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
		//$this->db->where('BaseTbl.roleId',2);
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") 
		{
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.last_name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }
		//$this->db->where('BaseTbl.createdBy',$this->session->userdata('userId'));
        $query = $this->db->get();
        return count($query->result());
    }
	function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_users as BaseTbl');
       // $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
		$this->db->where('BaseTbl.roleId',2);
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") {
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.last_name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }
		//$this->db->where('BaseTbl.createdBy',$this->session->userdata('userId'));
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

	function bookingListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_booking as BaseTbl');       
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") 
		{
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.last_name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }		
        $query = $this->db->get();
        return count($query->result());
    }
	function bookingListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_booking as BaseTbl');
       
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") {
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.last_name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }	
		$this->db->order_by('created_at', 'desc');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	function getUserInfo($userId)
    {
        $this->db->select('users.*');
        $this->db->from('tbl_users as users');
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        return $query->result();
    }

	function getTaskInfo($task_id)
    {
        $this->db->select('ticket.*');
        $this->db->from('tickets as ticket');
        $this->db->where('id', $task_id);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	function getVolunteerInfo($vId)
    {
        $this->db->select('vol.*');
        $this->db->from('volunteer as vol');
        $this->db->where('v_id', $vId);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	function insert_volunteer($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('volunteer', $userInfo);
        $insert_id = $this->db->insert_id(); 
        $this->db->trans_complete();
        return $insert_id;
    }
	
	function update_volunteer($params = array(), $v_id = 0)
    {
		 $this->db->where('v_id',$v_id);
   		 return $this->db->update('volunteer',$params);
	}
	
	function getPatientInfo($vId)
    {
        $this->db->select('vol.*');
        $this->db->from('patients as vol');
        $this->db->where('id', $vId);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	function insert_patient($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('patients', $userInfo);
        $insert_id = $this->db->insert_id(); 
        $this->db->trans_complete();
        return $insert_id;
    }
	
	function update_patient($params = array(), $v_id = 0)
    {
		 $this->db->where('id',$v_id);
   		 return $this->db->update('patients',$params);
	}

	function getPatientHistoryInfo($vId)
    {
        $this->db->select('vol.*');
        $this->db->from('patient_history as vol');
        $this->db->where('id', $vId);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	function insert_patienthistory($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('patient_history', $userInfo);
        $insert_id = $this->db->insert_id(); 
        $this->db->trans_complete();
        return $insert_id;
    }
	
	function update_patienthistory($params = array(), $v_id = 0)
    {
		 $this->db->where('id',$v_id);
   		 return $this->db->update('patient_history',$params);
	}

	function insert_task($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tickets', $userInfo);
        $insert_id = $this->db->insert_id(); 
        $this->db->trans_complete();
        return $insert_id;
    }
	
	function recordsmanageprojectdownload($searchText = '')
    {
        $this->db->select('BaseTbl.*,Cat.name as categoryname');
        $this->db->from('project as BaseTbl');
		$this->db->join('tbl_category as Cat', 'Cat.id = BaseTbl.agency','left');
		$this->db->join('tbl_users as User', 'User.userId = BaseTbl.user_id','left');
		//$this->db->join('volunteer as Vol', 'Vol.p_id = BaseTbl.id','left');
		if($this->session->userdata('role')> 1){
         	$this->db->where('BaseTbl.user_id',$this->session->userdata('userId'));
        }
		if(!empty($searchText['from_date_search_hidden']) && $searchText['from_date_search_hidden'] !="" && $searchText['to_date_search_hidden'] =="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search_hidden']));
			$second_date = date('Y-m-d');
			$this->db->where('BaseTbl.date >=', $start_date);
			//$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search_hidden']) && $searchText['from_date_search_hidden'] !="" && $searchText['to_date_search_hidden'] !="") {
			$start_date  = date('Y-m-d',strtotime($searchText['from_date_search_hidden']));
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search_hidden']));
			$this->db->where('BaseTbl.date >=', $start_date);
			$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['to_date_search_hidden']) && $searchText['from_date_search_hidden'] =="" && $searchText['to_date_search_hidden'] !="") {
			$second_date = date('Y-m-d',strtotime($searchText['to_date_search_hidden']));
			$this->db->where('BaseTbl.date <=', $second_date);
		}
		if(!empty($searchText['project_id_hidden']) && $searchText['project_id_hidden'] !="") {
			$this->db->where('BaseTbl.id =', $searchText['project_id_hidden']);
		}
		if(!empty($searchText['agency_search_hidden']) && $searchText['agency_search_hidden'] !="") {
			$this->db->where('BaseTbl.agency =', $searchText['agency_search_hidden']);
		}
		if(!empty($searchText['chapter_search_hidden']) && $searchText['chapter_search_hidden'] !="") {
			$this->db->where('BaseTbl.chapter =', $searchText['chapter_search_hidden']);
		}
        $query = $this->db->get();     
        return ($query->result());
    }


	//////////////// Blog /////////////
	function blogListingCount($searchText = '')
    {
        $this->db->select('id');
        $this->db->from('blogs');       
		if($this->session->userdata('userId') > 1)
		{
			$this->db->where('user_id',$this->session->userdata('userId'));
		}	
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			$this->db->or_where('make LIKE','%'.$keywords.'%');
			$this->db->or_where('model LIKE','%'.$keywords.'%');
			$this->db->or_where('lic_plate LIKE','%'.$keywords.'%');
			$this->db->or_where('vin LIKE','%'.$keywords.'%');
			$this->db->or_where('color LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
        $query = $this->db->get();        
        return count($query->result());
    }
	
	
    function blogListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('blogs');       
		if($this->session->userdata('userId') > 1)
		{
			$this->db->where('user_id',$this->session->userdata('userId'));
		}   
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			$this->db->or_where('make LIKE','%'.$keywords.'%');
			$this->db->or_where('model LIKE','%'.$keywords.'%');
			$this->db->or_where('lic_plate LIKE','%'.$keywords.'%');
			$this->db->or_where('vin LIKE','%'.$keywords.'%');
			$this->db->or_where('color LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
		$this->db->order_by('created_at', 'desc');

        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

	function insert_blog($blogInfo)
    {
        $this->db->trans_start();
        $this->db->insert('blogs', $blogInfo);      
        $insert_id = $this->db->insert_id();     
        $this->db->trans_complete();     
        return $insert_id;
    }
	
	function update_blog($params = array(), $id = 0)
    {
		 $this->db->where('id',$id);
   		 return $this->db->update('blogs',$params);
	}

	function delete_blog($id)
	{
		$this->db->where('id', $id);
    	$this->db->delete('blogs');
	}
	///////////////////////////////////


	function productListingCount($searchText = '')
    {
        $this->db->select('id');
        $this->db->from('products');       
			
		
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();			
			$this->db->or_where('name LIKE','%'.$keywords.'%');			
			$this->db->group_end();
			
		}
		
		//$this->db->group_by('PartNo');
        $query = $this->db->get();        
        return count($query->result());
    }
	
	
    function productListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('products');       
		
		
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();			
			$this->db->or_where('name LIKE','%'.$keywords.'%');			
			$this->db->group_end();
			
		}
		
		//$this->db->group_by('PartNo');
		$this->db->order_by('created', 'DESC');
		/*$field = $this->uri->segment(3);
		$sortby = $this->uri->segment(4);
		if($field!='' && $field!='All')
		{
			if($sortby=='')
			{
				$sortby='ASC';
			}
			
			$this->db->order_by($field, $sortby);
		}*/
		if($segment>1)
		{
			$segment = ($segment-1)*50;
		}
		else
		{
			$segment = 0;
		}
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();  
				
		if($_GET['keywords']!='' && count($result)==1)
		{
			//$stock_id = $result[0]->id;
			//redirect(base_url().'records/editproduct/'.$stock_id);
			
		}
        return $result;
    }

	function invoiceListingCount($searchText = '')
    {
        $this->db->select('id');
        $this->db->from('invoices');       
		if($this->session->userdata('userId') > 1)
		{
			//$this->db->where('user_id',$this->session->userdata('userId'));
		}	
		//$this->db->where('invoice_status','1');	
		if($searchText!='')
		{
			$keywords = $searchText;
			$this->db->group_start();
			$this->db->where('id LIKE','%'.$keywords.'%');
			$this->db->or_where('customer_name LIKE','%'.$keywords.'%');
			$this->db->or_where('invoice_number LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
		if($_POST['start_date']!='')
		{
			$start_date = $_POST['start_date'];
			$exp_start_date = explode('/',$start_date);
			$start_date = $exp_start_date[2].'-'.$exp_start_date[0].'-'.$exp_start_date[1];
			$this->db->group_start();
			$this->db->where('created>=',$start_date);			
			$this->db->group_end();
			
		}
		if($_POST['end_date']!='')
		{
			$end_date = $_POST['end_date'];
			$exp_end_date = explode('/',$end_date);
			$end_date = $exp_end_date[2].'-'.$exp_end_date[0].'-'.$exp_end_date[1];
			$this->db->group_start();
			$this->db->where('created<=',$end_date);			
			$this->db->group_end();
			
		}		
        $query = $this->db->get();        
        return count($query->result());
    }
	
	
    function invoiceListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('invoices');       
		if($this->session->userdata('userId') > 1)
		{
			//$this->db->where('user_id',$this->session->userdata('userId'));
		}   
		if($searchText!='')
		{
			$keywords = $searchText;
			$this->db->group_start();
			$this->db->where('id LIKE','%'.$keywords.'%');
			$this->db->or_where('customer_name LIKE','%'.$keywords.'%');
			$this->db->or_where('invoice_number LIKE','%'.$keywords.'%');
			$this->db->group_end();
			
		}
		if($_POST['start_date']!='')
		{
			$start_date = $_POST['start_date'];
			$exp_start_date = explode('/',$start_date);
			$start_date = $exp_start_date[2].'-'.$exp_start_date[0].'-'.$exp_start_date[1];
			$this->db->group_start();
			$this->db->where('created>=',$start_date);			
			$this->db->group_end();
			
		}
		if($_POST['end_date']!='')
		{
			$end_date = $_POST['end_date'];
			$exp_end_date = explode('/',$end_date);
			$end_date = $exp_end_date[2].'-'.$exp_end_date[0].'-'.$exp_end_date[1];
			$this->db->group_start();
			$this->db->where('created<=',$end_date);			
			$this->db->group_end();
			
		}	
		//$this->db->where('invoice_status','1');		
		$field = $this->uri->segment(3);
		$sortby = $this->uri->segment(4);
		if($field!='' && $field!='All')
		{
			if($sortby=='')
			{
				$sortby='ASC';
			}
			
			$this->db->order_by($field, $sortby);
		}
		else
		{
			$this->db->order_by('created', 'DESC');
		}

        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

	function invoiceListingCountSupplier($searchText = '')
    {
        $query = $this->db->query("select * from po_to_supplier where supplier_id='".$this->session->userdata('userId')."' and invoiced='1' order by created DESC");          
        return count($query->result());
    }
	
	
    function invoiceListingSupplier($searchText = '', $page, $segment)
    {
        $query = $this->db->query("select * from po_to_supplier where supplier_id='".$this->session->userdata('userId')."' and invoiced='1' order by created DESC LIMIT $segment,$page");        
        $result = $query->result();        
        return $result;
    }

	

	function leadListingCount_manager($searchText = '')
    {
        $this->db->select('id');
        $this->db->from('lead_to_manager');       
		if($this->session->userdata('userId') > 1 && $this->session->userdata ( 'role' )=='2')
		{
			$this->db->where('manager_id',$this->session->userdata('userId'));
		}	
		else
		{
			$this->db->where('completed',1);
		}
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');
			
			$this->db->group_end();
			
		}
		$this->db->order_by('created','DESC');
        $query = $this->db->get();        
        return count($query->result());
    }
	
	
    function leadListing_manager($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('lead_to_manager');       
		if($this->session->userdata('userId') > 1 && $this->session->userdata ( 'role' )=='2')
		{
			$this->db->where('manager_id',$this->session->userdata('userId'));
		}
		else
		{
			$this->db->where('completed',1);
		}
		if($_GET['keywords']!='')
		{
			$keywords = $_GET['keywords'];
			$this->db->group_start();
			$this->db->or_where('year LIKE','%'.$keywords.'%');			
			$this->db->group_end();
			
		}

		$this->db->order_by('created','DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

	

	function getAutosuggest($postData)
	{

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');	   
       $this->db->where("TagNo like '".$postData['search']."%' ");
       $records = $this->db->get('products')->result();
       foreach($records as $row ){
          $response[] = array("value"=>$row->id,"label"=>$row->TagNo);
       }
     }
     return $response;
    }

	
	
}

  