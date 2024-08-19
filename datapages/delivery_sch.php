
<style>
  .dswidgets .card-body {
    min-height: 90px;
    padding: 0;
    background: #0070ba;
  }

  tr.table-secondary td {
    display: none;
    /* Hide all td elements by default */
  }

  tr.table-secondary td:first-child {
    display: table-cell;
    /* Display only the first td element */
  }

  .pd_br {
    padding-right: 5px;
    border-right: 1px solid #fff;
  }

  span.pd_br:last-child {
    border-right: 0px;
  }

  .pd_lft {
    padding-left: 10px;
  }
  a#showds span {
    color: #fff;
  }
  a#showds i {
    color: #fff;
  }
  li:has(> a#showds) {
    background: #0070ba;
  }
</style>

<div id="dsSec">
  <?php
  include '../header.php';
  include '../nav.php';
  include '../footer.php';
  $deliveryData = getDeliveryScheduleData();
  if (isset($deliveryData['not_yet_delivered']['data']) && $deliveryData['not_yet_delivered']['data'] != null || isset($deliveryData['delivered']['data']) && $deliveryData['delivered']['data'] != null) 
  {
    $totalDeliveredCount = 0;
    $totalNotDeliveredCount = 0;
    if(isset($deliveryData['not_yet_delivered']['data'])){
      $totalDeliveredCount = count($deliveryData['not_yet_delivered']['data']);
    }
    if(isset($deliveryData['delivered']['data'])){
      $totalNotDeliveredCount = count($deliveryData['delivered']['data']);
    }
    $totalDeliveryScheduleCount = $totalDeliveredCount + $totalNotDeliveredCount;
  ?>
    <!------------Delivery Schedule Sec ------------->
    <div style="width:100%;" class="container-fluid">
      <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">

          <div class="card-header pt-3">
            <div class="row">
              <div class="col-md-6">
                <h5 class="my-1 fw-bold text-primary">Delivery Schedule</h5>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <b>Total Records : <span><?php echo $totalDeliveryScheduleCount ?? 0 ?></span></b>
              </div>
            </div>
          </div>

          <div class="card-body pt-1 p-0">

            <div class="row mb-3 dswidgets px-3">

              <?php if ($summaryDetails['data'][0]['Units_in_delivered_EA'] != 0 || $summaryDetails['data'][0]['Units_in_delivered_KG'] != 0 || $summaryDetails['data'][0]['Units_in_delivered_MTS'] != 0) { ?>

              <div class="col-xl-4 col-md-4 mb-2">
                <a id="delivered">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body m-0 align-item-center justify-content-center d-flex">
                        <div class="row align-items-center w-100">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-uppercase mb-2 text-light"> Units Delivered</div>
                            <div class="h5 mb-0 fw-bold text-light">
                              <?php if (isset($summaryDetails['data'][0]['Units_in_delivered_EA']) && $summaryDetails['data'][0]['Units_in_delivered_EA'] != 0) : ?>
                                <span class="pd_br"><?php echo $summaryDetails['data'][0]['Units_in_delivered_EA'] ?? "-" ?> <small class="fs13"><?php echo "EA" ?></small></span>
                              <?php endif ?>
                              <?php if (isset($summaryDetails['data'][0]['Units_in_delivered_KG']) && $summaryDetails['data'][0]['Units_in_delivered_KG'] != 0) : ?>
                                <span class="pd_br"><?php echo $summaryDetails['data'][0]['Units_in_delivered_KG'] ?? "-" ?> <small class="fs13"><?php echo "kg" ?></small></span>
                              <?php endif ?>
                              <?php if (isset($summaryDetails['data'][0]['Units_in_delivered_MTS']) && $summaryDetails['data'][0]['Units_in_delivered_MTS'] != 0) : ?>
                                <span class="pd_br"><?php echo $summaryDetails['data'][0]['Units_in_delivered_MTS'] ?? "-" ?> <small class="fs13"><?php echo "Mts" ?></small></span>
                              <?php endif ?>
                            </div>
                            <div class="mt-2 mb-0 text-dark text-xs">
                              <!-- <span class="text-dark mr-2"> <i class="fa fa-arrow-up"></i> <b> 0 </b>  </span> <span> Records Since last month</span>   -->
                            </div>
                          </div>
                          <div class="col-auto icnCircle bg-transparent">
                            <i class="fas fa-truck fa-2x text-light"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <?php } ?>

              <?php if ($summaryDetails['data'][0]['Units_in_production_EA'] != 0 || $summaryDetails['data'][0]['Units_in_production_KG'] != 0 || $summaryDetails['data'][0]['Units_in_production_MTS'] != 0) { ?>

              <div class="col-xl-4 col-md-4 mb-2">
                <a id="notdelivered">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body m-0 align-item-center justify-content-center d-flex">
                        <div class="row no-gutters align-items-center w-100">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-uppercase mb-2 text-light"> Units under Production</div>
                            <div class="h5 mb-0 fw-bold text-light">
                              <?php if (isset($summaryDetails['data'][0]['Units_in_production_EA']) && $summaryDetails['data'][0]['Units_in_production_EA'] != 0) : ?>
                                <span class="pd_br"><?php echo $summaryDetails['data'][0]['Units_in_production_EA'] ?? "-" ?> <small class="fs13"><?php echo "EA" ?></small></span>
                              <?php endif ?>
                              <?php if (isset($summaryDetails['data'][0]['Units_in_production_KG']) && $summaryDetails['data'][0]['Units_in_production_KG'] != 0) : ?>
                                <span class="pd_br"><?php echo $summaryDetails['data'][0]['Units_in_production_KG'] ?? "-" ?> <small class="fs13"><?php echo "kg" ?></small></span>
                              <?php endif ?>
                              <?php if (isset($summaryDetails['data'][0]['Units_in_production_MTS']) && $summaryDetails['data'][0]['Units_in_production_MTS'] != 0) : ?>
                                <span class="pd_br"><?php echo $summaryDetails['data'][0]['Units_in_production_MTS']  ?? "-" ?> <small class="fs13"><?php echo "Mts" ?></small></span>
                              <?php endif ?>
                            </div>
                            <div class="mt-2 mb-0 text-dark text-xs">
                              <!--   <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> <b> ( ₹ 0 )</b> </span>  <span>Since last years</span>  -->
                            </div>
                          </div>
                          <div class="col-auto icnCircle bg-transparent">
                            <i class="fas fa-cog fa-2x text-light"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <?php } ?>

              <?php if ($summaryDetails['data'][0]['Avg_Acceptance_Rate'] != null && $summaryDetails['data'][0]['Avg_Acceptance_Rate'] != 0) { ?>

              <div class="col-xl-4 col-md-4 mb-2">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body m-0 align-item-center justify-content-center d-flex">
                          <div class="row no-gutters align-items-center w-100">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-uppercase mb-2 text-light"> Avg.Rate of Acceptance
                                </div>
                                <div class="h5 mb-0 fw-bold text-light"><?php echo $summaryDetails['data'][0]['Avg_Acceptance_Rate'] * 100 ?> %</div>
                                <div class="mt-2 mb-0 text-dark text-xs">                     <!--     <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> <b> ( ₹ 0 )</b> </span>  <span>Since last years</span>         -->               </div>
                            </div>
                            <div class="col-auto icnCircle bg-transparent">                        
                              <i class="fas fa-handshake fa-2x text-light"></i>                      
                            </div>
                          </div>
                      </div>
                    </div>
              </div>

              <?php } ?>

              <div class="table table-responsive">
                <?php if ((isset($deliveryData['not_yet_delivered']['data']) && count($deliveryData['not_yet_delivered']['data']) > 0 || isset($deliveryData['delivered']['data']) && count($deliveryData['delivered']['data']) > 0)) { ?>
                  <table style="width:100%" class="table table-striped" id="d_sch_combined">
                    <thead class="table-primary">
                      <tr>
                        <th><?php include 'eye.php' ?></th>
                        <th>Project No</th>
                        <th>Customer PO</th>
                        <th>Delivery Schedule Type</th>
                        <th>Part Names</th>
                        <th>Item Description / Item part No</th>
                        <th>Quantity Shipped to Customer</th>
                        <th>Customer Accepted Quantity</th>
                        <th>Unit</th>
                        <th>Planned Date of Delivery</th>
                        <th>Actual Date of Delivery</th>
                        <th>Quality Acceptance Rate Machinemaze</th>
                        <th>Supply Quality Docs</th>
                        <th>Shipping Document</th>
                        <th>Tracking Number</th>
                        <th>Delivery Address</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Not Delivered Section -->
                      <tr class="table-secondary">
                        <td colspan="16"><strong>Not Delivered</strong></td>
                      </tr>
                      <?php
                      if (isset($deliveryData['not_yet_delivered']['data']) && count($deliveryData['not_yet_delivered']['data']) > 0) {
                        foreach ($deliveryData['not_yet_delivered']['data'] as $record) {
                          if (isset($record)) { ?>
                            <tr>
                              <td></td>
                            <td><?php echo htmlspecialchars(isset($record['Project_Number']) && !empty($record['Project_Number']) ? $record['Project_Number'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Customer_PO1']['PO_Number']) && !empty($record['Customer_PO1']['PO_Number']) ? $record['Customer_PO1']['PO_Number'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Delivery_Schedule_Type']) && !empty($record['Delivery_Schedule_Type']) ? $record['Delivery_Schedule_Type'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Part_Names']['Part_Name']) && !empty($record['Part_Names']['Part_Name']) ? $record['Part_Names']['Part_Name'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Item_Description_Item_Part_No']) && !empty($record['Item_Description_Item_Part_No']) ? $record['Item_Description_Item_Part_No'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Qty']) && !empty($record['Qty']) ? $record['Qty'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Customer_Accepted_Quantity']) && !empty($record['Customer_Accepted_Quantity']) ? $record['Customer_Accepted_Quantity'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Unit']) && !empty($record['Unit']) ? $record['Unit'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Delivery_Date']) && !empty($record['Delivery_Date']) ? $record['Delivery_Date'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Actual_Date_of_Delivery']) && !empty($record['Actual_Date_of_Delivery']) ? $record['Actual_Date_of_Delivery'] : "-"); ?></td>
                              <?php
                              $Customer__Acceptance_Rate = 0;
                              if ($record['Customer_Accepted_Quantity'] != "" && $record['Customer_Accepted_Quantity'] != null) {
                                $Customer__Acceptance_Rate = $record['Customer_Accepted_Quantity'] / $record['Qty'] * 100;
                                $Customer__Acceptance_Rate = round($Customer__Acceptance_Rate, 2);
                              }
                              ?>
                              <td><?php echo htmlspecialchars($Customer__Acceptance_Rate ?? "-"); ?>%</td>
                              <td>-</td>
                              <?php
                              $Shipping_Document = "";
                              if ($record['Shipping_Document'] != "" && $record['Shipping_Document'] != null) {
                                $Shipping_Document_FilePath = explode('?', $record["Shipping_Document"]);
                                $Shipping_Document = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/machinemaze-project-management/Overall_Delivery_Schedule_Records/" . $record['ID'] . "/Shipping_Document/image-download/m29ONX2jbW3FUeK9NBqaFhjbxHvQJjWuGC9S5gbZW0MCpaAx9HXJWzDabBj5XuW1zps3f8d5Sk7Ty78dRxXXjS3GDDyKMe4wXtad?" . $Shipping_Document_FilePath[1];
                              }
                              if ($Shipping_Document != null && $Shipping_Document != "") {
                              ?>
                                <td>
                                  <a href='<?php echo $Shipping_Document; ?>' download><img src='../images/filedlod.png' width='35px'></a>
                                </td>
                              <?php } else { ?>
                                <td>-</td>
                              <?php } ?>
                              
                              <td><?php echo htmlspecialchars(isset($record['Tracking_Number']) && !empty($record['Tracking_Number']) ? $record['Tracking_Number'] : "-"); ?></td>
                              <td><?php echo htmlspecialchars(isset($record['Delivery_Address']['zc_display_value']) && !empty($record['Delivery_Address']['zc_display_value']) ? $record['Delivery_Address']['zc_display_value'] : "-"); ?></td>
                            </tr>
                        <?php }
                        }
                      } else { ?>
                        <tr>
                          <td colspan="16" class="text-center">
                            <p>No Records Found!</p>
                            <!-- <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;"> -->
                          </td>
                        </tr>
                      <?php } ?>

                      <!-- Delivered Section -->

                      <?php if (isset($deliveryData['delivered']['data']) && count($deliveryData['delivered']['data']) > 0) { ?>
                        <tr class="table-secondary">
                          <td colspan="16"><strong>Delivered</strong></td>
                        </tr>
                        <?php foreach ($deliveryData['delivered']['data'] as $record) { ?>
                          <tr>
                            <td></td>
                            <td><?php echo htmlspecialchars(isset($record['Project_Number']) && !empty($record['Project_Number']) ? $record['Project_Number'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Customer_PO1']['PO_Number']) && !empty($record['Customer_PO1']['PO_Number']) ? $record['Customer_PO1']['PO_Number'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Delivery_Schedule_Type']) && !empty($record['Delivery_Schedule_Type']) ? $record['Delivery_Schedule_Type'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Part_Names']['Part_Name']) && !empty($record['Part_Names']['Part_Name']) ? $record['Part_Names']['Part_Name'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Item_Description_Item_Part_No']) && !empty($record['Item_Description_Item_Part_No']) ? $record['Item_Description_Item_Part_No'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Qty']) && !empty($record['Qty']) ? $record['Qty'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Customer_Accepted_Quantity']) && !empty($record['Customer_Accepted_Quantity']) ? $record['Customer_Accepted_Quantity'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Unit']) && !empty($record['Unit']) ? $record['Unit'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Delivery_Date']) && !empty($record['Delivery_Date']) ? $record['Delivery_Date'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Actual_Date_of_Delivery']) && !empty($record['Actual_Date_of_Delivery']) ? $record['Actual_Date_of_Delivery'] : "-"); ?></td>

                            <?php
                            $Customer__Acceptance_Rate = 0;
                            if ($record['Customer_Accepted_Quantity'] != "" && $record['Customer_Accepted_Quantity'] != null) {
                              $Customer__Acceptance_Rate = $record['Customer_Accepted_Quantity'] / $record['Qty'] * 100;
                              $Customer__Acceptance_Rate = round($Customer__Acceptance_Rate, 2);
                            }
                            ?>
                            <td><?php echo htmlspecialchars($Customer__Acceptance_Rate ?? "-"); ?>%</td>
                            <td>-</td>
                            <?php
                            $Shipping_Document = "";
                            if ($record['Shipping_Document'] != "" && $record['Shipping_Document'] != null) {
                              $Shipping_Document_FilePath = explode('?', $record["Shipping_Document"]);
                              $Shipping_Document = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/machinemaze-project-management/Overall_Delivery_Schedule_Records/" . $record['ID'] . "/Shipping_Document/image-download/m29ONX2jbW3FUeK9NBqaFhjbxHvQJjWuGC9S5gbZW0MCpaAx9HXJWzDabBj5XuW1zps3f8d5Sk7Ty78dRxXXjS3GDDyKMe4wXtad?" . $Shipping_Document_FilePath[1];
                            }
                            if ($Shipping_Document != null && $Shipping_Document != "") {
                            ?>
                              <td class="text-center"><a href='<?php echo $Shipping_Document; ?>' download><img src='../images/filedlod.png' width='35px'></a></td>
                            <?php } else { ?>
                              <td>-</td>
                            <?php } ?>
                            <td><?php echo htmlspecialchars(isset($record['Tracking_Number']) && !empty($record['Tracking_Number']) ? $record['Tracking_Number'] : "-"); ?></td>
                            <td><?php echo htmlspecialchars(isset($record['Delivery_Address']['zc_display_value']) && !empty($record['Delivery_Address']['zc_display_value']) ? $record['Delivery_Address']['zc_display_value'] : "-"); ?></td>
                          </tr>
                        <?php }
                      } else { ?>
                        <tr>
                          <td colspan="16" class="text-center">
                            <p>No Records Found!</p>
                            <!-- <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;"> -->
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php 
                  } else{
                      ?> <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;"> <?php
                  } ?>
              </div>

            </div>

           

          </div>

        </div>
      </div>
      <!------------------------------------->
    </div>
  <?php } else { ?>
    <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
  <?php } ?>
</div>

<script>
  $(document).ready(function() {
    // Check if #d_sch_combined exists
    if ($('#d_sch_combined').length > 0) {
      var table = $('#d_sch_combined').DataTable();

      // Show all columns initially
      $('.toggleColumn_d').each(function() {
        var column = table.column($(this).data('column'));
        column.visible(true);
      });

      // Toggle column visibility based on checkbox change
      $('.toggleColumn_d').change(function() {
        var column = table.column($(this).data('column'));
        column.visible($(this).is(':checked'));
      });
    } else {
      console.error('#d_sch_combined element not found.');
    }
  });



  // $("#delivered").click(function(){
  //   $("#showdelivered").show();
  //   $("#shownotdelivered").hide();
  // });

  // $("#notdelivered").click(function(){
  //   $("#shownotdelivered").show();
  //   $("#showdelivered").hide();
  // });

  $(document).ready(function() {
    $('#status').on('change', function() {
      if (this.value == 'notdelivered') {
        $("#shownotdelivered").show();
        $("#showdelivered").hide();
      } else if (this.value == 'delivered') {
        $("#showdelivered").show();
        $("#shownotdelivered").hide();
      }
    });
  });

$.fn.dataTable.ext.errMode = 'none';

$('#d_sch_combined').on('error.dt', function(e, settings, techNote, message) {
    console.log('An error has been reported by DataTables: ', message);
}).DataTable();

</script>