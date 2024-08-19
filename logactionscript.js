// Your existing variables
var deliverys = "Delivery Schedule";
var yourp = "Your Partner";
var deliveryt = "Analytics - Delivery Trends";
var po = "Purchase Order";
var invoice = "Show Invoice";
var pricea = "Price Approval";
var prodash = "Project Dashboard";

// Define the logAction function
function logAction(action) {
    $.ajax({
        type: "POST",
        url: "logaction.php",
        data: { action: action },
        success: function(response) {
            console.log("Log recorded:", response);
        },
        error: function(xhr, status, error) {
            console.error("Log recording failed:", status, error);
        }
    });
}

// Add click event handlers
$("#showds").click(function() {
    console.log(deliverys);
    logAction(deliverys);
});
$("#showpartner").click(function() {
    console.log(yourp);
    logAction(yourp);
});
$("#showdt").click(function() {
    console.log(deliveryt);
    logAction(deliveryt);
});
$("#showpo").click(function() {
    console.log(po);
    logAction(po);
});
$("#showInvoice").click(function() {
    console.log(invoice);
    logAction(invoice);
});
$("#showpa").click(function() {
    console.log(pricea);
    logAction(pricea);
});
$("#showProDash").click(function() {
    console.log(prodash);
    logAction(prodash);
});