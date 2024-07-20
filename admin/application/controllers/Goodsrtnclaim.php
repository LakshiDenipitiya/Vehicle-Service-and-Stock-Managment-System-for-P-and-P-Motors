<?php require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Goodsrtnclaim extends CI_controller{

	function __construct()
  {
    parent::__construct();

    $this->load->model('Goodsreturnnotice_Model');
  }
   public function grtnClaim()
  {
    if (isset($_GET["isclaim"])) {
      $claim_type = $_GET["isclaim"];
    }else{
      $claim_type = 'All';
    }
//Get all the grtn if the isclaimList =all
    if ($claim_type == 'All') {
      $data['isclaimList'] = $this->Goodsreturnnotice_Model->GetAll();
    }else{
//Else get grtn relevant data from the Goodsreturnnotice_Model getPackageByType method
      $data['isclaimList'] = $this->Goodsreturnnotice_Model->getGoodrtnByClaim($claim_type);
    }
    
$data['claimType'] = $claim_type;

/*var_dump($data);
die();*/
    
    $this->layouts->view("Reports/GoodsRtnclaim_Report",$data);


  }

  public function grtnClaimReport(){

    if (isset($_GET["isclaim"])) {
      $claim_type = $_GET["isclaim"];
    }else{
      $claim_type = 'All';
    }
//Get all the grtn if the isclaimList =all
    if ($claim_type == 'All') {
     $isclaimList= $this->Goodsreturnnotice_Model->GetAll();
    }else{
//Else get grtn relevant data from the Goodsreturnnotice_Model getPackageByType method
      $isclaimList= $this->Goodsreturnnotice_Model->getGoodrtnByClaim($claim_type);
    }

    $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
            // Add a page
    $pdf->AddPage();

    $title = "<h2>Goods Return Report</h2>";
    $tbl_header = '<table style="width: 550px;" cellspacing="0">';  
    $tbl_footer = '</table>';
    $tbl = '';

          // foreach item in your array...
    $tbl .= '
    <thead>
    <tr>
    <th style="border: 1px solid #000000; ">Code</th>
    <th style="border: 1px solid #000000; ">Category of Spare part</th>
    <th style="border: 1px solid #000000; ">Quantity</th>
    <th style="border: 1px solid #000000; ">Reasons for Return</th>
    <th style="border: 1px solid #000000; ">Return Date</th>
    <th style="border: 1px solid #000000; ">Claimed or Not</th>
    
    </tr>
    </thead>
    ';
    $tbl .= '<tbody>';
    foreach ($isclaimList as $key => $isclaim) {
      switch ($isclaim->isclaim) {
            case '1':
            $stat = "No";
            break;
            case '2':
            $stat = "Yes";
            break;
            default:
            break;
          }
    
      $tbl .= '
      <tr>
      <td style="border: 1px solid #000000; ">'.$isclaim->code.'</td>
      <td style="border: 1px solid #000000; ">'.$isclaim->categoryofsparepart.'</td>
      <td style="border: 1px solid #000000; text-align:left">'.$isclaim->quantity.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$isclaim->reasonforreturn.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$isclaim->returndate.'</td>
      <td style="border: 1px solid #000000; text-align:center">'.$isclaim->isclaim.'</td>

      </tr>
      ';
    }
    $tbl .= '</tbody>';

    $tbl=utf8_encode($tbl);
    $pdf->writeHTML($title. $tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
            // $pdf->writeHTML($html, true, false, true, false, '');
    ob_end_clean();
    $pdf->Output();



  }
  
}
?>