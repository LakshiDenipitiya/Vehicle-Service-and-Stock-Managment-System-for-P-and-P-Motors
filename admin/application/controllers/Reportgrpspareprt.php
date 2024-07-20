<?php
class Reportgrpspareprt extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Jobrequest_Model");
	}

	protected $table = "jobrequest";

// Load all vehicle data into view
	public function index()
	{
		

		$data = array(
			'sparepartList'=> $this->Jobrequest_Model->countservice());

		$this->layouts->view("Reports/countservice",$data);
	}
}
?>