<?php

class Sparepartsupplier_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "sparepartsupplier";

    // Get all spare part supplier
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create spare part supplier
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get spare part supplier by id 
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

        // Update spare part supplier
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

        // Delete spare part supplier
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }
}
?>