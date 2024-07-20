<?php

class Colour_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "colour";

    // Get all colours
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create colours
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
        // Get colours by id 
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

        // Update colours
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

        // Delete colours
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }
}
?>