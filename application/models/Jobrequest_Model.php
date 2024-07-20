<?php

class Jobrequest_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "jobrequest";

    // Get all job request
    public function GetAll(){
        $this->db->select('jobrequest.id,jobrequest.app_date, employee.firstname, employee.lastname, vehicle.vehicleno,meterreading, jobrequest.status, vehicle_id');
        $this->db->join('employee', 'employee_id = employee.id');
       // $this->db->where('employee.leavestatus = "Work"') and ('employeedesignation_id = 5') and ('employee.dateofresigned = NULL');
        $this->db->join('vehicle','vehicle_id = vehicle.id');
        
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create job request
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get job request by id 
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

        // Update job request
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
            // Update employee
    function update_status($jobrequest_id, $status)
    {
        $data['jb_complete'] = $status;
        
        $this->db->where("id",$jobrequst_id);
        return $this->db->update($this->table,$data);

    }

        // Delete job request
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    function get_jobrequest_by_vehicle($vehicle_id)
    {
        $this->db->select("jobrequest.id,jobrequest.meterreading,jobrequest.createddate");
        
        $this->db->from($this->table);
        
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
     public function getservciestatus($userId){
        $this->db->select('jobrequest.id,jobrequest.app_date, vehicle.vehicleno,meterreading, jobrequest.status, vehicle_id,jobrequest.createddate,jobrequest.customer_id');
       // $this->db->join('employee', 'employee_id = employee.id');
       // $this->db->where('employee.leavestatus = "Work"') and ('employeedesignation_id = 5') and ('employee.dateofresigned = NULL');
        $this->db->where('jobrequest.customer_id',$userId);
        $this->db->join('vehicle','vehicle_id = vehicle.id');
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

    public function getservciehistory($userId){
        $this->db->select('jobrequest.id,jobrequest.app_date, vehicle.vehicleno,meterreading, jobrequest.status, vehicle_id,jobrequest.createddate,jobrequest.customer_id');
       // $this->db->join('employee', 'employee_id = employee.id');
       // $this->db->where('employee.leavestatus = "Work"') and ('employeedesignation_id = 5') and ('employee.dateofresigned = NULL');
        $this->db->where('jobrequest.customer_id',$userId);
          $this->db->where('jobrequest.status',3);
        $this->db->join('vehicle','vehicle_id = vehicle.id');
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>