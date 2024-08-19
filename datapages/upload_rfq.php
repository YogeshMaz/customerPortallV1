<?php 
session_start();
include '../header.php';
include '../nav.php';
include '../footer.php';

$rfq_no = "";
if (isset($_GET['formAction']) && $_GET['formAction'] == "submission_sucessful") {  
            // $alert = htmlspecialchars($_GET['formAction']); // Escape the input to prevent XSS attacks
        echo "<center> <div class='alert alert-success alert-dismissible fade show mt-2 mx-5' role='alert'>
        <strong> RFQ form has been submitted successfully</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div></center>";
} else if (isset($_GET['formAction']) && $_GET['formAction'] == "submission_failed") {
    echo "<center> <div class='alert alert-danger alert-dismissible fade show mt-2 mx-5' role='alert'>
            <strong> RFQ form not created. Please, contact your admin!</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div></center>";
} else{
// 
}
?>

<style>
    .form-control {
        box-shadow: 0 .125rem .25rem 0 rgba(58, 59, 69, .2) !important;
        border-color: #c5e0f2;
    }

    input.form-control,
    select.form-control {
        height: 40px;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    canvas {
        border: 1px solid black;
    }

    canvas#signature-canvas {
        width: 100%;
        border-radius: .375rem;
        border-color: #cfe2ff;
    }

    /* .form-control:valid:not([required]) {
      border-color: #ced4da;
      background-image:none;
    } */

    .form-control:not(.is-required):not(:disabled):valid {
        border-color: #ced4da !important;
        padding-right: calc(1.5em + .75rem) !important;
        background-image: none !important;
    }

    .errortxt {
        display: none;
    }

    .form-select.is-invalid,
    .was-validated .form-select:invalid~.errortxt {
        display: block;
    }
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
<?php

$rfqdata = fetchDataOfUsers('Customerl_RFQ_Form_R_D_Report', 'rfq-management');
$rfqDataDecoded = json_decode($rfqdata, true);
$existingRfqNumber = $rfqDataDecoded['data'][0]['RFQ_Reference_Number'];
// Extract the numeric part from the end of the string
$prefix = preg_replace('/\d+$/', '', $existingRfqNumber);
$numericPart = preg_replace('/^\D+/', '', $existingRfqNumber);
// Increment the numeric part
$incrementedNumber = str_pad((int)$numericPart + 1, strlen($numericPart), '0', STR_PAD_LEFT);
// Reassemble the string with the incremented number
$newRfqNumber = $prefix . $incrementedNumber;
// echo $newRfqNumber; // Outputs: CURFQ00562

// Debugging output
// echo "<pre>";
// print_r($rfqDataDecoded);
// echo "</pre>";

$projectTypes = [ 'SINGLE COMPONENT- LOW PRECISION', 'SINGLE COMPONENT- HIGH PRECISION', 'MULTIPLE COMPONENTS', 'ASSEMBLY', 'PCB FABRICATION', 'PCB ASSEMBLY', 'COMPONENT SUPPLY', 'EMS- TESTING AND CERTIFICATION', 'HEAVY FABRICATION' ];
$certifications = [ 'ISO 9001-2008', 'ISO 9001-2015', 'AS9001D', 'IATF16949-2016', 'ISO13485-2016', 'AD2000W0', 'None' ];
$processes = [ 'Precision Component Machining', 'Die Casting', 'Sand Casting', 'Investment Casting', 'Forging', 'Sheet Metal Stamping', 'Injection Moulding', 'Heat Treatment', 'Metal Injection Moulding', 'Extrusion', 'Additive Manufacturing', 'PCB Fabrication', 'PCB Assembly & Testing', 'Component Sourcing', 'Heavy Fabrication' ];
$currencies = [ 'US Dollar $', 'Indian National Rupees ₹', 'Euro €' ];
$orderTypes = [ 'One Time', 'Recurring Order', 'Others' ];
$timeIntervals = [ 'WEEKLY', 'MONTHLY', 'QUARTERLY', 'HALF-YEARLY', 'YEARLY', 'OTHER' ];
// Define an array of country names 
$countries = [ 'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Congo, Democratic Republic of the', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czechia', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, Democratic People\'s Republic of', 'Korea, Republic of', 'Kuwait', 'Kyrgyzstan', 'Lao People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'North Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine, State of', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Réunion', 'Romania', 'Russian Federation', 'Rwanda', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Sint Maarten', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States of America', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Viet Nam', 'Wallis and Futuna', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe' ]; 

?>
<div id="rfqSec">
    <!------------Upload RFQ Sec------------->
    <div style="width:100%;" class="container-fluid">
        <div class="col-md-12 col-sm-8">
            <div class="card mb-4 mt-2 tablecard">
                <div class="card-header pt-3 d-flex justify-content-between">
                    <h5 class="my-1 fw-bold text-primary">Create RFQ</h5>
                    <p> <?php echo htmlspecialchars($toCheckRfqData); ?> </p>
                </div>
                <div class="card-body mt-2">
                    <!-- <iframe height='820px' width='100%' frameborder='0' allowTransparency='true' scrolling='auto' src='https://creatorapp.zohopublic.in/arun.ramu_machinemaze/rfq-management/form-embed/Manufacturing_RFQ_Form/z4mnRx79COuEUb73Mkj0bZ38W3MyZXd8O7r8rABYJOR1bVfWnrATEqvHgF4KFZwmwyJzqnbAPpJBjePGDbjTfX5DsZkZ6QR50k5Z'></iframe> -->
                        <form method="POST" action="validate_rfq.php" class="g-3 needs-validation" novalidate id="rfqForm" enctype="multipart/form-data">
                            
                        <div class="accordion mb-3" id="">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                                        <strong>RFQ Details <span class="text-danger">*</span></strong>
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row mt-2">

                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="rfqno" class="form-label">RFQ Reference Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="rfqno" name="rfqno" placeholder="Enter RFQ Number" value="<?php echo htmlspecialchars($newRfqNumber, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="rfqsdate" class="form-label">RFQ Start Date <span class="text-danger">*</span></label>
                                                    <input type="date" id="rfqsdate" class="form-control form-control-sm" name="rfqsdate" required />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="rfqedate" class="form-label">RFQ End Date <span class="text-danger">*</span></label>
                                                    <input type="date" id="rfqedate" class="form-control form-control-sm" name="rfqedate" required />
                                                </div>
                                            </div>

                                            <span id="result-3" class="text-end text-primary">&nbsp;</span>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="protype" class="form-label">Type of Project <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control" id="protype" name="protype" required>
                                                    <option value="" disabled selected>--Choose Type of Project--</option>
                                                        <?php foreach ($projectTypes as $type): ?>
                                                            <option><?php echo htmlspecialchars($type); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="targetp" class="form-label">Target Price/ Unit Quantity</label>
                                                    <input type="text" class="form-control" id="" currencyscriptval="INR" placeholder="##,##,###.##" name="targetp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="tov" class="form-label">Total Order Value</label>
                                                    <input type="text" class="form-control" id="" placeholder="##,##,###.##" name="tov">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="currency" class="form-label">Preferred Quotation Currency <span class="text-danger">*</span> </label>
                                                    <select class="form-select form-control" id="currency" name="currency" required>
                                                        <option value="" disabled selected>--Choose Currency--</option>
                                                        <?php foreach ($currencies as $eachCurrencies): ?>
                                                            <option><?php echo htmlspecialchars($eachCurrencies); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="mcc" class="form-label">Mandatory Compliance & Certification <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control" id="protype" name="mcc" required>
                                                        <option value="" disabled selected>--Choose Certification--</option>
                                                        <?php foreach ($certifications as $eachCert): ?>
                                                            <option><?php echo htmlspecialchars($eachCert); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="daoc" class="form-label">Describe- Any Other Compliance</label>
                                                    <input type="text" class="form-control" id="" placeholder="" name="daoc">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="uploadql" class="form-label">Upload Itemwise Quantity List</label>
                                                    <input type="file" class="form-control" id="" placeholder="" name="uploadql">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="rawmd" class="form-label">Raw Material Detail</label>
                                                    <input type="text" class="form-control" id="" placeholder="" name="rawmd">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="user_email" class="form-label">User Email <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="" value="<?php echo htmlspecialchars($email); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="pnd" class="form-label">Part Number : Description</label>
                                                    <textarea class="form-control" rows="5" id="pnd" name="pnd"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="bdotp" class="form-label">Brief Description of the Project <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="5" id="bdotp" name="bdotp"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="mir" class="form-label">Mandatory Inspection required <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="5" id="bdotp" name="mir" required></textarea>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-3" id="">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <strong> Job Details <span class="text-danger">*</span></strong>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="jobtype" class="form-label">Job Type <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control" aria-label="Default select example" name="jobtype" required>
                                                    <option value="" disabled selected>--Choose Job Type--</option>
                                                        <?php foreach ($processes as $eachProcess): ?>
                                                            <option><?php echo htmlspecialchars($eachProcess); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="uom" class="form-label">UOM</label>
                                                    <input type="text" class="form-control" id="uom" name="uom" placeholder="UOM">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="qyear" class="form-label">Quantity / Year <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="qyear" name="qyear" placeholder="123" required>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="qbatch" class="form-label">Quantity / Batch <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="qbatch" name="qbatch" placeholder="123" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="typefreq" class="form-label">Type of Frequency <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="typefreq" aria-label="Default select example" required>
                                                        <option value="" disabled selected>--Choose Type of Frequency--</option>
                                                        <?php foreach ($orderTypes as $eachOrderTypes): ?>
                                                            <option value="<?php echo htmlspecialchars($eachOrderTypes); ?>">
                                                                <?php echo htmlspecialchars($eachOrderTypes); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="bfreq" class="form-label">Batch Frequency <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="bfreq" aria-label="Default select example" required>
                                                        <option value="" disabled selected>--Choose Batch Frequency--</option>
                                                        <?php foreach ($timeIntervals as $eachTimeIntervals): ?>
                                                            <option><?php echo htmlspecialchars($eachTimeIntervals); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-3" id="">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <strong> Drawings/ Pictures/ Engineering Document <span class="text-danger">*</span></strong>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="mb-3">
                                                    <label for="uploadfile" class="form-label">Upload File Of Drawings/ Pictures/ Engineering Document <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="file" class="form-control" id="uploadfile" placeholder="" name="enggFileDoc" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-3" id="">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <strong> Shipment <span class="text-danger">*</span></strong>
                                    </button>
                                </h2>
                                <span class="errortxt">Fields are Required</span>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <h5>Ship To Address <span class="text-danger">*</span></h5>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Address Line1</label>
                                                    <input type="text" class="form-control" name="ship_add_line1" id="addline1" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Address Line2</label>
                                                    <input type="text" class="form-control" name="ship_add_line2" id="addline2" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">City / District </label>
                                                    <input type="text" class="form-control" name="ship_city" id="addline1" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">State</label>
                                                    <input type="text" class="form-control" name="ship_state" id="addline1" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control" name="ship_postal_code" id="addline1" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Country</label>
                                                    <select class="form-select form-control" name="ship_country" aria-label="Default select example" required>
                                                        <option value="" disabled selected>--Choose Country--</option>
                                                        <?php foreach ($countries as $eachCountries): ?>
                                                            <option><?php echo htmlspecialchars($eachCountries); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5>Ship to country</h5>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Country</label>
                                                    <select class="form-select form-control" name="ship_to_county" aria-label="Default select example" required>
                                                    <option value="" disabled selected>--Choose Country--</option>
                                                        <?php foreach ($countries as $eachCountries): ?>
                                                            <option><?php echo htmlspecialchars($eachCountries); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-3" id="">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                        <strong> Authorization <span class="text-danger">*</span></strong>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                 <div class="mb-3">
                                                    <label for="sign" class="form-label">Signature <span class="text-danger">*</span></label>
                                                    <canvas id="signature-canvas"></canvas>
                                                    <br>
                                                    <button type="button" id="clear-button" class="btn btn-danger mt-2">Clear Signature</button>
                                                    <input type="hidden" id="signature-data" name="signature-data" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="mailsend" class="form-label">Mail Send To</label>
                                                    <textarea class="form-control" id="mailsend" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="cemail" class="form-label">Customer Email</label>
                                                    <input type="email" class="form-control" name="cemail" id="cemail" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" Value="Submit">submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/2.3.2/signature_pad.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = document.getElementById('signature-canvas');
            var signaturePad = new SignaturePad(canvas);

            document.getElementById('rfqForm').addEventListener('submit', function(event) {
                var form = event.target;
                var signatureData = document.getElementById('signature-data');
                var isValid = true;

                // Clear previous validation states
                form.classList.remove('was-validated');
                form.querySelectorAll('.form-control').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                // Check required fields
                var requiredFields = form.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    }
                });

                // Check signature
                if (signaturePad.isEmpty()) {
                    alert('Please provide a signature.');
                    isValid = false;
                } else {
                    // Convert canvas to Base64 data URL
                    signatureData.value = signaturePad.toDataURL();
                }

                if (!isValid) {
                    event.preventDefault(); // Stop form submission
                    form.classList.add('was-validated');
                }
            });

            // Handle clear button
            document.getElementById('clear-button').addEventListener('click', function() {
                signaturePad.clear();
                document.getElementById('signature-data').value = ''; // Clear the hidden input
            });
        });
    </script>




