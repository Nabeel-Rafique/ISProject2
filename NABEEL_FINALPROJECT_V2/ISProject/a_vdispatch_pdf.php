<?php
	function generateRow(){
		$contents = '';
		include_once('mainconfig.php');
		
 
		//use for MySQLi OOP
        $sql = "SELECT * FROM foodoritemdonationstatus ";
        

		$query = $con->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "

            <tr>
            <td>" . " <span class='block-email'>" . $row['id'] . "</span></td>
            <td>" . $row['selecteddestination'] . "</td>
            <td>" . $row['foodoritemdonated'] . "</td>
            <td>" . $row['dispatchdestination'] . "</td>
            <td>" . $row['donorid'] . "</td>
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
      	<h4>Dispatch Unit Status Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th  width="10%"><strong>ID </strong></th>
				<th width="20%"> <strong> Selected Destination</strong></th>
				<th width="15%" height="50%"> <strong>Item</strong></th>
			        <th width="25%"> <strong>Dispatch Destination </strong></th>
                    <th width="10%"> <strong>Donor ID</strong></th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('members.pdf', 'I');
 
 
?>