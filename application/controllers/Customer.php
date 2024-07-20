<?php
class Customer extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Customer_Model");

     //$this->isLoggedIn();

        
        //$logged_user_id=$this->session->userdata('employee_id');

       // $this->permissions_codes=$this->Module_Model->get_permission_codes_for_stakeholder_id($logged_user_id);
    }

    // private function isLoggedIn(){
    //     if(!$this->session->userdata('isLoggedIn')){
    //         redirect("index.php/web/LoginN");
    //     }
    // } 
    
    

    // Load customer create page
    public function index()
    {
        //check if the user is logged in or not
   //  $this->isLoggedIn();

        $data['titleDropdownOptionN'] = array(
            ''  => 'Select',
            'Mr'    => 'Mr',
            'Mrs'   => 'Mrs',
            'Ms'   => 'Ms',
            );

        $this->layouts->view("Login/signup", $data);
    }

    // Save customer form data into DB
    public function save()
    {
        //check if the user is logged in or not
   //     $this->isLoggedIn();

        //set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'First Name','required');
        $this->form_validation->set_rules('lastname', 'Last Name','required');
        $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]|is_unique[customer.nicno]');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');

            $data['titleDropdownOptionN'] = array(
                ''  => 'Select',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );

            
            // Load view
            $this->layouts->view("Login/signup", $data);
            return;
        }else{
            
            // Is form Valid        
            $data = array(
                'title'=>$this->input->post('title'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'nicno' => $this->input->post('nicno'),
                'no' => $this->input->post('no'),
                'lane' => $this->input->post('lane'),
                'city' => $this->input->post('city'),
                'phoneno' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                );
            

        // get customer id
            $insert_id = $this->Customer_Model->add($data);

        //get inserted id and data to create user account function
            $user = $this->Customer_Model->create_user_account($insert_id,$data);


            if ($user) {
            // send welcome email
                $this->send_account_details_email($user,$data);
            }
            
        // Set success message as flash session
            $this->session->set_flashdata('message',"Thanks for registering with P and P Motors! <br> Check your email to get your username & password");
        //redirect to vehicle page
            redirect("index.php/Vehicle",'refresh');
        }
    }

    public function send_account_details_email($user,$data)
    {
         //email encryption
    $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
    //SMTP & email configuration
    $config =array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'pandpmotorssl@gmail.com',
        'smtp_pass' => 'pandpmotors123',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1'
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");


        $this->load->library('email');

        $this->email->from('pandpmotorssl@gmail.com', 'P and P Motors');
        $this->email->to($data['email']);

        $this->email->subject('Welcome to P and P motors');

        $this->email->set_mailtype("html");

        $message = "Dear ".$data['firstname'].", <br><br> Welcome to P and P Motors. <br> Here is your username and password. Please change it once you have logged in. <br><br> Username: ".$user['username']."<br> Password: ".$user['password']."<br><br> Thnak You for joining with us. <br><br>Best Regards, <br> Team P and P Motors.";

        $this->email->message($message);

        $this->email->send();
    }
    // clear customer form
    public function clear()
    {
       //redirect to customer page
        redirect("Customer",'refresh');
    }
public function view()
{
            //to check is user logged
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    if ($userId != null) {

        $user = $this->Customer_Model->get_by_id($userId);
      //  $designations = $this->Employeedesignation_Model->get_designations_by_employee($userId);

    //    $data["designations"] = $designations;
        $data["selectedUser"] = $user;
        $data["isLog"] = 1;

        $this->layouts->view("Login/view", $data);

    }

}
    
    }
    ?>
