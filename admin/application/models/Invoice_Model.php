<?php

class Invoice_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $table = "invoice";

    // Get all invoice
    public function GetAll() {
        $sql = "SELECT
    iv.invoiceno,
    iv.id,
    jb.vehicle_id,
    iv.createddate,
    CONCAT(cc.firstname, cc.lastname) AS cname,
    vc.vehicleno,
    iv.totalcost,
    iv.discount,
    iv.otherpayments
FROM
    invoice iv
INNER JOIN jobrequest jb ON
    jb.id = iv.jobrequest_id
INNER JOIN vehicle vc ON
    vc.id = jb.vehicle_id
INNER JOIN customer cc ON
    cc.id = iv.cus_id";
         $res = $this->db->query($sql);
         
        return $res->result();
        
    }

    // Create invoice
    function add($data) {
        $this->db->insert($this->table, $data);
    }

    // Get invoice by id 
    function get_by_id($id) {
        $this->db->select('customer.*, invoice.*, vehicle.*,jobrequest.*, jobrequestsparepart.*, sparepart.*');
        
        //$this->db->where("mechanical.status",'active');
        $this->db->from($this->table);
        $this->db->join("customer", "customer.id=invoice.cus_id");
        $this->db->join("vehicle", "vehicle.customer_id=customer.id");
        $this->db->join("jobrequest", "vehicle.id=jobrequest.vehicle_id");
        $this->db->join("jobrequestsparepart", "jobrequest.id=jobrequestsparepart.jobrequest_id");
        $this->db->join("sparepart", "jobrequestsparepart.sparepart_id=sparepart.id");
        $q = $this->db->get();
        
        

        //$q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return null;
    }

    // Update invoice
    function update_by_id($id, $data) {
        try {
            $this->db->where("id", $id);
            $this->db->update($this->table, $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // Delete invoice
    function delete_by_id($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->table);
    }

    public function autoCustomer() {
        $q = $this->input->get('term');
        $sql = "SELECT
    c.`id`,
    CONCAT(c.`firstname`, ' ', c.`lastname`) AS label,
    CONCAT(c.`firstname`, ' ', c.`lastname`) AS
VALUE
    ,
    COALESCE(v.vehicleno, '-') AS vehicleno
FROM
    `customer` c
LEFT JOIN `vehicle` v ON
    c.`id` = v.customer_id
WHERE
    c.`firstname` LIKE '$q%'";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    public function save_invoice_data($data){
         $this->db->insert("invoice", $data);
    }

}

?>