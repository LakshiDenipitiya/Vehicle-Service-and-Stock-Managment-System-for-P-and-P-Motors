<?php
class Sparepart extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Sparepart_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all Sparepart data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data = array(
            'sparepartList'=> $this->Sparepart_Model->GetAll());

        $this->layouts->view("Sparepart/index",$data);
    }

    // Load Sparepart create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data['cupboardDropdownOption'] = array(
            ''  => 'Select','A'    => 'A','B'   => 'B','C'   => 'C','D'   => 'D','E'   => 'E','F'   => 'F',
            'G'   => 'G','h'    => 'H','I'   => 'I','J'   => 'J','K'   => 'K','L'   => 'L','M'   => 'M',
            'N'    => 'N','O'   => 'O','P'   => 'P','Q'   => 'Q','R'   => 'R','S'   => 'S','T'    => 'T',
            'U'   => 'U','V'   => 'V','W'   => 'W','X'   => 'X','Y'   => 'Y','Z'   => 'Z',
            );

        $data['rowDropdownOption'] = array(
            ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
            '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
            '13'   => '13','14' => '14' , '15' => '15');

        $data['binDropdownOption'] = array(
            ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
            '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
            '13'   => '13','14' => '14' , '15' => '15');

        $this->layouts->view("Sparepart/create", $data);
    }

    // Save Sparepart form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('code', 'Code', 'required|max_length[8]');
        $this->form_validation->set_rules('categoryofsparepart', 'Catagory of Sparepart','required');
        $this->form_validation->set_rules('originalprice', 'Original Price','numeric|required');
        $this->form_validation->set_rules('sellingprice', 'Selling Price','numeric|required');
        $this->form_validation->set_rules('cupboard', 'Cupboard','required');
        $this->form_validation->set_rules('row', 'Row','required|numeric|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('bin', 'Bin','required|numeric|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('reorderlevel', 'Re-order Level','numeric|required');
        $this->form_validation->set_rules('maxstocklevel', 'Max Stock Level','numeric|required');
        //$this->form_validation->set_rules('status', 'Status','required');


        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');

            $data['cupboardDropdownOption'] = array(
                ''  => 'Select','A'    => 'A','B'   => 'B','C'   => 'C','D'   => 'D','E'   => 'E','F'   => 'F',
                'G'   => 'G','h'    => 'H','I'   => 'I','J'   => 'J','K'   => 'K','L'   => 'L','M'   => 'M',
                'N'    => 'N','O'   => 'O','P'   => 'P','Q'   => 'Q','R'   => 'R','S'   => 'S','T'    => 'T',
                'U'   => 'U','V'   => 'V','W'   => 'W','X'   => 'X','Y'   => 'Y','Z'   => 'Z',
                );

            $data['rowDropdownOption'] = array(
                ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
                '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
                '13'   => '13','14' => '14' , '15' => '15');

            $data['binDropdownOption'] = array(
                ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
                '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
                '13'   => '13','14' => '14' , '15' => '15');

            
            // Load view
            $this->layouts->view("Sparepart/create", $data);
            return;
        }else{
            
            // Is form Valid        
            $data = array(
                'code'=>$this->input->post('code'),
                'categoryofsparepart' => $this->input->post('categoryofsparepart'),
                'originalprice' => $this->input->post('originalprice'),
                'sellingprice' => $this->input->post('sellingprice'),
                'cupboard' => $this->input->post('cupboard'),
                'row' => $this->input->post('row'),
                'bin' => $this->input->post('bin'),
                'reorderlevel' => $this->input->post('reorderlevel'),
                'maxstocklevel' => $this->input->post('maxstocklevel'),
               // 'status' => $this->input->post('Status')                        
                );

        // Save Data
            $this->Sparepart_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Spare Part added successfully!</h4></div>');
        //redirect to Sparepart page
            redirect("Sparepart",'refresh');
        }
    }

    // clear Sparepart form
    public function clear()
    {
       //redirect to Sparepart page
        redirect("Sparepart",'refresh');
    }

    public function edit()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Sparepart_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $data['cupboardDropdownOption'] = array(
                ''  => 'Select','A'    => 'A','B'   => 'B','C'   => 'C','D'   => 'D','E'   => 'E','F'   => 'F',
                'G'   => 'G','h'    => 'H','I'   => 'I','J'   => 'J','K'   => 'K','L'   => 'L','M'   => 'M',
                'N'    => 'N','O'   => 'O','P'   => 'P','Q'   => 'Q','R'   => 'R','S'   => 'S','T'    => 'T',
                'U'   => 'U','V'   => 'V','W'   => 'W','X'   => 'X','Y'   => 'Y','Z'   => 'Z',
                );

            $data['rowDropdownOption'] = array(
                ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
                '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
                '13'   => '13','14' => '14' , '15' => '15');

            $data['binDropdownOption'] = array(
                ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
                '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
                '13'   => '13','14' => '14' , '15' => '15');

            $this->layouts->view("Sparepart/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('code', 'Code', 'required|max_length[8]');
        $this->form_validation->set_rules('categoryofsparepart', 'Catagory of Sparepart','required');
        $this->form_validation->set_rules('originalprice', 'Original Price','numeric|required');
        $this->form_validation->set_rules('sellingprice', 'Selling Price','numeric|required');
        $this->form_validation->set_rules('cupboard', 'Cupboard','required');
        $this->form_validation->set_rules('row', 'Row','required|numeric|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('bin', 'Bin','required|numeric|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('reorderlevel', 'Re-order Level','numeric|required');
        $this->form_validation->set_rules('maxstocklevel', 'Max Stock Level','numeric|required');
      //  $this->form_validation->set_rules('status', 'Status','required');

        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Sparepart_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $data['cupboardDropdownOption'] = array(
                ''  => 'Select','A'    => 'A','B'   => 'B','C'   => 'C','D'   => 'D','E'   => 'E','F'   => 'F',
                'G'   => 'G','h'    => 'H','I'   => 'I','J'   => 'J','K'   => 'K','L'   => 'L','M'   => 'M',
                'N'    => 'N','O'   => 'O','P'   => 'P','Q'   => 'Q','R'   => 'R','S'   => 'S','T'    => 'T',
                'U'   => 'U','V'   => 'V','W'   => 'W','X'   => 'X','Y'   => 'Y','Z'   => 'Z',
                );

            $data['rowDropdownOption'] = array(
                ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
                '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
                '13'   => '13','14' => '14' , '15' => '15');

            $data['binDropdownOption'] = array(
                ''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
                '6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
                '13'   => '13','14' => '14' , '15' => '15');
            
            $this->layouts->view("Sparepart/edit", $data);
            return;
        }else{

            $userData = array(
                'code'=>$this->input->post('code'),
                'categoryofsparepart' => $this->input->post('categoryofsparepart'),
                'originalprice' => $this->input->post('originalprice'),
                'sellingprice' => $this->input->post('sellingprice'),
                'cupboard' => $this->input->post('cupboard'),
                'row' => $this->input->post('row'),
                'bin' => $this->input->post('bin'),
                'reorderlevel' => $this->input->post('reorderlevel'),
                'maxstocklevel' => $this->input->post('maxstocklevel'),
          //      'status' => $this->input->post('Status'),    
                );


            
            $this->Sparepart_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Spare part updated successfully!</h4></div>');

        //redirect to Sparepart page
            redirect('Sparepart','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Sparepart_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sparepart deleted successfully!</h4></div>');

        //redirect to Sparepart page
            redirect('Sparepart','refresh');
        }




        // get sparepart by id (ajax)
        public function getSparepartById($id)
        {
            $sparepart = $this->Sparepart_Model->get_by_id($id);

            echo json_encode($sparepart);
        }
    }
    ?>
