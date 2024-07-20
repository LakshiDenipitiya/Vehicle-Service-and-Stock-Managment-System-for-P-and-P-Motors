<?php

class Customer_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "customer";

    // Get all suppliers
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create customers
    function add($data)
    {
        $this->db->insert($this->table, $data);
        //return customer id
        return $this->db->insert_id();
    }


    public function create_user_account($insert_id,$data)
    {
        $firstname = $data['firstname'];
        $firstname = strtolower($firstname);
        $username = $firstname.$insert_id;

        //get username as a text into sha value
        $password = sha1($username);
        //substring sha value to 7 characters
        $password = substr($password, 0, 7);

        $login = array(
            'username' => $username,
            'password' => $password,
            );

        $this->db->where('id', $insert_id);
        ;
        if ($this->db->update('customer', array(
            'username' => $username,
            'password' => md5($password),
        ))) {
            return $login;
        } else {
            return false;
        }
        
    }

        // Get customers by id 
    function get_by_id($id)
    {
        $this->db->where("id",$id);

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

        // Update customers
    function update_by_id($id, $data)
    {
        try {
            $this->db->where("id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete customers
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }
}
?>