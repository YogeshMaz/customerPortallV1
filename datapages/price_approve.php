<style>
    a#order_mng span {
      color: #fff;
    }
    a#order_mng i {
      color: #fff;
    }
    li:has(> a#order_mng) {
      background: #0070ba;
    }
    a#order_mng.dropdown-toggle::after {
        color: #fff !important;
    }
</style>
<div id="paSec">
  <!------------Price Approval Sec------------->
  <?php 
  include '../header.php';
  include '../nav.php';
  include '../footer.php';
  $pa_res_data = priceApprovalData();
  if (isset($pa_res_data['data']) && $pa_res_data['code'] === 3000) { ?>
    <div style="width:100%;" class="container-fluid">
      <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">
          <div class="card-header pt-3">
            <div class="row">
              <div class="col-md-6">
                <h5 class="my-1 fw-bold text-primary">Price Approval</h5>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <b>Total Records : <span><?php echo count($pa_res_data['data']) ?></span></b>
              </div>
            </div>
          </div>


          <div class="card-body pt-1">


            <div class="table table-responsive">

              <table style="width:100%" class="table table-striped" id="p_app">
                <thead class="table-primary">
                  <tr>
                    <th>
                      <div class="dropdown hidecolumn">
                        <a class="btn btn-primary btn-sm dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-eye"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li>
                            <a class="dropdown-item d-none" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="0" checked> Project</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="1" checked> Project</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="2" checked> Cost Per Unit (INR)</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="3" checked> Cost Per Unit (Euros)</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="4" checked> Cost Per Unit (Dollers)</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="5" checked> Quantity/Batch</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="6" checked> Remarks/Comments</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_pa" data-column="7" checked> Status</label>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th>Project</th>
                    <th>Cost Per Unit (INR)</th>
                    <th>Cost Per Unit (Euros)</th>
                    <th>Cost Per Unit (Dollers)</th>
                    <th>Quantity/Batch</th>
                    <th>Remarks/Comments</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pa_res_data['data'] as $record) { ?>
                    <tr>
                      <td></td>
                      <td><?php echo htmlspecialchars($record['Project']['Project_Title']  ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Cost_Per_Unit_Landed']  ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Cost_Per_Unit_Landed1']  ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Costb_Per_Unit_Dollars']  ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Quantity_Batch']  ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Remarks_Comments']  ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['']  ?? "-"); ?></td>
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
                        <h5 class="my-1 fw-bold text-primary">Price Approval</h5>
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
    var table = $('#p_app').DataTable();

    $('.toggleColumn_pa').change(function() {
      var column = table.column($(this).data('column'));
      column.visible(!column.visible());
    });
  });
</script>