<?php
class Mechanical extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Mechanical_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all mechanical data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data = array(
         'mechanicalList'=> $this->Mechanical_Model->GetAll());

        $this->layouts->view("Mechanical/index",$data);
    }

    // Load mechanical create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->layouts->view("Mechanical/create");
    }

    // Save mechanical form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('type', 'Type','required');
        $this->form_validation->set_rules('cost', 'Cost (Rs.)','required|numeric');
      //  $this->form_validation->set_rules('status', 'Status','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            
            // Load view
            $this->layouts->view("Mechanical/create");
            return;
        }else{
            
            // Is form Valid        
            $data = array(
               'code' => $this->input->post('code'),
               'type' => $this->input->post('type'),
               'cost' => $this->input->post('cost'),
               //'status' => $this->input->post('status'),
               );

        // Save Data
            $this->Mechanical_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mechanical Type Service added successfully!</h4></div>');
        //redirect to mechanical page
            redirect("Mechanical",'refresh');
        }
    }

        // clear mechanical form
    public function clear()
    {
       //redirect to mechanical page
        redirect("Mechanical",'refresh');
    }
    

    public function edit()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Mechanical_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Mechanical/edit", $data);

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
       // $this->form_validation->set_rules('status', 'Status','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Mechanical_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;
            
            $this->layouts->view("Mechanical/edit", $data);
            return;
        }else{

            $userData = array(
                'code' => $this->input->post('code'),
                'type' => $this->input->post('type'),
                'cost' => $this->input->post('cost'),
             //   'status' => $this->input->post('status'),
                );


            $this->Mechanical_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mechanical Type Service Updated successfully!</h4></div>');

        //redirect to mechanical page
            redirect('Mechanical','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Mechanical_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mechanical deleted successfully!</h4></div>');

        //redirect to mechanical page
            redirect('Mechanical','refresh');
        }
        
        function getBymechanical_ID(){
            $mechanical_data=$this->input->post('id');
            $service=$this->Mechanical_Model->get_by_id($mechanical_data);
            echo json_encode($service);
        }

        
    }
    ?>
