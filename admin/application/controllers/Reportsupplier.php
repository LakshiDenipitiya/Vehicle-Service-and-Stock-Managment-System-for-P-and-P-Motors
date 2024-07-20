<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Reportsupplier extends CI_Controller {
  function __construct()
  {
    parent::__construct();

    $this->load->model('Supplier_Model');

    
  }

  public function index()
  {

    $data['suppliers'] = $this->Supplier_Model->GetAll();

    
    $this->layouts->view("Reports/supplierreport", $data);
  }


  public function supplierReport()
  {    
    $suppliers = $this->Supplier_Model->GetAll();

    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
            // Add a page
    $pdf->AddPage();

    $title = "<h2>Supplier Details </h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';

          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Code</th>
    <th style="border: 1px solid #000000; ">Company Name</th>
    <th style="border: 1px solid #000000; ">Address</th>
    <th style="border: 1px solid #000000; ">Phone No</th>
    <th style="border: 1px solid #000000; ">Fax No</th>
    <th style="border: 1px solid #000000; ">Email</th>
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($suppliers as $key => $supplier) {
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$supplier->code.'</td>
      <td style="border: 1px solid #000000; ">'.$supplier->companyname.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->no.'&nbsp;,'.$supplier->lane.'&nbsp;,'.$supplier->city.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->phoneno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->faxno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$supplier->email.'</td>
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