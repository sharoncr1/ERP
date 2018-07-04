<?php
class adminm extends CI_Model {


    // user table operations

    public function u_Login($userid){
      
        $query="select * from admin where userid='$userid'";
        $result=$this->db->query($query);
        $row=$result->row_array();
        return $row;
    }
    public function add_User($row){
        $this->db->insert('admin', $row);
    }
     public function getAllRows(){
            $this->load->database();
            $query="select * from user";
            $result=$this->db->query($query);
            $rows=$result->result_array();
            return $rows;
    }
    public function getAllEntriesCount(){
    	return $this->db->count_all_results('user');
    }

    public function getAllEntries($from, $limit){
		 $this->db->limit($limit, $from);
		 return $this->db->get('user')->result_array();
	}
	public function udelete($userid){
		$this->db->delete('user', array('userid' => $userid));
    }
    public function user_status_toggle($id,$status){
        $data = array('status' => $status);
        $this->db->where('userid', $id);
        $this->db->update('user', $data);
   }


   public function user_search($id){
    $query="select * from user where userid='$id'";
      $result=$this->db->query($query);
      $rows=$result->row_array();
      return $rows;
  
}   


    // product table operations


    public function additem($row){
         $this->db->insert('products', $row);
    }
     public function item_search($name){
        $this->db->from('products');
        $this->db->where('name', $name);
         $result = $this->db->get();
         $rows=$result->result_array();
         return $rows;
    }



   public function getAllProductRows(){           
            $result=$this->db->get('products');
            $rows=$result->result_array();
            return $rows;
    }
    public function getAllProductEntriesCount(){
        return $this->db->count_all_results('products');
    }

    public function getAllProductEntries($from, $limit){
         $this->db->limit($limit, $from);
         return $this->db->get('products')->result_array();
    }
    public function product_delete($id){
       $this->db->delete('products', array('item_code' => $id));  
       
    }

    public function user_search1($str,$from,$limit){
      if($str){
        $this->db->like('userid',$str);
        $this->db->or_like('name',$str);
        }
        $this->db->limit($limit, $from);
        $result=$this->db->get('user');
        $data=$result->result_array();    

        return $data;    
    }
    public function user_search_count($str){
        if($str){
        $this->db->like('userid',$str);
        $this->db->or_like('name',$str);
      }
        $this->db->from('user');
        return $this->db->count_all_results();
    }
    public function user_search_auto($term) 
    { 
        $this->db->select('userid as id,name as value'); 
        $this->db->like('name', $term); 
        $this->db->limit('10'); 
        return $this->db->get('user')->result_array(); 
    }
    
}