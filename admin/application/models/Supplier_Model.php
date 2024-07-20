<?php

class Supplier_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "supplier";

    // Get all suppliers
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create Suppliers
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get Suppliers by id 
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

        // Update Suppliers
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

        // Delete Supplier
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }
}
?>