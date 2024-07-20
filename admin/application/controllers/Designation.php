<?php
class Designation extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Designation_Model");
        $this->load->model("Designationmodule_Model");
        $this->load->model("Module_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all Designation data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

		  //load to desig_list all data from the designation table
        $desig_list = $this->Designation_Model->GetAll();

    //call for the function get_module_by_designation 
        foreach ($desig_list as $key => $desig) {
            $desig->Modules = $this->Designationmodule_Model->get_module_by_designation($desig->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get desig_list as designationList array
        $data = array(
            'designationList'=> $desig_list);
        //load view
        $this->layouts->view("Designation/index",$data);
    }
    

    // Load Designation create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

            //get all data frmo the module table
        $moduleDbList = $this->Module_Model->GetAll();
          $moduleSelectOptions;//to pass a empty value

          foreach ($moduleDbList as $key => $value) {
                $moduleSelectOptions[$value->id] = $value->name;//to load values from database
            }
            //get data to moduleList
            $data['moduleList'] = $moduleSelectOptions;

            //load view
            $this->layouts->view("Designation/create");
        }

    // Save Designation form data into DB
        public function save()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();

        //set validation rules
            $this->form_validation->set_rules('designation', 'Designation','required');
            $this->form_validation->set_rules('module_id[]', 'Module','required');
            
            if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
                $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    ,'</div>');
                
              //get all data from the module table
                $moduleDbList = $this->Module_Model->GetAll();
          $moduleSelectOptions[""] = "Select a Module";//to pass a empty value

          foreach ($moduleDbList as $key => $value) {
                $moduleSelectOptions[$value->id] = $value->name;//to load values from database
            }
            //get data to moduleList
            $data['moduleList'] = $moduleSelectOptions;


            // Load view
            $this->layouts->view("Designation/create");
            return;
        }else{
            
            // Is form Valid        
            $data = array(
               'designation' => $this->input->post('designation'),
               );

        // Save Data
            $newDesigId = $this->Designation_Model->add($data);

            $module_ids = $this->input->post('module_id[]');

            if ($newDesigId) {
                foreach ($module_ids as $key => $value) {
                    $ed = array('module_id' => $value, 'designation_id' => $newDesigId);
                    $this->Designationmodule_Model->add($dm);
                }

            }

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Designation added successfully!</h4></div>');
        //redirect to Designation page
            redirect("Designation",'refresh');
        }
    }

        // clear Designation form
    public function clear()
    {
       //redirect to Designation page
        redirect("Designation",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Designation_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

                  // user module
            $user_modules_list = $this->Designationmodule_Model->get_module_by_designation($userId);

            foreach ($user_modules_list as $key => $value) {
                $user_modules_id_list[$key] = $value->id;
            }


              //get all data from the module table
            $moduleDbList = $this->Module_Model->GetAll();

          $moduleSelectOptions[""] = "Select a Module";//to pass a empty value

          foreach ($moduleDbList as $key => $value) {
                $moduleSelectOptions[$value->id] = $value->name;//to load values from database
            }
            //get data to moduleList
            $data['moduleList'] = $moduleSelectOptions;
            //$data['user_modules_id_list'] = $user_modules_id_list;

            $this->layouts->view("Designation/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('designation', 'Designation','required');

        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Designation_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;
            
            $this->layouts->view("Designation/edit", $data);
            return;
        }else{

            $userData = array(
                'designation' => $this->input->post('designation'),
                );


            $this->Designation_Model->update_by_id($userId, $userData);}

            // Update designation module
            $this->Designationmodule_Model->delete_by_designation_id($userId);
            $selected_modules = $this->input->post('module_id[]');
            
            foreach ($selected_modules as $key => $module_id) {
                $data = array(
                    'module_id' => $module_id,
                    'designation_id' => $userId 
                    );
                $this->Designationmodule_Model->add($data);
             
            }


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Designation Updated successfully!</h4></div>');

        //redirect to Designation page
            redirect('Designation','refresh');
        }


        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Designation_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Designation deleted successfully!</h4></div>');

        //redirect to Designation page
            redirect('Designation','refresh');
        }
    }
    ?>
