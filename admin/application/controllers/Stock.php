<?php
class Stock extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Stock_Model");
        /*$this->load->model("Goodsreturnnotice_Model");
        $this->load->model("Supplierstock_Model");
        $this->load->model("Sparepart_Model");*/
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
    	if(!$this->session->userdata('isLoggedIn')){
    		redirect("Login");
    	}
    }
    
    // Load all colour data into view
    public function index()
    {
		//check if the user is logged in or not
    	$this->isLoggedIn();
    	
    	$data = array(
    		'stockList'=> $this->Stock_Model->GetAll());

    	$this->layouts->view("Stock/index",$data);
    }

}
?>
