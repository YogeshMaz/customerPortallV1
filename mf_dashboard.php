<html lang="en">

<?php include 'header.php' ?>


<body>
  <div id="wrapper">

    <?php include 'nav.php'; ?>

    <!-- <h6>Welcome, <?php //echo htmlspecialchars($email); 
                      ?></h6> -->

    <?php include 'datapages/customer_dash.php'; ?>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>

  <script>
    var picker = new Lightpick({
      field: document.getElementById('demo-3_1'),
      secondField: document.getElementById('demo-3_2'),
      singleDate: false,
      selectForward: true,
      onSelect: function(start, end) {
        var str = '';
        str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
        str += end ? end.format('Do MMMM YYYY') : '...';
        document.getElementById('result-3').innerHTML = str;
      }
    });

    function showSection(sectionId, spanSelector) {
      const sections = [
        "#mdsec", "#rfqlistsec", "#pro_dash", "#mpSec", "#mpSecDetailed",
        "#dsSec", "#paSec", "#invoiceSec", "#poSec", "#pfSec", "#costSec",
        "#qcSec", "#rfqSec", "#profileSec", "#dtrendsSec", "#qcSec", "showtest"
      ];

      const spans = [
        '#showdashboard span', '#yourrfq span', '#yourpro span', '#showpartner span',
        '#mpSecDetailed span', '#showds span', '#order_mng span', '#order_mng span',
        '#order_mng span', '#order_mng span', '#order_mng span', '#showqc span', '#dt span', '#showqc span', 'showtest'
      ];

      // Hide all sections and spans
      sections.forEach(sec => $(sec).hide());
      spans.forEach(span => $(span).css('display', 'none'));

      // Show the specified section and span
      $(sectionId).show();
      $(spanSelector).css('display', 'inline-block');
    }

    $("#showdashboard").click(function() {
      showSection("#mdsec", '#showdashboard span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    });

    $("#showrfqlist").click(function() {
      $.get("datapages/rfq_list.php", function(data) {
        $("#rfqlistsec").html(data);
      });
      showSection("#rfqlistsec", '#yourrfq span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdSec, #pro_dash, #pfSec, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    });

    $("#showProDash").click(function() {
      showSection('#pro_dash', '#yourpro span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pfSec, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showpartner").click(function() {
      showSection('#mpSec', '#showpartner span');
      $("#poSec, #invoiceSec, #pfSec, #paSec, #dsSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showpartnerDetailed").click(function() {
      showSection('#mpSecDetailed', '#mpSecDetailed span');
      $("#poSec, #invoiceSec, #pfSec, #paSec, #mpSec, #dsSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showds").click(function() {
      showSection('#dsSec', '#showds span');
      $("#poSec, #invoiceSec, #pfSec, #paSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showpa").click(function() {
      showSection('#paSec', '#order_mng span');
      $("#poSec, #invoiceSec, #pfSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showInvoice").click(function() {
      console.log("invoice clicked");
      showSection('#invoiceSec', '#order_mng span');
      $("#poSec, #pfSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showpo").click(function() {
      showSection('#poSec', '#order_mng span');
      $("#pfSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showpf").click(function() {
      showSection('#pfSec', '#order_mng span');
      $("#pfSec").show();
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showcost").click(function() {
      showSection('#costSec', '#order_mng span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #pfSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    })

    $("#showqc").click(function() {
      showSection('#qcSec', '#showqc span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    });

    $("#uploadRfq").click(function() {
      showSection('#rfqSec', '#yourrfq span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #showqc, #mpSecDetailed, #profileSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    });

    $("#showProfile").click(function() {
      $("#profileSec").show();
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #showqc, #mpSecDetailed, #rfqSec, #dtrendsSec, #testform, #project_report_detailed_view").hide();
    });

    $("#showdt").click(function() {
      showSection('#dtrendsSec', '#dt span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #mdsec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #showqc, #mpSecDetailed, #rfqSec, #profileSec, #testform, #project_report_detailed_view").hide();
    });

    $("#showtest").click(function() {
      showSection("#testform", '#testform span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #project_report_detailed_view").hide();
    });

    $("#project_report_click").click(function() {
      showSection("#project_report_detailed_view", '#project_report_detailed_view span');
      $("#poSec, #invoiceSec, #paSec, #dsSec, #mpSec, #rfqlistsec, #pro_dash, #pfSec, #costSec, #qcSec, #rfqSec, #mpSecDetailed, #profileSec, #dtrendsSec, #testform").hide();
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
  </script>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>

  <script>
    console.log("email", email);
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>

  <script type="text/javascript" id="zsiqchat">
    var nameOfCustomer = "<?php echo $name; ?>";
    var $zoho = $zoho || {};
    $zoho.salesiq = $zoho.salesiq || {
      widgetcode: "siq6ee220ea172d260a032d0febfb4c27e9",
      values: {},
      ready: function() {
        $zoho.salesiq.visitor.name(nameOfCustomer);
        // $zoho.salesiq.visitor.email(emailJs);
      }
    };

    var d = document;
    s = d.createElement("script");
    s.type = "text/javascript";
    s.id = "zsiqscript";
    s.defer = true;
    s.src = "https://salesiq.zohopublic.in/widget";
    t = d.getElementsByTagName("script")[0];
    t.parentNode.insertBefore(s, t);
  </script>
</body>

</html>