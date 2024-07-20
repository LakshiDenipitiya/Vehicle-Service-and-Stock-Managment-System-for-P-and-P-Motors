<?php
class Vehicletype extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Vehicletype_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }


    
    // Load all vehicle type data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data = array(
         'vehicletypeList'=> $this->Vehicletype_Model->GetAll());

        $this->layouts->view("Vehicletype/index",$data);
    }

    // Load vehicle type create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->layouts->view("Vehicletype/create");
    }

    // Save customer form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('id', 'Id','required');
        $this->form_validation->set_rules('typeofvehicle', 'Vehicletype','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
          $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');
          
            // Load view
          $this->layouts->view("Vehicletype/create");
          return;
      }else{
        
            // Is form Valid        
        $data = array(
            'id' => $this->input->post('id'),
            'typeofvehicle' => $this->input->post('typeofvehicle'),
            );

        // Save Data
        $this->Vehicletype_Model->add($data);
        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Vehicle Type added successfully!</h4></div>');
        //redirect to vehicletype page
        redirect("Vehicletype",'refresh');
    }
}

    // clear vehicle type form
public function clear()
{
       //redirect to vehicle type page
    redirect("Vehicletype",'refresh');
}

public function edit()
{
        //check if the user is logged in or not
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    if ($userId != null) {
        $user = $this->Vehicletype_Model->get_by_id($userId);

        $data["selectedUser"] = $user;
        $data["isLog"] = 1;


        $this->layouts->view("Vehicletype/edit", $data);

    }

}

function update()
{
        //check if the user is logged in or not
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    $this->form_validation->set_rules('id', 'Id','required');
    $this->form_validation->set_rules('typeofvehicle', 'Vehicletype','required');
    
    if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
        $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');
            // Load view
        $user = $this->Vehicletype_Model->get_by_id($userId);


        $data["selectedUser"] = $user;
        $data["isLog"] = 1;
        
        $this->layouts->view("Vehicletype/edit", $data);
        return;
    }else{

        $userData = array(
            'id'=>$this->input->post('id'),
            'typeofvehicle' => $this->input->post('typeofvehicle'),
            );

        $this->Vehicletype_Model->update_by_id($userId, $userData);}

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Vehicle Type updated successfully!</h4></div>');

        //redirect to vehicletype page
        redirect('Vehicletype','refresh');

    }

    function Delete()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
        
        $userId = $this->uri->segment(3);
        $this->Vehicletype_Model->delete_by_id($userId);

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Vehicle Type deleted successfully!</h4></div>');
        //redirect to vehicle type page
        redirect('Vehicletype','refresh');
    }
}
?>