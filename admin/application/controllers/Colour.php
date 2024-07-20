<?php
class Colour extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Colour_Model"); //load colour model
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }

// Load all colour data into view
    public function index()
    {
     //check if the user is logged in or not
      $this->isLoggedIn();

//get all data from db
      $data = array(
        'colourList'=> $this->Colour_Model->GetAll());

      $this->layouts->view("Colour/index",$data);
  }

// Load colour create page
  public function create()
  {
     //check if the user is logged in or not
      $this->isLoggedIn();

//load create view
      $this->layouts->view("Colour/create");
  }

// Save colour form data into DB
  public function save()
  {
     //check if the user is logged in or not
      $this->isLoggedIn();

    //set validation rules
      $this->form_validation->set_rules('colour', 'Colour','required');

      if ($this->form_validation->run() == FALSE) {
        // Is form Invalid
        $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');

        // Load view
        $this->layouts->view("Colour/create");
        return;
    }else{

        // Is form Valid     
        //get data from input   
        $data = array(
            'colour' => $this->input->post('colour'),
            
            );

        // Save Data
        $this->Colour_Model->add($data);
        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Colour added successfully!</h4></div>');
        //redirect to colour page
        redirect("Colour",'refresh');
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

// clear colour form
public function clear()
{
//redirect to colour page
    redirect("Colour",'refresh');
}


public function edit()
{
     //check if the user is logged in or not
  $this->isLoggedIn();

  //get user id from url segment 3
  $userId = $this->uri->segment(3);


  if ($userId != null) {
        //if id not null get by id
    $user = $this->Colour_Model->get_by_id($userId);

    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $this->layouts->view("Colour/edit", $data);

}

}

function update()
{
     //check if the user is logged in or not
  $this->isLoggedIn();

  //get id from url segment 3
  $userId = $this->uri->segment(3);

// set validation rules
  $this->form_validation->set_rules('colour', 'Colour','required');

  if ($this->form_validation->run() == FALSE) {
// Is form Invalid
    $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
        ,'</div>');
// Load view
    $user = $this->Colour_Model->get_by_id($userId);


    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $this->layouts->view("Colour/edit", $data);
    return;
}else{
//is form valid
    $userData = array(
        'colour' => $this->input->post('colour'),
        );


    $this->Colour_Model->update_by_id($userId, $userData);}


// Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Colour Updated successfully!</h4></div>');

//redirect to colour page
    redirect('Colour','refresh');
}

function Delete()
{
         //check if the user is logged in or not
  $this->isLoggedIn();
  
  $userId = $this->uri->segment(3);
  $this->Colour_Model->delete_by_id($userId);

// Set success message as flash session
  $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Colour deleted successfully!</h4></div>');

//redirect to colour page
  redirect('Colour','refresh');
}
}
?>
