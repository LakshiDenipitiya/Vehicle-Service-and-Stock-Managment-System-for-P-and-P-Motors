<?php

class Vehicleservice_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "vehicleservice";

    // Get all vehicle serivces
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create vehicleservices
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get vehicleservices by id 
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

        // Update svehicleservices
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

        // Delete vehicleservices
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }


    function get_customer_by_jobrequest($jobreq_id)
    {
        $this->db->select('customer.id,customer.title,customer.firstname ,customer.lastname, customer.nicno, customer.no, customer.lane, customer.city, customer.email');
        
        //$this->db->where("mechanical.status",'active');
        $this->db->from('jobrequest');
        $this->db->join("customer", "customer.id=jobrequest.customer_id");
        $this->db->where("jobrequest.id",$jobreq_id);
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    }
}
?>