<?php

class Invoicesparepart extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Invoice_Model"); //load invoice model
         $this->load->model("Jobrequest_Model"); //load jobrequs model
        $this->isLoggedIn();
    }

    private function isLoggedIn() {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect("Login");
        }
    }

// Load all invoice data into view
    public function index() {
        //check if the user is logged in or not
        $this->isLoggedIn();

//get all data from db
        $data = array(
            'invoiceList' => $this->Invoice_Model->GetAll());

        $this->layouts->view("Invoicesparepart/index", $data);
    }

// Load Invoice create page
    public function create() {
        //check if the user is logged in or not
        $this->isLoggedIn();

//load create view
        $this->layouts->view("Invoicesparepart/create");
    }

// Save Invoice form data into DB
    public function save() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //set validation rules
        $this->form_validation->set_rules('invoiceno', 'Invoice No', 'required');
       // $this->form_validation->set_rules('customername', 'Customer Name');
       /* $this->form_validation->set_rules('sparepart', 'Spare part details', 'numeric');*/
       // $this->form_validation->set_rules('taxes', 'Taxes', 'numeric');
       // $this->form_validation->set_rules('otherpayments', 'Other Payments', 'numeric');
        $this->form_validation->set_rules('totalcost', 'Total Cost', 'numeric');

        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    , '</div>');

            // Load view
            $this->layouts->view("Invoicesparepart/create");
            return;
        } else {

            // Is form Valid     
            //get data from input   
            $data = array(
                'invoiceno' => $this->input->post('invoiceno'),
                'customername' => $this->input->post('customername'),
                /*'sparepart_id' => $this->input->post('sparepart_id'),*/
                'discount' => $this->input->post('discount'),
                'taxes' => $this->input->post('taxes'),
                'otherpayments' => $this->input->post('otherpayments'),
                'totalcost' => $this->input->post('totalcost'),
            );

            // Save Data
            $this->Invoice_Model->add($data);
            // Set success message as flash session
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Invoice created successfully!</h4></div>');
            //redirect to invoice page
            redirect("Invoicesparepart", 'refresh');
        }
    }

// clear invoice form
    public function clear() {
//redirect to invoice page
        redirect("Invoicesparepart", 'refresh');
    }

    public function edit() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //get user id from url segment 3
        $userId = $this->uri->segment(3);


        if ($userId != null) {
            //if id not null get by id
            $user = $this->Invoice_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Invoicesparepart/edit", $data);
        }
    }

    function update() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //get id from url segment 3
        $userId = $this->uri->segment(3);

// set validation rules
        $this->form_validation->set_rules('invoiceno', 'Invoice No', 'required');
        $this->form_validation->set_rules('totalcost', 'Total Cost', 'numeric|required');
        $this->form_validation->set_rules('discount', 'Discount', 'numeric');


        if ($this->form_validation->run() == FALSE) {
// Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    , '</div>');
// Load view
            $user = $this->Invoice_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Invoice/edit", $data);
            return;
        } else {
//is form valid
            $userData = array(
                'invoiceno' => $this->input->post('invoiceno'),
                'totalcost' => $this->input->post('totalcost'),
                'discount' => $this->input->post('discount'),
            );


            $this->Invoice_Model->update_by_id($userId, $userData);
        }


// Set success message as flash session
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Invoice Updated successfully!</h4></div>');

//redirect to invoice page
        redirect('Invoice', 'refresh');
    }

    public function view() {
        //to check is user logged
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {

            $user = $this->Jobrequset_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Invoice/view", $data);
        }
    }

    function Delete() {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);
        $this->Invoice_Model->delete_by_id($userId);

// Set success message as flash session
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Colour deleted successfully!</h4></div>');

//redirect to invoice page
        redirect('Invoice', 'refresh');
    }

    public function autoCustomer() {
        $result = $this->Invoice_Model->autoCustomer();
        echo json_encode($result);
    }

    public function save_invoice_data() {
        $this->isLoggedIn();
        $date = date('Y-m-d H:i:s');
        $ar_data = array();
        $ar_data = array(
            'nextmeter' => $this->input->post('a9'),
            'invoiceno' => $this->input->post('a11'),
            'createddate' => $date,
            'modifieddate' => $date,
           'totalcost' => $this->input->post('netprice'),
           'discount' => $this->input->post('discount'),
           'otherpayments' => $this->input->post('netprice1'),
           'jobrequest_id' => $this->input->post('a12'),
           'cus_id' => $this->input->post('a6'),
            
        );
        $this->Invoice_Model->save_invoice_data($ar_data);
    }

}

?>
