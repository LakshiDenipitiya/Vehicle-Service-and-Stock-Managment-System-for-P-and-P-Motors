<?php

class Goodsreturnnotice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Goodsreturnnotice_Model");
        $this->load->model("Goodsreceivenotice_Model");
        $this->load->model("Supplierstock_Model");
        $this->load->model("Stock_Model");

        $this->isLoggedIn();
    }

    private function isLoggedIn() {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect("Login");
        }
    }

    // Load all vehicle data into view
    public function index() {
        //check if the user is logged in or not
        $this->isLoggedIn();

                  //load to grtv_list all data from the Goodsreturnnotice table
        $grtn_list = $this->Goodsreturnnotice_Model->GetAll();

    // //call for the function get_module_by_designation in Jobrequestservice_Model 
    //     foreach ($grtn_list as $key => $grtn) {
    //         $grtn->Goodesreceivenotice = $this->Supplierstock_Model->get_goodsreceivenotice_by_goodsreturnnotice($grtn->id);  //array('abc', 'asdjasl', 'aljshdas');
    //     }
        //get grtn_list as jobrequestList array
        $data = array(
            'goodsreturnList'=> $grtn_list);



        $this->layouts->view("Goodsreturnnotice/index", $data);
    }

    // clear Goods return notice form
    public function clear() {
        //redirect to Goods return notice page
        redirect("Goodsreturnnotice", 'refresh');
    }

    

    function Delete() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);
        $this->Goodsreturnnotice_Model->delete_by_id($userId);

        // Set success message as flash session
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Goods Return Notice deleted successfully!</h4></div>');

        //redirect to Goods return notice page
        redirect('Goodsreturnnotice', 'refresh');
    }

    public function create() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        if ($_POST) {
            $this->form_validation->set_rules('goodsreturnnoticeno', 'Goods Return Notice No', 'required');
            $this->form_validation->set_rules('createddate', 'Created Date', 'required');
            $this->form_validation->set_rules('goodsreceivenotice_id', 'Good Receive Notice', 'required');
            $this->form_validation->set_rules('supplier_name', 'Supplier name', 'required');
            // $this->form_validation->set_rules('supplier_id', 'Supplier id', 'required');
            $this->form_validation->set_rules('code', 'Code', 'required');
            $this->form_validation->set_rules('categoryofsparepart', 'Spare part', 'required');
            $this->form_validation->set_rules('buyingprice', 'Buying Price', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity','required');
            $this->form_validation->set_rules('return_quantity', 'Return Quantity','required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');

            if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
                $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    , '</div>');

            }else{

                $data = array(
                    'goodsreturnnoticeno' => $this->input->post('goodsreturnnoticeno'),
                    'code' =>  $this->input->post('code'),
                    'categoryofsparepart' =>  $this->input->post('categoryofsparepart'),
                    'quantity' =>  $this->input->post('return_quantity'),
                    'reasonforreturn' => '1', 
                    'goodsreceivenoticeno' => $this->input->post('goodsreceivenotice_id'), 
                    'buyingdate' =>  '',
                    'buyingprice' =>  '',
                    'solddate' =>  '',
                    'sellingprice' =>  '',
                    'returndate' =>  $this->input->post('createddate'),
                    'isclaim' =>  '1',
                    'discount' =>  '0'
                    );

                $return_notice_id = $this->Goodsreturnnotice_Model->add($data);

                // update stock quantity
                $stock_item = $this->Stock_Model->getByCode($this->input->post('code'));

                if ($stock_item == null) {

                }else{

                    $new_quantity = $stock_item->currentstocklevel - $this->input->post('return_quantity');
                    $this->Stock_Model->update_quantity($this->input->post('code'), $new_quantity);
                }

                redirect('Goodsreturnnotice');
            }
        }


        $goodsreceivenoticeDbList = $this->Goodsreceivenotice_Model->GetAll();
         $goodsreceivenoticeSelectOptions[""] = "Select a Goods Receive Notice No"; //to pass a empty value
         foreach ($goodsreceivenoticeDbList as $key => $value) {
           $goodsreceivenoticeSelectOptions[$value->id] = $value->goodsreceivenoticeno; //to load values from database
       }
//
       $data['goodsreceivenoticeList'] = $goodsreceivenoticeSelectOptions;

       $this->layouts->view("Goodsreturnnotice/create", $data);
   }

   
    public function updateIsclaim(){
        $val_request=$this->input->post('request');
        $val_event=$this->input->post('event');
        $data['isclaim']=$val_event;
        $result = $this->Goodsreturnnotice_Model->update_by_id($val_request,$data);

    }

}

?>
