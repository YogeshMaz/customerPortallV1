<div id="pfSec" style="display: none;">
  <!------------Partner Financial Sec------------->
  <?php $partner_f_res_data = partnerFinancial();
  if (isset($partner_f_res_data['data']) && $partner_f_res_data['code'] === 3000) { ?>
    <div style="width:100%;" class="container-fluid">
      <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">

          <div class="card-header pt-3 d-flex justify-content-between">
            <h5 class="my-1 fw-bold text-primary">Partner Financial</h5>
            <b>Total Records : <span><?php echo $partner_f_res_data['data'] ?></span></b>
          </div>

          <div class="card-body pt-1">

            <div class="table table-responsive">

              <table style="width:100%" class="table table-striped" id="partnerf_datatable">
                <thead class="table-primary">
                  <tr>
                    <th>Added User</th>
                    <th>Added Time</th>
                    <th>Payment Status</th>
                    <th>Type</th>
                    <th>Project Details</th>
                    <th>Partner Organization Name</th>
                    <th>Invoice Date</th>
                    <th>Invoice Number</th>
                    <th>Sub Total Before Tax</th>
                    <th>IGST on Invoice</th>
                    <th>CGST on Invoice</th>
                    <th>SGST on Invoice</th>
                    <th>Total Tax Sum:(CGST+SGST+IGST)</th>
                    <th>Invoice Amount (Including Tax)</th>
                    <th>Debit Note Amount</th>
                    <th>Actual Amount (Invoice Amount- DN)</th>
                    <th>Upload Invoice</th>
                    <th>Upload Proforma Invoice</th>
                    <th>ID</th>
                    <th>Search for MM PO</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($partner_f_res_data['data'] as $record) { ?>
                    <tr>
                      <td><?php echo htmlspecialchars($record['Added_User'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Added_Time'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Payment_Ststus'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Type'] ?? "-"); ?></td>
                      <td><?php //echo htmlspecialchars($record['Project_Details'] ?? "-"); 
                          ?></td>

                      <td><?php echo htmlspecialchars($record['Partner_Organization_Name'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Invoice_Date'] ?? "-"); ?></td>

                      <td><?php echo htmlspecialchars($record['Invoice_Number'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Sub_Total_Before_tax'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['IGST_on_Invoice'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['CGST_on_Invoice'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['SGST_on_Invoice'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Total_Tax_Sum_CGST_SGST_IGST'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Invoice_Amount_Including_Tax'] ?? "-"); ?></td>

                      <td><?php echo htmlspecialchars($record['Debit_Note_Amount'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Actual_Amount_Invoice_Amount_Balance'] ?? "-"); ?></td>

                      <?php
                      $pattern = "/[?\s:]/";
                      $components_Upload_Invoice_Jpeg_PDF_Word_Exce = "";
                      if ($record["Upload_Invoice_Jpeg_PDF_Word_Exce"] != null) {
                        $components_Upload_Invoice_Jpeg_PDF_Word_Exce = preg_split($pattern, $record["Upload_Invoice_Jpeg_PDF_Word_Exce"]);
                      }
                      $filePathOfUploadInvoice = $components_Upload_Invoice_Jpeg_PDF_Word_Exce[1] ?? "-";  ?>
                      <td>
                        <?php
                        if (($record["Upload_Invoice_Jpeg_PDF_Word_Exce"] != null)) {
                          echo "<a href='https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/purchase-application/All_Invoices/" .
                            $record['ID'] .
                            "/Upload_Invoice_Jpeg_PDF_Word_Exce/image-download/UsWCZgrXmpzrHTOg6kSf0AMFwNhk88zyPHmBXsGrZWv4KkXVF0rBvwWyzhNYEvpUqjTqQ1pE5muATAAxwPn3kk61keCgrZ273WqQ?" .
                            $filePathOfUploadInvoice .
                            "'>Download Invoice</a>";
                        } else {
                          echo "No file";
                        }
                        ?>
                      </td>
                      <?php
                      $pattern = "/[?\s:]/";
                      $components_Upload_Proforma_Invoice = "";
                      if ($record["Upload_Proforma_Invoice"] != null) {
                        $components_Upload_Proforma_Invoice = preg_split($pattern, $record["Upload_Proforma_Invoice"]);
                      }
                      $Upload_Proforma_Invoice = $components_Upload_Proforma_Invoice[1] ?? "";  ?>
                      <td>
                        <?php
                        if (($record["Upload_Proforma_Invoice"] != null)) {
                          echo "<a href='https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/purchase-application/All_Invoices/" .
                            $record['ID'] .
                            "/Upload_Proforma_Invoice/image-download/UsWCZgrXmpzrHTOg6kSf0AMFwNhk88zyPHmBXsGrZWv4KkXVF0rBvwWyzhNYEvpUqjTqQ1pE5muATAAxwPn3kk61keCgrZ273WqQ?" .
                            $Upload_Proforma_Invoice .
                            "'>Download Proforma</a>";
                        } else {
                          echo "No File!";
                        }
                        ?>
                      </td>
                      <td><?php echo htmlspecialchars($record['ID'] ?? "-"); ?></td>
                      <td><?php //echo htmlspecialchars($record['Search_for_MM_PO'] ?? "-"); 
                          ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>



            </div>

          </div>

        </div>
      </div>
    </div>
  <?php } else { ?>
    <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
  <?php } ?>
  <!------------------------------------->
</div>
<script>
  new DataTable('#partnerf_datatable');
</script>