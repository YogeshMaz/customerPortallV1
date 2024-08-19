<?php 
 include '../header.php';
?>

<style>
       .no-break {
            page-break-inside: avoid;
        }

        /* Force page breaks before/after elements */
        .page-break {
            page-break-before: always;
            page-break-after: always;
        }

    @media print {

        .page-break-before {
            page-break-before: always;
        }
        .page-break-after {
            page-break-after: always;
        }
        .no-page-break {
            page-break-inside: avoid;
        }

        .noPrint {
            display: none;
        }

        #profileSec li span:first-child {
            min-width: max-content;
        }
        table { font-size:12px; }

    }

    @page {
        margin: 10mm;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    body, .content {
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .table.gdetails tbody tr td {
        border-bottom: 1px solid #fff;
        min-width: 180px;
    }

    .table.gdetails tbody tr td:first-child {
        font-weight: 600;
    }

    body {
        font-size: 15px;
    }

    #profileSec li {
        justify-content: left;
        display: flex;
        padding: 8px 10px;
        word-break: break-word;
    }

    #profileSec li span:first-child {
        font-weight: 700;
        min-width: 200px;
    }

    .brdr-rgt-1 {
        border-right: 1px solid #e0e0e0;
    }

    ul.vertical li {
        display: flex;
    }

    ul.vertical li p {
        margin-bottom: 0rem;
        font-size: 15px;
    }

    table {
        font-size: 15px;
    }

    .table tbody tr td {
        border-bottom: 2px solid #cfe2ff;
    }

    thead.table-primary tr>th {
        border-bottom: 3px solid #cfe2ff;
    }

    h5.mb-2 {
        color: #0070ba;
    }
</style>

<?php
require_once '../getdata.php';
$timeline_data1 = array();
$timeline_data = array();
// Check if the ID parameter is set in the URL
if (isset($_GET['ID'])) {
    $id = htmlspecialchars($_GET['ID']);
    // echo $id;
    $proj_dashboard_title_data = return_project_dash_id($id);
    // echo json_encode($proj_dashboard_title_data['data']);
    // Fetch project timeline data based on project phase
    if (count($proj_dashboard_title_data['data']['M_F_AND_EMS_PROJECT_TRACKING']) > 0) {
        $allM_F_Projects = $proj_dashboard_title_data['data']['M_F_AND_EMS_PROJECT_TRACKING'];
        foreach ($allM_F_Projects as $eachMndFRec) {
            // echo "M&F / EMS : " . json_encode($eachMndFRec['Project_Phase']) . '<br>';
            $timeline_data1["data"][] = [
                'Project_Phase' => $eachMndFRec['Project_Phase'],
                'PLANNED_DATE' => $eachMndFRec['PLANNED_DATE'],
                'ACTUAL_DATE' => $eachMndFRec['ACTUAL_DATE']
            ];
        }
    }
    if (isset($proj_dashboard_title_data['data']['FABRICATION_PROJECT_TRACKING'][0]['PROJECT_STAGE'])) {
        $fab_Projects = $proj_dashboard_title_data['data']['FABRICATION_PROJECT_TRACKING'];
        foreach ($fab_Projects as $eachFabRec) {
            // echo "Fab : " . json_encode($eachFabRec['PROJECT_STAGE']);
            $timeline_data["data"][] = [
                'PROJECT_STAGE' => $eachFabRec['PROJECT_STAGE'],
                'PLANNED_DATE' => $eachFabRec['PLANNED_DATE'],
                'ACTUAL_DATE' => $eachFabRec['ACTUAL_DATE']
            ];
        }
    }
    // echo json_encode($timeline_data1);
    // if ($proj_dashboard_title_data['data']['Project_Phase_New'] == 'DELIVERED') {
    //     $timeline_data = $completepro_dash_res_data['data'][0]['M_F_AND_EMS_PROJECT_TRACKING'];
    // } elseif ($proj_dashboard_title_data['data']['Project_Phase_New'] == 'CANCELLED') {
    //     $timeline_data = $cancelledpro_dash_res_data['data'][0]['M_F_AND_EMS_PROJECT_TRACKING'];
    // } elseif ($proj_dashboard_title_data['data']['Project_Phase_New'] == 'ON HOLD') {
    //     $timeline_data = $holdpro_dash_res_data['data'][0]['M_F_AND_EMS_PROJECT_TRACKING'];
    // }elseif($proj_dashboard_title_data['data']['Project_Phase_New'] != 'DELIVERED'&& $proj_dashboard_title_data['data']['Project_Phase_New'] != 'CANCELLED' && $proj_dashboard_title_data['data']['Project_Phase_New'] != 'ON HOLD' ){
    //     $timeline_data = $project_dash_res_data['data'][0]['M_F_AND_EMS_PROJECT_TRACKING'];
    // }
    // else{
    //     $timeline_data = array(); // Default empty array if phase is neither delivered nor cancelled
    // }
} else {
    echo "ID parameter not found in URL";
}
?>

<div class="container-fluid">
    <div class="row my-3">

        <div class="col-md-9">
            <?php
            if ($proj_dashboard_title_data['data']['D_link'] != NULL && $proj_dashboard_title_data['data']['D_link'] != "") { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <iframe class="containerr" height='500px' width='100%' frameborder='0' scrolling='Auto' src='<?php echo $proj_dashboard_title_data['data']['D_link']; ?>'></iframe>
                    </div>
                </div>
            <?php }
            ?>
            <div class="report" id="content-to-download">

                <div class="row justify-content-center no-break" id="profileSec">
                    <div class="col-xl-12 col-lg-12 col-md-12 p-3">
                        <div class="d-flex justify-content-between">
                            <img src="../images/logomm.jpg" width="70px" class="mb-3">
                            <h3 class="mb-3">Project Report</h3>
                            <div class="noPrint">
                                <button id="print-pdf" class="btn btn-sm btn-primary">Print</button>
                                <button id="download-pdf" class="btn btn-sm btn-primary">Download </button>
                            </div>
                        </div>

                        <div class="card profile_shadow border-0">
                            <div class="card-body">
                                <div class="row">

                                    <h5 class="mb-2">General Details</h5>
                                    <div class="col-lg-6 brdr-rgt-1">
                                        <div class="table gdetails">
                                            <table width="100%">
                                                <tr>
                                                    <td>Project Number</td>
                                                    <td><?php echo $proj_dashboard_title_data['data']['Project_Number']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Project Title</td>
                                                    <td id="project_title"><?php echo $proj_dashboard_title_data['data']['Project_Title']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Project Category</td>
                                                    <td>
                                                        <?php
                                                        if (is_array($proj_dashboard_title_data['data']['Project_Category'])) {
                                                            foreach ($proj_dashboard_title_data['data']['Project_Category'] as $category) {
                                                                echo htmlspecialchars($category) . "<br>";
                                                            }
                                                        } else {
                                                            echo htmlspecialchars($proj_dashboard_title_data['data']['Project_Category']);
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Current Project Phase</td>
                                                    <td><?php echo $proj_dashboard_title_data['data']['Project_Phase_New']; ?></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="table gdetails">
                                            <table width="100%">
                                                <tr>
                                                    <td>Customer Name</td>
                                                    <td><?php echo $proj_dashboard_title_data['data']['Customer_Organisation_Name_Email_Phone']['Customer_Name.first_name'] . ' ' . $proj_dashboard_title_data['data']['Customer_Organisation_Name_Email_Phone']['Customer_Name.last_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Organisation</td>
                                                    <td><?php echo $proj_dashboard_title_data['data']['Customer_Organisation_Name_Email_Phone']['Customer_Organisation']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Email</td>
                                                    <td><?php echo $proj_dashboard_title_data['data']['Customer_Email']; ?></td>
                                                </tr>
                                                <tr> 
                                                    <td>Quantity Floated </td>
                                                    <td><?php echo $proj_dashboard_title_data['data']['Quantity_Floated']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <h5 class="mb-2">Manager Details </h5>

                                    <div class="col-lg-6 brdr-rgt-1">

                                        <li>
                                            <span class="pe-5">MachineMaze Project Manager</span>
                                            <span><?php echo $proj_dashboard_title_data['data']['MachineMaze_Project_Manager1']['zc_display_value']; ?></span>
                                        </li>
                                        <li>
                                            <span class="pe-5">Phone of Project Manager</span>
                                            <span>-</span>
                                        </li>
                                    </div>

                                    <div class="col-lg-6">
                                        <li>
                                            <span class="pe-5">Email of Project Manager</span>
                                            <span><?php echo $proj_dashboard_title_data['data']['Email_MachineMaze']; ?></span>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- section 2 Execution Details -->
                <div class="row justify-content-center no-break"  id="profileSec">
                    <div class="col-xl-12 col-lg-12 col-md-12 p-3 ">

                        <div class="card profile_shadow border-0">
                            <?php if (count($proj_dashboard_title_data['data']['Project_Execution_Detail']) > 0) : ?>
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="mb-2">Execution Details </h5>
                                    <div class="table table-responsive">
                                        <table class="table">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>RFQ Reference Number </th>
                                                    <th>Partner Organization</th>
                                                    <th>Category</th>
                                                    <th>Cost Per Unit (INR)- Landed </th>
                                                    <th>Quantity/ Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $previousRFQNumber = null;
                                                $rowCount = [];
                                                foreach ($proj_dashboard_title_data['data']['Project_Execution_Detail'] as $detail) {
                                                    $rfqNumber = $detail['RFQ_Reference_Number']['RFQ_Reference_Number'] ?? "-";
                                                    if (!isset($rowCount[$rfqNumber])) {
                                                        $rowCount[$rfqNumber] = 0;
                                                    }
                                                    $rowCount[$rfqNumber]++;
                                                }

                                                foreach ($proj_dashboard_title_data['data']['Project_Execution_Detail'] as $detail) {
                                                    $rfqNumber = $detail['RFQ_Reference_Number']['RFQ_Reference_Number'] ?? "-";
                                                    ?>
                                                    <tr>
                                                        <?php if ($rfqNumber !== $previousRFQNumber) { ?>
                                                            <td rowspan="<?php echo $rowCount[$rfqNumber]; ?>"><?php echo $rfqNumber; ?></td>
                                                        <?php } ?>
                                                        <?php if ($detail['Production_Allocation_to_M_F_Partner'] != "" && $detail['Production_Allocation_to_M_F_Partner'] != null) { ?>
                                                            <td><?php echo $detail['Production_Allocation_to_M_F_Partner']['zc_display_value'];
                                                                $category = "PC&A"; ?></td>
                                                        <?php } elseif ($detail['Allocate_to_EMS_PArtner'] != "" && $detail['Allocate_to_EMS_PArtner'] != null) { ?>
                                                            <td><?php echo $detail['Allocate_to_EMS_PArtner']['zc_display_value'];
                                                                $category = "EMS"; ?></td>
                                                        <?php } elseif ($detail['Production_Allocation_to_Fabrication_Vendor'] != "" && $detail['Production_Allocation_to_Fabrication_Vendor'] != null) { ?>
                                                            <td><?php echo $detail['Production_Allocation_to_Fabrication_Vendor']['zc_display_value'];
                                                                $category = "EMS"; ?></td>
                                                        <?php } else {
                                                        } ?>
                                                        <td><?php echo $category ?></td>
                                                        <td><?php echo $detail['Cost_Per_Unit_INR_Landed'] ?? "-"; ?></td>
                                                        
                                                        <td><?php echo $detail['Quantity_Year'] ?? "-"; ?></td>
                                                    </tr>
                                                    <?php
                                                    $previousRFQNumber = $rfqNumber;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-center no-break"  id="profileSec">
                    <div class="col-xl-12 col-lg-12 col-md-12 p-3 ">

                        <div class="card profile_shadow border-0">
                            <?php if (count($proj_dashboard_title_data['data']['Project_Collateral']) > 0) : ?>
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="mb-2">Project Collateral (Documents Exchanged)</h5>

                                        <div class="table table-responsive">
                                            <table class="table">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Upload Type</th>
                                                        <th>Note - About the attachment.</th>
                                                        <th>File upload</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $stableContent = [
                                                        'data' => []
                                                    ];

                                                    foreach ($proj_dashboard_title_data['data']['Project_Collateral'] as $pro_cal_upload_type) {
                                                        if ($pro_cal_upload_type['Upload_Type'] != "" && $pro_cal_upload_type['Upload_Type'] != null) {
                                                            $uploadType = $pro_cal_upload_type['Upload_Type'];
                                                            $noteAboutAttachment = $pro_cal_upload_type['Note_About_the_attachment'];

                                                            // Check if a file is uploaded
                                                            if ($pro_cal_upload_type['File_upload'] != "" && $pro_cal_upload_type['File_upload'] != null) {
                                                                $File_uploadPath = explode('?', $pro_cal_upload_type['File_upload']);
                                                                $File_upload = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/machinemaze-project-management/All_Machine_Maze_Project_Trackings/88342000002318021/Project_Collateral.File_upload/" . $pro_cal_upload_type['ID'] . "/image-download/nGv00gD4NCg0Y6sP3GpXFjywhnGwH1WNwKXpQa9aByhnPMEeSSbwk5asWrRRqZa51aT5OhZqRkeQjzkW8heSwMhtztjhGVB9B5mn?" . $File_uploadPath[1];
                                                            } else {
                                                                $File_upload = ""; // Set an empty string if no file is uploaded
                                                            }

                                                            // Increment count and store notes and download link
                                                            if (!isset($stableContent['data'][$uploadType])) {
                                                                $stableContent['data'][$uploadType] = [
                                                                    'count' => 0,
                                                                    'notes' => [],
                                                                    'File_upload' => []
                                                                ];
                                                            }

                                                            $stableContent['data'][$uploadType]['count']++;
                                                            $stableContent['data'][$uploadType]['notes'][] = $noteAboutAttachment;
                                                            $stableContent['data'][$uploadType]['File_upload'][] = $File_upload; // Store each file upload link in the array
                                                        }
                                                    }
                                                    ?>

                                                    <!-- Project Collateral (Documents Exchanged) -->
                                                <tbody>
                                                    <?php foreach ($stableContent['data'] as $uploadType => $pro_col) { ?>
                                                        <?php for ($i = 0; $i < count($pro_col['notes']); $i++) { ?>
                                                            <tr>
                                                                <?php if ($i == 0) { ?>
                                                                    <td rowspan="<?php echo count($pro_col['notes']); ?>" style="align-content: center;"><?php echo $uploadType; ?></td>
                                                                <?php } ?>
                                                                <td><?php echo $pro_col['notes'][$i]; ?></td>
                                                                <td style="text-align: center;">
                                                                    <?php if (!empty($pro_col['File_upload'][$i])) { ?>
                                                                        <a href='<?php echo $pro_col['File_upload'][$i]; ?>' download><img src="../images/dlod3.png" width="20px"></a>
                                                                    <?php } else { ?>
                                                                        No file uploaded<br>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>

                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-center no-break"  id="profileSec">
                    <div class="col-xl-12 col-lg-12 col-md-12 p-3 ">

                        <div class="card profile_shadow border-0">
                            <?php if (count($proj_dashboard_title_data['data']['COMMENTS']) > 0) : ?>
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="mb-2">Communication Flow </h5>
                                        <div class="table table-responsive">
                                            <table class="table">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Content</th>
                                                        <th>Upload Files</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $displayedUsers = [];
                                                    foreach ($proj_dashboard_title_data['data']['COMMENTS'] as $eachComments) :
                                                        if (!in_array($eachComments['Comment_By'], $displayedUsers)) :
                                                            $displayedUsers[] = $eachComments['Comment_By'];
                                                    ?>
                                                            <tr>
                                                                <td colspan="3" class="bg-secondary-subtle">
                                                                    <strong>Comment By - </strong>
                                                                    <?php echo $eachComments['Comment_By']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <tr>
                                                            <td><?php echo $eachComments['Sl_No']; ?></td>
                                                            <td><?php echo $eachComments['Content']; ?></td>
                                                            <?php
                                                            $Upload_Relevant_Files = "";
                                                            if (!empty($eachComments['Upload_Relevant_Files'])) {
                                                                $Upload_Relevant_Files_FilePath = explode('?', $eachComments['Upload_Relevant_Files']);
                                                                $Upload_Relevant_Files = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/machinemaze-project-management/All_Machine_Maze_Project_Trackings/" . $eachComments['ID'] . "/COMMENTS.Upload_Relevant_Files/image-download/nGv00gD4NCg0Y6sP3GpXFjywhnGwH1WNwKXpQa9aByhnPMEeSSbwk5asWrRRqZa51aT5OhZqRkeQjzkW8heSwMhtztjhGVB9B5mn?" . $Upload_Relevant_Files_FilePath[1];
                                                            }
                                                            ?>
                                                            <td class="text-center">
                                                                <a href='<?php echo $Upload_Relevant_Files; ?>' download>
                                                                    <img src="../images/dlod3.png" width="20px">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-center no-break"  id="profileSec">
                    <div class="col-xl-12 col-lg-12 col-md-12 p-3 ">

                        <div class="card profile_shadow border-0">
                            <?php if (count($proj_dashboard_title_data['data']['Delivery_Schedule_Bi_Directoinal']) > 0) : ?>
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="mb-2">Delivery Schedule</h5>

                                        <div class="table table-responsive">
                                            <table class="table">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Shipped Quantity</th>
                                                        <th>Accepted Quantity</th>
                                                        <th>Unit</th>
                                                        <th>Planned Date</th>
                                                        <th>Actual Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $lastItemDescription = '';
                                                    foreach ($proj_dashboard_title_data['data']['Delivery_Schedule_Bi_Directoinal'] as $index => $d_sch) {
                                                        $currentItemDescription = $d_sch['Item_Description_Item_Part_No'];

                                                        if ($index === 0 || $currentItemDescription !== $lastItemDescription) {
                                                            // Display the item description only if it's the first row or has changed
                                                    ?>

                                                            <tr>
                                                                <td colspan="5" class="bg-secondary-subtle">
                                                                    <strong> Part Name - </strong> <?php echo $currentItemDescription; ?>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                            $lastItemDescription = $currentItemDescription;
                                                        }
                                                        ?>

                                                        <tr>
                                                            <td><?php echo $d_sch['Qty']; ?></td>
                                                            <td><?php echo $d_sch['Customer_Accepted_Quantity'] ?></td>
                                                            <td><?php echo $d_sch['Unit']; ?></td>
                                                            <td><?php echo $d_sch['Delivery_Date']; ?></td>
                                                            <td><?php echo $d_sch['Actual_Date_of_Delivery'] ?></td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-center no-break"  id="profileSec">
                    <div class="col-xl-12 col-lg-12 col-md-12 p-3 ">

                        <p>For any details pls contact </p>

                        <p>Regards,</p>

                        <p>Machinemaze Team</p>

                        <p>www.machinemaze.com</p>

                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-3 noPrint">
            <?php if (count($proj_dashboard_title_data['data']['Project_Category']) > 0) : ?>
                <div class="report">
                    <?php
                    $projectCategory = $proj_dashboard_title_data['data']['Project_Category'];
                    if (is_array($projectCategory)) {
                        $projectCategory = implode(', ', $projectCategory);
                    }
                    if (strpos($projectCategory, '-M&F') !== false) : ?>
                        <h5 class="py-2">Project Timeline - M&F</h5>
                    <?php endif; ?>
                    <?php
                    if (strpos($projectCategory, '-EMS') !== false) : ?>
                        <h5 class="py-2">Project Timeline - EMS</h5>
                    <?php endif; ?>
                    <?php if (strpos($projectCategory, '-FAB') !== false) : ?>
                        <h5 class="py-2">Project Timeline - Fabrication</h5>
                    <?php endif; ?>
                    <div class="card profile_shadow border-0">
                        <div class="card-body px-2">
                            <?php if (strpos($projectCategory, '-M&F') !== false || strpos($projectCategory, '-EMS') !== false) : ?>
                                <ul class="list-ic vertical">
                                    <?php
                                    // Display timeline data

                                    foreach ($timeline_data1["data"] as $phaseMndF) {
                                    ?>
                                        <li>
                                            <span class="success"><i class="fa fa-check"></i></span>
                                            <div class="px-2 py-2">
                                                <p><strong><?php echo $phaseMndF['Project_Phase'] ?? "-"; ?></strong></p>
                                                <p><?php echo $phaseMndF['PLANNED_DATE'] ?? "-"; ?> <b>Planned</b></p>
                                                <p><?php echo $phaseMndF['ACTUAL_DATE'] ?? "-"; ?> <b>Actual</b></p>
                                            </div>
                                        </li>
                                    <?php }  ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (strpos($projectCategory, '-FAB') !== false) : ?>
                                <ul class="list-ic vertical">
                                    <?php
                                    // Display timeline data Fab
                                    foreach ($timeline_data["data"] as $phaseFab) {
                                    ?>
                                        <li>
                                            <span class="success"><i class="fa fa-check"></i></span>
                                            <div class="px-2 py-2">
                                                <p><strong><?php echo $phaseFab['PROJECT_STAGE']; ?></strong></p>
                                                <p><?php echo $phaseFab['PLANNED_DATE'] ?? "-"; ?> <b>Planned</b></p>
                                                <p><?php echo $phaseFab['ACTUAL_DATE'] ?? "-"; ?> <b>Actual</b></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <!-- <li>
                                <span class="warning"><i class="fa fa-info"></i></span>
                                <div class="px-2 py-2">
                                    <p><strong>Partner Engagement/RFQ Response</strong></p>
                                    <p>01-Mar-2023 <b>Planned</b><p>
                                    <p>01-Mar-2023 <b>Actual</b></p>
                                </div>
                            </li>
                            <li>
                                <span class="danger"><i class="fa fa-times"></i></span>
                                <div class="px-2 py-2">
                                    <p><strong>Price Discovery</strong></p>
                                    <p>01-Mar-2023 <b>Planned</b><p>
                                    <p>01-Mar-2023 <b>Actual</b></p>
                                </div>
                            </li>
                            <li>
                                <span class="success"><i class="fa fa-check"></i></span>
                                <div class="px-2 py-2">
                                    <p><strong>Requirement Discussion</strong></p>
                                    <p>01-Mar-2023 <b>Planned</b><p>
                                    <p>01-Mar-2023 <b>Actual</b></p>
                                </div>
                            </li> -->
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    $('.member-title').click(function(e) {
        console.log("Clicked");
        $(this).next().slideToggle();
        $(this).next().next().next().slideToggle();
    });
    document.addEventListener('DOMContentLoaded', function() {
        const btnDownload = document.getElementById('download-pdf');
        const projectElement = document.getElementById('project_title');
        const getprojectTitle = projectElement ? projectElement.textContent.trim() || 'No_Title.pdf' : 'No_Title.pdf';
        btnDownload.addEventListener('click', function() {
            // document.getElementById("noPrint").style.display = "none";
            const element = document.getElementById('content-to-download');
            console.log("elemetn ", element);
            html2pdf()
                .from(element)
                .save(getprojectTitle);
        });
        const btnPrint = document.getElementById('print-pdf');
        btnPrint.addEventListener('click', function() {
            // document.getElementById("noPrint").style.display = "none";
            window.print();
        });
    });
</script>


<?php include '../footer.php' ?>