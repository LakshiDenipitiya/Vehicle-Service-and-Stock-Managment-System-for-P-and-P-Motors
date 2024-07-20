<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model("Customer_Model");
		$this->load->model("Supplier_Model");
		$this->load->model("Jobrequest_Model");
		$this->load->model("Employee_Model");
		$this->load->model("Invoice_Model");
		$this->load->model("Goodsreturnnotice_Model");

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$customer_List=$this->Customer_Model->GetAll();
		$supplier_List=$this->Supplier_Model->GetAll();
		$jobrequest_List=$this->Jobrequest_Model->GetAll();
		$employee_List=$this->Employee_Model->GetAll();
		$invoice_List=$this->Invoice_Model->GetAll();
		$grt_List=$this->Goodsreturnnotice_Model->GetAll();

		$data= array(
			"customer_count" => count($customer_List),
			"supplier_count" => count($supplier_List),
			"jobrequest_count" => count($jobrequest_List),
			"employee_count" => count($employee_List),
			"invoice_count" => count($invoice_List),
			"grt_count" => count($grt_List),

			);

		$this->layouts->view('dashboard/dashboard',$data);

	}
}
