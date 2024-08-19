<div id="costSec" style="display: none;">
            <!------------PO Sec------------->
            <?php $costing_res_data = getCostingData();
            if (isset($costing_res_data['data']) && $costing_res_data['code'] === 3000){  ?>
            <div style="width:100%;" class="container-fluid">
              <div class="col-md-12 col-sm-8">
                <div class="card mb-4 mt-2 tablecard">

                  <div class="card-header pt-3 d-flex justify-content-between">
                      <h5 class="my-1 fw-bold text-primary">Costing</h5>
                      <b>Total Records : <span><?php echo count($costing_res_data['data']) ?></span></b>   
                  </div>

                  <div class="card-body pt-1">

                      <div class="table table-responsive">

                        <table style="width:100%" class="table " id="costing_datatable">
                            <thead class="table-primary">
                              <tr>
                                  <th>Owner Name</th>
                                  <th>Email</th>
                                  <th>Pricing Document</th>
                                  <th>Added Time</th>
                              </tr>
                            </thead>
                                  <tbody>
                                    <?php foreach ($costing_res_data['data'] as $record){ ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($record['Owner_Name']['first_name'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Email'] ?? "-"); ?></td>
                                            <?php 
                                                      $pattern = "/[?\s:]/";
                                                      $Pricing_Document = "";
                                                      if($record["Pricing_Document"] != null){
                                                        $Pricing_Document = preg_split($pattern, $record["Pricing_Document"] ); 
                                                      }
                                                      $Pricing_Document = $Pricing_Document[1] ?? "";  ?>
                                                <td>
                                                    <?php 
                                                    if (($record["Pricing_Document"] != null)) {
                                                    echo "<a href='https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/machinemaze-project-management/All_Sgel_Pricing_Documents/" . 
                                                    $record['ID'] . 
                                                    "/Pricing_Document/image-download/sfZ9eG2nKYj75w06bMWZHd6ZM1ye3ZYugSud6eGpPGb1PHf7xEFk8Cg8ddeNF9DhMX1hwAaX6D459VR0Mp141NZsN1Uq3FE4UUbF?" . 
                                                    $Pricing_Document . 
                                                    "'><img src='http://localhost/customerportal/images/filedlod.png' width='35px'></a>"; 
                                                    } else{
                                                      echo "No File!";
                                                    }
                                                    ?> 
                                                </td>
                                            <td><?php echo htmlspecialchars($record['Added_Time'] ?? "-"); ?></td>
                                        </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                                <?php } else { ?>
                                  <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
                                <?php } ?>
                         
                      </div>

                  </div>

                </div>
              </div>
            </div>
            <!------------------------------------->
          </div>
<script>
      new DataTable('#costing_datatable'); 
</script>