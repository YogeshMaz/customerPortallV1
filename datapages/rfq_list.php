<?php
include '../header.php';
include '../nav.php';
include '../footer.php';
?>

<style>
  a#yourrfq span {
    color: #fff;
  }
  a#yourrfq i {
    color: #fff;
  }
  li:has(> a#yourrfq) {
    background: #0070ba;
  }
  a#yourrfq.dropdown-toggle::after {
    color: #fff !important;
  }
</style>

<div id="rfqlistsec">
  <!------------Rfq List Sec------------->
  <?php
  $resData = getRFQData();
//   print_r("get data" . json_encode($resData));
  if (isset($resData) && $resData != "" && isset($resData['data']) && count($resData['data']) > 0) {  ?>
    <div style="width:100%;" class="container-fluid">
      <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">

          <div class="card-header pt-3">
            <div class="row">
              <div class="col-md-6">
                <h5 class="my-1 fw-bold text-primary">RFQ List</h5>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <b>Total Records : <span><?php echo count($resData['data']) ?? 0 ?></span></b>
              </div>
            </div>
          </div>


          <div class="card-body pt-1">

            <div class="table table-responsive">

              <table style="width:100%" class="table table-striped" id="example">
                <thead class="table-primary">
                  <tr>
                    <th>
                      <div class="dropdown hidecolumn">
                        <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-eye"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li>
                            <a class="dropdown-item d-none" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="0" checked></label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="1" checked> RFQ Reference No</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="2" checked> Part No: Description</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="3" checked> Target Price/ Unit Quantity</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="4" checked> Total Order</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="5" checked> RFQ Start Date </label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="6" checked> RFQ End Date</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_rfql" data-column="7" checked> Manager Email</label>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th>RFQ Reference No</th>
                    <th>Part No: Description</th>
                    <th>Target Price/ Unit Quantity</th>
                    <th>Total Order</th>
                    <th>RFQ Start Date</th>
                    <th>RFQ End Date</th>
                    <th>Manager Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($resData['data'] as $record) { ?>
                    <tr>
                      <td></td>
                      <td><?php echo htmlspecialchars($record['RFQ_Reference_Number'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Part_Number_Description'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Target_Price_Unit_Quantity'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Total_Order_Value'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['RFQ_Start_Date'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['RFQ_End_Date'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Manager_Email'] ?? "-"); ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>

          <?php } else { ?>
            
            <div style="width:100%;" class="container-fluid">
              <div class="col-md-12 col-sm-8">
                <div class="card mb-4 mt-2 tablecard">

                  <div class="card-header pt-3">
                    <div class="row">
                      <div class="col-md-6">
                        <h5 class="my-1 fw-bold text-primary">RFQ List</h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-end">
                        <b>Total Records : <span>0</span></b>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-1">
                    <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
                  <?php } ?>
               </div>

        </div>
      </div>
    </div>


    <!------------------------------------->
</div>

<script>
  $(document).ready(function() {
    var table = $('#example').DataTable();

    $('.toggleColumn_rfql').change(function() {
      var column = table.column($(this).data('column'));
      column.visible(!column.visible());
    });
  });
</script>