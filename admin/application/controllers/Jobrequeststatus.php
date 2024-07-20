<?php require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Jobrequeststatus extends CI_controller{

	function __construct()
  {
    parent::__construct();

    $this->load->model('Jobrequest_Model');
  }
  public function serviceStatus()
  {
    if (isset($_GET["status"])) {
      $status_type = $_GET["status"];
    }else{
      $status_type = 'All';
    }

//Get all the status_type if the status_type =all
    if ($status_type == 'All') {
      $data['statusList'] = $this->Jobrequest_Model->GetAll();
    }else{
//Else get status type relevant data from the Jobrequest_Model getJobrequestByStatus method
      $data['statusList'] = $this->Jobrequest_Model->getJobrequestByStatus($status_type);
    }
    
    $data['statusType'] = $status_type;
    
    $this->layouts->view("Reports/jobrequeststatus_Report",$data);

    /*var_dump($data['statusList'] );
    die();*/
  }

  public function serviceStatusReport(){

    if (isset($_GET["status"])) {
      $status_type = $_GET["status"];
    }else{
      $status_type = 'All';
    }
//Get all the status_type if the status_type =all
    if ($status_type == 'All') {
     $statusList= $this->Jobrequest_Model->GetAll();
   }else{
//Else get status type relevant data from the Jobrequest_Model getJobrequestByStatus method
    $statusList= $this->Jobrequest_Model->getJobrequestByStatus($status_type);
  }

  $this->load->library("Pdf");
  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetCreator(PDF_CREATOR);
            // Add a page
  $pdf->AddPage();

  $title = "<h2>Jobrequest Status Report</h2>";
  $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
  $tbl_footer = '</table>';
  $tbl = '';

          // foreach item in your array...
  $tbl .= '
  <thead>
  <tr>
  <th style="border: 1px solid #000000; ">No</th>
  <th style="border: 1px solid #000000; ">Vehicle No</th>
  <th style="border: 1px solid #000000; ">Employee Name</th>
  <th style="border: 1px solid #000000; ">Meter Reading</th>
  <th style="border: 1px solid #000000; ">Status</th>


  </tr>
  </thead>
  ';
  $tbl .= '<tbody>';
  foreach ($statusList as $key => $status) {

    switch ($status->status) {
            case '1':
            $stat = "Not Started";
            break;
            case '2':
            $stat = "In-progress";
            break;
            case '3':
            $stat = "Completed";
            break;
            default:
            break;

}
    $tbl .= '
    <tr>
    <td style="border: 1px solid #000000; ">'.$status->id.'</td>
    <td style="border: 1px solid #000000; ">'.$status->vehicleno.'</td>
    <td style="border: 1px solid #000000; text-align:left">'.$status->firstname.'&nbsp; '.$status->lastname.'</td>
    <td style="border: 1px solid #000000; text-align:center">'.$status->meterreading.'</td>
    <td style="border: 1px solid #000000; text-align:center">'.$stat.'</td>

    </tr>
    ';
  }
  $tbl .= '</tbody>';

  $tbl=utf8_encode($tbl);
  $pdf->writeHTML($title. $tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
            // $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output();



}

}
?>