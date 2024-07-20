<?php
class Service extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Service_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all service data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data = array(
         'serviceList'=> $this->Service_Model->GetAll());

        $this->layouts->view("Service/index",$data);
    }

    // Load service create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->layouts->view("Service/create"/*,$data*/);
    }

    // Save serivce form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('type', 'Type','required');
        $this->form_validation->set_rules('cost', 'Cost (Rs.)','required|numeric');
        //$this->form_validation->set_rules('createddate', 'Created Date','required');
        //$this->form_validation->set_rules('modifieddate', 'Modified Date','required');
        //$this->form_validation->set_rules('modifiedtime', 'Modified Time','required');
       // $this->form_validation->set_rules('status', 'Status','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            
            // Load view
            $this->layouts->view("Service/create");
            return;
        }else{
            
            // Is form Valid        
            $data = array(
               'code' => $this->input->post('code'),
               'type' => $this->input->post('type'),
               'cost' => $this->input->post('cost'),
            //'createddate' => $this->input->post('createddate'),
           // 'modifieddate' => $this->input->post('modifieddate'),
           // 'modifiedtime' => $this->input->post('modifiedtime'),
          //     'status' => $this->input->post('status'),
               );

        // Save Data
            $this->Service_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Service added successfully!</h4></div>');
        //redirect to service page
            redirect("Service",'refresh');
        }
    }

        // clear service form
    public function clear()
    {
       //redirect to service page
        redirect("Service",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Service_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Service/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('type', 'Type','required');
        $this->form_validation->set_rules('cost', 'Cost (Rs.)','required|numeric');
       // $this->form_validation->set_rules('createddate', 'Created Date','required');
       // $this->form_validation->set_rules('modifieddate', 'Modified Date','required');
       // $this->form_validation->set_rules('modifiedtime', 'Modified Time','required');
       // $this->form_validation->set_rules('status', 'Status','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Service_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;
            
            $this->layouts->view("Service/edit", $data);
            return;
        }else{

            $userData = array(
                'code' => $this->input->post('code'),
                'type' => $this->input->post('type'),
                'cost' => $this->input->post('cost'),
            //'createddate' => $this->input->post('createddate'),
           // 'modifieddate' => $this->input->post('modifieddate'),
           // 'modifiedtime' => $this->input->post('modifiedtime'),
             //   'status' => $this->input->post('status'),
                );


            
            $this->Service_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Service updated successfully!</h4></div>');

        //redirect to service page
            redirect('Service','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Service_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Service deleted successfully!</h4></div>');

        //redirect to service page
            redirect('Service','refresh');
        }
        
        //to onchange function in edit
        function getByservice_ID(){
            $service_data=$this->input->post('id');
            $service=$this->Service_Model->get_by_id($service_data);
            echo json_encode($service);
        }
        
        function getAllServices(){
            $all_services=$this->Service_Model->GetAll();
            echo json_encode($all_services['code']);
        }
    }
    ?>
