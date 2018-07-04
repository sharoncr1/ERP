<?php
class DB_model extends CI_Model {
    public function u_Login($userid){
        $query="select * from user where userid='$userid'";
        $result=$this->db->query($query);
        return $result->row_array();
    }
    public function add_User($row){
        $this->db->insert('user', $row);
    }
    public function getAllProducts(){
        $result=$this->db->get('products');
        return $result->result_array();
    }
    public function product_search_auto($term) 
    { 
        $this->db->select('name as value'); 
        $this->db->like('name', $term); 
        $this->db->limit('10'); 
        return $this->db->get('products')->result_array(); 
    }


    public function product_search1($str,$from,$limit){
      if($str){
        $this->db->like('name',$str);
        }
        $this->db->limit($limit, $from);
        $result=$this->db->get('products');
        $data=$result->result_array();    

        return $data;    
    }
    public function product_search_count($str){
        if($str){
        $this->db->like('name',$str);
        }
        $this->db->from('products');
        return $this->db->count_all_results();
    }
    public function add_to_cart($row){
        $this->db->where($row);
        if(!empty($this->db->get('cart')->row_array())){
            return "This product already exists in your cart";
        }
        else{
            $this->db->insert('cart', $row);
            return "Product added to your cart";
        }
    }
    public function cart_items($l_userid){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('cart', 'products.item_code = cart.item_code');
        $query = $this->db->get();
        return $query->result_array();  
    }
    public function remove_from_cart($row){
        $this->db->delete('cart', $row);
    }

}