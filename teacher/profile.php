<?php
session_start();
?>
<?php require_once './connection.php';
if(!isset($_SESSION['teacher_id'])) {
    header('Location: home.php');
    exit();
}?>
<?php
   if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $cpassword=$_POST['cpassword'];
    $npassword=$_POST['npassword'];

    $tid=$_SESSION['teacher_id'];
    $query = "update teacher_db set teacher_name='$name',password='$npassword' where teacher_id='$tid' and password='$cpassword'";
    $result = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection)==1) {
        echo '<script type="text/javascript"> alert("Data Updated")</script>';
    } else {
       echo '<script type="text/javascript"> alert("Something wrong... check your current password")</script>';
    }
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Update Profile</title>

    <!-- Favicons-->
    <link rel="apple-touch-icon" type="image/x-icon" href="../assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="../assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="../assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="../assets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- Bootstrap core CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="../assets/css/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../assets/vendor/dropzone.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="../assets/css/custom.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand"><img src="../assets/img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                    <a class="nav-link" href="../forum/index.php">
                        <i class="fa fa-fw fa-archive"></i>
                        <span class="nav-link-text">Forum</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-gear"></i>
                        <span class="nav-link-text">Exams</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="addQuiz.php?q=5">View</a>
                        </li>
                        <li>
                            <a href="addQuiz.php?q=4">Add</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                    <a class="nav-link" href='grades.php'>
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Courses</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>


                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">



                        <a class="dropdown-item" href='dashboard.php'>
                            <span class="text-success">
                                <strong>
                                    Dashboard</strong>
                            </span>


                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href='profile.php'>

                            <span class="text-danger">
                                <strong>
                                    Update Profile</strong>
                            </span>


                        </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a>Update Your Details </a>
                </li>

            </ol>
            <div class="box_general padding_bottom">
                <form method='post' action='' enctype='multipart/form-data'>

                    <div class="col-md-8 add_top_30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Your new name">
                                </div>
                            </div>

                        </div>
                        <!-- /row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="text" class="form-control" name="cpassword"
                                        placeholder="Your current password">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="npassword"
                                        placeholder="Your new password">
                                </div>
                            </div>

                        </div>

                        <input type="submit" class="btn_1 medium" name="update" value="Update">

                    </div>
            </div>
            <!-- /.container-fluid-->

        </div>

        </form>
    </div>
    </div>
    <!-- /box_general-->

    <!-- /row-->


    <!-- /.container-wrapper--
<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../assets/vendor/jquery.selectbox-0.2.js"></script>
    <script src="../assets/../assets/vendor/retina-replace.min.js"></script>
    <script src="../assets/vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/../assets/js/admin.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../assets/vendor/dropzone.min.js"></script>

</body>

</html>
<?php mysqli_close($connection) ?>