<?php

class Auth_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

//select values from user tables
    protected $table = "stakeholder";

//function to whether user exist or not
    public function checkUser($username, $password){
        //select all the records
        $this->db->select();
        //from user table
        $this->db->from($this->table);
        //where condition to compare user name and password 
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
       //limit record count for only one user
        $this->db->limit(1);
        //execute the query
        $qu = $this->db->get();
        //if count==1 return the user
        if($qu->num_rows() == 1){
            return $qu->row();
        }
        //return false if no user exists
        return false;
    }

}
?>