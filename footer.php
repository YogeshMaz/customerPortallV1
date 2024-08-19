<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
    
<script>

var picker = new Lightpick({
    field: document.getElementById('demo-3_1'),
    secondField: document.getElementById('demo-3_2'),
    singleDate: false,
    selectForward: true,
    onSelect: function(start, end){
        var str = '';
        str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
        str += end ? end.format('Do MMMM YYYY') : '...';
        document.getElementById('result-3').innerHTML = str;
    }
});
    

</script>

<script>

    //script for signature
    var canvas = document.getElementById('signature-canvas');
    var signaturePad = new SignaturePad(canvas);

    var clearButton = document.getElementById('clear-button');
    clearButton.addEventListener('click', function() {
      signaturePad.clear();
    });

    $.fn.dataTable.ext.errMode = 'none';

</script>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
  
      $(document).ready(function() {
        $('.sh').click(function() {
            // Check if the navbar is expanded
            if ($('#navbarScroll').hasClass('show')) {
                // Remove the 'show' class to collapse the navbar
                $('#navbarScroll').removeClass('show');
                $('#navbarScroll').css('display', 'none');
            }
        });
        $('.navbar-toggler').click(function() {
            $('#navbarScroll').removeAttr('style');
        });
    });

    // Defined all pages in an object
    var logs = {
        summary: "Summary",
        createRfq: "Create RFQ",
        rfqList: "RFQ List",
        prodash: "Project Dashboard",
        pricea: "Price Approval",
        invoice: "Show Invoice",
        po: "Purchase Order",
        deliveryt: "Analytics - Delivery Trends",
        yourp: "Your Partner",
        deliverys: "Delivery Schedule"
    };

    // Define the logAction function
    async function logAction(action) {
        try {
            const response = await $.ajax({
                type: "POST",
                url: "../logaction.php",
                data: { action: action }
            });
            console.log("Log recorded:", response);
            return response; // Return the response
        } catch (error) {
            console.error("Log recording failed:", error);
            throw error; // Throw the error to be caught by the caller
        }
    }

    // Add click event handlers
    $("#showdashboard").click(function() {
        var returnLog = logAction(logs.summary);
        console.log(logs.summary);
        window.location.href = "customer_dash.php";
    });
    $("#uploadRfq").click(function() {
        var returnLog = logAction(logs.createRfq);
        console.log(logs.createRfq);
        window.location.href = "upload_rfq.php";
    });
    $("#showrfqlist").click(function() {
        var returnLog = logAction(logs.rfqList);
        console.log(logs.rfqList);
        window.location.href = "rfq_list.php";
    });
    $("#showProDash").click(function() {
        var returnLog = logAction(logs.prodash);
        console.log(logs.prodash);
        window.location.href = "project_dash.php";
    });
    $("#showpa").click(function() {
        var returnLog = logAction(logs.pricea);
        console.log(logs.pricea + " " + logAction);
        window.location.href = "price_approve.php";
    });
    $("#showInvoice").click(function() {
        var returnLog = logAction(logs.invoice);
        console.log(logs.invoice);
        window.location.href = "invoice.php";

    });
    $("#showpo").click(function() {
        var returnLog = logAction(logs.po);
        console.log(logs.po);
        window.location.href = "po.php";
    });
    $("#showdt").click(function() {
        var returnLog = logAction(logs.deliveryt);
        console.log(logs.deliveryt);
        window.location.href = "delivery_t.php";
    });
    $("#showpartner").click(function() {
        var returnLog = logAction(logs.yourp);
        console.log(logs.yourp);
        window.location.href = "your_prtnr.php";
    });
    $("#showds").click(function() {
        var returnLog = logAction(logs.deliverys);
        console.log(logs.deliverys);
        window.location.href = "delivery_sch.php";
            
    });

</script>