<?php

class Vehicle_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "vehicle";

    // Get all vehicle
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create vehicle
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get vehicle by id 
    function get_by_id($id)
    {
        $this->db->where("vehicle.id",$id);
        $this->db->join("vehiclemodel", "vehiclemodel.id = vehicle.vehiclemodel_id");

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

        // Update vehicle
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

        // Delete vehicle
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $sql = "select *,vehicle.id as vehicle_id from Vehicle INNER JOIN vehiclemodel ON vehicle.vehiclemodel_id = vehiclemodel.id INNER JOIN customer ON customer.id = vehicle.customer_id
        INNER JOIN colour ON colour.id = vehicle.colour_id ";
        $query = $this->db->query($sql);
        return $query->result();


    }



 /*$q=$this->db->select('v.*, cu.firstname as firstname, vmo.vehiclemodel as vehiclemodel, c.colour as colour')
            ->from('vehicle as v')
            ->join('customer as cu',"v.customer_id= cu.id",'vehiclemodel as vmo',"v.vehiclemodel_id = vmo.id",'colour as c',"v.colour_id= c.id")
            ->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();*/
    }
    ?>


