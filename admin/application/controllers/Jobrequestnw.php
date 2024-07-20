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

          $logged_user_id=$this->session->userdata('employee_id');

        $this->permissions_codes=$this->Module_Model->get_permission_codes_for_stakeholder_id($logged_user_id);

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

           if(!$this->permissions->has_permission('jobrequest_list',$this->permissions_codes)){
           $this->layouts->view("Nopermissions/index");
           return;
        }

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
        $job_request_id = $this->uri->segment(3);

        if ($job_request_id != null) {

            // get job request bby id
            $job_request = $this->Jobrequest_Model->get_by_id($job_request_id);

            // get job requested user
            $customer = $this->customer_Model->get_by_id($job_request->customer_id);
            $data["customer"] = $customer;
            $data["isLog"] = 1;


            // get saved services for job id
            $job_request_service_list = $this->Jobrequestservice_Model->get_servicetype_services_by_jobrequest($job_request_id);

            //load all data from db
            $serviceDbList = $this->Service_Model->GetAll();
            $service_list_dropdown[""]="Select a service type service";
            foreach ($serviceDbList as $key => $value) {
                $service_list_dropdown[$value->id] = $value->code;//to load values from database
            }

            $data['job_request_service_list'] = $job_request_service_list;
            $data['service_list_dropdown'] = $service_list_dropdown;
            $data['job_request'] = $job_request;

            // --------------------------

            // //get data to moduleList
            // $data['serviceList'] = $serviceSelectionOptions;
            // $data['user_services_id_list'] = $user_services_id_list;

            // get saved services for job id
            $job_request_mechanical_list = $this->Jobrequestmechanical_Model->get_mechanical_services_by_jobrequest($job_request_id);

            //load all data from db
            $mechanicalDbList = $this->Mechanical_Model->GetAll();
            $mechanical_list_dropdown[""]="Select a Mechanical type service";
            foreach ($mechanicalDbList as $key => $value) {
                $mechanical_list_dropdown[$value->id] = $value->code;//to load values from database
            }

            $data['job_request_mechanical_list'] = $job_request_mechanical_list;
            $data['mechanical_list_dropdown'] = $mechanical_list_dropdown;
            $data['job_request'] = $job_request;

             // get saved spareparts for job id
            $job_request_sparepart_list = $this->Jobrequestsparepart_Model->get_sparepart_by_jobrequest($job_request_id);

            //load all data from db
            $sparepartDbList = $this->Sparepart_Model->GetAll();
            $sparepart_list_dropdown[""]="Select a Spareparts";
            foreach ($sparepartDbList as $key => $value) {
                $sparepart_list_dropdown[$value->id] = $value->code;//to load values from database
            }

            $data['job_request_sparepart_list'] = $job_request_sparepart_list;
            $data['sparepart_list_dropdown'] = $sparepart_list_dropdown;
            $data['job_request'] = $job_request;


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
                );

            $this->Jobrequest_Model->update_by_id($userId, $userData);}


            // Update jobrequest services
            $this->Jobrequestservice_Model->delete_by_jobrquest_id($userId);
            $selected_services = $this->input->post('service_id[]');
            
            foreach ($selected_services as $key => $service_id) {
                $data = array(
                    'service_id' => $service_id,
                    'Jobrequest_id' => $userId 
                    );
                $this->Jobrequestservice_Model->add($data);
            }
            // Update jobrequest mechanical
            $this->Jobrequestmechanical_Model->delete_by_jobrquest_id($userId);
            $selected_mechanicals = $this->input->post('mechanical_id[]');
            
            foreach ($selected_mechanicals as $key => $mechanical_id) {
                $data = array(
                    'mechanical_id' => $mechanical_id,
                    'Jobrequest_id' => $userId 
                    );
                $this->Jobrequestmechanical_Model->add($data);
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

    public function update_status($jobrequest_id,$status)
    {
        $result = $this->Jobrequest_Model->update_status($jobrequest_id, $status);

        if($result) {
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Jobrequest status updated successfully!</h4></div>');
        }else{
           $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Unsuccessful update!</h4></div>');
       }
            //redirect to employee page    
       redirect('Jobrequest','refresh');
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

// public function jb_create()
// {

//     $this->isLoggedIn();
//     $this->Jobrequest_Model->jb_create();

// }

// public function get_jb()
// {

//     $this->isLoggedIn();
//     $data['detail_list'] = $this->Jobrequest_Model->get_jb();

//     $this->load->view("Invoice/listdata", $data ,false);

// }

// public function get_jbnew()
// {

//     $this->isLoggedIn();
//     $data['detail_list'] = $this->Jobrequest_Model->get_jb();

//     $this->load->view("Invoice/list_2", $data ,false);

// }

// public function get_service_codes() {
//     $result = $this->Jobrequest_Model->get_serivce_codes();
//     echo json_encode($result);
// }

public function updateStatus(){
    $val_request=$this->input->post('request');
    $val_event=$this->input->post('event');
    $data['status']=$val_event;
    $result = $this->Jobrequest_Model->update_by_id($val_request,$data);
    
}
}
?>
