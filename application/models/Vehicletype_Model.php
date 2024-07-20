<?php

class Vehicletype_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "vehicletype";

    // Get all vehicle type
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create vehicle type
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get vehicle type by id 
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

        // Update vehicle type
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

        // Delete vehicle type
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }
}
?>