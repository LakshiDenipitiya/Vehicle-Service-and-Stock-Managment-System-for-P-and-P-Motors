<?php
class Complaint extends CI_Controller{

  function __construct()
  {
    parent::__construct();
        $this->load->model("Complaint_Model"); //load Complaint model
        $this->load->model("Customer_Model"); //load customer model
        $this->isLoggedIn();
      }

      private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
          redirect("index.php/web/LoginN");
        }
      }



// Load Complaint create page
      public function index()
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
    // $this->form_validation->set_rules('customer_id', 'Customer Name','required');
    
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
    'customer_id' => $this->session->userdata('id'), // $this->input->post('customer_id'),
    'inbreif' => $this->input->post('inbreif'),
    'description' => $this->input->post('description'),
    );

        // Save Data
  $this->Complaint_Model->add($data);
        // Set success message as flash session
  $this->session->set_flashdata('messagecomp',"Your complain saved. You will have a call.");
  
        //redirect to Complaint page
  redirect("Complaint",'refresh');
}
}

// clear Complaint form
public function clear()
{
//redirect to Complaint page
  redirect("Complaint",'refresh');
}


}
?>
