<?php
class Customer extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Customer_Model");

        $this->isLoggedIn();

        
        $logged_user_id=$this->session->userdata('employee_id');

        $this->permissions_codes=$this->Module_Model->get_permission_codes_for_stakeholder_id($logged_user_id);
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    } 
    
    // Load all customer data into view
    public function index()

	{   //check if the user is logged in or not
        $this->isLoggedIn();

       if(!$this->permissions->has_permission('customer_list',$this->permissions_codes)){
           $this->layouts->view("Nopermissions/index");
           return;
        }
        
        //load data form the db
        $data = array(
         'customerList'=> $this->Customer_Model->GetAll());

        //load data into index.php
        $this->layouts->view("Customer/index",$data);
    }

    // Load customer create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data['titleDropdownOption'] = array(
            ''  => 'Select',
            'Mr'    => 'Mr',
            'Mrs'   => 'Mrs',
            'Ms'   => 'Ms',
            );

        $this->layouts->view("Customer/create", $data);
    }

    // Save customer form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

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

            $data['titleDropdownOption'] = array(
                ''  => 'Select',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );

            
            // Load view
            $this->layouts->view("Customer/create", $data);
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
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Customer added successfully!</h4></div>');
        //redirect to customer page
            redirect("Customer",'refresh');
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

    public function edit()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //get the record id from the 3rd segment in url
        $userId = $this->uri->segment(3);

        //check whether record id not null
        if ($userId != null) {
            //if it is not load the customer data to the user variable from the id
            $user = $this->Customer_Model->get_by_id($userId);

            //set data in the user variable to selected user
            $data["selectedUser"] = $user;
            //is log =true
            $data["isLog"] = 1;

            $data['titleDropdownOption'] = array(
                ''  => 'Select',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );
            //load the customer edit view
            $this->layouts->view("Customer/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //Get the id form the url
        $userId = $this->uri->segment(3);

        //set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'First Name','required');
        $this->form_validation->set_rules('lastname', 'Last Name','required');
        $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Customer_Model->get_by_id($userId);

              //set data in the user variable to selected user
            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $data['titleDropdownOption'] = array(
                ''  => '--Select--',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );
            
             //load the customer edit view
            $this->layouts->view("Customer/edit", $data);
            return;
        }else{

         // Is form Valid       
            $userData = array(
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


         //update by id  
            $this->Customer_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Customer updated successfully!</h4></div>');

        //redirect to customer page
            redirect('Customer','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();

        //get the user id by url segment 3
            $userId = $this->uri->segment(3);
        //delete by id
            $this->Customer_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Customer deleted successfully!</h4></div>');

        //redirect to customer page
            redirect('Customer','refresh');
        }
    }
    ?>
