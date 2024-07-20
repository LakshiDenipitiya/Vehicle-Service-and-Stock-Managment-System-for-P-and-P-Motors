<?php

class Goodsreceivenotice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Goodsreceivenotice_Model");
        $this->load->model("Supplier_Model");
        $this->load->model("Supplierstock_Model");
        $this->load->model("Sparepart_Model");
        $this->load->model("Stock_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn() {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect("Login");
        }
    }
    // Load all Goods recieve notice data into view
    public function index() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data['grn_list'] = $this->Goodsreceivenotice_Model->GetAllWithDetails();
        $this->layouts->view("Goodsreceivenotice/index", $data);
    }
    // Load Goods recieve notice create page
    public function create() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        if ($_POST) {

            // set validations
            $this->form_validation->set_rules('goodsreceivenoticeno', 'Goods recieve notice No', 'trim|required');
            $this->form_validation->set_rules('goodsreceivenoticedate', 'Goods receive notice date', 'required');
            $this->form_validation->set_rules('invoiceno', 'Supplier invoice no', 'required');
            $this->form_validation->set_rules('supplier_id', 'Supplier', 'numeric|required');
            $this->form_validation->set_rules('sparepart_id', 'Sparepart', 'required');
            $this->form_validation->set_rules('categoryofsparepart', 'categoryofsparepart', 'required');
            $this->form_validation->set_rules('buyingprice', 'Unit Price', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('amount', 'Amonut', 'required');
            $this->form_validation->set_rules('totalprice', 'Total price', 'required');
           // $this->form_validation->set_rules('discount', 'Discount', 'required');
            $this->form_validation->set_rules('netprice', 'Net price', 'numeric|required');

            if ($this->form_validation->run() == FALSE) {
                // Is form Invalid
                $this->form_validation->set_error_delimiters('<div class="callout callout-danger">','</div>');
            }else{

                // save data in db
                $data = array(
                    'goodsreceivenoticeno' => $this->input->post('goodsreceivenoticeno'),
                    'goodsreceivenoticedate' => $this->input->post('goodsreceivenoticedate'),
                    'invoiceno' => $this->input->post('invoiceno'),
                    'suppliername' => $this->input->post('supplier_id'),
                    'code' => $this->input->post('sparepart_code'),
                    'buyingprice' => $this->input->post('buyingprice'),
                    'categoryofsparepart' => $this->input->post('categoryofsparepart'),
                    'quantity' => $this->input->post('quantity'),
                    'amonut' => $this->input->post('amount'),
                    'totalprice' => $this->input->post('totalprice'),
                    'discount' => $this->input->post('discount'),
                    'netprice' => $this->input->post('netprice'),
                    );

                // Save Data
                $newGrcvId = $this->Goodsreceivenotice_Model->add($data);

                // update stock quantity
                $stock_item = $this->Stock_Model->getByCode($this->input->post('sparepart_code'));

                if ($stock_item == null) {
                    // update_quantity
                    $stock_save_data = array(
                        'code' => $this->input->post('sparepart_code'),
                        'sparepart' => $this->input->post('categoryofsparepart'),
                        'currentstocklevel' => $this->input->post('quantity'),
                        'stock_minus' => '',
                        'lastgrnno' => $newGrcvId,
                        'lastgrnprice' => $this->input->post('buyingprice'),
                        'lastgrndate' => $this->input->post('goodsreceivenoticedate'),
                        'lastgrtno' => '',
                        'lastgrtdate' => '',
                        'sparepart_id' => $this->input->post('sparepart_id')
                        );

                    $this->Stock_Model->add($stock_save_data);

                }else{

                    $new_quantity = $stock_item->currentstocklevel + $this->input->post('quantity');

                    $this->Stock_Model->update_quantity($this->input->post('sparepart_code'), $new_quantity);
                }

                redirect('goodsreceivenotice');
            }
            
        }

        // get suppliers
        $supplierDbList = $this->Supplier_Model->GetAll();

        $supplierSelectOptions[""] = "Select a supplier"; //to pass a empty value
        foreach ($supplierDbList as $key => $value) {
            $supplierSelectOptions[$value->id] = $value->companyname; //to load values from database
        }

        //load data relevent list from defined dropdowns
        $data['supplierList'] = $supplierSelectOptions;

            //load all data from db
        $sparepartDbList = $this->Sparepart_Model->GetAll();
        $sparepart_list_dropdown[""]="Select a Spareparts";
        foreach ($sparepartDbList as $key => $value) {
            //to load values from database
            $sparepart_list_dropdown[$value->id] = $value->code;
        }

        $data['sparepart_list_dropdown'] = $sparepart_list_dropdown;

        $this->layouts->view("Goodsreceivenotice/create", $data);
    }

    // clear Goods recieve notice form
    public function clear() {
        //redirect to Goods recieve notice page
        redirect("Goodsreceivenotice", 'refresh');
    }








 // get by id (ajax)
   public function getById($id)
   {
    $receive_item = $this->Goodsreceivenotice_Model->get_by_id_with_details($id);

    echo json_encode($receive_item);
}


}

?>
