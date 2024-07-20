<?php

class Stock_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "stock";

    // Get all stock
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create stock
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update quantity
    public function update_quantity($code, $quantity)
    {
        $data = array(
                'currentstocklevel' => $quantity
                );

        // $this->db->

        $this->db->where("code",$code);
        $this->db->update($this->table,$data);
    }

        // Get stock by id 
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

        // Update stock
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

        // Delete stock
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $sql = "select *,stock.id as stock_id from Stock INNER JOIN sparepart ON stock.sparepart_id = sparepart.id ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    // get by code
    public function getByCode($code)
    {
        $this->db->where("code",$code);

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    }
}
?>