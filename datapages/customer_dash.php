<?php
include '../header.php';
include '../nav.php';
include '../footer.php';
$project_dash_res_data = getOpenProjects();
$completepro_dash_res_data = getCompletedProjects();
$cancelledpro_dash_res_data = getCancelledProjects();
$holdpro_dash_res_data = getHoldProjects();
$project_dash_res_count = $completepro_dash_res_count =
  $cancelledpro_dash_res_count = $holdpro_dash_res_count = 0;
if (isset($project_dash_res_data) && array_key_exists('data', $project_dash_res_data)) {
  $project_dash_res_count = count($project_dash_res_data['data']) ?? 0;
}
if (isset($completepro_dash_res_data) && array_key_exists('data', $completepro_dash_res_data)) {
  $completepro_dash_res_count = count($completepro_dash_res_data['data']) ?? 0;
}
if (isset($cancelledpro_dash_res_data) && array_key_exists('data', $cancelledpro_dash_res_data)) {
  $cancelledpro_dash_res_count = count($cancelledpro_dash_res_data['data']) ?? 0;
}
if (isset($holdpro_dash_res_data) && array_key_exists('data', $holdpro_dash_res_data)) {
  $holdpro_dash_res_count = count($holdpro_dash_res_data['data']) ?? 0;
}
$total_project_count = $project_dash_res_count + $completepro_dash_res_count + $cancelledpro_dash_res_count + $holdpro_dash_res_count ?>
<style>
  #mapCanvas {
    width: 100%;
    height: 450px;
    /* Adjust height as needed */
  }

  button.gm-ui-hover-effect {
    position: absolute !important;
    right: 0;
    top: -9px;
    font-size: 15px;
    width: 40px !important;
  }

  .info_content p {
    margin-bottom: 0;
  }

  .info_content h6 {
    font-size: 15px !important;
    margin-bottom: 4px !important;
  }

  .gm-style-iw-ch {
    padding: 5px !important;
  }

  i.fas.fa-ban.fa-2x.text-danger {
    font-size: 24px;
    padding-top: 2px;
  }

  i.fas.fa-spinner.fa-2x.text-success {
    font-size: 24px;
    padding-top: 2px;
  }

  .pd_br1 {
    padding-right: 5px;
    border-right: 1px solid #000;
  }

  span.pd_br1:last-child {
    border-right: 0px;
  }

  a#showdashboard span {
    color: #fff;
  }
  a#showdashboard i {
    color: #fff;
  }
  li:has(> a#showdashboard) {
      background: #0070ba;
  }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvBZcW9MkLM0NMPG_lNqVbTyzEQQ6chUA&libraries=places&callback=initMap" defer></script>

<div class="container-fluid p-0">

  <div id="mdsec" class="rowbg">
    <!--------------Manufacturing dashboard------------->
    <div class="row px-3 m-0">
      <div class="col-xl-12">

        <div class="row my-2 mdrow1">
          <div class="col-md-6">
            <h5 class="my-1 fw-bold text-primary"> <?php echo $summaryTitle ?> </h5>
          </div>
          <!-- <h2 class="text-dark mb-2 ">Manufacturing Dashboard</h2> -->

        </div>

        <div class="row mdrow1">

          <div class="col-lg-7 col-md-12">

            <div class="card shadow h-100  border-primary mt-0 ">
              <div class="card-body bg-light widgets_bg py-4">
                <div class="row">

                  <div class="col-xl-4 col-md-6 mb-2">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body bg-light">
                        <div class="row align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-center text-uppercase mb-1 text-secondary">Total Projects</div>
                            <div class="h4 mb-0 fw-bold text-center justify-content-around d-flex text-dark">
                              <?php if (in_array('PC&A Summary', $Category) && $summaryDetails['data'][0]['Total_Projects_PCndA'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Total_Projects_PCndA'] ?? 0; ?> <br> <span class="fs12"><?php echo "PC&A"; ?></span></span>
                              <?php
                              }
                              if (in_array("Fabrication Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_FAB'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Total_Projects_FAB'] ?? 0; ?> <br> <span class="fs12"><?php echo "Fabrication"; ?></span></span>
                              <?php
                              }
                              if (in_array("EMS Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_EMS'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Total_Projects_EMS'] ?? 0; ?> <br> <span class="fs12"><?php echo "EMS"; ?></span></span>
                              <?php
                              } ?>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                                        <span class="text-dark mr-2"> <i class="fa fa-arrow-up"></i> <b> 0 </b>  </span> <span> Records Since last month</span>   
                                      </div> -->
                          </div>
                          <div class="col-auto icnCircle">
                            <i class="fas fa-plus-square h4 fa-2x text-primary"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-2">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body bg-light">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-center text-uppercase mb-1 text-secondary">Production Projects</div>

                            <div class="h4 mb-0 fw-bold text-center justify-content-around d-flex text-dark">
                              <?php
                              if (in_array('PC&A Summary', $Category) && $summaryDetails['data'][0]['Total_Projects_PCndA'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Production_Projects_PCndA'] ?? 0; ?> <br> <span class="fs12"><?php echo "PC&A"; ?></span></span>
                              <?php
                              }
                              if (in_array("Fabrication Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_FAB'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Production_Projects_FAB'] ?? 0; ?> <br> <span class="fs12"><?php echo "Fabrication"; ?></span></span>
                              <?php
                              }
                              if (in_array("EMS Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_EMS'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Production_Projects_EMS'] ?? 0; ?> <br> <span class="fs12"><?php echo "EMS"; ?></span></span>
                              <?php
                              } ?>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                                        <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> 
                                        <b> ( ₹ 0 )</b> </span>  <span>Since last years</span>                        </div> -->
                          </div>
                          <div class="col-auto icnCircle"> <i class="fas fa-spinner fa-2x text-success"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-2">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body bg-light">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-center text-uppercase mb-1 text-secondary"> Open Projects</div>
                            <div class="h4 mb-0 fw-bold text-center justify-content-around d-flex text-dark">
                              <?php if (in_array('PC&A Summary', $Category) && $summaryDetails['data'][0]['Total_Projects_PCndA'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Open_Projects_PCndA'] ?? 0; ?> <br> <span class="fs12"><?php echo "PC&A"; ?></span></span>
                              <?php
                              }
                              if (in_array("Fabrication Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_FAB'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Open_Projects_FAB'] ?? 0; ?> <br> <span class="fs12"><?php echo "Fabrication"; ?></span></span>
                              <?php
                              }
                              if (in_array("EMS Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_EMS'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Open_Projects_EMS'] ?? 0; ?> <br> <span class="fs12"><?php echo "EMS"; ?></span></span>
                              <?php
                              } ?>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                              <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span> <span>Since last month</span>                        
                            </div> -->
                          </div>
                          <div class="col-auto icnCircle">
                            <i class="fas fa-circle h4 fa-2x text-danger"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-2">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body bg-light">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-center text-uppercase mb-1 text-secondary">Onhold Projects</div>
                            <div class="h4 mb-0 fw-bold text-center justify-content-around d-flex text-dark">
                              <?php
                              if (in_array('PC&A Summary', $Category) && $summaryDetails['data'][0]['Total_Projects_PCndA'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Onhold_Projects_PCndA'] ?? 0; ?> <br> <span class="fs12"><?php echo "PC&A"; ?></span></span>
                              <?php
                              }
                              if (in_array("Fabrication Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_FAB'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Onhold_Projects_FAB'] ?? 0; ?> <br> <span class="fs12"><?php echo "Fabrication"; ?></span></span>
                              <?php
                              }
                              if (in_array("EMS Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_EMS'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Onhold_Projects_EMS'] ?? 0; ?> <br> <span class="fs12"><?php echo "EMS"; ?></span></span>
                              <?php
                              } ?>
                            </div>
                            <div class="h4 mb-0 mr-3 fw-bold text-dark"></div>
                            <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                                        <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span> <span>Since last month</span>
                                      </div> -->
                          </div>
                          <div class="col-auto icnCircle">
                            <i class="fas fa-pause-circle h4 fa-2x text-info"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-2">
                    <div class="card shadow h-100 border-top border-4 border-primary">
                      <div class="card-body bg-light">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs fw-bold text-center text-uppercase mb-1 text-secondary">Cancelled Projects</div>
                            <div class="h4 mb-0 fw-bold text-center justify-content-around d-flex text-dark">
                              <?php if (in_array('PC&A Summary', $Category) && $summaryDetails['data'][0]['Total_Projects_PCndA'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Cancelled_Projects_PCndA'] ?? 0; ?> <br> <span class="fs12"><?php echo "PC&A"; ?></span></span>
                              <?php
                              }
                              if (in_array("Fabrication Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_FAB'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Cancelled_Projects_FAB'] ?? 0; ?> <br> <span class="fs12"><?php echo "Fabrication"; ?></span></span>
                              <?php
                              }
                              if (in_array("EMS Summary", $Category) && $summaryDetails['data'][0]['Total_Projects_EMS'] != 0) {
                              ?> <span><?php echo $summaryDetails['data'][0]['Cancelled_Projects_EMS'] ?? 0; ?> <br> <span class="fs12"><?php echo "EMS"; ?></span></span>
                              <?php
                              } ?>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                              <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span> <span>Since last month</span>
                            </div> -->
                          </div>
                          <div class="col-auto icnCircle ">
                            <i class="fas fa-ban fa-2x text-danger"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="card shadow h-100 border-primary my-4">
              <div class="card-body bg-light widgets_bg">

                <div class="row">

                  <?php if ($summaryDetails['data'][0]['Units_in_delivered_EA'] != 0 || $summaryDetails['data'][0]['Units_in_delivered_KG'] != 0 || $summaryDetails['data'][0]['Units_in_delivered_MTS'] != 0) { ?>
                    <div class="col-xl-6 col-md-6 mb-2">
                      <div class="card shadow h-100 border-top border-4 border-primary">
                        <div class="card-body bg-light">
                          <div class="row no-gutters align-items-center">
                            <div class="col p-1">
                              <div class="text-xs fw-bold text-uppercase mb-1 text-secondary">Units Delivered</div>
                              <div class="h5 mb-0 mr-3 fw-bold text-dark">
                                <?php if (isset($summaryDetails['data'][0]['Units_in_delivered_EA']) && $summaryDetails['data'][0]['Units_in_delivered_EA'] != 0) { ?>
                                  <span class="pd_br1"><?php echo $summaryDetails['data'][0]['Units_in_delivered_EA'] ?? "-" ?> <small class="fs13"><?php echo "EA" ?></small></span>
                                <?php
                                }
                                if (isset($summaryDetails['data'][0]['Units_in_delivered_KG']) && $summaryDetails['data'][0]['Units_in_delivered_KG'] != 0) {
                                ?>
                                  <span class="pd_br1"><?php echo $summaryDetails['data'][0]['Units_in_delivered_KG'] ?? "-" ?> <small class="fs13"><?php echo "kg" ?></small></span>
                                <?php
                                }
                                if (isset($summaryDetails['data'][0]['Units_in_delivered_MTS']) && $summaryDetails['data'][0]['Units_in_delivered_MTS'] != 0) {
                                ?>
                                  <span class="pd_br1"><?php echo $summaryDetails['data'][0]['Units_in_delivered_MTS'] ?? "-" ?> <small class="fs13"><?php echo "Mts" ?></small></span>
                                <?php
                                }
                                ?>
                              </div>

                              <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                                      <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span> <span>Since last month</span>                        
                                    </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  } else {
                    // 
                  } ?>

                  <?php if ($summaryDetails['data'][0]['Units_in_production_EA'] != 0 || $summaryDetails['data'][0]['Units_in_production_KG'] != 0 || $summaryDetails['data'][0]['Units_in_production_MTS'] != 0) { ?>
                    <div class="col-xl-6 col-md-6 mb-2">
                      <div class="card shadow h-100 border-top border-4 border-primary">
                        <div class="card-body bg-light">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs fw-bold text-uppercase mb-2 text-secondary">Units in production</div>
                              <div class="h5 mb-0 mr-3 fw-bold text-dark">
                                <?php
                                if (isset($summaryDetails['data'][0]['Units_in_production_EA'])) {
                                ?>
                                  <span class="pd_br1"><?php echo $summaryDetails['data'][0]['Units_in_production_EA'] ?? "-" ?> <small class="fs13"><?php echo "EA" ?></small></span>
                                <?php
                                }
                                if ($summaryDetails['data'][0]['Units_in_production_EA'] && $summaryDetails['data'][0]['Units_in_production_KG'] != 0) {
                                ?>
                                  <span class="pd_br1"><?php echo $summaryDetails['data'][0]['Units_in_production_KG'] ?? "-" ?> <small class="fs13"><?php echo "kg" ?></small></span>
                                <?php
                                }
                                if (isset($summaryDetails['data'][0]['Units_in_production_MTS']) && $summaryDetails['data'][0]['Units_in_production_MTS'] != 0) {
                                ?>
                                  <span class="pd_br1"><?php echo $summaryDetails['data'][0]['Units_in_production_MTS'] ?? "-" ?> <small class="fs13"><?php echo "Mts" ?></small></span>
                                <?php
                                }
                                ?>
                              </div>

                              <!-- <div class="mt-2 mb-0 text-secondary text-xs">                          
                                      <span class="text-dark mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span> <span>Since last month</span>                        
                                    </div> -->
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  } else {
                    // 
                  } ?>

                </div>

              </div>
            </div>

          </div>

          <div class="col-lg-5 col-md-12">
            <div class="row">

              <div class="col-xl-12 col-md-12 mb-2">
                <div class="card shadow h-100 border-primary mt-0">

                  <div class="card-body bg-light pt-0 widgets_bg1">

                    <div class="card-header border-0 mt-3 p-0 pb-1 bg-transparent ">
                      <div class="d-flex justify-content-between">
                        <h5 class="text-dark mb-2"> <?php echo "Manufacturing Location" ?> </h5>
                        <?php
                        $url = 'https://maps.google.com/mapfiles/ms/micons/';
                        $iconBase = array(
                          'red' => $url . 'red-dot.png',
                          'green' => $url . 'green-dot.png',
                          'blue' => $url . 'blue-dot.png'
                        );
                        ?>
                        <div class="d-flex">
                          <?php if (isset($Partner_PCndA_Details['data'])) : ?>
                          <p class="px-2"><img src="<?php echo $iconBase['red']; ?>" alt="Red Dot" width="20" height="20"> PC&A</p>
                          <?php endif; ?>
                          <?php if (isset($Partner_FAB_Details['data'])) : ?>
                          <p class="px-2"><img src="<?php echo $iconBase['green']; ?>" alt="Green Dot" width="20" height="20">Fabrication</p>
                          <?php endif; ?>
                          <?php if (isset($Partner_EMS_Details['data'])) : ?>
                          <p class="px-2"><img src="<?php echo $iconBase['blue']; ?>" alt="Blue Dot" width="20" height="20">EMS</p>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div>
                        <input id="locationSearch" type="search" placeholder="Search Your Partner " oninput="callLocationFunction()" class="form-control" style="display:none;" />
                      </div>
                    </div>
                    <div id="mapCanvas"></div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>
    <!--------------------------------------->
  </div>

</div>

<?php
$partnerCollection = []; // Initialize an empty array to store partner data

// $colors = ['red', 'green', 'blue']; // Array of colors

// $your_partner_data = getYourPartnerData();
// // $mfCount = $fabCount = $emsCount = 0;
// // if(isset($your_partner_data['data']['Manufacturing_Partner'])){
// //   $mfCount = count($your_partner_data['data']['Manufacturing_Partner']);
// // } if(isset($your_partner_data['data']['Fabrication_Partner'])){
// //   $fabCount = count($your_partner_data['data']['Fabrication_Partner']);
// // } if(isset($your_partner_data['data']['EMS_Partner'])){
// //   $emsCount = count($your_partner_data['data']['EMS_Partner']);
// // }
// // echo "want ", json_encode($your_partner_data['data']['Manufacturing_Partner']);
// if (isset($your_partner_data)) {
//   if (isset($your_partner_data['data']['Manufacturing_Partner'])) {
//     $manufacturingPartner = $your_partner_data;
//     // echo "yes " . json_encode($your_partner_data['data']['Manufacturing_Partner']);
//     // echo " - " . json_encode($manufacturingPartner);
//     foreach ($manufacturingPartner['data']['Manufacturing_Partner'] as $eachMfPartners) {
//       $eachMfPartnersDecoded = json_decode($eachMfPartners);
//       foreach ($eachMfPartnersDecoded['data'] as $record) {
//         // echo " * " . json_encode($eachMfPartners);
//         $location = $record['Address_Registered_Office_of_the_Organisation']['district_city'];
//         $locationContent = $record['Address_Registered_Office_of_the_Organisation']['zc_display_value'];
//         $latitude = $record['Address_Registered_Office_of_the_Organisation']['latitude'] ?? null;
//         $longitude = $record['Address_Registered_Office_of_the_Organisation']['longitude'] ?? null;
//         $color = $colors[0];
//         $partnerCategory = 'PC&A Partner';
//         $partnerName = $record['Name_of_the_Organisation'] ?? "-";
//       }
//     }
//     if ($latitude !== null && $longitude !== null) {
//       /** Add partner data to collection */
//       $partnerCollection[] = [
//         'location' => $location,
//         'latitude' => $latitude,
//         'longitude' => $longitude,
//         'partner_name' => $partnerName,
//         'partner_category' => $partnerCategory,
//         'color' => $color,
//         'location_content' => $locationContent
//       ];
//     }
//   }
//   if (isset($your_partner_data['data']['Fabrication_Partner'])) {
//     foreach ($your_partner_data['data']['Fabrication_Partner'] as $eachMfPartners) {
//       $location = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['district_city'];
//       $locationContent = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['zc_display_value'];
//       $latitude = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['latitude'] ?? null;
//       $longitude = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['longitude'] ?? null;
//       $color = $colors[1];
//       $partnerCategory = 'Fabrication Partner';
//       $partnerName = $record['data'][0]['Name_Of_Organisation'] ?? "-";
//     }
//     if ($latitude !== null && $longitude !== null) {
//       /** Add partner data to collection */
//       $partnerCollection[] = [
//         'location' => $location,
//         'latitude' => $latitude,
//         'longitude' => $longitude,
//         'partner_name' => $partnerName,
//         'partner_category' => $partnerCategory,
//         'color' => $color,
//         'location_content' => $locationContent
//       ];
//     }
//   }
//   if (isset($your_partner_data['data']['EMS_Partner'])) {
//     foreach ($your_partner_data['data']['EMS_Partner'] as $eachMfPartners) {
//       $location = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['district_city'];
//       $locationContent = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['zc_display_value'];
//       $latitude = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['latitude'] ?? null;
//       $longitude = $eachMfPartners['data'][0]['Address_Registered_Office_of_the_Organisation']['longitude'] ?? null;
//       $color = $colors[2];
//       $partnerCategory = 'EMS Partner';
//       $partnerName = $record['data'][0]['Name_of_the_Organisation'] ?? "-";
//     }
//     if ($latitude !== null && $longitude !== null) {
//       /** Add partner data to collection */
//       $partnerCollection[] = [
//         'location' => $location,
//         'latitude' => $latitude,
//         'longitude' => $longitude,
//         'partner_name' => $partnerName,
//         'partner_category' => $partnerCategory,
//         'color' => $color,
//         'location_content' => $locationContent
//       ];
//     }
//   }
//   echo "Partner Collection " . json_encode($partnerCollection);
// } else{
//   //No partner Data
// }



// if (isset($your_partner_data)) {
//   foreach ($your_partner_data as $eachRecordCheck) {
//     if (isset($eachRecordCheck) && isset($eachRecordCheck['data'][0]['data'][0]) && count($eachRecordCheck['data'][0]['data'][0]) > 0) {
//       foreach ($eachRecordCheck['data'] as $record) {
//         $location = $record['data'][0]['Address_Registered_Office_of_the_Organisation']['district_city'];
//         $locationContent = $record['data'][0]['Address_Registered_Office_of_the_Organisation']['zc_display_value'];
//         $latitude = $record['data'][0]['Address_Registered_Office_of_the_Organisation']['latitude'] ?? null;
//         $longitude = $record['data'][0]['Address_Registered_Office_of_the_Organisation']['longitude'] ?? null;

//         /** Check for specific keys in the data and set partner category - start */
//         if (array_key_exists('GST_Registration_No', $record['data'][0])) {
//           $color = $colors[1];
//           $partnerCategory = 'Fabrication Partner';
//           $partnerName = $record['data'][0]['Name_Of_Organisation'] ?? "-";
//         } elseif (array_key_exists('Area_of_Specialisation_in_Manufacturing', $record['data'][0])) {
//           $color = $colors[0];
//           $partnerCategory = 'Manufacturing Partner';
//           $partnerName = $record['data'][0]['Name_of_the_Organisation'] ?? "-";
//         } elseif (array_key_exists('Are_the_statutory_norms_for_labour_engagement_followed', $record['data'][0])) {
//           $color = $colors[2];
//           $partnerCategory = 'EMS Partner';
//           $partnerName = $record['data'][0]['Name_of_the_Organisation'] ?? "-";
//         }
//         /** Check for specific keys in the data and set partner category - end */

//         if ($latitude !== null && $longitude !== null) {
//           // Determine color based on index (use modulo to cycle through colors)
//           // $color = $colors[count($partnerCollection) % count($colors)];

//           /** Add partner data to collection */
//           $partnerCollection[] = [
//             'location' => $location,
//             'latitude' => $latitude,
//             'longitude' => $longitude,
//             'partner_name' => $partnerName,
//             'partner_category' => $partnerCategory,
//             'color' => $color,
//             'location_content' => $locationContent
//           ];
//         }
//       }
//     }
//   }
// }


/** To collect the Manufacturing partner location data */
if (isset($Partner_PCndA_Details['data'])) {
  foreach ($Partner_PCndA_Details['data'] as $eachMndFDetails) {
    $partnerCollection[] = $eachMndFDetails;
  }
}

/** To collect the Fabrication partner location data */
if (isset($Partner_FAB_Details['data'])) {
  foreach ($Partner_FAB_Details['data'] as $eachFabDetails) {
    $partnerCollection[] = $eachFabDetails;
  }
}
/** To collect the EMS partner location data */
if (isset($Partner_EMS_Details['data'])) {
  foreach ($Partner_EMS_Details['data'] as $eachEmsDetails) {
    $partnerCollection[] = $eachEmsDetails;
  }
}

?>

<script>
  function callLocationFunction(){
    document.getElementById("locationSearch").style.display = 'block';
  }
  // Initialize and add the map
  function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
      center: {
        lat: 17.7937,
        lng: 80.9629
      }, // Centered on India
      // // center: { lat: 10.0, lng: 80.0 },
      zoom: 3, // Initial zoom level to cover the whole country
      minZoom: 4, // Minimum zoom level to keep India visible
      maxZoom: 4, // Maximum zoom level for detailed view
      mapTypeId: 'terrain', // Map type (e.g., 'roadmap', 'satellite', 'terrain', 'hybrid')
      disableDefaultUI: true, // Disable default UI controls
      overviewMapControl: true,
      zoomControl: true, // Enable zoom control
      zoomControlOptions: {
        position: google.maps.ControlPosition.RIGHT_BOTTOM // Position of zoom control
      },
      // Optionally add other settings for better user experience
      streetViewControl: true, // Disable Street View control if not needed
      fullscreenControl: true, // Enable fullscreen control if needed
    };

    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);

    // PHP-generated markers
    var collectionPartner = <?php echo json_encode($partnerCollection); ?>;
    // console.log("Partner locations:", collectionPartner);

    // Info window content for dynamic markers
    var infoWindowContent = [];

    // Custom marker icons configuration based on color
    var url = 'https://maps.google.com/mapfiles/ms/micons/';
    var iconBase = {
      'red': url + 'red-dot.png',
      'green': url + 'green-dot.png',
      'blue': url + 'blue-dot.png'
    };

    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow();

    // Place each marker on the map
    for (var i = 0; i < collectionPartner.length; i++) {
      var position = new google.maps.LatLng(collectionPartner[i].latitude, collectionPartner[i].longitude);
      bounds.extend(position);
      var marker = new google.maps.Marker({
        position: position,
        map: map,
        title: collectionPartner[i].location,
        icon: {
          url: iconBase[collectionPartner[i].color],
          scaledSize: new google.maps.Size(40, 40) // Size of the scaled icon
        }
      });

      // Prepare info window content for each partner at the same location
      if (!infoWindowContent[position.toString()]) {
        infoWindowContent[position.toString()] = '';
      }

      infoWindowContent[position.toString()] += '<div class="info_content">' +
        '<div id="results">' +
        '<div class="results">' +
        '<h6 style="color: #0070ba;">' + collectionPartner[i].partner_name + '</h6>' +
        '<b>' + collectionPartner[i].partner_category + '</b>' +
        '<p>Location: ' + collectionPartner[i].location_content + '</p>' +
        '</div>' +
        '</div>' +
        '</div>';


      // Add click event listener to marker
      var currentlyOpenInfoWindow = null;
      google.maps.event.addListener(marker, 'mouseover', (function(marker, content) {
        return function() {
          if (currentlyOpenInfoWindow === null) {
            document.getElementById("locationSearch").style.display = 'block';
            infoWindow.setContent(content);
            infoWindow.open(map, marker);
          }
        };
      })(marker, infoWindowContent[position.toString()]));

      // Add mouseout event listener to close the infoWindow
      // google.maps.event.addListener(marker, 'mouseout', function() {
      //   if (currentlyOpenInfoWindow === null) {
      //     infoWindow.close();
      //   }
      // });
      // Add click event listener to marker
      // google.maps.event.addListener(marker, 'click', (function(marker, content) {
      //   return function() {
      //     if (currentlyOpenInfoWindow !== null) {
      //       currentlyOpenInfoWindow.close();
      //     }
      //     document.getElementById("locationSearch").style.display = 'block';
      //     infoWindow.setContent(content);
      //     infoWindow.open(map, marker);
      //   };
      // })(marker, infoWindowContent[position.toString()]));

      // Extend the bounds to include each marker's position
      bounds.extend(marker.getPosition());

    }

    // Center the map to fit all markers when they are added
    map.fitBounds(bounds);

    // Set zoom level when all markers are placed
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function() {
      this.setZoom(4); // Zoom level adjustment (1 = World view, 15 = Streets close up)
      google.maps.event.removeListener(boundsListener);
    });
  }

  $("#locationSearch").keyup(function() {
    // console.log("map");
    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(),
      count = 0;

    // Loop through the comment list
    $('#results div').each(function() {


      // If the list item does not contain the text phrase fade it out
      if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        $(this).hide(); // MY CHANGE

        // Show the list item if the phrase matches and increase the count by 1
      } else {
        $(this).show(); // MY CHANGE
        count++;
      }

    });

  });

  $(document).on('click', '.gm-ui-hover-effect', function() {
    // Perform action on click
    // console.log("Element clicked:", $(this).text());
    document.getElementById("locationSearch").style.display = 'none';
  });
</script>