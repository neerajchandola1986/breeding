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
	
	
	function delete_staff($id)
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
	
	function delete_volunteer($id)
	{
		$this->db->where('v_id', $id);
    	$this->db->delete('volunteer');
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
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role, BaseTbl.password,BaseTbl.isDeleted');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
		$this->db->where('BaseTbl.roleId',3);
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") {
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%' OR cinfo.mac_id LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('BaseTbl.createdBy',$this->session->userdata('userId'));
        $query = $this->db->get();
        return count($query->result());
    }
	function staffListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role,BaseTbl.password,BaseTbl.isDeleted');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
		$this->db->where('BaseTbl.roleId',3);
		if(!empty($searchText['searchText']) && $searchText['searchText'] !="") {
			$likeCriteria = "(BaseTbl.name  LIKE '%".trim($searchText['searchText'])."%' OR BaseTbl.email  LIKE '%".trim($searchText['searchText'])."%' OR cinfo.mac_id LIKE '%".trim($searchText['searchText'])."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('BaseTbl.createdBy',$this->session->userdata('userId'));
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
	
}

  