<html lang="en">

<head>
    <title>Customer Dashboard</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="images/logomm.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="loginSec">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h4>Login</h4>
                                <!-- Display alert if URL parameter "error" is set to "invalid" -->
                                <?php
                                if (isset($_GET['error']) && $_GET['error'] === 'invalid') {
                                    echo '<div class="alert alert-danger" role="alert">
                                            Invalid email or password. Please try again.
                                        </div>';
                                }
                                ?>
                                <form id="loginFormLoader" action="getdata.php" method="POST">
                                    <div class="mb-3 mt-3 inputbox">
                                        <label for="email" class="form-label">Email:</label>
                                        <input required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                    </div>
                                    <div class="mb-3 inputbox">
                                        <label for="pwd" class="form-label">Password:</label>
                                        <div class="input-group">
                                            <input required type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="togglePassword">
                                                    <i class="fas fa-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="forgot_pwd.php">Forgot Password ?</a>
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3 mb-0" value="Login">
                                </form>
                                <!-- Loader element -->
                                <div class="loader_box d-none" id="loader">
                                    <div class="loader"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="devenv">
                        <label class="container">Test Environment for Developers
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> -->
                </div>

                <div class="col-md-6 mt-5">
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="https://static.vecteezy.com/system/resources/previews/002/482/457/non_2x/businessman-in-suit-working-with-digital-virtual-screen-free-photo.jpg" alt="New York" class="d-block w-100">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="https://assets.weforum.org/article/image/KwvRfX8RsCkrYqNz9j_1K3taMNrvyIZbHJ1YSqPmHzc.jpg" alt="Los Angeles" class="d-block w-100">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="https://kpmg.com/content/dam/kpmg/xx/images/2021/04/cnc-gas-cutting-metal-sheet.jpg" alt="Chicago" class="d-block w-100">
                            </div>
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<!-- Custom JavaScript for password visibility toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('pwd');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            const icon = this.querySelector('svg');
            if (type === 'text') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginFormLoader');
        const loader = document.getElementById('loader');

        loginForm.addEventListener('submit', function() {

            // Display loader
            loader.classList.remove('d-none');

            // Simulate AJAX request (replace with actual AJAX call)
            setTimeout(function() {
                loader.classList.add('d-none');
                // window.location.href = 'mf_dashboard.php';
            }, 15000);
        });
    });
</script>

</html>