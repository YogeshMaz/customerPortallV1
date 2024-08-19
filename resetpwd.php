
<html lang="en">

<head>
    <title>Customer Dashboard</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Karla:ital,wght@0,200..800;1,200..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="wrapper">

        <div id="navbar-wrapper">
            <nav class="navbar navbar-inverse p-0">
                <div class="w-100">
                    <div class="navbar-header w-100 row" style="align-items: center;">
                        <div class="row">
                            <div class="col-2 col-md-2">
                                <div class="sidebar-brand d-flex">
                                    <img src="images/logomm.jpg" class="h-auto" style="width:35px;"> <strong class="d-none d-sm-block p-2">Machine Maze</strong>
                                    <div class="text-end px-4 fw-bold position-relative d-lg-none d-md-block"> <span class="position-absolute fs-6" style="top:-50px;right: -10px">X</span> </div>
                                </div>
                            </div>
                            <div class="text-center col-10 col-md-10 d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-md-8 mx-auto mt-4">

            <div class="loginSec">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="images/reset.jpg" width="100%" style="height: 260px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <h4>Reset Password</h4>
                        <form id="loginFormLoader" action="forgot_pwd.php" method="POST">
                            <div class="mb-3 mt-3 inputbox">
                                <label for="email" class="form-label">Email:</label>
                                <input required="" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>

                            <div class="mb-3 mt-3 inputbox">
                                <label for="" class="form-label">Reset Password:</label>
                                <input required="" type="password" class="form-control" id="" placeholder="Enter Password" name="">
                            </div>

                            <div class="mb-3 mt-3 inputbox">
                                <label for="" class="form-label">Re-Enter Reset Password:</label>
                                <input required="" type="password" class="form-control" id="" placeholder="Re Enter Password" name="">
                            </div>

                            <input type="submit" class="btn btn-primary mt-3 mb-0 w-100" value="Submit">
                            
                        </form>
                        <!-- Loader element -->
                        <div class="loader_box d-none" id="loader">
                            <div class="loader"></div>
                        </div>
                    </div>

                </div>

                
            </div>

        </div>

    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>