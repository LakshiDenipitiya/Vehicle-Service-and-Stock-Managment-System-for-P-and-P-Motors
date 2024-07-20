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
            redirect("index.php/web/LoginN");
        }
    }
    


    // Load jobrequest create page
    public function index()
    { 
        //check if the user is logged in or not
       $this->isLoggedIn();

       $user_id = $this->session->userdata('id');

        //get all data from the relevent tables
       $vehicleDbList = $this->Vehicle_Model->GetAll();
       $employeeDbList = $this->Employee_Model->GetAll();
       $serviceDbList = $this->Service_Model->GetAll();
       $mechanicalDbList = $this->Mechanical_Model->GetAll();


        $vehicleSelectOptions[""] = "Select an Vehicle No";//to pass a empty value

        foreach ($vehicleDbList as $key => $value) {

            if ($value->customer_id == $user_id) {
                $vehicleSelectOptions[$value->id] = $value->vehicleno;//to load values from database
            }

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
            $this->session->set_flashdata('messagejbreq',"Your appointment saved. You will receive a telephone call within a day, to confirm your appointment.");

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
    
    public function servicestatus(){
        $data = new stdClass();
        $user_id = $this->session->userdata('id');
        $data = array('serviceStatus'=>$this->Jobrequest_Model->getservciestatus($user_id));
        $this->layouts->view('Servicestatus/index.php',$data);
    }

    public function serviceHistory(){

        $data = new stdClass();
        $user_id = $this->session->userdata('id');
        $data = array('serviceHistory'=>$this->Jobrequest_Model->getservciehistory($user_id));

         //load to jobreq_list all data from the jobrequest table
        $jobreq_list = $this->Jobrequest_Model->getservciehistory($user_id);

    //call for the function get_module_by_designation in Jobrequestservice_Model 
        foreach ($jobreq_list as $key => $jobreq) {
            $jobreq->Services = $this->Jobrequestservice_Model->get_servicetype_services_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get jobreq_list as jobrequestList array
        $data = array(
            'serviceHistory'=> $jobreq_list);

    //call for the function get_module_by_designation in Jobrequestmechanical_Model 
        foreach ($jobreq_list as $key => $jobreq) {
            $jobreq->Mechanicals = $this->Jobrequestmechanical_Model->get_mechanical_services_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get jobreq_list as jobrequestList array
        $data = array(
            'serviceHistory'=> $jobreq_list);

    //call for the function get_module_by_designation in Jobrequestsparepart_Model
        foreach ($jobreq_list as $key => $jobreq) {
            $jobreq->Spareparts = $this->Jobrequestsparepart_Model->get_sparepart_by_jobrequest($jobreq->id);  //array('abc', 'asdjasl', 'aljshdas');
        }
        //get jobreq_list as jobrequestList array
        $data = array(
            'serviceHistory'=> $jobreq_list);

        $this->layouts->view('Servicehistory/index.php',$data);
    }

}
?>
