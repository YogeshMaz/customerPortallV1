<?php 
  include '../header.php';
  include '../nav.php';
  include '../footer.php';
  ?>
<div class="row justify-content-center profilebg" id="profileSec">
   <div class="col-xl-6 col-lg-12 col-md-9 p-4 mb-2">
			  
	<div class="card shadow profile_shadow border-none">
        <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card overflow-hidden border-0">
                    <div class="bg-primary-subtle">
						<div class="row">
							<div class="col-7 py-2">
								<div class="text-primary p-3">
									<h5 class="text-primary fw-bold">PROFILE INFORMATION</h5>
									<h6 class="mb-3">User Details</h6>
								</div>
							</div>
							<div class="col-5">
								<div class="profile_img py-2 px-3">
								<?php if($Org_Logo != "" && $Org_Logo != null){
                                            $Org_Logo_FilePath = explode('?', $Org_Logo);
                                            $Org_Logo_s = "https://creatorapp.zohopublic.in/file/arun.ramu_machinemaze/customer-invoice/Customers/" . $userPId . "/Customer_Logo/image-download/3B2NyuxjO4GOZmVwWunBsjNF7sfautP0W58FFg5hrmaquff9G1wTsvh7PXPWVWpbjppSY59xAjOFsTvrtbkjRtnpnkfeNDPtuFbr?" . $Org_Logo_FilePath[1];
                                          }
                                        ?>
									<img class="img-profile" src="<?php echo $Org_Logo_s; ?>" style="background: #fff;max-width: 100px;">
								</div>
							</div>
						</div>
                    </div>
                    <div class="card-body pt-0 pb-0 border-0">
						<div class="row">
							<div class="col-sm-12">
								<h5 class="font-size-15 text-truncate my-2 text-primary fw-bold"><?php echo $name; ?></h5>
							</div>
						</div>
						 <div class="row py-3">
							<div class="col-md-6 mb-2">
							<h6 class="mb-2 fw-bold text-primary">Email</h6>
							<h6 class="fs14">
								<?php echo $email ?>
							</h6>
							</div>
							<div class="col-md-6 mb-2">
							<h6 class="mb-2 fw-bold text-primary">Phone</h6>
							<h6 class="fs14"><?php echo $ContactNo ?></h6>
							</div>
							<div class="col-md-6 mb-2">
							<h6 class="mb-2 fw-bold text-primary">Organization Name</h6>
							<h6 class="fs14"><?php echo $orgName; ?></h6>
							</div>
							<div class="col-md-6 mb-2">
							<h6 class="mb-2 fw-bold text-primary">Address</h6>
                            <h6 class="fs14"><?php echo $address; ?></h6>
							</div>
						</div>
						
                    </div>
                </div>
               
            </div>
        </div>
        </div>
    </div>
		
              </div>
            </div>