<?php require_once "controllerDonorData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM donortable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: donorresetcode.php');
            }
        } else {
            header('Location: donor-otp.php');
        }
    }
} else {
    header('Location: donorlogin.php');
}
?>
<?php
	function generateRow(){
		$contents = '';
		include_once('mainconfig.php');
		
 
		//use for MySQLi OOP
        $sql = "SELECT * FROM Aiddonations where donorid='$user_id'";
        

		$query = $con->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "

            <tr>
         <td>" . " <span class='block-email'>" . $row['id'] . "</span></td>
            <td>" . $row['itemname'] . "</td>
            <td> <img id='campaignimage' src='" . $row['itemimage'] . "'/> </td>
            <td>" . $row['itemdescription'] . "</td>
            <td>" . $row['location'] . "</td>
            <td>" . $row['itemquantity'] . "</td>
             <td>" . $row['itemstatus'] . "</td>
            
             </tr>";		
		}
		return $contents;
	}
 
	require_once('tcpdf/tcpdf.php'); 
    
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("The Funding Network");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    
    $pdf->AddPage();  
    $content = '';  
    $content .= '

    <div class="mb-0 site-logo"><img src="Images/logo.jpg" alt="Funding Network"></div>
      	<h2 align="center">The Funding Network</h2>
      	<h4>Item Donation Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th  width="10%"><strong>ID </strong></th>
				<th width="20%"> <strong> Item Name</strong></th>
				<th width="15%"> <strong>Item Image</strong></th>
                <th width="25%"> <strong>Item Description</strong></th>
                <th width="15%"> <strong>Item Location</strong></th>
                <th width="10%"> <strong>Quantity</strong></th>
			        <th width="10%"> <strong>Status</strong></th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('members.pdf', 'I');
 
 
?>