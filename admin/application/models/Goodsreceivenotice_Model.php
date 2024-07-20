<?php

class Goodsreceivenotice_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $table = "goodsreceivenotice";

    // Get all goods receive notice
    public function GetAll() {
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    public function GetAllWithDetails() {

        $this->db->select('goodsreceivenotice.*, supplier.companyname as companyname');
        $this->db->from($this->table);
        $this->db->join('supplier' , 'goodsreceivenotice.suppliername = supplier.id');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    // Create goods receive notice
    function add($data) {
        $this->db->insert($this->table, $data);
    }

    // Get goods receive notice by id 
    function get_by_id($id) {
        $this->db->where("id", $id);

        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return null;
    }


    // get by id with details
    function get_by_id_with_details($id)
    {
        $this->db->select('goodsreceivenotice.*, supplier.companyname as companyname, sparepart.categoryofsparepart as categoryofsparepart_name');
        $this->db->from($this->table);
        $this->db->join('supplier' , 'goodsreceivenotice.suppliername = supplier.id');
        $this->db->join('sparepart' , 'goodsreceivenotice.categoryofsparepart = sparepart.id', 'left');
        $this->db->where("goodsreceivenotice.id", $id);
        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return null;
    }

    // Update goods receive notice
    function update_by_id($id, $data) {
        try {
            $this->db->where("id", $id);
            $this->db->update($this->table, $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // Delete goods receive notice
    function delete_by_id($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->table);
    }

    function GetAllWithSupplier() {
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }



    public function get_note_detail($key_id) {
        // echo "KEY ".$key_id;
        $sql = "SELECT 
        g.*, s.companyname, sp.code, sp.categoryofsparepart
        FROM
        `goodsreceivenotice` g
        LEFT JOIN
        supplier s ON g.suppliername = s.id
        LEFT JOIN
        sparepart sp ON g.categoryofsparepart = sp.id
        WHERE
        g.`goodsreceivenoticeno` = '{$key_id}'";
        $res = $this->db->query($sql);
        return $res->result();
    }

//     public function get_item_codes() {
//         $q = $this->input->get('term');
//         $sql = "SELECT
//     `id`,
//     `code` AS label,
//     `code` AS value,
//     `categoryofsparepart`,
//     ROUND(`sellingprice`,2) as sellingprice
// FROM
//     `sparepart`
// WHERE
//     `status` = 1 and code like '$q%'
// ORDER BY CODE ASC
//     ";
//         $res = $this->db->query($sql);
//         return $res->result();
//     }

//     public function get_item_spare() {
//         $q = $this->input->get('term');
//         $sql = "SELECT
//     `id`,
//     `code`,
//     `code` AS value,
//     `categoryofsparepart`,
//     categoryofsparepart as label,
//     ROUND(`sellingprice`,2) as sellingprice
// FROM
//     `sparepart`
// WHERE
//     `status` = 1 and categoryofsparepart like '$q%'
// ORDER BY CODE ASC
//     ";

//         $res = $this->db->query($sql);
//         return $res->result();
//     }

//     public function get_machine_codes() {
//         $q = $this->input->get('term');
//         $sql = "SELECT
//     `id`,
//     `code`,
//     `type` AS value,
    
//     code as label,
//     ROUND(`cost`,2) as sellingprice
// FROM
//     `mechanical`
// WHERE
//     `status` = 1 and code like '$q%'
// ORDER BY CODE ASC
//     ";

//         $res = $this->db->query($sql);
//         return $res->result();
//     }

    public function post_grn($data) {
        $res = $this->db->insert_batch('goodsreceivenotice', $data);
        
    }

    // public function insert_stock($data) {
    //     $res = $this->db->insert_batch('stock', $data);

    // }

    public function get_invoice_list() {
//test
        $sql = "SELECT
        grn.id,
        grn.goodsreceivenoticeno,
        grn.goodsreceivenoticedate,
        grn.invoiceno,
        sp.companyname,
        grn.code,
        grn.totalprice,
        grn.discount,
        grn.netprice
        FROM
        goodsreceivenotice grn
        LEFT JOIN sparepart spr ON
        spr.id = grn.categoryofsparepart
        LEFT JOIN supplier sp ON
        sp.id = grn.suppliername
        WHERE
        grn.status = 1
        GROUP BY
        grn.invoiceno
        ";
        $res = $this->db->query($sql);
        return $res->result();
    }

//     public function get_vehicle_details() {

//         $q = $this->input->get('term');
//         $sql = "SELECT
//     cc.id AS cid,
//     vv.id AS vid,
//     vv.vehicleno as label,
//     CONCAT(
//         cc.title,
//         ' ',
//         cc.firstname,
//         ' ',
//         cc.lastname
//     ) AS cuname,
//     CONCAT(cc.no, ' ', cc.lane, ' ', cc.city) AS c_add,
//     cc.phoneno,
//     vcm.vehiclemodel,
//     co.colour
// FROM
//     customer cc
// INNER JOIN vehicle vv ON
//     vv.customer_id = cc.id
// INNER JOIN vehiclemodel vcm ON
//     vcm.id = vv.vehiclemodel_id
// INNER JOIN colour co ON
//     co.id = vv.colour_id
// INNER JOIN colour cl ON
//     cl.id = vv.colour_id
// WHERE
//     vv.vehicleno LIKE '%$q%' order by vv.vehicleno asc
//     ";
//         $res = $this->db->query($sql);
//         return $res->result();
//     }

//     public function get_employee() {

//         $q = $this->input->get('term');
//         $sql = "SELECT
//     CONCAT(em.firstname, ' ', em.lastname) AS label,
//     em.id
// FROM
//     employee em
// INNER JOIN employeedesignation ems ON
//     em.id = ems.employee_id
// INNER JOIN designation des ON
//     des.id = ems.designation_id
// WHERE
//     des.designation = 'Labour' AND em.leavestatus = 'work' AND em.firstname LIKE '%$q%'";
//         $res = $this->db->query($sql);
//         return $res->result();
//     }

    public function delete_note($key_id) {
        $data = array('status' => "0");
        $this->db->where("goodsreceivenoticeno", $key_id);
        $this->db->update($this->table, $data);
    }

}

?>