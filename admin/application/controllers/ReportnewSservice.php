<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class ReportnewSservice extends CI_Controller {
  function __construct()
  {
    parent::__construct();

    $this->load->model('Service_Model');

    
  }

  public function index()
  {

    $data['services'] = $this->Service_Model->GetAll();

    
    $this->layouts->view("Reports/sservicereport", $data);
  }


  public function sserviceReport()
  {    
    $services = $this->Service_Model->GetAll();

    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
            // Add a page
    $pdf->AddPage();

    $title = "<h2>Serice Type Services Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';

          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Code</th>
    <th style="border: 1px solid #000000; ">Type</th>
    <th style="border: 1px solid #000000; ">Cost</th>
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($services as $key => $service) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$service->code.'</td>
      <td style="border: 1px solid #000000; ">'.$service->type.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$service->cost.'</td>
      
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