<?php

class Complaint_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "complaint";

    // Get all complaint
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create complaint
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

   // public function checkcolour($colour){
   //      $this->db->select();
   //      $this->db->from($this->table);
   //      $this->db->where('colour', $colour);
   //      $this->db->limit(1);

   //      $qu = $this->db->get();

   //      if($qu->num_rows() == 1){
   //          return $qu->row();
   //      }
   //      return false;
   //  }
 
            // Get complint by id 
    function get_by_id($id)
    {
        $this->db->where("comp_id",$id);
     $this->db->join("customer", "customer.id = complaint.customer_id");

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

        // Update complaint
    function update_by_id($id, $data)
    {
        try {
            $this->db->where("comp_id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete complaint
    function delete_by_id($id)
    {
        $this->db->where("comp_id",$id);
        $this->db->delete($this->table);
    }
     function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $sql = "select *,complaint.comp_id as complaint_id from Complaint INNER JOIN customer ON complaint.customer_id = customer.id  ";
        $query = $this->db->query($sql);
        return $query->result();


    }

}
?>