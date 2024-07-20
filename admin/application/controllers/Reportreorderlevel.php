<?php require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Reportreorderlevel extends CI_controller{

	function __construct()
  {
    parent::__construct();

    $this->load->model('Stock_Model');
    $this->load->model('Sparepart_Model');
  }
   public function reorderLevel()
  { 
    $data['stockList'] = $this->Stock_Model->GetAllwithDetails();

    if ($stockList->currentstocklevel <= $stockList->reorderlevel ) {
       $this->layouts->view("Reports/reorderlevel_Report");
    }

  }

  public function reorderlevelReport(){

   $data['stockList'] = $this->Stock_Model->GetAllwithDetails();

    if ($stockList->currentstocklevel <= $stockList->reorderlevel ) {

       $this->layouts->view("Reports/reorderlevel_Report");
    }

    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
            // Add a page
    $pdf->AddPage();

    $title = "<h2>Re order level stock Report</h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';

          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Code</th>
    <th style="border: 1px solid #000000; ">Spare part</th>
    <th style="border: 1px solid #000000; ">Current Stock Level</th>
    <th style="border: 1px solid #000000; ">Last GRN No</th>
    <th style="border: 1px solid #000000; ">Last GRN Price</th>
    <th style="border: 1px solid #000000; ">Last GRN Date</th>
   
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($stockList as $key => $stock) {

    
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$stock->code.'</td>
      <td style="border: 1px solid #000000; ">'.$stock->sparepart.'</td>
      <td style="border: 1px solid #000000; text-align:left">'.$stock->currentstocklevel.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$stock->lastgrnno.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$stock->lastgrnprice.'</td>
       <td style="border: 1px solid #000000; text-align:center">'.$stock->lastgrndate.'</td>

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