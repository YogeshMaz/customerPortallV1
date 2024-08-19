<style>
  a#dt span {
    color: #fff;
  }
  a#dt i {
    color: #fff;
  }
  li:has(> a#dt) {
    background: #0070ba;
  }
  a#dt.dropdown-toggle::after {
    color: #fff !important;
  }
</style>

<?php
  include '../header.php';
  include '../nav.php';
  include '../footer.php';
?>
<div id="dtrendsSec">

    <div style="width:100%;" class="container-fluid">
        <div class="col-md-12 col-sm-8">
            <div class="card mb-4 mt-2 tablecard">

                <!-- <div class="card-header pt-3 mb-2 d-flex justify-content-between">
                    <h5 class="my-1 fw-bold text-primary">Delivery Trends</h5>
                </div> -->

                <div class="card-body mt-2">
                    <?php $url = 'https://analytics.zoho.in/open-view/184126000004996054/9b37a1c8ce60db78745e771dcaa4406b?ZOHO_CRITERIA=%22Add%20Customers%22.%22Customer%2FManager%20Email%22%3D%20%27' . $email . '%27'; ?>
                    <iframe frameborder=0 width="100%" height="820" src='<?php echo $url; ?>'></iframe>
                </div>

            </div>
        </div>
    </div>

</div>