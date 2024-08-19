<style>
    @media print {
	  body { 
		page-break-after: always;
		font-size: 12px;
	  }
	  .noPrint{
		display:none;
	   }

	   @page {
			size: auto;
			margin: 0mm; 
			margin-top: 0;
			margin-bottom: 0;
			/* @top-center {
				content: none; 
			}
			@bottom-center {
				content: none; 
			} */
		}
  	}
  
        body {
			font-weight: 600;
        }
		
		.header_content{
			display: flex;
    		justify-content: space-evenly;
		}

        .content {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
		
		.rating_table{
			width: 100%;
			text-align: justify;
			border: 1px solid #eee;
			border-collapse: collapse;
		}
		
		.rating_table td{
			border: 1px solid #b5b4b4;
			border-collapse: collapse;
		}
		
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
		
		.wd_39_4{
			width: 39.4%;
		}
		
		.main_section{
			margin: 20px;
		}
		
		.alignCenter{
			text-align: center;
		}
		
		.machinemazeImg{
			border: 0px solid rgb(169, 169, 169);
			width: 100px;
			height: 100px;
		}
		
		.titleHeader{
			align-content: center;
			text-align: center;
		}
		
		.titleHeader1{
			align-content: center;
		}
		.brdr0 td{ border: 1px solid #fff;}

        .button {
            background-color: #04AA6D; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            }

            .button2 {background-color: #008CBA;} /* Blue */
			.button1 {background-color: green;} /* Blue */
              </style>

              <?php
              include '../getdata.php';
				if(isset($_GET['ID'])) {
					$id = htmlspecialchars($_GET['ID']);
					$prtnr_res_data_det = return_assessment_partner_details($id);
					// echo "ID from URL: $id";
				} else {
					echo "Template ID not found";
				}
			?>
  <div style="display: flex; justify-content: end;">
	<!-- <a href="http://localhost/customerportal/mf_dashboard.php"><button class="button button1 noPrint">Back to your partners</button></a> -->
	<button id="download-pdf" class="button button2">Download PDF</button>
	<button id="print-pdf" class="button button2">Print PDF</button>
  </div>
  <body class="breakhere">
	<table border="0" class="brdr0">
		<tr>
		<td class="alignCenter">
			<img class="zpImage machinemazeImg" size="M" alt="" title="" src="https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/customer-invoice/All_Org_Data/88342000001640019/Image/image-download/YfvzyEv0WUzVU0MVTC9UWsXge5UYqTexbQFDVDxrwAAwYmstm6JZSOqpFNB310Bhpsgu1zQ2VdpaC7GPjBwAq8EaeUYWW40Y8tTE?filepath=1654833412043_MM.jpeg" imageid="img_29353639999999944" imagetype="upload" fileid="925016000000137003" filename="1681325397222_MM.jpeg">
			<figcaption class="">MACHINE MAZE</figcaption>
			</td>
			<td class="alignCenter">
				<h2>MACHINEMAZE PARTNER ASSESSMENT</h2>
			</td>
		<td style="text-align: -webkit-center;">
      <?php 
      /** Document Logo */
      if($prtnr_res_data_det["data"]['plaod_logo_of_your_factory'] != "" && $prtnr_res_data_det["data"]['plaod_logo_of_your_factory'] != null){
        $logoFilePath = explode('?', $prtnr_res_data_det["data"]['plaod_logo_of_your_factory']);
        $logoImage = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/plaod_logo_of_your_factory/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $logoFilePath[1];
        ?>
        <img src='<?php echo $logoImage; ?>' class="machinemazeImg">
      <?php  
      } else{
        ?> <img src='https://st5.depositphotos.com/69915036/62675/v/450/depositphotos_626754468-stock-illustration-your-logo-here-placeholder-symbol.jpg'  class="machinemazeImg" /> <?php
      } ?>
			<figcaption style="max-width: 200px;"><?php echo htmlspecialchars($prtnr_res_data_det["data"]['Name_of_the_Organisation'] ?? "-"); ?></figcaption>
			</td>
		</tr>
</table>
		<br><br>
		<center><b>Information on this document is extremely confidential and to be used for the purpose of customer audit report. Any customer with access to this report shall not circulate/ distribute.</b></center>
		<section class="main_section">
			 <table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">Standard-depending on Partner rating</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]['Standard_depending_on_vendor_rating'] ?? "-"); ?></td>
						<td>Partner Rating (Scale 5)</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]['vendor_rating_Scale5'] ?? "-"); ?>**</td>
					</tr>
				</tbody>
			</table>
			
			<p>** Partner rating is carried out by MachineMaze rating algorithm. The algorithm undergoes continuous improvement as we continue development and is not meant to be used as a sole yardstick to access partners.</p>

<center style="font-size: 16px;  font-weight: 800;">In case of any questions / queries contact - <span style="color: blue;"> partner@machinemaze.com. </span></center>

			<h2>GENERAL INFORMATION</h2> 
	 		<table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">Name of the Organisation</td>
						<td id="name_of_the_organisation"><?php echo htmlspecialchars($prtnr_res_data_det["data"]['Name_of_the_Organisation'] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Name (Point of contact)</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]['Name_Point_of_Contact']['zc_display_value'] ?? "-"); ?></td>
					</tr>
					<tr>
					<td class="wd_39_4">Phone (Point of contact)</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]['Phone_Point_of_Contact'] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Email (Point of Contact)</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]['Email_Point_of_Contact'] ?? "-"); ?></td>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Do_you_have_a_company_profile_Brochure_available_Soft_Copy"]) && $prtnr_res_data_det["data"]["Do_you_have_a_company_profile_Brochure_available_Soft_Copy"] != ""): ?>
						<td class="wd_39_4">Do you have a company profile / Brochure available (Soft Copy)</td>
						<td><?php echo isset($prtnr_res_data_det["data"]['Do_you_have_a_company_profile_Brochure_available_Soft_Copy']) ? htmlspecialchars($prtnr_res_data_det["data"]['Do_you_have_a_company_profile_Brochure_available_Soft_Copy']) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Total_Factory_Size_Include_all_factories_you_own"]) && $prtnr_res_data_det["data"]["Total_Factory_Size_Include_all_factories_you_own"] != ""): ?>
						<td class="wd_39_4">Any Specification Sheet/ Soft copy Brochure</td>
						<td><?php echo "-"; ?>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Address_Registered_Office_of_the_Organisation"]['zc_display_value']) && $prtnr_res_data_det["data"]["Address_Registered_Office_of_the_Organisation"]['zc_display_value'] != ""): ?>
						<td class="wd_39_4">Address/ Registered Office of the Organisation</td>
						<td><?php echo isset($prtnr_res_data_det["data"]['Address_Registered_Office_of_the_Organisation']['zc_display_value']) ? htmlspecialchars($prtnr_res_data_det["data"]['Address_Registered_Office_of_the_Organisation']['zc_display_value']) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Company_URL_Website"]) && $prtnr_res_data_det["data"]["Company_URL_Website"] != ""): ?>
						<td class="wd_39_4">Company URL/ Website</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Company_URL_Website"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Company_URL_Website"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Company_Year_of_Founding"]) && $prtnr_res_data_det["data"]["Company_Year_of_Founding"] != ""): ?>
						<td class="wd_39_4">Company : Year of Founding</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Company_Year_of_Founding"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Company_Year_of_Founding"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Type_of_Company"]) && $prtnr_res_data_det["data"]["Type_of_Company"] != ""): ?>
						<td class="wd_39_4">Type of Company</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Type_of_Company"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Type_of_Company"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Name_of_a_top_Contact_Proprietor_Director_Partner"]["zc_display_value"]) && $prtnr_res_data_det["data"]["Name_of_a_top_Contact_Proprietor_Director_Partner"]["zc_display_value"] != ""): ?>
						<td class="wd_39_4">Name of a top Contact (Proprietor/ Director/ Partner)</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Name_of_a_top_Contact_Proprietor_Director_Partner"]["zc_display_value"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Name_of_a_top_Contact_Proprietor_Director_Partner"]["zc_display_value"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Email_Address_of_Proprietor_Director_Partner"]) && $prtnr_res_data_det["data"]["Email_Address_of_Proprietor_Director_Partner"] != ""): ?>
						<td class="wd_39_4">Email Address of (Proprietor/ Director/ Partner)</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Email_Address_of_Proprietor_Director_Partner"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Email_Address_of_Proprietor_Director_Partner"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Phone_Proprietor_Director_Partner1"]) && $prtnr_res_data_det["data"]["Phone_Proprietor_Director_Partner1"] != ""): ?>
						<td class="wd_39_4">Phone (Proprietor / Director / Partner)</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Phone_Proprietor_Director_Partner1"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Phone_Proprietor_Director_Partner1"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Average_TurnOver_2018_2019_2020"]) && $prtnr_res_data_det["data"]["Average_TurnOver_2018_2019_2020"] != ""): ?>
						<td class="wd_39_4">Average TurnOver (2018-2019-2020)</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Average_TurnOver_2018_2019_2020"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Average_TurnOver_2018_2019_2020"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Number_of_Active_Customers"]) && $prtnr_res_data_det["data"]["Number_of_Active_Customers"] != ""): ?>
						<td class="wd_39_4">Number of Active Customers</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Number_of_Active_Customers"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Number_of_Active_Customers"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Mention_Your_Top_Customers"]) && $prtnr_res_data_det["data"]["Mention_Your_Top_Customers"] != ""): ?>
						<td class="wd_39_4">Mention Your Top Customers</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Mention_Your_Top_Customers"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Mention_Your_Top_Customers"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Credit_Period_You_Can_Offer"]) && $prtnr_res_data_det["data"]["Credit_Period_You_Can_Offer"] != ""): ?>
						<td class="wd_39_4">Credit Period You Can Offer</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Credit_Period_You_Can_Offer"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Credit_Period_You_Can_Offer"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Do_you_Cater_to_Export_Orders1"]) && $prtnr_res_data_det["data"]["Do_you_Cater_to_Export_Orders1"] != ""): ?>
						<td class="wd_39_4">Do you Cater to Export Orders</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Do_you_Cater_to_Export_Orders1"][0]) ? htmlspecialchars($prtnr_res_data_det["data"]["Do_you_Cater_to_Export_Orders1"][0]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["IEC_Importer_Exporter_Code"]) && $prtnr_res_data_det["data"]["IEC_Importer_Exporter_Code"] != ""): ?>
							<td class="wd_39_4">List of Countries Exported to</td>
							<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["IEC_Importer_Exporter_Code"]); ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Total_Factory_Size_Include_all_factories_you_own"]) && $prtnr_res_data_det["data"]["Total_Factory_Size_Include_all_factories_you_own"] != ""): ?>
							<td class="wd_39_4">Total Factory Size (Include all factories you own)</td>
							<td><?php echo isset($prtnr_res_data_det["data"]["Total_Factory_Size_Include_all_factories_you_own"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Total_Factory_Size_Include_all_factories_you_own"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["What_are_your_material_handling_capabilities1"]) && $prtnr_res_data_det["data"]["What_are_your_material_handling_capabilities1"] != ""): ?>
						<td class="wd_39_4">What are your material handling capabilities</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["What_are_your_material_handling_capabilities1"][0]) ? htmlspecialchars($prtnr_res_data_det["data"]["What_are_your_material_handling_capabilities1"][0]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["If_OTHER_Material_Handling_Please_Indicate"]) && $prtnr_res_data_det["data"]["If_OTHER_Material_Handling_Please_Indicate"] != ""): ?>
						<td class="wd_39_4">If OTHER Material Handling: Please Indicate</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["If_OTHER_Material_Handling_Please_Indicate"]) ? htmlspecialchars($prtnr_res_data_det["data"]["If_OTHER_Material_Handling_Please_Indicate"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Do_you_have_facilities_for_inventory_management_and_storage"]) && $prtnr_res_data_det["data"]["Do_you_have_facilities_for_inventory_management_and_storage"] != ""): ?>
						<td class="wd_39_4">Do you have facilities for inventory management and storage</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Do_you_have_facilities_for_inventory_management_and_storage"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Do_you_have_facilities_for_inventory_management_and_storage"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Do_you_Own_a_Material_Transport_Vehicle_If_Yes_Indicate_Type_Quantity_and_Load_Capacity"]) && $prtnr_res_data_det["data"]["Do_you_Own_a_Material_Transport_Vehicle_If_Yes_Indicate_Type_Quantity_and_Load_Capacity"] != ""): ?>
						<td class="wd_39_4">Do you Own a Material Transport Vehicle: If Yes- Indicate - Type , Quantity and Load Capacity</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Do_you_Own_a_Material_Transport_Vehicle_If_Yes_Indicate_Type_Quantity_and_Load_Capacity"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Do_you_Own_a_Material_Transport_Vehicle_If_Yes_Indicate_Type_Quantity_and_Load_Capacity"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if(isset($prtnr_res_data_det["data"]["Any_Expansion_Plans_Please_state_the_year_and_type_of_Expansion_planned1"]) && $prtnr_res_data_det["data"]["Any_Expansion_Plans_Please_state_the_year_and_type_of_Expansion_planned1"] != ""): ?>
						<td class="wd_39_4">Any Expansion Plans (Please state the year and type of Expansion planned)</td>
						<td><?php echo isset($prtnr_res_data_det["data"]["Any_Expansion_Plans_Please_state_the_year_and_type_of_Expansion_planned1"]) ? htmlspecialchars($prtnr_res_data_det["data"]["Any_Expansion_Plans_Please_state_the_year_and_type_of_Expansion_planned1"]) : "-"; ?></td>
						<?php endif; ?>
					</tr>
				</tbody>
			</table>

      <h2>STATUTORY COMPLIANCE </h2> 
			<table class="rating_table">
				<tbody>
					<tr>
					<?php if(isset($prtnr_res_data_det["data"]["GST_Number"]) && $prtnr_res_data_det["data"]["GST_Number"] != ""): ?>
						<td class="wd_39_4">GST Number</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["GST_Number"] ?? "-"); ?></td>
					<?php endif; ?>
					</tr>
					<tr>
						<td class="wd_39_4">GST Certificate</td>
            <?php 
            /** Document GST */
            if($prtnr_res_data_det["data"]['Upload_GST_Certificate'] != "" && $prtnr_res_data_det["data"]['Upload_GST_Certificate'] != null)
            {
              $Upload_GST_Certificate_FilePath = explode('?', $prtnr_res_data_det["data"]['Upload_GST_Certificate']);
              $Upload_GST_Certificate = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/Upload_GST_Certificate/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $Upload_GST_Certificate_FilePath[1];
              ?>
              <td><a href='<?php echo $Upload_GST_Certificate; ?>' download>Download GST Certificate</a></td>
            <?php 
            } else
            {
              ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td> <?php
            } ?>
					</tr>
					<tr>
					<?php if(isset($prtnr_res_data_det["data"]["Company_PAN"]) && $prtnr_res_data_det["data"]["Company_PAN"] != ""): ?>
						<td class="wd_39_4">Company PAN</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Company_PAN"] ?? "-"); ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<td class="wd_39_4">PAN Copy</td>
            <?php
            if($prtnr_res_data_det["data"]['Upload_PAN_Copy'] != "" && $prtnr_res_data_det["data"]['Upload_PAN_Copy'] != null) 
            {
              $Upload_PAN_Copy_FilePath = explode('?', $prtnr_res_data_det["data"]['Upload_PAN_Copy']);
              $Upload_PAN_Copy = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/Upload_PAN_Copy/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $Upload_PAN_Copy_FilePath[1];
              ?>
              <td><a href='<?php echo $Upload_PAN_Copy; ?>' download>Download PAN Copy</a></td>
              <?php
            } else{
              ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td> 
              <?php
            } ?>
					</td>
					<tr>
					<?php if(isset($prtnr_res_data_det["data"]["Company_TAN"]) && $prtnr_res_data_det["data"]["Company_TAN"] != ""): ?>
						<td class="wd_39_4">Company TAN</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Company_TAN"] ?? "-"); ?></td>
						<?php endif; ?>
					</tr>
					<tr>
					<?php if(isset($prtnr_res_data_det["data"]["MSME_Registration_Number"]) && $prtnr_res_data_det["data"]["MSME_Registration_Number"] != ""): ?>
						<td class="wd_39_4">MSME Registration Number</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["MSME_Registration_Number"] ?? "-"); ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<td class="wd_39_4">MSME Registration</td>
            <?php 
            if($prtnr_res_data_det["data"]['Upload_MSME_Registration'] != "" && $prtnr_res_data_det["data"]['Upload_MSME_Registration'] != null){
              $Upload_MSME_Registration_FilePath = explode('?', $prtnr_res_data_det["data"]['Upload_MSME_Registration']);
              $Upload_MSME_Registration = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/Upload_MSME_Registration/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $Upload_MSME_Registration_FilePath[1];
              ?>
            <td><a href='<?php echo $Upload_MSME_Registration; ?>' download>Download MSME Registration PDF</a></td>
            <?php
            } else{
              ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td> <?php
            } ?>
            
					</tr>
					<tr>
					<?php if(isset($prtnr_res_data_det["data"]["IEC_Importer_Exporter_Code"]) && $prtnr_res_data_det["data"]["IEC_Importer_Exporter_Code"] != ""): ?>
						<td class="wd_39_4">IEC- (Importer Exporter Code)</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["IEC_Importer_Exporter_Code"] ?? "-"); ?></td>
						<?php endif; ?>
					</tr>
					<tr>
						<td class="wd_39_4">IEC</td>
            <?php 
            if($prtnr_res_data_det["data"]['Upload_IEC'] != "" && $prtnr_res_data_det["data"]['Upload_IEC'] != null)
            {
              $Upload_IEC_FilePath = explode('?', $prtnr_res_data_det["data"]['Upload_IEC']);
              $Upload_IEC = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/Upload_IEC/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $Upload_IEC_FilePath[1];
              ?>
              <td><a href='<?php echo $Upload_IEC; ?>' download>Download IEC</a></td>
              <?php
            } else {
              ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td> <?php
            } ?>
            
					</tr>
				</tbody>
			</table>

      <h2>CERTIFICATIONS</h2>
							<table class="rating_table">
								<tbody>
									<tr>
										<td>CERTIFICATE</td>
										<td>Valid from this date</td>
										<td>Valid till this date</td>
										<td>Do you have any of the below certifications.</td>
									</tr>
                  <?php foreach ($prtnr_res_data_det["data"]['Certifications'] as $eachCertificationRecord): ?>
									<tr>
                    <td><?php echo htmlspecialchars($eachCertificationRecord["type_of_certification"] ?? "-"); ?></td>
                    <td><?php echo htmlspecialchars($eachCertificationRecord["Valid_from_this_date"] ?? "-"); ?></td>
                    <td><?php echo htmlspecialchars($eachCertificationRecord["Valid_till_this_date"] ?? "-"); ?></td>
                    <?php
                    if($eachCertificationRecord['UPLOAD_CERTIFICATE'] != "" && $eachCertificationRecord['UPLOAD_CERTIFICATE'] != null)
                    {
                      $UPLOAD_CERTIFICATE_FilePath = explode('?', $eachCertificationRecord['UPLOAD_CERTIFICATE']);
                      $UPLOAD_CERTIFICATE = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/UPLOAD_CERTIFICATE/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $UPLOAD_CERTIFICATE_FilePath[1];
                      ?>
                      <td><a href='<?php echo $UPLOAD_CERTIFICATE; ?>' download>Download Certificate</a></td>
                    <?php 
                    } 
                    else 
                    { 
                      ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td>
                   <?php } ?>
                  </tr>
                  <?php endforeach; ?>
								</tbody>
							</table>
        
          <h2>CAPABILITIES</h2>
          <table class="rating_table">
            <tbody>
              <tr>
			  <?php if(isset($prtnr_res_data_det["data"]["Area_of_Specialisation_in_Manufacturing"]) && $prtnr_res_data_det["data"]["Area_of_Specialisation_in_Manufacturing"] != ""): ?>
                <td class="wd_39_4">Area of Specialisation in Manufacturing</td>
                <td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Area_of_Specialisation_in_Manufacturing"][0] ?? "-"); ?></td>
				<?php endif; ?>
              </tr>
              <tr>
			  <?php if(isset($prtnr_res_data_det["data"]["If_Other_Mention_Area_of_Specialization"]) && $prtnr_res_data_det["data"]["If_Other_Mention_Area_of_Specialization"] != ""): ?>
                <td class="wd_39_4">If Other (Mention Area of Specialization)</td>
                <td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["If_Other_Mention_Area_of_Specialization"] ?? "-"); ?></td>
				<?php endif; ?>
              </tr>
              <tr>
			  <?php if(isset($prtnr_res_data_det["data"]["MACHINES_AVAILABLE"]) && $prtnr_res_data_det["data"]["MACHINES_AVAILABLE"] != ""): ?>
                <td class="wd_39_4">MACHINES AVAILABLE</td>
                <td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["MACHINES_AVAILABLE"][0] ?? "-"); ?></td>
				<?php endif; ?>
              </tr>
              <tr>
			  <?php if(isset($prtnr_res_data_det["data"]["If_Machine_Available_is_Other_Please_mention"]) && $prtnr_res_data_det["data"]["If_Machine_Available_is_Other_Please_mention"] != ""): ?>
                <td class="wd_39_4">If Machine Available is Other (Please mention)</td>
                <td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["If_Machine_Available_is_Other_Please_mention"] ?? "-"); ?></td>
				<?php endif; ?>
              </tr>
              <tr>
			  <?php if(isset($prtnr_res_data_det["data"]["Specific_Note_on_Your_Area"]) && $prtnr_res_data_det["data"]["Specific_Note_on_Your_Area"] != ""): ?>
                <td class="wd_39_4">Specific Note on Your Area of Expertise</td>
                <td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Specific_Note_on_Your_Area"] ?? "-"); ?></td>
				<?php endif; ?>
              </tr>
              <tr>
                <td class="wd_39_4">Products/ Area of Manufacturing</td>
              </tr>
              <tr>
                <td class="wd_39_4">Mention List of Specific Products in Each Area</td>
                <td>Area of Application</td>
              </tr>
            </tbody>
          </table>
          <h2>HUMAN RESOURCE</h2>
			<table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">TOTAL NUMBER OF MACHINE OPERATORS (FULL TIME EMPLOYEES)- ALL SHIFTS</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["machine_operators"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Total Administrative Staff</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Total_Administrative_Staff"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Number of Shifts Per Day Operated</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Number_of_Shifts_Per_Day_Operated"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Number of Hours/ Shift</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Number_of_Hours_Shift"] ?? "-"); ?></td>
					</tr>
				</tbody>
			</table>

<h2>ORGANIZATIONAL STRUCTURE</h2>
					<table class="rating_table">
						<tbody>
							<tr>
								<td class="wd_39_4">Upload Organization Structure</td>
								<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Upload_Organization_Structure"] ?? "-"); ?></td>
							</tr>
						</tbody>
					</table>

<h2>ENGINEERING & CAD</h2>
			<table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">Do you have CAD and Engineering Design Capabilities</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Do_you_have_CAD_and_Engineering_Design_Capabilities"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Do you have a licensed Development software.</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Do_you_have_a_licensed_Development_software1"][0] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Indicate here if the software is not on our list.</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Indicate_here_if_the_software_is_not_on_our_list"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">What drawing formats are you comfortable to work with</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["What_drawing_formats_are_you_comfortable_to_work_with"][0] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Do you Own a Printer</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Do_you_Own_a_Printer"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Dimension of pages printed</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Dimension_of_pages"] ?? "-"); ?></td>
					</tr>
				</tbody>
			</table>
      
      <!-- <h1>Multiple Factories: If you own Multiple factories, please indicate below (Address)</h1>
			<table class="rating_table">
				<tbody>
					<tr>
						<td>Factory 1</td>
						<td>Factory 2</td>
						<td>Factory 3</td>
						<td>Factory 4</td>
					</tr>
					<tr>
            <td><?php //echo htmlspecialchars($prtnr_res_data_det["data"]["Multiple_Factories"][0]["Factory_1"] ?? "-"); ?></td>
            <td><?php //echo htmlspecialchars($prtnr_res_data_det["data"]["Multiple_Factories"][0]["Factory_2"] ?? "-"); ?></td>
            <td><?php //echo htmlspecialchars($prtnr_res_data_det["data"]["Multiple_Factories"][0]["Factory_3"] ?? "-"); ?></td>
            <td><?php //echo htmlspecialchars($prtnr_res_data_det["data"]["Multiple_Factories"][0]["Factory_4"] ?? "-"); ?></td>
          </tr>
				</tbody>
			</table> -->

      <!-- <h2>MACHINES & INSTRUMENTS</h2> -->
		<!-- machineData = request_for_quote.CustomerPortal.get_machine_and_instrumental_data(input.RecID,"MACHINES"); -->
		<?php if(isset($prtnr_res_data_det["data"]["Machine"]) && count($prtnr_res_data_det["data"]["Machine"]) > 0): ?>
		<h3>Machines</h3>
			<table class="rating_table">
				<tbody>
					<tr>
						<td>Sl No</td>
						<td>Machine Category</td>
						<td>CNC/ Manual</td>
						<td>Machine Type</td>
						<td>Manufacturer Name</td>
						<td>Model Number</td>
						<td>Spacification</td>
						<td>Quantity</td>
					</tr>
				<?php foreach ($prtnr_res_data_det["data"]['Machine'] as $eachMachineRecord): ?>
				<tr>
					<td><?php echo htmlspecialchars($eachMachineRecord["Sl_No"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["Machine_Category"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["CNC_Manual"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["Machine_Type"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["Manufacturer_Name"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["Model_Number"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["Spacification"] ?? "-") ?></td>
					<td><?php echo htmlspecialchars($eachMachineRecord["Quantity"] ?? "-") ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<?php endif; ?>
		<!-- InstrumentsData = request_for_quote.CustomerPortal.get_machine_and_instrumental_data(input.RecID,"INSTRUMENTS"); -->
		<?php if(isset($prtnr_res_data_det["data"]["Instrument"]) && count($prtnr_res_data_det["data"]["Instrument"]) > 0): ?>
			<h2>Instruments</h2>
			<table class="rating_table">
				<tbody>
					<tr>
						<td>Sl No</td>
						<td>Instrument Category</td>
						<td>Manual/ Automatic</td>
						<td>Machine Type</td>
						<td>Manufacturer Name</td>
						<td>Model Number</td>
						<td>Spacification</td>
						<td>Quantity</td>
					</tr>
					<?php foreach ($prtnr_res_data_det["data"]['Instrument'] as $eachInstrumentRecord): ?>
          			<tr>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Sl_No"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Instrument_Category"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Manual_Automatic"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Machine_Type"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Manufacturer_Name"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Model_Number"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Specification"] ?? "-") ?></td>
						<td><?php echo htmlspecialchars($eachInstrumentRecord["Quantity"] ?? "-") ?></td>
					</tr>
					<?php endforeach; ?>
      			</tbody>
			</table>
			<?php endif; ?>
      <h2>BANKING</h2>
			<table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">Account Entity Name</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Account_Entity_Name"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Bank Name</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Bank_Name"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Bank Address</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Bank_Address"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Account Number</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Account_Number"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">IFSC CODE</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["IFSC_CODE"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">SWIFT CODE</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["SWIFT_CODE"] ?? "-"); ?></td>
					</tr>
				</tbody>
			</table>
			<h2>EMPLOYEE HEALTH & SAFETY - (EHS- PRACTICE)</h2>
			<table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">Are all shop floor employees provided with safety shoes</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Are_all_shop_floor_employees_provided_with_safety_shoes"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Are all shop floor employees provided with Helmet</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Are_all_shop_floor_employees_provided_with_Helmet"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Is there a strict supervision during welding</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Is_there_a_strict_supervision_during_welding"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Outline your organization's EHS prcatice</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Outline_your_organization_s_EHS_prcatice"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">EHS contact person name</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["EHS_contact_person1"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">EHS contact person Email</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["EHS_contact_person2"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">EHS contact person contact number</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["EHS_contact_person1"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Are any of your employees below age 18</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Are_any_of_your_employees_below_age_18"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">If yes,provide appropriate reason for employment</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["If_yes_provide_appropriate_reason_for_employment"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Are the statutory norms for labour engagement followed</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Are_the_statutory_norms_for_labour_engagement_followed"] ?? "-"); ?></td>
					</tr>
				</tbody>
			</table>

    <h2>AUDITOR DETAILS</h2>
				<table class="rating_table">
				<tbody>
					<tr>
						<td class="wd_39_4">Audit Completed By:</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Audit_Completed_By"][0] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">OnSite Audit Completed</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["OnSite_Audit_Completed"][0] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Audit Date</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Audit_Date"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Comment/Remark if any</td>
						<td><?php echo htmlspecialchars($prtnr_res_data_det["data"]["Comment_Remark_if_any"] ?? "-"); ?></td>
					</tr>
					<tr>
						<td class="wd_39_4">Factory Images MachineMaze</td>
            <?php 
            if($prtnr_res_data_det["data"]['Audit_Details'][0]['Factory_Images__MachineMaze'] != "" && $prtnr_res_data_det["data"]['Audit_Details'][0]['Factory_Images__MachineMaze'] != null){
              $Factory_Images__MachineMaze_FilePath = explode('?', $prtnr_res_data_det["data"]['Audit_Details'][0]['Factory_Images__MachineMaze']);
              $Factory_Images__MachineMaze = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/Audit_Details.Factory_Images__MachineMaze/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $Factory_Images__MachineMaze_FilePath[1];
              ?>
              <td><a href='<?php echo $Factory_Images__MachineMaze; ?>' download>Download Factory Images MachineMaze</a></td>
            <?php } 
            else{
              ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td> <?php
            } ?>
					</tr>
					<tr>
						<td class="wd_39_4">Factory Video Audit_MachineMaze</td>
            <?php 
            if($prtnr_res_data_det["data"]['Audit_Details'][0]['Factory_Video_Audit_MachineMaze'] != "" && $prtnr_res_data_det["data"]['Audit_Details'][0]['Factory_Video_Audit_MachineMaze'] != null)
            {
              $Factory_Video_Audit_MachineMaze_FilePath = explode('?', $prtnr_res_data_det["data"]['Audit_Details'][0]['Factory_Video_Audit_MachineMaze']);
              $Factory_Video_Audit_MachineMaze = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/request-for-quote/M_F_PARTNER_REGISTRATION_Report/" . $prtnr_res_data_det["data"]['ID'] . "/Audit_Details.Factory_Video_Audit_MachineMaze/image-download/ptYyV36yAv15TtWPwFEX9EWArFgrBHUCHE0SSPpdSn5AbSAjCG83f4bJGbdDDPH7rJqXPV5syEaju8ga8ps9FY33XrJfhdYKksZt?" . $Factory_Video_Audit_MachineMaze_FilePath[1];
              ?>
              <td><a href='<?php echo $Factory_Video_Audit_MachineMaze; ?>' download>Download Factory Video MachineMaze</a></td>
            <?php 
            } else
            {
              ?> <td><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/minus-sign.png" alt="minus-sign"/></td> <?php
            }
           ?>
					</tr> 

				</tbody>
			</table> 
<br><br>
			<b>Thanking you</b><br>
			<b>Regards,</b><br>
			<b>MachineMaze Team</b><br>
			<b>www.machinemaze.com</b>
			<br> 
			</section> 
			<br><br>
			</body> 
          </div>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const btnDownload = document.getElementById('download-pdf');
	const projectElement = document.getElementById('name_of_the_organisation');
    const getprojectTitle = projectElement ? projectElement.textContent.trim() || 'No_Title.pdf' : 'No_Title.pdf';
    btnDownload.addEventListener('click', function() {
	// document.getElementById("noPrint").style.display = "none";
      const element = document.body;
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