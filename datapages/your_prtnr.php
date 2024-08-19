<style>
  #prtnr_datatable li {
    list-style: circle;
  }

  .partner_rating {
    width: 70px;
    mix-blend-mode: darken;
  }

  .hidden {
    display: none;
  }

  .hidecolumn .dropdown-toggle::after {
    content: "\f078";
    font-family: FontAwesome;
    position: relative;
    top: 4px;
    border: 0;
    right: 0;
    color: #ffffff;
  }
  a#showpartner span {
    color: #fff;
  }
  a#showpartner i {
    color: #fff;
  }
  li:has(> a#showpartner) {
    background: #0070ba;
  }
</style>
<div id="mpSec">
  <!------------Manufacturing Partner Sec------------->
  <?php 
  include '../header.php';
  include '../nav.php';
  include '../footer.php';
  $your_partner_data = getYourPartnerData();
  $mfCount = $fabCount = $emsCount = 0;
  if(isset($your_partner_data['data']['Manufacturing_Partner'])){
    $mfCount = count($your_partner_data['data']['Manufacturing_Partner']);
  } if(isset($your_partner_data['data']['Fabrication_Partner'])){
    $fabCount = count($your_partner_data['data']['Fabrication_Partner']);
  } if(isset($your_partner_data['data']['EMS_Partner'])){
    $emsCount = count($your_partner_data['data']['EMS_Partner']);
  }
  $totalPartnerCount = $mfCount + $fabCount + $emsCount;
  if (isset($your_partner_data)) { ?>
    <div style="width:100%;" class="container-fluid">
      <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">
          <div class="card-header pt-3">
            <div class="row">
              <div class="col-md-6">
                <h5 class="my-1 fw-bold text-primary">Your Partners</h5>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <b>Total Records : <span><?php echo $totalPartnerCount; ?></span></b>
              </div>
            </div>
          </div>
          <div class="card-body pt-1">
            <div class="table-responsive">
              <table style="width:100%" class="table table-striped" id="prtnr_datatable">
                <thead class="table-primary">
                  <tr>
                    <th>
                      <div class="dropdown hidecolumn">
                        <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-eye"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li class="d-none">
                            <a class="dropdown-item " href="#">
                              <label><input type="checkbox" class="toggleColumn_yp" data-column="0" checked></label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_yp" data-column="1" checked> Partner Organization</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_yp" data-column="2" checked> Partner Category</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_yp" data-column="3" checked> GST Number</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_yp" data-column="4" checked> Area of specialization in Manufacturing</label>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              <label><input type="checkbox" class="toggleColumn_yp" data-column="5" checked> Location</label>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th>Partner Organization</th>
                    <th>Partner Category</th>
                    <th>GST Number</th>
                    <th>Area of specialization in Manufacturing</th>
                    <th>Partner Location</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($your_partner_data['data']['Manufacturing_Partner'])):
                  foreach ($your_partner_data['data']['Manufacturing_Partner'] as $recordJson) :
                    // Decode the JSON string into an associative array
                    $record = json_decode($recordJson, true);

                    // Determine partner category based on available keys
                    $partnerCategory = '';
                    if (array_key_exists('data', $record) && array_key_exists('Audit_Details', $record['data']) && array_key_exists('OnSite_Audit_Completed', $record['data']['Audit_Details'][0])) {
                      $partnerCategory = 'Manufacturing Partner';
                    }
                  ?>
                    <tr>
                      <td></td>
                      <?php
                      // Construct URL
                      $url = "https://customerportal.machinemaze.com/datapages/assessment_partner.php?ID=" . htmlspecialchars($record['data']['ID']);
                      ?>
                      <td><a href='<?php echo $url; ?>' target="_blank"><?php echo htmlspecialchars($record['data']['Name_of_the_Organisation'] ?? "-"); ?></a></td>
                      <td><?php echo htmlspecialchars($partnerCategory); ?></td>
                      <td><?php echo htmlspecialchars($record['data']['GST_Number'] ?? "-"); ?></td>
                      <td>
                        <?php if (!empty($record['data']['Area_of_Specialisation_in_Manufacturing']) && is_array($record['data']['Area_of_Specialisation_in_Manufacturing'])) : ?>
                          <ul>
                            <?php foreach ($record['data']['Area_of_Specialisation_in_Manufacturing'] as $specialisation) : ?>
                              <li><?php echo htmlspecialchars($specialisation); ?></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php else : ?>
                          <?php echo "-"; ?>
                        <?php endif; ?>
                      </td>
                      <td><?php echo htmlspecialchars($record['data']['Address_Registered_Office_of_the_Organisation']['zc_display_value'] ?? "-"); ?></td>
                    </tr>
                  <?php endforeach; endif; ?>

                  <?php
                  
                  if(isset($your_partner_data['data']['EMS_Partner'])):
                  foreach ($your_partner_data['data']['EMS_Partner'] as $recordJson) :
                    // Decode the JSON string into an associative array
                    $record = json_decode($recordJson, true);
                    
                    // Determine partner category based on available keys
                    $partnerCategory = '';
                    if (array_key_exists('data', $record) && array_key_exists('Audit_Details', $record['data']) && array_key_exists('OnSite_Audit_Completed', $record['data']['Audit_Details'][0])) {
                      $partnerCategory = 'EMS Partner';
                    }
                  ?>
                    <tr>
                      <td></td>
                      <?php
                      // Construct URL
                      $url = "https://customerportal.machinemaze.com/datapages/assessment_partner.php?ID=" . htmlspecialchars($record['data']['ID']);
                      ?>
                      <td><a href='<?php echo $url; ?>' target="_blank"><?php echo htmlspecialchars($record['data']['Name_of_the_Organisation'] ?? "-"); ?></a></td>
                      <td><?php echo htmlspecialchars($partnerCategory); ?></td>
                      <td><?php echo htmlspecialchars($record['data']['GST_Number'] ?? "-"); ?></td>
                      <td>
                        <?php if (!empty($record['data']['Area_of_Specialisation_in_Manufacturing']) && is_array($record['data']['Area_of_Specialisation_in_Manufacturing'])) : ?>
                          <ul>
                            <?php foreach ($record['data']['Area_of_Specialisation_in_Manufacturing'] as $specialisation) : ?>
                              <li><?php echo htmlspecialchars($specialisation); ?></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php else : ?>
                          <?php echo "-"; ?>
                        <?php endif; ?>
                      </td>
                      <td><?php echo htmlspecialchars($record['data']['Address_Registered_Office_of_the_Organisation']['zc_display_value'] ?? "-"); ?></td>
                    </tr>
                  <?php endforeach; endif; ?>

                  <?php
                  if(isset($your_partner_data['data']['Fabrication_Partner'])):
                  foreach ($your_partner_data['data']['Fabrication_Partner'] as $recordJson) :
                    // Decode the JSON string into an associative array
                    $record = json_decode($recordJson, true);

                    // Determine partner category based on available keys
                    $partnerCategory = '';
                    if (array_key_exists('data', $record) && array_key_exists('GST_Registration_No', $record['data'])) {
                      $partnerCategory = 'Fabrication Partner';
                    }
                  ?>
                    <tr>
                      <td></td>
                      <?php
                      // Construct URL
                      $url = "https://customerportal.machinemaze.com/datapages/assessment_partner.php?ID=" . htmlspecialchars($record['data']['ID']);
                      ?>
                      <td><a href='<?php echo $url; ?>' target="_blank"><?php echo htmlspecialchars($record['data']['Name_Of_Organisation'] ?? "-"); ?></a></td>
                      <td><?php echo htmlspecialchars($partnerCategory); ?></td>
                      <td><?php echo htmlspecialchars($record['data']['GST_Registration_No'] ?? "-"); ?></td>
                      <td><?php echo "-"; ?></td>
                      <td><?php echo htmlspecialchars($record['data']['Address_Registered_Office_of_the_Organisation']['zc_display_value'] ?? "-"); ?></td>
                    </tr>
                  <?php endforeach; endif; ?>
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
    var table = $('#prtnr_datatable').DataTable();

    $('.toggleColumn_yp').change(function() {
      var column = table.column($(this).data('column'));
      column.visible(!column.visible());
    });
  });
</script>
