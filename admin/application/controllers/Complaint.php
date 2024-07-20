<?php
class Complaint extends CI_Controller{

  function __construct()
  {
    parent::__construct();
        $this->load->model("Complaint_Model"); //load Complaint model
        $this->load->model("Customer_Model"); //load customer model
        $this->isLoggedIn();

         $loggedUser = $this->session->userdata("id");
        $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);
      }

      private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
          redirect("Login");
        }
      }

// Load all Complaint data into view
      public function index()
      {
     //check if the user is logged in or not
        $this->isLoggedIn();

        //check has permissions
        if (!$this->permissions->has_permission('Complaint_List', $this->allowedPermissionCodes)) {
            $this->layouts->view("Nopermissions/index");
            return;
        }


//get all data from db
        $data = array(
          'complaintList'=> $this->Complaint_Model->GetAllwithDetails());

        $this->layouts->view("Complaint/index",$data);
      }

// Load Complaint create page
      public function create()
      {
     //check if the user is logged in or not
        $this->isLoggedIn();

        $customerDbList = $this->Customer_Model->GetAll();
        $customerSelectOptions[""] = "Select an Owner";//to pass a empty value

        foreach ($customerDbList as $key => $value) {
      $customerSelectOptions[$value->id] = $value->title.'.&nbsp;'.$value->firstname.'&nbsp;'.$value->lastname;//to load values from database
    }
    $data['customerList'] = $customerSelectOptions;

//load create view
    $this->layouts->view("Complaint/create", $data);
  }

// Save Complaint form data into DB
  public function save()
  {
     //check if the user is logged in or not
    $this->isLoggedIn();

    //set validation rules
   // $this->form_validation->set_rules('id', 'Complaint No','required');
    $this->form_validation->set_rules('customer_id', 'Customer Name','required');
 
    $this->form_validation->set_rules('inbreif', 'Complaint title','required');
    $this->form_validation->set_rules('description', 'Complaint Description','required');

    if ($this->form_validation->run() == FALSE) {
        // Is form Invalid
      $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
        ,'</div>');

      $customerDbList = $this->Customer_Model->GetAll();
$customerSelectOptions[""] = "Select a customer";//to pass a empty value

foreach ($customerDbList as $key => $value) {
$customerSelectOptions[$value->id] = $value->title.'.&nbsp;'.$value->firstname.'&nbsp;'.$value->lastname;//to load values from database
}

$data['customerList'] = $customerSelectOptions;

        // Load view
$this->layouts->view("Complaint/create",$data);
return;
}else{

        // Is form Valid     
        //get data from input   
  $data = array(
    'customer_id' => $this->input->post('customer_id'),
    'inbreif' => $this->input->post('inbreif'),
    'description' => $this->input->post('description'),
    );

/*var_dump($data);
die();*/
        // Save Data
  $this->Complaint_Model->add($data);
        // Set success message as flash session
  $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Complaint added successfully!</h4></div>');
        //redirect to Complaint page
  redirect("Complaint",'refresh');
}
}

// // check with db whether colour is already exists
// public function checkcolour()
// {
//     $data = $this->input->post('colour');

//     $has_colour=false;

//     if ($has_colour ) {
//         $this->form_validation->set_message('checkcolour','<div class="alert alert-warning alert-dismissible">
//             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
//             <h4><i class="icon fa fa-warning"></i> Colour is already exists!</h4></div>');

//         // Load view
//         $this->layouts->view("Colour/create");
//         return;
//     }
//     return true;
// } 

// clear Complaint form
public function clear()
{
//redirect to Complaint page
  redirect("Complaint",'refresh');
}


public function edit()
{
       //check if the user is logged in or not
  $this->isLoggedIn();

  //get user id from url segment 3
  $userId = $this->uri->segment(3);


  if ($userId != null) {
        //if id not null get by id
    $user = $this->Complaint_Model->get_by_id($userId);

    $data["selectedUser"] = $user;
    $data["isLog"] = 1;
    

//   $customerDbList = $this->Customer_Model->GetAll();
// $customerSelectOptions[""] = "Select a customer";//to pass a empty value

// foreach ($customerDbList as $key => $value) {
// $customerSelectOptions[$value->id] = $value->title.'.&nbsp;'.$value->firstname.'&nbsp;'.$value->lastname;//to load values from database
// }

// $data['customerList'] = $customerSelectOptions;


$this->layouts->view("Complaint/edit", $data);

}

}


function update()
{

     //check if the user is logged in or not
  $this->isLoggedIn();

  //get id from url segment 3
  $userId = $this->uri->segment(3);

// set validation rules
  $this->form_validation->set_rules('reply', 'Reply','required');

  if ($this->form_validation->run() == FALSE) {
// Is form Invalid
    $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
        ,'</div>');
// Load view
    $user = $this->Complaint_Model->get_by_id($userId);


    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $this->layouts->view("Complaint/edit", $data);
    return;
}else{
//is form valid
    $userData = array(
        'reply' => $this->input->post('reply'),
        );


    $this->Complaint_Model->update_by_id($userId, $userData);}


// Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Complaint Updated successfully!</h4></div>');

//redirect to complaint page
    redirect('Complaint','refresh');
}


   // Get By Id
  function getById()
  {
    $complaint_id = $_POST["comp_id"];


// Get customer details 
    $complaint->customer = $this->Customer_Model->get_by_id($complaint->customer_id);

    echo json_encode($complaint);
  }

  function Delete()
  {
         //check if the user is logged in or not
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);
    $this->Complaint_Model->delete_by_id($userId);

// Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Complaint deleted successfully!</h4></div>');

//redirect to Complaint page
    redirect('Complaint','refresh');
  }
 

}
?>
