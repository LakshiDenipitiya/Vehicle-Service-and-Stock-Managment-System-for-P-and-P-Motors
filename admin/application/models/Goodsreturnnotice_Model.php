<?php

class Goodsreturnnotice_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $table = "goodsreturnnotice";

    // Get all goods return notice


    public function GetAll() {


        $this->db->select('goodsreturnnotice.*');
        $this->db->from($this->table);
        // $this->db->join('goodsreceivenotice', 'goodsreceivenotice.id = goodsreturnnotice.goodsreturnnoticeno');
        // $this->db->join('supplier', 'goodsreceivenotice.suppliername = supplier.id');
        $q = $this->db->get();
        return $q->result();
    }

    // Create goods return notice
    function add($data) {
        $this->db->insert($this->table, $data);
    }

    // Get goods return notice
    function get_by_id($id) {
        $this->db->where("id", $id);

        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return null;
    }

    // Update Suppliers
    function update_by_id($id, $data) {
        try {
            $this->db->where("id", $id);
            $this->db->update($this->table, $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // Delete goods return notice
    function delete_by_id($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->table);
    }

 function getGoodrtnByClaim($claim_type){
        $this->db->where('isclaim', $claim_type);
        $q=$this->db->get($this->table);
        
        if($q->num_rows()>0)
        {
            return $q->result();
        }
        return array();

    }


}

?>

    <!--  function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $sql = "select *,goodsreturnnotice.id as grtn_id from Goodsreturnnotice INNER JOIN supplierstock ON supplierstock.goodsreturnnotice_id = goodsreturnnotice.id INNER JOIN customer ON customer.id = vehicle.customer_id
        INNER JOIN colour ON colour.id = vehicle.colour_id ";
        $query = $this->db->query($sql);
        return $query->result();


    } -->