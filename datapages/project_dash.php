<?php   
  include '../header.php';
  include '../nav.php';
  include '../footer.php'; ?>
<style>
    a#yourpro span {
      color: #fff;
    }
    a#yourpro i {
      color: #fff;
    }
    li:has(> a#yourpro) {
      background: #0070ba;
    }
    a#yourpro.dropdown-toggle::after {
        color: #fff !important;
    }
</style>

<div id="pro_dash" >
    <?php
    $project_dash_res_data = getOpenProjects();
    $completepro_dash_res_data = getCompletedProjects();
    $cancelledpro_dash_res_data = getCancelledProjects();
    $holdpro_dash_res_data = getHoldProjects();
    $project_dash_res_count = $completepro_dash_res_count = 
    $cancelledpro_dash_res_count = $holdpro_dash_res_count = 0;
    if(isset($project_dash_res_data) && array_key_exists('data', $project_dash_res_data)){
        $project_dash_res_count = count($project_dash_res_data['data']) ?? 0;
     }
    if(isset($completepro_dash_res_data) && array_key_exists('data', $completepro_dash_res_data)){
        $completepro_dash_res_count = count($completepro_dash_res_data['data']) ?? 0;
    }
    if(isset($cancelledpro_dash_res_data) && array_key_exists('data', $cancelledpro_dash_res_data)){
        $cancelledpro_dash_res_count = count($cancelledpro_dash_res_data['data']) ?? 0;
    }
    if(isset($holdpro_dash_res_data) && array_key_exists('data', $holdpro_dash_res_data)){
        $holdpro_dash_res_count = count($holdpro_dash_res_data['data']) ?? 0;
    }
    $total_project_count = $project_dash_res_count + $completepro_dash_res_count + $cancelledpro_dash_res_count + $holdpro_dash_res_count; ?>
    <!------------Project dashboard Sec------------->
    <div style="width:100%;" class="container-fluid">
        <div class="col-md-12 col-sm-8">
        <div class="card mb-4 mt-2 tablecard">

            <div class="card-header pt-3 ">

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="my-1 fw-bold text-primary">Project Dashboard</h5>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <b>Total Records : <span><?php echo $total_project_count ?></span></b>
                    </div>
                </div>  
                  
            </div>


            <div class="card-body">

                <div class="row">
                    <div class="d-md-flex justify-content-left p-2">
                        <ul class="nav nav-pills" role="tablist">
                            <span class="badge bg-primary-subtle text-primary mx-2 active" data-bs-toggle="pill" href="#open_p">Open Projects (<?php echo $project_dash_res_count ?>)</span>
                            <span class="badge bg-success-subtle text-success mx-2" data-bs-toggle="pill" href="#production_p">Production Projects (<?php echo $completepro_dash_res_count ?>)</span>
                            <span class="badge bg-danger-subtle text-danger mx-2" data-bs-toggle="pill" href="#cancelled_p">Cancelled Projects (<?php echo $cancelledpro_dash_res_count ?>)</span>
                            <span class="badge bg-warning-subtle text-warning mx-2" data-bs-toggle="pill" href="#onhold_p">Onhold Projects (<?php echo $holdpro_dash_res_count ?>)</span>
                        </ul>
                    </div>
                </div>
                
                <div class="tab-content">
                    <div id="open_p" class="tab-pane active">
                        <div class="table table-responsive">
                        <?php if (isset($project_dash_res_data['data']) && count($project_dash_res_data['data']) > 0) { ?>

                            <table style="width:100%" class="table table-striped" id="proj_dash_data">
                                <thead class="table-primary">
                                    <tr>
                                        <th>
                                            <div class="dropdown hidecolumn" id="op_hdropdown">
                                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-eye"></i> 
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item d-none" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="0" checked> Project No</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="1" checked> Project No</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="2" checked> Project Title</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="3" checked> Project Tracker</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="4" checked> Project Phase </label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="5" checked> Total Cost (INR)</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_op" data-column="6" checked> Project Collateral</label>
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>Project No</th>
                                        <th>Project Title</th>
                                        <th>Project Tracker</th>
                                        <th>Project Phase </th>
                                        <th>Total Cost (INR) </th>
                                        <th>Partner Organisation </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($project_dash_res_data['data'] as $record){ ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo htmlspecialchars($record['Project_Number'] ?? "-"); ?></td>
                                            <?php $openedUrl = "https://customerportal.machinemaze.com/datapages/project_report.php?ID=" . htmlspecialchars($record['ID']); ?>
                                            <td><a href='<?php echo $openedUrl; ?>' target="_blank"><?php echo htmlspecialchars($record['Link_Field']['value']  ?? "-"); ?></a></td> 
                                            <td><?php echo htmlspecialchars_decode($record['Project_Tracker'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Project_Phase_New'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Total_Cost_INR'] ?? "-"); ?></td>
                                            <?php if ($record['Project_Execution_Detail'][0]['Production_Allocation_to_M_F_Partner'] != "" && $record['Project_Execution_Detail'][0]['Production_Allocation_to_M_F_Partner'] != null) { ?>
                                                <td><?php echo htmlspecialchars($record['Project_Execution_Detail'][0]['Production_Allocation_to_M_F_Partner']['Name_of_the_Organisation'] ?? "-"); ?></td>
                                            <?php } elseif ($record['Project_Execution_Detail'][0]['Allocate_to_EMS_PArtner'] != "" && $record['Project_Execution_Detail'][0]['Allocate_to_EMS_PArtner'] != null) { ?>
                                                <td><?php echo htmlspecialchars($record['Project_Execution_Detail'][0]['Allocate_to_EMS_PArtner']['Name_of_the_Organisation'] ?? "-"); ?></td>
                                            <?php } elseif ($record['Project_Execution_Detail'][0]['Production_Allocation_to_Fabrication_Vendor'] != "" && $record['Project_Execution_Detail'][0]['Production_Allocation_to_Fabrication_Vendor'] != null) { ?>
                                                <td><?php echo htmlspecialchars($record['Project_Execution_Detail'][0]['Production_Allocation_to_Fabrication_Vendor']['Name_Of_Organisation'] ?? "-"); ?></td>
                                            <?php } else {
                                                ?> <td>-</td> <?php
                                            } ?>                                       
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
                                <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
                            <?php } ?>

                               
                        </div>
                    </div>

                    <div id="production_p" class="tab-pane">
                        <div class="table table-responsive">
                        <?php if (isset($completepro_dash_res_data['data']) && count($completepro_dash_res_data['data']) > 0){ ?>
                            <table style="width:100%" class="table table-striped" id="proj_dash_data1">
                                <thead class="table-primary">
                                    <tr>
                                        <th>
                                            <div class="dropdown hidecolumn" id="pp_hdropdown">
                                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-eye"></i>  
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item d-none" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="0" checked> Project No</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="1" checked> Project No</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="2" checked> Project Title</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="3" checked> Project Tracker</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="4" checked> Project Phase </label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="5" checked> Total Cost (INR)</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_pp" data-column="6" checked> Project Collateral</label>
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>Project No</th>
                                        <th>Project Title</th>
                                        <th>Project Tracker</th>
                                        <th>Project Phase</th>
                                        <th>Total Cost (INR) </th>
                                        <th>Partner Organisation</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($completepro_dash_res_data['data'] as $record){ ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo htmlspecialchars($record['Project_Number']  ?? "-"); ?></td>
                                            <?php $completeUrl = "https://customerportal.machinemaze.com/datapages/project_report.php?ID=" . htmlspecialchars($record['ID']); ?>
                                            <td><a href='<?php echo $completeUrl; ?>' target="_blank"><?php echo htmlspecialchars($record['Link_Field']['value']  ?? "-"); ?></a></td>                                            <td><?php echo htmlspecialchars_decode($record['Project_Tracker']  ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Project_Phase_New']  ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Total_Cost_INR']  ?? "-"); ?></td>
                                            <?php if ($record['Project_Execution_Detail'][0]['Production_Allocation_to_M_F_Partner'] != "" && $record['Project_Execution_Detail'][0]['Production_Allocation_to_M_F_Partner'] != null) { ?>
                                                <td><?php echo htmlspecialchars($record['Project_Execution_Detail'][0]['Production_Allocation_to_M_F_Partner']['Name_of_the_Organisation'] ?? "-"); ?></td>
                                            <?php } elseif ($record['Project_Execution_Detail'][0]['Allocate_to_EMS_PArtner'] != "" && $record['Project_Execution_Detail'][0]['Allocate_to_EMS_PArtner'] != null) { ?>
                                                <td><?php echo htmlspecialchars($record['Project_Execution_Detail'][0]['Allocate_to_EMS_PArtner']['Name_of_the_Organisation'] ?? "-"); ?></td>
                                            <?php } elseif ($record['Project_Execution_Detail'][0]['Production_Allocation_to_Fabrication_Vendor'] != "" && $record['Project_Execution_Detail'][0]['Production_Allocation_to_Fabrication_Vendor'] != null) { ?>
                                                <td><?php echo htmlspecialchars($record['Project_Execution_Detail'][0]['Production_Allocation_to_Fabrication_Vendor']['Name_Of_Organisation'] ?? "-"); ?></td>
                                            <?php } else {
                                                ?> <td>-</td> <?php
                                            } ?>   
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
                                <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
                            <?php } ?>
                                
                        </div>
                    </div>

                    <div id="cancelled_p" class="tab-pane">
                        <div class="table table-responsive">
                            <?php if (isset($cancelledpro_dash_res_data['data']) && count($cancelledpro_dash_res_data['data']) > 0){ ?>
                            <table style="width:100%" class="table table-striped" id="proj_dash_data2">
                                <thead class="table-primary">
                                    <tr>
                                        <th>
                                            <div class="dropdown hidecolumn" id="cancel_hdropdown" >
                                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-eye"></i>  
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li>
                                                        <a class="dropdown-item d-none"  href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="0" checked> Project No</label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="1" checked> Project No</label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="2" checked> Project Title</label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="3" checked> Project Tracker</label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="4" checked> Project Phase </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="5" checked> Total Cost (INR)</label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <label><input type="checkbox" class="toggleColumn_cancel" data-column="6" checked> Project Collateral</label>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>Project No</th>
                                        <th>Project Title</th>
                                        <th>Project Tracker</th>
                                        <th>Project Phase </th>
                                        <th>Total Cost (INR) </th>
                                        <th>Project Collateral</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($cancelledpro_dash_res_data['data'] as $record){ ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo htmlspecialchars($record['Project_Number'] ?? "-"); ?></td>
                                            <?php $cancelledUrl = "https://customerportal.machinemaze.com/datapages/project_report.php?ID=" . htmlspecialchars($record['ID']); ?>
                                            <td><a href='<?php echo $cancelledUrl; ?>' target="_blank"><?php echo htmlspecialchars($record['Project_Title']  ?? "-"); ?></a></td>  
                                            <td><?php echo htmlspecialchars($record['Project_Title'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars_decode($record['Project_Tracker'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Project_Phase_New'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Total_Cost_INR'] ?? "-"); ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <?php } else { ?>
                                <img src="https://achieversacademyalwar.in/assets/images/no-record-found.png" class="mx-auto d-flex" style="mix-blend-mode: luminosity;">
                            <?php } ?>
                                
                        </div>
                    </div>

                    <div id="onhold_p" class="tab-pane">
                        <div class="table table-responsive">
                        <?php if (isset($holdpro_dash_res_data['data']) && count($holdpro_dash_res_data['data']) > 0) { ?>

                            <table style="width:100%" class="table table-striped" id="proj_dash_data3">
                                <thead class="table-primary">
                                    <tr>
                                        <th>
                                            <div class="dropdown hidecolumn" id="hold_hdropdown" >
                                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-eye"></i> 
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item d-none" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="0" checked> Project No</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="1" checked> Project No</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="2" checked> Project Title</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="3" checked> Project Tracker</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="4" checked> Project Phase </label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="5" checked> Total Cost (INR)</label>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                    <label><input type="checkbox" class="toggleColumn_hold" data-column="6" checked> Project Collateral</label>
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>Project No</th>
                                        <th> Project Title</th>
                                        <th>Project Tracker</th>
                                        <th>Project Phase Current (Auto Field)</th>
                                        <th>Total Cost (INR) </th>
                                        <th>Project Collateral</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($holdpro_dash_res_data['data'] as $record) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo htmlspecialchars($record['Project_Number'] ?? "-"); ?></td>
                                            <?php $onHoldUrl = "https://customerportal.machinemaze.com/datapages/project_report.php?ID=" . htmlspecialchars($record['ID']); ?>
                                            <td><a href='<?php echo $onHoldUrl; ?>' target="_blank"><?php echo htmlspecialchars($record['Project_Title']  ?? "-"); ?></a></td>  
                                            <td><?php echo htmlspecialchars_decode($record['Project_Tracker'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Project_Phase_New'] ?? "-"); ?></td>
                                            <td><?php echo htmlspecialchars($record['Total_Cost_INR'] ?? "-"); ?></td>
                                            <td>--</td>
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

        </div>
        </div>
    </div>
    <!------------------------------------->
</div>

<script>
    // new DataTable('#proj_dash_data');
    // new DataTable('#proj_dash_data1');
    // new DataTable('#proj_dash_data2');
    // new DataTable('#proj_dash_data3');

    $(document).ready(function() {
        var table = $('#proj_dash_data').DataTable();
        var table1 = $('#proj_dash_data1').DataTable();
        var table2 = $('#proj_dash_data2').DataTable();
        var table3 = $('#proj_dash_data3').DataTable();

        $('.toggleColumn_op, .toggleColumn_pp, .toggleColumn_cancel, .toggleColumn_hold').each(function() {
            var columnIndex = $(this).data('column');

            // Ensure all columns are visible on page load
            table.column(columnIndex).visible(true);
            table1.column(columnIndex).visible(true);
            table2.column(columnIndex).visible(true);
            table3.column(columnIndex).visible(true);
        });

        $('.toggleColumn_op').change(function() {
            var columnIndex = $(this).data('column');
            var column = table.column(columnIndex);
            column.visible($(this).is(':checked'));
        });

        $('.toggleColumn_pp').change(function() {
            var columnIndex = $(this).data('column');
            var column = table1.column(columnIndex);
            column.visible($(this).is(':checked'));
        });

        $('.toggleColumn_cancel').change(function() {
            var columnIndex = $(this).data('column');
            var column = table2.column(columnIndex);
            column.visible($(this).is(':checked'));
        });

        $('.toggleColumn_hold').change(function() {
            var columnIndex = $(this).data('column');
            var column = table3.column(columnIndex);
            column.visible($(this).is(':checked'));
        });

    });

</script>