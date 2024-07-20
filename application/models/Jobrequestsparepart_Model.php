<?php

class Jobrequestsparepart_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "jobrequestsparepart";

    // Get all job request sparepart
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create job request sparepart
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get job request sparepart by id 
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

        // Update job request sparepart
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

        // Delete job request sparepart
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

   // Delete sparepart by jobrequest id
    function delete_by_jobrquest_id($jobreq_id)
    {
        $this->db->where("jobrequest_id",$jobreq_id);
        $this->db->delete($this->table);
    }

//get stock detils by id
    function get_sparepart_by_jobrequest($jobreq_id)
    {
        $this->db->select("sparepart.code,sparepart.categoryofsparepart,sparepart.sellingprice ,sparepart.id");
        $this->db->where("jobrequestsparepart.jobrequest_id",$jobreq_id);
        //$this->db->where("sparepart.status",'active');
        $this->db->from($this->table);
        $this->db->join("sparepart", "jobrequestsparepart.sparepart_id = sparepart.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

    // get spareparts by job request id
    public function get_spareparts_by_job_request_id($request_id)
    {

        $this->db->select('sparepart.id, sparepart.code, sparepart.categoryofsparepart,sparepart.sellingprice');
        $this->db->from($this->table);
        $this->db->join('sparepart', 'sparepart.id = jobrequestsparepart.sparepart_id');
        $this->db->where('jobrequestsparepart.jobrequest_id', $request_id);
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>