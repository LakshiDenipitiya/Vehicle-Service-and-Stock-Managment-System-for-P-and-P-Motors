<?php

class Employeedesignation_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "employeedesignation";

    // Get all stackholder designation
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create stackholder designation
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get stackholder designation by id 
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

        // Update stackholder designation
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

        // Delete stackholder designation
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    // Delete employee designaiotns by employee id
    function delete_by_employee_id($emp_id)
    {
        $this->db->where("employee_id",$emp_id);
        $this->db->delete($this->table);
    }

    function get_designations_by_employee($emp_id)
    {
        $this->db->select("designation.designation, designation.id");
        $this->db->where("employeedesignation.employee_id",$emp_id);
        //$this->db->where("designation.status",'active');
        $this->db->from($this->table);
        $this->db->join("designation", "employeedesignation.designation_id = designation.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>