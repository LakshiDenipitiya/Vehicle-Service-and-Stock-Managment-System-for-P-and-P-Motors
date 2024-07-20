<?php

class Vehiclemodel_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "vehiclemodel";

    // Get all vehicle model
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create vehicle model
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get vehicle model by id 
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

        // Update vehicle model
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

        // Delete vehicle model
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $q=$this->db->select('vm.*,vt.typeofvehicle as vehicletype')
        ->from('vehiclemodel as vm')
        ->join('vehicletype as vt',"vm.vehicletype_id = vt.id")
        ->get();
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>