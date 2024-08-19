<?php include '../header.php' ?>

<style>
    @media print {
	  body { 
		page-break-after: always;
        font-size: 7pt; /* Example font size */
	  }

      .noPrint{
            display:none;
        }
        #profileSec li span:first-child{
            min-width:max-content;
        }

	   @page {
			size: auto;
			margin: 0mm; 
			margin-top: 0;
			margin-bottom: 0;
			/* @top-center {
				content: none; 
			}
			@bottom-center {
				content: none; 
			} */
		}
  	}

      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .invoice {
            width: 95%;
            max-width: 800px;
            margin: 10px auto;
            background-color: #fff;
            padding: 2px 2px 2px 2px;
            border: 1px solid black;
        }
        .invoice-header {
            margin: 0 10px 0 10px;
			width: 100%;
        }
        .invoice-title {
            font-size: 24px;
            margin: 0 10px 0px 0;
			
        }
        .invoice-address table{
            border-collapse: collapse;
            width: 100%;
			border: 1px solid #eee;
        }
        .invoice-address table p{
            font-size: 12px;
            margin: 10px;
        }
        .invoice-details {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .invoice-details table {
            border-collapse: collapse;
            margin: 5px 10px 0 10px;
            width: 100%;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
			font-size: 12px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .invoice-total {
            text-align: right;
            font-weight: bold;
        }
        .invoice-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 14px;
        }
        .Total-in-words {
            align-content: baseline;
        }
        .Total-in-words p {
            margin: 10px;
        }
</style>

<?php
    require_once '../getdata.php';
    if(isset($_GET['ID'])) {
        $id = htmlspecialchars($_GET['ID']);
        $invoice_data = return_invoices_report_id($id);
        $branch = $invoice_data['GST_Applicable']['Location'];
        $gst_details = getGSTNumbers($branch);
        // echo "ID from URL: " . json_encode($itemDetails);
    } else {
        echo "Template ID not found";
    }
?>

<body>
    <div class="invoice">
        <table class="invoice-header">
            <th><img src="https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/customer-invoice/All_Org_Data/88342000001640019/Image/image-download/YfvzyEv0WUzVU0MVTC9UWsXge5UYqTexbQFDVDxrwAAwYmstm6JZSOqpFNB310Bhpsgu1zQ2VdpaC7GPjBwAq8EaeUYWW40Y8tTE?filepath=1654833412043_MM.jpeg" height="50" width="50" /></th>
            <th style="text-align: justify;"><span style="font-size: 12px; font-weight: 600;">
                <h2>MachineMaze Integration Services Pvt Ltd </h2>
				<span><?php echo $gst_details['Address']['address_line_1'] ?? "" ?> <?php echo $gst_details['Address']['address_line_2'] ?? "" ?> </span> <br>
				<span><?php echo $gst_details['Address']['district_city'] ?> , </span> <br>
				<span><?php echo $gst_details['Address']['postal_code'] ?> , <?php echo $gst_details['Address']['state_province'] ?></span> <br>
				<span><?php echo $gst_details['Address']['country'] ?> </span> <br>
				<span>GST : <?php echo $gst_details['GST_No'] ?> </span>
            </span>
        </th>
            <th style="align-content: end; margin-right: 10px;"><h4 class="invoice-title">TAX INVOICE</h4></th>
        </table>
        <hr>
		
		<tr>
			<td colspan="3" border="0">
				<table border="1" style="width: 100%; border-collapse: collapse; border: 1px solid #eee;">
					<tbody>
						<tr>
							<td style="width: 50%;">
						<table border="0" style="margin-left: 5px;">
							<tbody>
							<tr>
								<td>Invoice# </td>
								<td>: <strong><?php echo $invoice_data["Invoice_No"] ?? "-" ?></strong></td>
							</tr>
							<tr>
								<td>Invoice Date </td>
								<td>: <strong><?php echo $invoice_data["Invoice_Date"] ?? "-" ?></strong></td>
							</tr>
							<tr>
								<td>Terms</td>
								<td>: <strong><?php echo $invoice_data["Payment_terms"] ?? "-" ?></strong></td>
							</tr>
							<tr>
								<td>Due Date</td>
								<td>: <strong><?php echo $invoice_data["Payment_Due_Date"] ?? "-" ?></strong></td>
							</tr>
						</tbody></table>
					</td>
					<td style="width: 50%;">
						<table>
							<tbody>
								<tr>
									<td>Place Of Supply </td>
									<td>: <strong><?php echo $invoice_data["Branch_Source_of_Supply"] ?? "-" ?></strong></td>
								</tr>
								<tr>
									<td>PO Number </td>
									<td>: <strong><?php echo $invoice_data["Customer_PO"]["PO_Number"] ?? "-" ?></strong></td>
								</tr>
                            </tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
			</td>
		</tr>

        <div class="invoice-address">
            <tr>
                <td colspan="3" style="padding: 0;">
                    <table border="1">
                        <thead bgcolor="#f2f2f2">
                            <tr>
                                <th style="width: 48%;">Bill To</th>
                                <th>Ship To</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
							<p><strong><?php echo $invoice_data["Name_To_Bill"]["zc_display_value"] ?? "-" ?></strong> <br>
								<?php echo $invoice_data["Bill_To"]["address_line_1"] ?? "-" ?> <br>
								<?php echo $invoice_data["Bill_To"]["address_line_2"] ?? "-" ?> <br>
								<?php echo $invoice_data["Bill_To"]["district_city"] ?? "-" ?> <br>
								<?php echo $invoice_data["Bill_To"]["postal_code"] ?? "-" ?> <?php echo $invoice_data["Bill_To"]["state_province"] ?? "-" ?> <br>
								<?php echo $invoice_data["Bill_To"]["country"] ?? "-" ?> <br>
								GSTIN <?php echo $invoice_data["GST_Applicable"]["ID"] ?? "-" ?></p>
                            </td>
                            <td>
							<p><strong><?php echo $invoice_data["Name_To_Ship"] ?? "-" ?></strong> <br>
								<?php echo $invoice_data["Ship_To"]["address_line_1"] ?? "-"  ?><br>
								<?php echo $invoice_data["Ship_To"]["address_line_2"] ?? "-"  ?><br>
								<?php echo $invoice_data["Ship_To"]["district_city"] ?? "-"  ?><br>
								<?php echo $invoice_data["Ship_To"]["postal_code"] ?? "-"  ?> <?php echo $invoice_data["Ship_To"]["state_province"] ?? "-"  ?><br>
								<?php echo $invoice_data["Ship_To"]["country"] ?? "-"  ?><br>
								GSTIN <?php echo $invoice_data["GST_Applicable"]["ID"] ?? "-"   ?></p>
                            </td>
                        </tr>
                    </table>
                </td>
              </tr>
              <tr>
        </div>
        <div class="invoice-address">
            <tr>
                <td colspan="3" style="padding: 0;">
                    <table border="1">
                        <thead bgcolor="#f2f2f2">
                            <tr>
                                <th style="width: 48%;"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
							<p> <strong>Customer GST : </strong> <?php echo $invoice_data["Customer_GST"] ?? "-" ?> <br>
                            <strong>State Code : </strong> <?php echo $invoice_data["STATE_CODE"] ?? "-" ?> <br></p>
                            </td>
                            <td>
							<p> <strong>Customer CIN Number : </strong> <?php echo $invoice_data["Customer_CIN_Number"] ?? "-"  ?><br>
							<strong>Place of Supply : </strong>	<?php echo $invoice_data["Place_of_Supply1"] ?? "-"  ?><br></p>
                            </td>
                        </tr>
                    </table>
                </td>
              </tr>
              <tr>
        </div>
        <div class="table table-responsive">
        <table class="invoice-table">
            <thead>
                <tr bgcolor="#f2f2f2">
                    <th rowspan="2">#</th>
					<th rowspan="2">Item Name & Description</th>
                    <th rowspan="2">HSN</th>
                    <th rowspan="2">Quantity</th>
                    <th rowspan="2">Unit Price</th>
                    <th rowspan="2">Taxable Value</th>
					<th style="text-align: center;" colspan="3">Tax / Unit</th>
                </tr>
				<tr bgcolor="#f2f2f2" style="border: none;">
					<th>IGST/ Unit</th>
					<th>SGST/ Unit</th>
                    <th>CGST/ Unit</th>
                </tr>
            </thead>
            <tbody>
<!-- <%
	totalInWords = thisapp.total_in_words(invoice.Round_off_Total);
	totalInWords = totalInWords.proper();
	s_no = 0;
	for each  each_item_details in invoice.Item_Details
	{
		s_no = s_no + 1;
		GSTPercentage = thisapp.GST_Master.Return_GST_Number(each_item_details.Tax);
		TaxableAmount = GSTPercentage / 100 * each_item_details.Amount;
		 ?> -->
         <tbody>
         <?php
            $s_no = 0;
            foreach ($invoice_data['Item_Details'] as $itemDetRecord):
            $s_no = $s_no + 1;
            $itemDetails = return_item_details($itemDetRecord['ID']);
            ?>
            <tr>
                    <td style="text-align: center;"><?php echo $s_no ?></td>
					<td style="text-align: center;"><?php echo $itemDetails['Item_Name'] ?? "-" ?></td>
					<td style="text-align: left;"><?php echo $itemDetails['HSN'] ?? "-" ?></td>
					<td style="text-align: center;"><?php echo $itemDetails['Quantity'] ?></td>
					<td style="text-align: left;"> <span> <?php echo $itemDetails['Unit_Price'] ?></td>
					<td style="text-align: center;"><?php echo $itemDetails['Taxable_Value'] ?></td>
					<td style="text-align: center;"><?php echo $itemDetails['IGST_Unit'] ?></td>
					<td style="text-align: left;"><?php echo $itemDetails['SGST_Unit'] ?></td>
					<td style="text-align: center;"><?php echo $itemDetails['CGST_Unit'] ?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
					<td colspan="8" style="text-align: right;"> <strong> Sub Total </strong> </td>
					<td style="text-align: right;"> <?php echo $invoice_data['Sub_Total_Amount'] ?> </td>
            </tr>
               
</tbody>
</table>
</div>
</div>

</body>