<?php
// JSON data
$json_data = '{"code":3000,"data":[{"Delivery_Address":{"country":"","district_city":"","latitude":"","address_line_1":"","state_province":"","address_line_2":"","postal_code":"","zc_display_value":"","longitude":""},"Item_Description_Item_Part_No":"METAL FITTING FOR BRACKET INSULATOR - 9034 (6032)","Delivery_Schedule_Type":"Recurring- Monthly","Delivery_Date":"18-May-2022","Actual_Date_of_Delivery":"18-May-2022","Delivery_Status":"Delivered","Project_Number":"MM00288","Customer_PO1":{"PO_Date":"18-Aug-2023","PO_Number":"INVENTORY PO","ID":"88342000004004041","zc_display_value":"INVENTORY PO - 18-Aug-2023"},"Machine_Maze_Project_Tracking_ID":{"Project_Number":"MM00288","ID":"88342000001286087","zc_display_value":"88342000001286087 - MM00288"},"Unit":"EA","Upload_TPI_MachineMaze":"","Tracking_Number":"","Part_Names":{"Part_Name":"MP - RY - 9034 - (6032)","ID":"88342000002861396","zc_display_value":"MP - RY - 9034 - (6032)"},"Shipping_Document":"","Qty":"4","Upload_TPI_Docs_MachineMaze":"","ID":"88342000001498173","Quality_Acceptance_Rate_MachineMaze":"1.0"},{"Delivery_Address":{"country":"","district_city":"","latitude":"","address_line_1":"","state_province":"","address_line_2":"","postal_code":"","zc_display_value":"","longitude":""},"Item_Description_Item_Part_No":"METAL FITTING FOR BRACKET INSULATOR - 9034 (6032)","Delivery_Schedule_Type":"Recurring- Monthly","Delivery_Date":"16-Jun-2022","Actual_Date_of_Delivery":"17-Jun-2022","Delivery_Status":"Delivered","Project_Number":"MM00288","Customer_PO1":{"PO_Date":"18-Aug-2023","PO_Number":"INVENTORY PO","ID":"88342000004004041","zc_display_value":"INVENTORY PO - 18-Aug-2023"},"Machine_Maze_Project_Tracking_ID":{"Project_Number":"MM00288","ID":"88342000001286087","zc_display_value":"88342000001286087 - MM00288"},"Unit":"EA","Upload_TPI_MachineMaze":"/api/v2.1/arun.ramu_machinemaze/machinemaze-project-management/report/Customer_Delivery_Schedule_Report/88342000001615401/Upload_TPI_MachineMaze/download?filepath=1655867686165_IMG-20220621-WA0034.jpg","Tracking_Number":"","Part_Names":{"Part_Name":"MP - RY - 9034 - (6032)","ID":"88342000002861396","zc_display_value":"MP - RY - 9034 - (6032)"},"Shipping_Document":"","Qty":"500","Upload_TPI_Docs_MachineMaze":"","ID":"88342000001615401","Quality_Acceptance_Rate_MachineMaze":"1.0"},{"Delivery_Address":{"country":"","district_city":"","latitude":"","address_line_1":"","state_province":"","address_line_2":"","postal_code":"","zc_display_value":"","longitude":""},"Item_Description_Item_Part_No":"METAL FITTING FOR BRACKET INSULATOR - 9034 (6032)","Delivery_Schedule_Type":"Recurring- Monthly","Delivery_Date":"15-Jul-2022","Actual_Date_of_Delivery":"16-Jul-2022","Delivery_Status":"Delivered","Project_Number":"MM00288","Customer_PO1":{"PO_Date":"18-Aug-2023","PO_Number":"INVENTORY PO","ID":"88342000004004041","zc_display_value":"INVENTORY PO - 18-Aug-2023"}]}';

// Decode JSON data
$data = json_decode($json_data, true);

// Check if 'data' key exists and contains elements
if(isset($data['data']) && !empty($data['data'])) {
    // Loop through each data item
    foreach($data['data'] as $item) {
        // Output HTML for each item
        echo '<div>';
        echo '<p>Delivery Date: ' . $item['Item_Description_Item_Part_No'] . '</p>';
        echo '<p>Delivery Status: ' . $item['Delivery_Status'] . '</p>';
        echo '<p>Part Name: ' . $item['Part_Names']['Part_Name'] . '</p>';
        // Output other relevant data here
        echo '</div>';
    }
} else {
    echo 'No data found.';
}
?>
