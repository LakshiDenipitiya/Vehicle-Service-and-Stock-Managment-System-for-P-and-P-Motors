<?php

class Jobrequestservice_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "jobrequestservice";

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

    // Delete service type services by jobrequest id
    function delete_by_jobrquest_id($jobreq_id)
    {
        $this->db->where("jobrequest_id",$jobreq_id);
        $this->db->delete($this->table);
    }

    function get_servicetype_services_by_jobrequest($jobreq_id)
    {
        $this->db->select("service.code,service.type, service.cost ,service.id");
        $this->db->where("jobrequestservice.jobrequest_id",$jobreq_id);
        //$this->db->where("service.status",'active');
        $this->db->from("jobrequestservice");
        $this->db->join("service", "jobrequestservice.service_id = service.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }


    // gt services by job request id
    public function get_services_by_job_request_id($request_id)
    {

        $this->db->select('service.id, service.code, service.type, service.cost');
        $this->db->from($this->table);
        $this->db->join('service', 'service.id = jobrequestservice.service_id');
        $this->db->where('jobrequestservice.jobrequest_id', $request_id);
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>