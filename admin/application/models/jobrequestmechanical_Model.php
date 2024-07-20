<?php

class Jobrequestmechanical_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "jobrequestmechanical ";

    // Get all job request service
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create job request service
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get job request service by id 
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

        // Update job request service
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

        // Delete job request service
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }


    // Delete mechanicle type services by jobrequest id
    function delete_by_jobrquest_id($jobreq_id)
    {
        $this->db->where("jobrequest_id",$jobreq_id);
        $this->db->delete($this->table);
    }

    function get_mechanical_services_by_jobrequest($jobreq_id)
    {
        $this->db->select("mechanical.code,mechanical.type,mechanical.cost ,mechanical.id");
        $this->db->where("jobrequestmechanical.jobrequest_id",$jobreq_id);
        //$this->db->where("mechanical.status",'active');
        $this->db->from($this->table);
        $this->db->join("mechanical", "jobrequestmechanical.mechanical_id = mechanical.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

     // get services by job request id
    public function get_mechanicals_by_job_request_id($request_id)
    {

        $this->db->select('mechanical.id, mechanical.code, mechanical.type, mechanical.cost');
        $this->db->from($this->table);
        $this->db->join('mechanical', 'mechanical.id = jobrequestmechanical.mechanical_id');
        $this->db->where('jobrequestmechanical.jobrequest_id', $request_id);
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>