<?php
require_once "config_main.php";

$department_id=$department_title=$department_address=$department_description="";
$department_id_err=$department_title_err=$department_address_err=$department_description_err="";
$query_error = "";
$record_result="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["department_id_hidden"]))
        $record_result="<div class='alert alert-warning'><strong>Warning!</strong> Please select department to update</div>";
    else {
        $id = $_POST["department_id_hidden"];
        $title = $_POST["department_title"];
        $address = $_POST["department_address"];
        $description = $_POST["department_description"];
        $sql = "update tblDepartment set title='" . $title . "', address='" . $address . "',  description='" . $description . "' where department_id=" . $id;
        $result = ($res = $conn->query($sql) === TRUE);
        if ($result) {
            $record_result = "<div class='alert alert-success'><strong>Success!</strong> Department Updated Successfully</div>";
        } else
            $record_result = "<div class='alert alert-dangers'><strong>Failure!</strong> Failed to update the department</div>" . $conn->error;
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["department_id"])){
    $department_id=$_GET["department_id"];
    $sql = "select * from tblDepartment where department_id=".$department_id;
    $res=$conn->query($sql);
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
            $department_id=$row["department_id"];
            $department_title=$row["title"];
            $department_address=$row["address"];
            $department_description=$row["description"];
            echo $department_description;
            //die();
            $record_result="<div class='alert alert-success'><strong>Success!</strong> Department Reterieved Successfully</div>";
        }
    }
    else
        $record_result="<div class='alert alert-dangers'><strong>Failure!</strong> Failed to reterieve the department</div>".$conn->error;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Edit Department</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script src="assets\js\includehtm.js"></script>

</head>
<body>

<div class="wrapper">
    <div w3-include-html="header.html"></div>
    <script> includeHTML(); </script>


    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div w3-include-html="mainmenu.html"></div>
                <script> includeHTML(); </script>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Department</h4>
                            </div>
                            <div class="content">

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Department ID</label>
                                                <input type="text" name="department_id" id="department_id" class="form-control" disabled value="<?php echo $department_id ?>">
                                                <input type="text" name="department_id_hidden" id="department_id_hidden" class="form-control" style="display:none;" value="<?php echo $department_id ?>">
                                                <span class="help-block"><?php echo $department_id_err;?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Department Name</label>
                                                <input type="text" name="department_title"  class="form-control" value="<?php echo $department_title; ?>" width="100%">
                                                <span class="help-block"><?php echo $department_title_err; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Department Address</label>
                                                <input type="text" name="department_address" id="department_address" class="form-control" value="<?php echo $department_address; ?>" width="100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>

                                                <textarea name="department_description" id="department_description" class="form-control" rows="3"><?php echo $department_description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div><?php echo $record_result; ?></div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Department</button>
                                    <div class="clearfix"></div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ////////////////////////////////////////////////////////////////-->
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>



</html>

