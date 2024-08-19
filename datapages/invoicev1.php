
    <style>
        .hidden {
            display: none;
        }
        .hidecolumn .dropdown-toggle::after {
         display: none;
        }
    </style>
<body>
    <div id="invoiceSec" style="display:none;">
        <div style="width:100%;" class="container-fluid">
            <div class="col-md-12 col-sm-8">
                <div class="card mb-4 mt-2 tablecard">

                    <div class="card-header pt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <h5 class="my-1 fw-bold text-primary">Invoice List</h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <b>Total Records : <span><?php echo $invoice_res_count ?></span></b>  
                        </div>
                       
                      </div>
                    </div>

                    <div class="card-body pt-1">

                     

                        <div class="table table-responsive">
                            <?php if (isset($invoice_res_data['data']) && count($invoice_res_data['data']) > 0) { ?>

                            <table style="width:100%" class="table table-striped" id="invoice_data">
                                <thead class="table-primary">
                                    <tr>
                                        <th>
                                          <div class="dropdown hidecolumn ">
                                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                              <i class="fa fa-eye"></i> 
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <li>
                                                <a class="dropdown-item d-none" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="0" checked></label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="1" checked> Invoice No</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="2" checked> Invoice Date</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="3" checked> Balance</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="4" checked> Debit Note Amount</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="5" checked> Debit Note Upload</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="6" checked> PO No/ Your Ref</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="7" checked> PO Date</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="8" checked> Payment Status</label>
                                                </a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="#">
                                                  <label><input type="checkbox" class="toggleColumn" data-column="9" checked> Added Time</label>
                                                </a>
                                              </li>
                                            </ul>
                                          </div>
                                        </th>
                                        <th>Invoice No</th>
                                        <th>Invoice Date</th>
                                        <th>Balance</th>
                                        <th>Debit Note Amount</th>
                                        <th>Debit Note File</th>
                                        <th>PO No/ Your Ref</th>
                                        <th>PO Date</th>
                                        <th>Payment Status</th>
                                        <th>Added Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($invoice_res_data['data'] as $record) { ?>
                                    <?php $url = "http://localhost/customerportal/datapages/invoices_report.php?ID=" . htmlspecialchars($record['ID']); ?>
                                    <tr>
                                        <td></td>
                                        <td><a href='<?php echo $url; ?>' target="_blank"><?php echo htmlspecialchars($record['Invoice_No']); ?></a></td>
                                        <td><?php echo htmlspecialchars($record['Invoice_Date']); ?></td>
                                        <td><?php echo htmlspecialchars($record['Balance']); ?></td>
                                        <td><?php echo htmlspecialchars($record['Debit_Note_Amount']); ?></td>
                                        <?php
                                        $Debit_Note_Upload = "";
                                        if($record["Debit_Note_Upload"] != "" && $record["Debit_Note_Upload"] != null) {
                                            $Debit_Note_Upload_FilePath = explode('?', $record['Debit_Note_Upload']);
                                            $Debit_Note_Upload = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/customer-invoice/User_Based_Customer_Invoice_Report/" . $record['ID'] . "/Debit_Note_Upload/image-download/qGBsx0MVrMwvj72BEKJZZymyGQHjDra2J1v7E9VGXqD8tBMr5mQ2wqKTEDp5J3HKhrUkHfMVwNAY8kfYCxZUSmus4qtsmbfQBuXY?" . $Debit_Note_Upload_FilePath[1];
                                        } 
                                        if($Debit_Note_Upload != null && $Debit_Note_Upload != "") {
                                        ?>
                                        <td class="text-center"><a href='<?php echo $Debit_Note_Upload; ?>' download><img src="http://localhost/customerportal/images/filedlod.png" width="35px"></a></td>
                                        <?php 
                                        } else {
                                        ?>
                                        <td style="cursor: not-allowed;" class="text-center"><img src="http://localhost/customerportal/images/nofile.png" width="35px"></td>
                                        <?php
                                        } ?>
                                        <td><?php echo htmlspecialchars($record['PO_Number_Your_Ref']); ?></td>
                                        <td><?php echo htmlspecialchars($record['PO_Date']); ?></td>
                                        <td><?php echo htmlspecialchars($record['Payment_Status']); ?></td>
                                        <td><?php echo htmlspecialchars($record['Added_Time']); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
                            <tr>
                                <td>No records found.</td>
                            </tr>
                            <?php } ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#invoice_data').DataTable();

            $('.toggleColumn').each(function() {
                var column = table.column($(this).data('column'));
                column.visible(true);
            });

            $('.toggleColumn').change(function() {
                var column = table.column($(this).data('column'));
                column.visible($(this).is(':checked'));
            });
        });
    </script>
</body>
</html>
