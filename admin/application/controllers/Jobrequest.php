<?php
class Jobrequest extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Jobrequest_Model");     //load the jobrequest models
        $this->load->model("Vehicle_Model");        //load the vehicle models
        $this->load->model("Vehiclemodel_Model");   //load the vehiclemodel models
        $this->load->model("customer_Model");       //load the customer models
        $this->load->model("Employee_Model");       //load the employee models
        $this->load->model("Jobrequestservice_Model");      //load the jobrequestservice models
        $this->load->model("Jobrequestmechanical_Model");   //load the jobrequestmechanical models
        $this->load->model("Jobrequestsparepart_Model");        //load the Jobrequestsparepart Model
        $this->load->model("Vehicleservice_Model");        //load the Vehicleservice_Model
        $this->load->model("Mechanical_Model");        //load the Mechanical_Model
        $this->load->model("Service_Model");        //load the Service_Model
        $this->load->model("Sparepart_Model");        //load the Spareparts_Model

        
        $this->isLoggedIn();

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all Jobrequest data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

    //load to jobreq_list all data from the jobrequest table
        $jobreq_list = $this->Jobrequest_Model->GetAll();

    //call for the function get_module_by_designation in Jobrequestservice_Model 
        foreach ($jobreq_list as $key => $jobreq) {
            $jobreq->Services = $this->Jobrequestservice_Model->get_servicetype_services_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get jobreq_list as jobrequestList array
        $data = array(
            'jobrequestList'=> $jobreq_list);

    //call for the function get_module_by_designation in Jobrequestmechanical_Model 
        foreach ($jobreq_list as $key => $jobreq) {
            $jobreq->Mechanicals = $this->Jobrequestmechanical_Model->get_mechanical_services_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get jobreq_list as jobrequestList array
        $data = array(
            'jobrequestList'=> $jobreq_list);

    //call for the function get_module_by_designation in Jobrequestsparepart_Model
        foreach ($jobreq_list as $key => $jobreq) {
            $jobreq->Spareparts = $this->Jobrequestsparepart_Model->get_sparepart_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get jobreq_list as jobrequestList array
        $data = array(
            'jobrequestList'=> $jobreq_list);

    //   //call for the function get_employee_details_by_jobrequest in employee_Model
    // foreach ($jobreq_list as $key => $jobreq) {
    //         $jobreq->Employees = $this->Employee_Model->get_employee_details_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
    //     }
    //     //get jobreq_list as jobrequestList array
    //     $data = array(
    //         'jobrequestList'=> $jobreq_list);

        //load view
        $this->layouts->view("Jobrequest/index",$data);
    }

    // Load jobrequest create page
    public function create()
    { 
        //check if the user is logged in or not
        $this->isLoggedIn();

        //get all data from the relevent tables
        $vehicleDbList = $this->Vehicle_Model->GetAll();
        $employeeDbList = $this->Employee_Model->GetAll();
        $serviceDbList = $this->Service_Model->GetAll();
        $mechanicalDbList = $this->Mechanical_Model->GetAll();


        $vehicleSelectOptions[""] = "Select an Vehicle No";//to pass a empty value

        foreach ($vehicleDbList as $key => $value) {
                $vehicleSelectOptions[$value->id] = $value->vehicleno;//to load values from database
            }

            $employeeSelectionOptions[""]="Select a Employee";

            foreach ($employeeDbList as $key => $value) {
                $employeeSelectionOptions[$value->id] = $value->firstname." (".$value->leavestatus.")";//to load values from database
            }
            $serviceSelectionOptions[""]="Select a service type services";

            foreach ($serviceDbList as $key => $value) {
                $serviceSelectionOptions[$value->id] = $value->code;//to load values from database
            }
            $mechanicalSelectionOptions[""]="Select a mechanical type services";

            foreach ($mechanicalDbList as $key => $value) {
                $mechanicalSelectionOptions[$value->id] = $value->type;//to load values from database
            }

             //load data relevent list from defined dropdowns
            $data['vehicleList'] = $vehicleSelectOptions;
            $data['employeeList'] = $employeeSelectionOptions;
            $data['serviceList'] = $serviceSelectionOptions;
            $data['mechanicalList'] = $mechanicalSelectionOptions;

            $this->layouts->view("Jobrequest/create",$data);
        }

    
   // Save jobrequest form data into DB
        public function save()
        {

        //check if the user is logged in or not
            $this->isLoggedIn();

            $this->form_validation->set_rules('vehicle_id', 'Vehicle No', 'required');
            $this->form_validation->set_rules('employee_id', 'Assigned employee for service', 'required');
            $this->form_validation->set_rules('meterreading', 'Meter Reading', 'numeric|required');
            $this->form_validation->set_rules('app_date', 'Appointment Date', 'date|required');
           // $this->form_validation->set_rules('service_id[]', 'Service Type Serivices');
          //  $this->form_validation->set_rules('mechnical_id[]', 'Mechanical Type Serivices');


            if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
                $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    ,'</div>');

                $vehicleDbList = $this->Vehicle_Model->GetAll();
                $employeeDbList = $this->Employee_Model->GetAll();
                $serviceDbList = $this->Service_Model->GetAll();
                $mechanicalDbList = $this->Mechanical_Model->GetAll();

        $vehicleSelectOptions[""] = "Select an Vehicle No";//to pass a empty value

        foreach ($vehicleDbList as $key => $value) {
                $vehicleSelectOptions[$value->id] = $value->vehicleno;//to load values from database
            }

            $employeeSelectionOptions[""]="Select a Employee";

            foreach ($employeeDbList as $key => $value) {
                $employeeSelectionOptions[$value->id] = $value->firstname." (".$value->leavestatus.")";//to load values from database
            }
            
            $serviceSelectionOptions[""]="Select a service type services";

            foreach ($serviceDbList as $key => $value) {
                $serviceSelectionOptions[$value->id] = $value->code;//to load values from database
            }
            $mechanicalSelectionOptions[""]="Select a mechanical type services";

            foreach ($mechanicalDbList as $key => $value) {
                $mechanicalSelectionOptions[$value->id] = $value->type;//to load values from database
            }

             //load data relevent list from defined dropdowns
            $data['vehicleList'] = $vehicleSelectOptions;
            $data['employeeList'] = $employeeSelectionOptions;
            $data['serviceList'] = $serviceSelectionOptions;
            $data['mechanicalList'] = $mechanicalSelectionOptions;
            // Load view
            $this->layouts->view("Jobrequest/create",$data);
            return;
        }else{


            // $this->input->post('customer_id');
            // Is form Valid        
            $data = array(
                'vehicle_id' => $this->input->post('vehicle_id'),
                'employee_id' => $this->input->post('employee_id'),
                'meterreading' => $this->input->post('meterreading'),
                'customer_id' => $this->input->post('customerid'),
                'app_date' => $this->input->post('app_date'),
          //      'status' => 'active'
                );
            

        // Save Data
            $newJobreqId = $this->Jobrequest_Model->add($data);

            $service_ids = $this->input->post('service_id[]');
            $mechanical_ids = $this->input->post('mechanical_id[]');
             //$employee_ids = $this->input->post('employee_id');

            if ($newJobreqId) {
                // print_r($service_ids);
                foreach ($service_ids as $key => $value) {
                    // echo $key;

                    $js = array('service_id' => $value, 'Jobrequest_id' => $newJobreqId);
                    // print_r($value);
                    $this->Jobrequestservice_Model->add($js);
                }
            }

            if ($newJobreqId) {
                foreach ($mechanical_ids as $key => $value) {
                    $jm = array('mechanical_id' => $value, 'Jobrequest_id' => $newJobreqId);
                    $this->Jobrequestmechanical_Model->add($jm);
                }
            }
            //     if ($newJobreqId) {
            //     foreach ($employee_ids as $key => $value) {
            //         $em = array('employee_id' => $value, 'Jobrequest_id' => $newJobreqId);
            //         $this->Employee_Model->add($em);
            //     }
            // }


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Jobrequest created successfully!</h4></div>');
        //redirect to jobrequest page
            redirect("Jobrequest",'refresh');

        }
    }
        // clear vehicle form
    public function clear()
    {
       //redirect to jobrequest page
        redirect("Jobrequest",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Jobrequest_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;


                  // user service
            $user_services_list = $this->Jobrequestservice_Model->get_servicetype_services_by_jobrequest($userId);

            $user_services_id_list = [];
            foreach ($user_services_list as $key => $value) {
                $user_services_id_list[$value->id] = $value->id;
            }
                //load all data from db
            $serviceDbList = $this->Service_Model->GetAll();

            $serviceSelectionOptions[""]="Select a service type service";

            foreach ($serviceDbList as $key => $value) {
                $serviceSelectionOptions[$value->id] = $value->code;//to load values from database
            }

              //get data to moduleList
            $data['serviceList'] = $serviceSelectionOptions;
            $data['user_services_id_list'] = $user_services_id_list;

                 // user mechanical
            $user_mechanicals_list = $this->Jobrequestmechanical_Model->get_mechanical_services_by_jobrequest($userId);

            $user_mechanicals_id_list = [];
            foreach ($user_mechanicals_list as $key => $value) {
                $user_mechanicals_id_list[$key] = $value->id;
            }
                 //load all data from db
            $mechanicalDbList = $this->Mechanical_Model->GetAll();

            $mechanicalSelectionOptions[""]="Select a mechanical type mechanical";

            foreach ($mechanicalDbList as $key => $value) {
                $mechanicalSelectionOptions[$value->id] = $value->code;//to load values from database
            }

              //get data to moduleList
            $data['mechanicalList'] = $mechanicalSelectionOptions;
            $data['user_mechanicals_id_list'] = $user_mechanicals_id_list;

            $user_spareparts_list = $this->Jobrequestsparepart_Model->get_sparepart_by_jobrequest($userId);

            $user_spareparts_id_list = array();
            foreach ($user_spareparts_list as $key => $value) {
                $user_spareparts_id_list[$key] = $value->id;
            }
                 //load all data from db
            $sparepartDbList = $this->Sparepart_Model->GetAll();

            $sparepartSelectionOptions[""]="Select a spareparts";

            foreach ($sparepartDbList as $key => $value) {
                $sparepartSelectionOptions[$value->id] = $value->code;//to load values from database
            }

              //get data to moduleList
            $data['sparepartList'] = $sparepartSelectionOptions;
            $data['user_spareparts_id_list'] = $user_spareparts_id_list;


           //get all data from the module
            $vehicleDbList = $this->Vehicle_Model->GetAll();
            $employeeDbList = $this->Employee_Model->GetAll();


        $vehicleSelectOptions[""] = "Select an Vehicle No";//to pass a empty value

        foreach ($vehicleDbList as $key => $value) {
                $vehicleSelectOptions[$value->id] = $value->vehicleno;//to load values from database
            }

            $employeeSelectionOptions[""]="Select a Employee";

            foreach ($employeeDbList as $key => $value) {
                $employeeSelectionOptions[$value->id] = $value->firstname." (".$value->leavestatus.")";
            }
             //get data to moduleList
            $data['vehicleList'] = $vehicleSelectOptions;
            $data['employeeList'] = $employeeSelectionOptions;


            $this->layouts->view("Jobrequest/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('vehicle_id', 'Vehicle No', 'required');
        $this->form_validation->set_rules('employee_id', 'Assigned employee for service', 'required');
        $this->form_validation->set_rules('meterreading', 'Meter Reading', 'numeric|required');
          $this->form_validation->set_rules('app_date', 'Appointment Date', 'date|required');

        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Jobrequest_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Jobrequest/edit", $data);
            return;
        }else{

            $userData = array( 
                'employee_id' => $this->input->post('employee_id'),
                'meterreading' => $this->input->post('meterreading'),
                'app_date' => $this->input->post('app_date'),  
                );

            $this->Jobrequest_Model->update_by_id($userId, $userData);}


            // Update jobrequest services
            $this->Jobrequestservice_Model->delete_by_jobrquest_id($userId);
            $selected_services = $this->input->post('service_id[]');
            
             if (sizeof($selected_services) > 0) {
            foreach ($selected_services as $key => $service_id) {
                $data = array(
                    'service_id' => $service_id,
                    'Jobrequest_id' => $userId 
                    );
                $this->Jobrequestservice_Model->add($data);
            }
        }
            // Update jobrequest mechanical
            $this->Jobrequestmechanical_Model->delete_by_jobrquest_id($userId);
            $selected_mechanicals = $this->input->post('mechanical_id[]');
            
            if (sizeof($selected_mechanicals) > 0) {
            foreach ($selected_mechanicals as $key => $mechanical_id) {
                $data = array(
                    'mechanical_id' => $mechanical_id,
                    'Jobrequest_id' => $userId 
                    );
                $this->Jobrequestmechanical_Model->add($data);
            }
        }
             // Update jobrequest sparepart
            $this->Jobrequestsparepart_Model->delete_by_jobrquest_id($userId);
            $selected_spareparts = $this->input->post('sparepart_id[]');
            
            if (sizeof($selected_spareparts) > 0) {
               foreach ($selected_spareparts as $key => $sparepart_id) {
                $data = array(
                    'sparepart_id' => $sparepart_id,
                    'Jobrequest_id' => $userId 
                    );
                $this->Jobrequestsparepart_Model->add($data);
            }

        }



        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Jobrequest updated successfully!</h4></div>');

        //redirect to jobrequest page
        redirect('Jobrequest','refresh');
    }


    public function view()
    {
            //to check is user logged
        $this->isLoggedIn();

        $jobrequestId = $this->uri->segment(3);

        if ($jobrequestId != null) {

            $job_request = $this->Jobrequest_Model->get_by_id($jobrequestId);
            $vehicle = $this->Vehicle_Model->get_by_id($job_request->vehicle_id);   
            $employee = $this->Employee_Model->get_by_id($job_request->employee_id);
            $customer = $this->Vehicleservice_Model->get_customer_by_jobrequest($jobrequestId);
            $mechanicals = $this->Jobrequestmechanical_Model->get_mechanical_services_by_jobrequest($jobrequestId);
            $services = $this->Jobrequestservice_Model->get_servicetype_services_by_jobrequest($jobrequestId);
            $spareparts = $this->Jobrequestsparepart_Model->get_sparepart_by_jobrequest($jobrequestId);
            
            $data["vehicle"] = $vehicle;
            $data["employee"] = $employee;
            $data["customer"] = $customer;
            $data["spareparts"] = $spareparts;
            $data["services"] = $services;
            $data["mechanicals"] = $mechanicals;
            $data["selectedRequest"] = $job_request;
            $data["isLog"] = 1;

            $this->layouts->view("Jobrequest/view", $data);
        }

    }

    function Delete()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
        
        $userId = $this->uri->segment(3);
        $this->Jobrequest_Model->delete_by_id($userId);

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Jobrequest deleted successfully!</h4></div>');

        //redirect to jobrequest page
        redirect('Jobrequest','refresh');
    }

    public function updateStatus(){
    $val_request=$this->input->post('request');
    $val_event=$this->input->post('event');
    $data['status']=$val_event;
    $result = $this->Jobrequest_Model->update_by_id($val_request,$data);
    
}
}
?>
