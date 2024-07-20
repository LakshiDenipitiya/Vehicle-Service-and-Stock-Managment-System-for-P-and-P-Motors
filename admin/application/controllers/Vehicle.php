<?php
class Vehicle extends CI_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Vehicle_Model");
    $this->load->model("Customer_Model");
    $this->load->model("Vehiclemodel_Model");
    $this->load->model("Jobrequest_Model");
    $this->load->model("Colour_Model");
    $this->load->model("Vehicletype_Model");
    $this->load->model("Jobrequestservice_Model");
    $this->load->model("Jobrequestmechanical_Model");
    $this->load->model("Jobrequestsparepart_Model");
    $this->isLoggedIn();
  }

  private function isLoggedIn(){
    if(!$this->session->userdata('isLoggedIn')){
      redirect("Login");
    }
  }

// Load all vehicle data into view
  public function index()
  {
   //check if the user is logged in or not
    $this->isLoggedIn();

    $data = array(
      'vehicleList'=> $this->Vehicle_Model->GetAllwithDetails());

    $this->layouts->view("Vehicle/index",$data);
  }

// Load vehicle create page
  public function create()
  {
     //check if the user is logged in or not
    $this->isLoggedIn();

    $customerDbList = $this->Customer_Model->GetAll();
    $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
    $vehiclemodelDbList = $this->Vehiclemodel_Model->GetAll();
    $colourDbList = $this->Colour_Model->GetAll();

$customerSelectOptions[""] = "Select an Owner";//to pass a empty value

foreach ($customerDbList as $key => $value) {
$customerSelectOptions[$value->id] = $value->title.'.&nbsp;'.$value->firstname.'&nbsp;'.$value->lastname;//to load values from database
}

$vehicletypeSelectionOptions[""]="Select a Vehicle Type";

foreach ($vehicletypeDbList as $key => $value) {
  $vehicletypeSelectionOptions[$value->id] = $value->typeofvehicle;
}

$vehiclemodelSelectionOptions[""]="Select a Vehicle Model";

foreach ($vehiclemodelDbList as $key => $value) {
  $vehiclemodelSelectionOptions[$value->id] = $value->vehiclemodel;
}

$colourSelectionOptions[""]="Select a Colour";

foreach ($colourDbList as $key => $value) {
// var_dump($value);
  $colourSelectionOptions[$value->id] = $value->colour;
}


$data['customerList'] = $customerSelectOptions;
$data['vehicletypeList'] = $vehicletypeSelectionOptions;
$data['vehiclemodelList'] = $vehiclemodelSelectionOptions;
$data['colourList'] = $colourSelectionOptions;

$this->layouts->view("Vehicle/create",$data);
}

// Save vehicle form data into DB
public function save()
{
     //check if the user is logged in or not
  $this->isLoggedIn();

  $this->form_validation->set_rules('customer_id', 'Name of the Owner', 'required');
  $this->form_validation->set_rules('vehicletype_id', 'Vehicle Type', 'required');
  $this->form_validation->set_rules('vehiclemodel_id', 'Vehicle Model', 'required');
  $this->form_validation->set_rules('colour_id', 'Colour', 'required');
  // $this->form_validation->set_rules('status', 'Status', 'required');
  $this->form_validation->set_rules('vehicleno', 'Vehicle No','required');
 // $this->form_validation->set_rules('chassisno', 'Chassis No');
 // $this->form_validation->set_rules('engineno', 'Engine No','required');
  $this->form_validation->set_rules('purchasedate', 'Purchase Date');
  // $this->form_validation->set_rules('firstservicedate', '1 st Service Date','required');
 // $this->form_validation->set_rules('lastservicedate', 'Last Service Date','required');
//$this->form_validation->set_rules('nextservicedate', 'Next Service Date','required');

  if ($this->form_validation->run() == FALSE) {
// Is form Invalid
    $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
      ,'</div>');

    $customerDbList = $this->Customer_Model->GetAll();
    $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
    $vehiclemodelDbList = $this->Vehiclemodel_Model->GetAll();
    $colourDbList = $this->Colour_Model->GetAll();

$customerSelectOptions[""] = "Select a customer";//to pass a empty value

foreach ($customerDbList as $key => $value) {
$customerSelectOptions[$value->id] = $value->title.'.&nbsp;'.$value->firstname.'&nbsp;'.$value->lastname;//to load values from database
}

$vehicletypeSelectionOptions[""]="Select a Vehicle Type";

foreach ($vehicletypeDbList as $key => $value) {
  $vehicletypeSelectionOptions[$value->id] = $value->typeofvehicle;
}

$vehiclemodelSelectionOptions[""]="Select a vehicle model";

foreach ($vehiclemodelDbList as $key => $value) {
  $vehiclemodelSelectionOptions[$value->id] = $value->vehiclemodel;
}

$colourSelectionOptions[""]="Select a colour";

foreach ($colourDbList as $key => $value) {
// var_dump($value);
  $colourSelectionOptions[$value->id] = $value->colour;
}


$data['customerList'] = $customerSelectOptions;
$data['vehicletypeList'] = $vehicletypeSelectionOptions;
$data['vehiclemodelList'] = $vehiclemodelSelectionOptions;
$data['colourList'] = $colourSelectionOptions;

// Load view
$this->layouts->view("Vehicle/create",$data);
return;
}else{

// Is form Valid        
  $data = array(
    'customer_id' => $this->input->post('customer_id'), 
    'vehicletype_id' => $this->input->post('vehicletype_id'),
    'vehiclemodel_id' => $this->input->post('vehiclemodel_id'), 
    'colour_id' => $this->input->post('colour_id'),
  //  'status' => $this->input->post('status'),
    'vehicleno' => $this->input->post('vehicleno'),
    'chassisno' => $this->input->post('chassisno'),
    'engineno' => $this->input->post('engineno'),
    'purchasedate' => $this->input->post('purchasedate'),
 //   'firstservicedate' => $this->input->post('firstservicedate'),
  //  'lastservicedate' => $this->input->post('lastservicedate'),
// 'nextservicedate' => $this->input->post('nextservicedate'),
    );

// Save Data
  $this->Vehicle_Model->add($data);
// Set success message as flash session
  $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Vehicle added successfully!</h4></div>');
//redirect to vehicle page
  redirect("Vehicle",'refresh');
}
}

// clear vehicle form
public function clear()
{
//redirect to vehicle page
  redirect("Vehicle",'refresh');
}


public function edit()
{
    //check if the user is logged in or not
  $this->isLoggedIn();
  
  $userId = $this->uri->segment(3);

  if ($userId != null) {
    $user = $this->Vehicle_Model->get_by_id($userId);

    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $customerDbList = $this->Customer_Model->GetAll();
    $vehicletypeDbList = $this->Vehicletype_Model->GetAll();
    $vehiclemodelDbList = $this->Vehiclemodel_Model->GetAll();
    $colourDbList = $this->Colour_Model->GetAll();

$customerSelectOptions[""] = "Select a Owner";//to pass a empty value

foreach ($customerDbList as $key => $value) {

$customerSelectOptions[$value->id] = $value->firstname;//to load values from database
}

$vehicletypeSelectionOptions[""]="Select a Vehicle Type";
foreach ($vehicletypeDbList as $key => $value) {

  $vehicletypeSelectionOptions[$value->id] = $value->typeofvehicle;
}

$vehiclemodelSelectionOptions[""]="Select a Vehicle Model";

foreach ($vehiclemodelDbList as $key => $value) {
  $vehiclemodelSelectionOptions[$value->id] = $value->vehiclemodel;
}

$colourSelectionOptions[""]="Select a Colour";

foreach ($colourDbList as $key => $value) {
// var_dump($value);
  $colourSelectionOptions[$value->id] = $value->colour;
}


$data['customerList'] = $customerSelectOptions;
$data['vehicletypeList'] = $vehicletypeSelectionOptions;
$data['vehiclemodelList'] = $vehiclemodelSelectionOptions;
$data['colourList'] = $colourSelectionOptions;

$this->layouts->view("Vehicle/edit", $data);

}

}

function update()
{
   //check if the user is logged in or not
  $this->isLoggedIn();

  $userId = $this->uri->segment(3);

  $this->form_validation->set_rules('customer_id', 'Name of the Owner', 'required');
  $this->form_validation->set_rules('vehicletype_id', 'Vehicle Type', 'required');
  $this->form_validation->set_rules('vehiclemodel_id', 'Vehicle Model', 'required');
  $this->form_validation->set_rules('colour_id', 'Colour', 'required');
 // $this->form_validation->set_rules('status', 'Status','required');
  $this->form_validation->set_rules('vehicleno', 'Vehicle No','required');
 // $this->form_validation->set_rules('chassisno', 'Chassis No','required');
  //$this->form_validation->set_rules('engineno', 'Engine No','required');
 // $this->form_validation->set_rules('purchasedate', 'Purchase Date');
 // $this->form_validation->set_rules('firstservicedate', '1 st Service Date','required');
  //$this->form_validation->set_rules('lastservicedate', 'Last Service Date','required');
// $this->form_validation->set_rules('nextservicedate', 'Next Service Date','required');


  if ($this->form_validation->run() == FALSE) {
// Is form Invalid
    $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
      ,'</div>');
// Load view
    $user = $this->Vehicle_Model->get_by_id($userId);


    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $this->layouts->view("Vehicle/edit", $data);
    return;
  }else{

    $userData = array(
      'customer_id' => $this->input->post('customer_id'), 
      'vehicletype_id' => $this->input->post('vehicletype_id'), 
      'vehiclemodel_id' => $this->input->post('vehiclemodel_id'), 
      'colour_id' => $this->input->post('colour_id'),
    //  'status' => $this->input->post('status'),
      'vehicleno' => $this->input->post('vehicleno'),
      'chassisno' => $this->input->post('chassisno'),
      'engineno' => $this->input->post('engineno'),
      'purchasedate' => $this->input->post('purchasedate'),
   //   'firstservicedate' => $this->input->post('firstservicedate'),
   //   'lastservicedate' => $this->input->post('lastservicedate'),
// 'nextservicedate' => $this->input->post('nextservicedate'),
      );

    $this->Vehicle_Model->update_by_id($userId, $userData);}


// Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Vehicle updated successfully!</h4></div>');

//redirect to vehicle page
    redirect('Vehicle','refresh');
  }

  public function view()
  {
            //to check is user logged
    $this->isLoggedIn();

    $vehicleId = $this->uri->segment(3);

    if ($vehicleId != null) {

      $vehicle = $this->Vehicle_Model->get_by_id($vehicleId);

      $customer = $this->Customer_Model->get_by_id($vehicle->customer_id);

      $jobrequest = $this->Jobrequest_Model->get_jobrequest_by_vehicle($vehicleId);

      $data["job_request_history"] = $jobrequest;
      $data["customer"] = $customer;
      $data["selectedVehicle"] = $vehicle;
      $data["isLog"] = 1;

      $this->layouts->view("Vehicle/view", $data);
    }
  }


  function Delete()
  {
     //check if the user is logged in or not
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);
    $this->Vehicle_Model->delete_by_id($userId);

// Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Vehicle deleted successfully!</h4></div>');

//redirect to vehicle page
    redirect('Vehicle','refresh');
  }

// Get By Id
  function getById()
  {
    $vehicle_id = $_POST["id"];

// Get vehicle details
    $vehicle = $this->Vehicle_Model->get_by_id($vehicle_id);

// Get customer details 
    $vehicle->customer = $this->Customer_Model->get_by_id($vehicle->customer_id);

// Get Vehicle Model
    $vehicle_model = $this->Vehiclemodel_Model->get_by_id($vehicle->vehiclemodel_id);
    $vehicle->model = $vehicle_model;

// Get Vehicle Type
    $vehicle->vehicletype = $this->Vehicletype_Model->get_by_id($vehicle_model->vehicletype_id);

// Get vehicle color
    $vehicle->vehiclecolor = $this->Colour_Model->get_by_id($vehicle->colour_id);

    echo json_encode($vehicle);
  }


// Get services by job request id (ajax)
  public function getServicesByJobRequest()
  {
    $job_req_id = $this->uri->segment(3);

    $services = $this->Jobrequestservice_Model->get_services_by_job_request_id($job_req_id);
    echo json_encode($services);
  }

  // Get mechanicals by job request id (ajax)
  public function getMechanicalsByJobRequest()
  {
    $job_req_id = $this->uri->segment(3);

    $mechanical = $this->Jobrequestmechanical_Model->get_mechanicals_by_job_request_id($job_req_id);
    echo json_encode($mechanical);

  }
   // Get sparepart by job request id (ajax)
  public function getSparepartsByJobRequest()
  {
    $job_req_id = $this->uri->segment(3);

    $sparepart = $this->Jobrequestsparepart_Model->get_spareparts_by_job_request_id($job_req_id);
    echo json_encode($sparepart);

  }


}


?>
