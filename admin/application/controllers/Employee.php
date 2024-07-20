<?php
class Employee extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Employee_Model");             //load employee model 
        $this->load->model("Designation_Model");          //load designation model 
        $this->load->model("Employeedesignation_Model");  //load employeedesignation model 
        $this->load->model("Stakeholder_Model");          //load stakeholder model 
        $this->isLoggedIn();

        $loggedUser = $this->session->userdata("id");
        $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);
        
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    public function index()
    {
        //to check is user logged
        $this->isLoggedIn();

        //check has permissions
        if (!$this->permissions->has_permission('employee_list', $this->allowedPermissionCodes)) {
            $this->layouts->view("Nopermissions/index");
            return;
        }

    //load to emp_list all data from the employee table
        $emp_list = $this->Employee_Model->GetAll();

        foreach ($emp_list as $key => $emp) {
            $emp->designations = $this->Employeedesignation_Model->get_designations_by_employee($emp->id);  //array('abc', 'asdjasl', 'aljshdas');
        }

        $data = array(
            'employeeList'=> $emp_list);

        $this->layouts->view("Employee/index",$data);
    }
    
    // Load employee create page
    public function create()
    {
        //to check is user logged
        $this->isLoggedIn();

        $data['titleDropdownOption'] = array(
            ''  => 'Select',
            'Mr'    => 'Mr',
            'Mrs'   => 'Mrs',
            'Ms'   => 'Ms',
            );

        $designationDbList = $this->Designation_Model->GetAll();
          $designationSelectOptions;//to pass a empty value

          foreach ($designationDbList as $key => $value) {
                $designationSelectOptions[$value->id] = $value->designation;//to load values from database
            }
            $data['designationList'] = $designationSelectOptions;



            $this->layouts->view("Employee/create",$data);
        }
    // Load all employee data into view


    // Save employee form data into DB
        public function save()
        {

            $this->isLoggedIn();

            $this->form_validation->set_rules('title', 'title','required');
            $this->form_validation->set_rules('firstname', 'First Name','required');
            $this->form_validation->set_rules('lastname', 'Last Name','required');
            $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]|is_unique[employee.nicno]');
            $this->form_validation->set_rules('dateofbirth', 'Date of Birth','required');
            $this->form_validation->set_rules('maritalstatus', 'Marital Status','required');
            $this->form_validation->set_rules('gender', 'Gender','required');
            $this->form_validation->set_rules('no', 'No','required');
            $this->form_validation->set_rules('lane', 'Lane','required');
            $this->form_validation->set_rules('city', 'City','required');
            $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
       // $this->form_validation->set_rules('email', 'Email','required');
            $this->form_validation->set_rules('designation_id[]', 'Designation','required');
            $this->form_validation->set_rules('dateofrecruitment', 'Date of Recruitment','required');

            if ($this->input->post('checkbox')) {
                $this->form_validation->set_rules('username', 'Username','required');
                $this->form_validation->set_rules('password', 'Password','required');
                $this->form_validation->set_rules('confirmpassword', 'Confirm Password','required|matches[password]');
            }

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

                $designationDbList = $this->Designation_Model->GetAll();

        $designationSelectOptions[""] = "Select a Designation";//to pass a empty value

        foreach ($designationDbList as $key => $value) {
                $designationSelectOptions[$value->id] = $value->designation;//to load values from database
            }
            $data['designationList'] = $designationSelectOptions;

            // Load view
            $this->layouts->view("Employee/create",$data);
            return;
        }else{

            // Is form Valid        
            $emp_data = array(
                'title' => $this->input->post('title'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'nicno' => $this->input->post('nicno'),
                'dateofbirth' => $this->input->post('dateofbirth'),
                'maritalstatus' => $this->input->post('maritalstatus'),
                'gender' => $this->input->post('gender'),
                'no' => $this->input->post('no'), 
                'lane' => $this->input->post('lane'), 
                'city' => $this->input->post('city'), 
                'phoneno' => $this->input->post('phoneno'), 
                'email' => $this->input->post('email'),
                'dateofrecruitment' => $this->input->post('dateofrecruitment'),
                );

            $newEmpId=$this->Employee_Model->add($emp_data);// Save Data to employee table

            $stakeholder=array(
                'employee_id'=>$newEmpId,
                'username' =>$this->input->post('username'),
                'password' =>md5($this->input->post('password')),
                );

            $this->Stakeholder_Model->add($stakeholder);
            
            // $newEmpId = $this->Employee_Model->add($data);

            $designation_ids = $this->input->post('designation_id[]');

            if ($newEmpId) {
                foreach ($designation_ids as $key => $value) {
                    $ed = array('designation_id' => $value, 'employee_id' => $newEmpId);
                    $this->Employeedesignation_Model->add($ed);
                }

                if ($this->input->post('checkbox')) {
                // enter login details
                }
            }

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee added successfully!</h4></div>');
        //redirect to employee page
            redirect("Employee",'refresh');
        }
    }


        // clear employee form
    public function clear()
    {
        //to check is user logged
        $this->isLoggedIn();

       //redirect to employee page
        redirect("Employee",'refresh');
    }
    

    public function edit()
    {
        //to check is user logged
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Employee_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $data['titleDropdownOption'] = array(
                ''  => 'Select',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );

            // User designations
            $user_designations_list = $this->Employeedesignation_Model->get_designations_by_employee($userId);
            $user_designations_id_list = [];


            foreach ($user_designations_list as $key => $value) {
                $user_designations_id_list[$key] = $value->id;
            }

            $designationDbList = $this->Designation_Model->GetAll();

        $designationSelectOptions[""] = "Select a Designation";//to pass a empty value
        foreach ($designationDbList as $key => $value) {
            $designationSelectOptions[$value->id] = $value->designation;//to load values from database
        }
        $data['designationList'] = $designationSelectOptions;
        $data['user_designations_id_list'] = $user_designations_id_list;

        $this->layouts->view("Employee/edit", $data);

    }

}

function update()
{
        //to check is user logged
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    $this->form_validation->set_rules('title', 'Title','required');
    $this->form_validation->set_rules('firstname', 'First Name','required');
    $this->form_validation->set_rules('lastname', 'Last Name','required');
    $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]');
    $this->form_validation->set_rules('dateofbirth', 'Date of Birth','required');
    $this->form_validation->set_rules('maritalstatus', 'Marital Status','required');
    $this->form_validation->set_rules('gender', 'Gender','required');
    $this->form_validation->set_rules('no', 'No','required');
    $this->form_validation->set_rules('lane', 'Lane','required');
    $this->form_validation->set_rules('city', 'City','required');
    $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        //$this->form_validation->set_rules('email', 'Email','required');
        // $this->form_validation->set_rules('designation_id[]', 'Designation','required');
    $this->form_validation->set_rules('dateofrecruitment', 'Date of Recruitment','required');
       // $this->form_validation->set_rules('username', 'Username','required');
       // $this->form_validation->set_rules('password', 'Password','required');
       // $this->form_validation->set_rules('confirmpassword', 'Confirm Password','required|matches[password]');
    
    if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
        $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');
            // Load view
        $user = $this->Employee_Model->get_by_id($userId);


        $data["selectedUser"] = $user;
        $data["isLog"] = 1;

        $data['titleDropdownOption'] = array(
            ''  => 'Select',
            'Mr'    => 'Mr',
            'Mrs'   => 'Mrs',
            'Ms'   => 'Ms',
            );

        $this->layouts->view("Employee/edit", $data);
        return;
    }else{

        $userData = array(
            'title'=>$this->input->post('title'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'nicno' => $this->input->post('nicno'),
            'dateofbirth' => $this->input->post('dateofbirth'),
            'maritalstatus' => $this->input->post('maritalstatus'),
            'gender' => $this->input->post('gender'),
            'no' => $this->input->post('no'), 
            'lane' => $this->input->post('lane'), 
            'city' => $this->input->post('city'), 
            'phoneno' => $this->input->post('phoneno'), 
            'email' => $this->input->post('email'),
                // 'designation_id[]' => $this->input->post('designation_id[]'),
            'dateofrecruitment' => $this->input->post('dateofrecruitment'),
            'dateofresigned' => $this->input->post('dateofresigned'),
                //'username' => $this->input->post('username'),
                //'password' => md5($this->input->post('password')),
            );

            // var_dump($userData);

$this->Employee_Model->update_by_id($userId, $userData);}

            // // Update umployee designations
            // $this->Employeedesignation_Model->delete_by_employee_id($userId);
            // $selected_designatiosn = $this->input->post('designation_id[]');

            // foreach ($selected_designatiosn as $key => $desgnation_id) {
            //     $data = array(
            //         'designation_id' => $desgnation_id,
            //         'employee_id' => $userId 
            //     );
            //     $this->Employeedesignation_Model->add($data);
            // }


        // Set success message as flash session
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Employee updated successfully!</h4></div>');

        //redirect to employee page
redirect('Employee','refresh');
}

public function update_leave($employee_id,$status)
{
    $result = $this->Employee_Model->update_leave($employee_id, $status);

    if($result) {
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Employee Leave updated successfully!</h4></div>');
    }else{
       $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Unsuccessful update!</h4></div>');
   }
            //redirect to employee page    
   redirect('Employee','refresh');
}

public function view()
{
            //to check is user logged
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    if ($userId != null) {

        $user = $this->Employee_Model->get_by_id($userId);
        $designations = $this->Employeedesignation_Model->get_designations_by_employee($userId);

        $data["designations"] = $designations;
        $data["selectedUser"] = $user;
        $data["isLog"] = 1;

        $this->layouts->view("Employee/view", $data);

    }

}

function Delete()
{
            //to check is user logged
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);
    $this->Employee_Model->delete_by_id($userId);

        // Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Employee deleted successfully!</h4></div>');

        //redirect to employee page
    redirect('Employee','refresh');
}
}
?>
