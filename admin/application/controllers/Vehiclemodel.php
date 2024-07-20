<?php
class Vehiclemodel extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Vehiclemodel_Model");
        $this->load->model("Vehicletype_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all vehicle model data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data = array(
         'vehiclemodelList'=> $this->Vehiclemodel_Model->GetAllwithDetails());

        $this->layouts->view("Vehiclemodel/index",$data);
    }

    // Load vehicle model create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
        
        $vehicletypeSelectOptions[""] = "Select Vehicle Type";//to pass a empty value

        foreach ($vehicletypeDbList as $key => $value) {
                $vehicletypeSelectOptions[$value->id] = $value->typeofvehicle;//to load values from database
            }

            $data['vehicletypeList'] = $vehicletypeSelectOptions;

            $this->layouts->view("Vehiclemodel/create",$data);
        }

    // Save vehicle model form data into DB
        public function save()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();

            $this->form_validation->set_rules('vehicletype_id', 'Vehicle Type','required');
            $this->form_validation->set_rules('vehiclemodel', 'Vehicle Model','required');


            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    ,'</div>');
                

                $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
                
                $vehicletypeSelectOptions[""] = "Select a Vehicle Type";

                foreach ($vehicletypeDbList as $key => $value) {
                    $vehicletypeSelectOptions[$value->id] = $value->typeofvehicle;
                }

                $data['vehicletypeList'] = $vehicletypeSelectOptions;
                
                $this->layouts->view('Vehiclemodel/create',$data);

                return;

            }else{
               $data = array(
                'vehicletype_id' => $this->input->post('vehicletype_id'),
                'vehiclemodel' => $this->input->post('vehiclemodel'),

                );

        // Save Data
               $this->Vehiclemodel_Model->add($data);
        // Set success message as flash session
               $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Vehicle Model added successfully!</h4></div>');
        //redirect to vehicle model page
               redirect("Vehiclemodel",'refresh');

           }
       }

        // clear vehicle model form
       public function clear()
       {
       //redirect to vehicle model page
        redirect("Vehiclemodel",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);


        if ($userId != null) {
            $user = $this->Vehiclemodel_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
            
                $vehicletypeSelectOptions[""] = "Select Vehicle Type";//to pass a empty value

                foreach ($vehicletypeDbList as $key => $value) {
                        $vehicletypeSelectOptions[$value->id] = $value->typeofvehicle;//to load values from database
                    }

                    $data['vehicletypeList'] = $vehicletypeSelectOptions;
                    
                    $this->layouts->view('Vehiclemodel/edit',$data);

                }

            }

            function update()
            {
        //check if the user is logged in or not
                $this->isLoggedIn();

                $userId = $this->uri->segment(3);

                $this->form_validation->set_rules('vehicletype_id', 'Vehicle Type','required');
                $this->form_validation->set_rules('vehiclemodel', 'Vehicle Model','required');

                if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
                    $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                        ,'</div>');
            // Load view
                    $user = $this->Vehiclemodel_Model->get_by_id($userId);


                    $data["selectedUser"] = $user;
                    $data["isLog"] = 1;
                    
                    $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
            
                $vehicletypeSelectOptions[""] = "Select Vehicle Type";//to pass a empty value

                foreach ($vehicletypeDbList as $key => $value) {
                        $vehicletypeSelectOptions[$value->id] = $value->typeofvehicle;//to load values from database
                    }

                    $data['vehicletypeList'] = $vehicletypeSelectOptions;
                    
                    $this->layouts->view("Vehiclemodel/edit",$data);
        
                    return;
                }else{

                    $userData = array(
                        'vehicletype_id' => $this->input->post('vehicletype_id'),
                        'vehiclemodel' => $this->input->post('vehiclemodel'),
                        );

                    $this->Vehiclemodel_Model->update_by_id($userId, $userData);


        // Set success message as flash session
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Vehicle Model updated successfully!</h4></div>');

        //redirect to goods return notice page
                    redirect('Vehiclemodel','refresh');
                }
            }


            function Delete()
            {
        //check if the user is logged in or not
                $this->isLoggedIn();
                
                $userId = $this->uri->segment(3);
                $this->Vehiclemodel_Model->delete_by_id($userId);

        // Set success message as flash session
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Vehicle Model deleted successfully!</h4></div>');

        //redirect to supplier page
                redirect('Vehiclemodel','refresh');
            }
        }
        ?>
