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
    a#order_mng.dropdown-toggle::after {
        color: #fff !important;
    }
</style>
<div id="poSec">
  <?php
  include '../header.php';
  include '../nav.php';
  include '../footer.php';
  $po_res_data = getPoData();
  if (isset($po_res_data['data']) && $po_res_data['code'] === 3000) 
  {  ?>
    <!------------PO Sec------------->
    <div style="width:100%;" class="container-fluid">
      <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">

          <div class="card-header pt-3">
            <div class="row">
              <div class="col-md-6">
                <h5 class="my-1 fw-bold text-primary">PO List</h5>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <b>Total Records : <span><?php echo count($po_res_data['data']) ?></span></b>
              </div>
            </div>
          </div>

          <div class="card-body pt-1">

            <div class="table table-responsive" id="">

              <table style="width:100%" class="table table-striped" id="po_datatable">
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
                              <label><input type="checkbox" class="toggleColumn_po" data-column="0" checked> PO No</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="1" checked> PO No</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="2" checked> Project Number</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="3" checked> Project Title</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="4" checked> PO Date</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="5" checked> Stage</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="6" checked> PO Attachments</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_po" data-column="7" checked> PG Gross Margin Value</label>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th>PO No</th>
                    <th>Project Number</th>
                    <th>Project Title</th>
                    <th>PO Date</th>
                    <th>Stage</th>
                    <th>PO Attachments</th>
                    <th>PG Gross Margin Value</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($po_res_data['data'] as $record) { ?>
                    <tr>
                      <td></td>
                      <td><?php echo htmlspecialchars($record['PO_Number'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Project_Number']['Project_Number'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['Project_Number.Project_Title'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['PO_Date'] ?? "-"); ?></td>
                      <td><?php echo htmlspecialchars($record['stage'] ?? "-"); ?></td>

                      <?php
                      $File_upload = "";
                      if ($record["File_upload"] != "" && $record["File_upload"] != null) {
                        $File_upload_FilePath = explode('?', $record['File_upload']);
                        $File_upload = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/customer-invoice/User_Based_Customer_Pos/" . $record['ID'] . "/File_upload/image-download/5SpZ70uSCdbs1p1FVwmVW1WnkkX79g1BVuHEnHye969YdZSev1NqgANYGu9eJykbQgVgmpnyh2mg8PP7aT7OKSb3Uv4TkkNFVDCS?" . $File_upload_FilePath[1];
                      }
                      if ($File_upload != null && $File_upload != "") {
                      ?>
                        <td class="text-center"><a href='<?php echo $File_upload; ?>' download><img src='../images/filedlod.png' width='35px'></a></td>
                      <?php
                      } else {
                      ?> <td style="cursor: not-allowed;" class="text-center"><img src='../images/nofile.png' width='35px'></td>
                      <?php
                      }
                      ?>

                      <td><?php echo htmlspecialchars($record['Sub_Total'] ?? "-"); ?></td>
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
  $(document).ready(function() {
    // var table = $('#po_datatable').DataTable();

    // $('.toggleColumn_po').change(function() {
    //     var column = table.column($(this).data('column'));
    //     column.visible(!column.visible());
    // });

    var table = $('#po_datatable').DataTable();

    $('.toggleColumn_po').on('change', function() {
      var column = table.column($(this).data('column'));
      column.visible($(this).is(':checked'));
    });
  });
</script>