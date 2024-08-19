<div id="qcSec" style="display: none;">
            <!---------------Quality control section-------------------->
            <div style="width:100%;"  class="container-fluid">
              <div class="col-md-12 col-sm-8 ">
                <div class="">
                    <div class="card mb-4 mt-2 tablecard">
                      <div class="card-header d-flex justify-content-between">
                          <h5 class="my-1 fw-bold text-primary">Quality Control</h5>
                          <b>Total Records : <span><?php  echo $quality_controls_data_count ?></span></b>   
                      </div>
                      <div class="card-body pt-1">
                          
                        <div class="table table-responsive">
                            <table style="width:100%" class="table table-striped" id="qc_table">
                                <thead class="table-primary">
                                  <tr>
                                      <th>Inspection Status</th>
                                      <th>Schedule Date of QC</th>
                                      <th>Schedule Time Of QC</th>
                                      <th>Project Phase</th>
                                      <th>Component / Assembly Drawing</th>
                                      <th>Location of QC If Other</th>
                                      <th>QC Carried Out By</th>
                                      <th>Email of Project Manager</th>
                                      <th>Update Vendor Inspection Report</th>
                                      <th>Raw Material Test Certificate - Upload</th>
                                      <th>QC Witnessed By</th>
                                      <th>Upload Quality Report</th>
                                      <th>Inspected Qty</th>
                                      <th>Rejected Qty</th>
                                      <th>Approved Qty</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td colspan="15">MP/21-22/004 MAY REQUIREMENT - 06-May-202213</td>
                                  </tr>
                                  <?php if (isset($quality_controls_data['data']) && count($quality_controls_data['data']) > 0): ?>
                                        <?php foreach ($quality_controls_data['data'] as $record): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($record['Inspection_Status'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Schedule_Date_of_QC'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Schedule_Time_Of_QC'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Project_Phase'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Component_Assembly_Drawing'] ?? "-"); ?></td>
                                                <td><?php //echo htmlspecialchars($record['Location_of_QC'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['QC_Carried_Out_By'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Machine_Maze_Project_Tracking.Email_MachineMaze'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Vendor_Inspection_Report'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Raw_Material_Test_Certificate_Upload'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['QC_Witnessed_By'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Upload_Quality_Report'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Project_Phase'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Rejected_Qty1'] ?? "-"); ?></td>
                                                <td><?php echo htmlspecialchars($record['Approved_Qty1'] ?? "-"); ?></td>
                                            </tr>

                                            <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td>No records found.</td>
                                                    </tr>
                                                <?php endif; ?>
                                
                                </tbody>
                            </table>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!----------------------------------------------------->	
          </div>

<script>  
    new DataTable('#qc_table');  
</script>