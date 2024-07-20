<?php
class Supplier extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Supplier_Model");
        $this->isLoggedIn();

           $loggedUser = $this->session->userdata("id");
        $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all supplier data into view
    public function index()
    {
    //check if the user is logged in or not
        $this->isLoggedIn();

          //check has permissions
        if (!$this->permissions->has_permission('supplier_list', $this->allowedPermissionCodes)) {
            $this->layouts->view("Nopermissions/index");
            return;
        }

        $data = array(
         'supplierList'=> $this->Supplier_Model->GetAll());

        $this->layouts->view("Supplier/index",$data);
    }

    // Load supplier create page
    public function create()
    {
//check if the user is logged in or not
        $this->isLoggedIn();

        $this->layouts->view("Supplier/create");
    }

    // Save supplier form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('companyname', 'Company Name','required');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('faxno', 'Fax No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            
            // Load view
            $this->layouts->view("Supplier/create");
            return;
        }else{
            
            // Is form Valid        
            $data = array(
               'code' => $this->input->post('code'),
               'companyname' => $this->input->post('companyname'),
               'no' => $this->input->post('no'),
               'lane' => $this->input->post('lane'),
               'city' => $this->input->post('city'),
               'phoneno' => $this->input->post('phoneno'), 
               'faxno' => $this->input->post('faxno'), 
               'email' => $this->input->post('email'),
               );

        // Save Data
            $this->Supplier_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Supplier added successfully!</h4></div>');
        //redirect to supplier page
            redirect("Supplier",'refresh');
        }
    }

        // clear supplier form
    public function clear()
    {
       //redirect to supplier page
        redirect("Supplier",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Supplier_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Supplier/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('companyname', 'Company Name','required');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('faxno', 'Fax No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Supplier_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;
            
            $this->layouts->view("Supplier/edit", $data);
            return;
        }else{

            $userData = array(
                'code' => $this->input->post('code'),
                'companyname' => $this->input->post('companyname'),
                'no' => $this->input->post('no'),
                'lane' => $this->input->post('lane'),
                'city' => $this->input->post('city'),
                'phoneno' => $this->input->post('phoneno'),
                'faxno' => $this->input->post('faxno'),
                'email' => $this->input->post('email'),
                );


            
            $this->Supplier_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Supplier updated successfully!</h4></div>');

        //redirect to supplier page
            redirect('Supplier','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Supplier_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Supplier deleted successfully!</h4></div>');

        //redirect to supplier page
            redirect('Supplier','refresh');
        }
    }
    ?>
