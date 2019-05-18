<?php
    require_once "config_main.php";
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["department_id"])){
    $department_id=$_GET["department_id"];
    $sql = "delete from tblDepartment where department_id=".$department_id;
    $result = ($res = $conn->query($sql) === TRUE);
    if($result)
        $record_result="<div class='alert alert-success'><strong>Success!</strong> Department Deleted Successfully</div>";
    }
    else
        $record_result="<div class='alert alert-dangers'><strong>Failure!</strong> Failed to delete the department</div>".$conn->error;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Registered Departments</title>

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
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
   
</head>
<body>

<div class="wrapper">
    <div w3-include-html="header.html"></div><script> includeHTML(); </script>

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
                    <a class="navbar-brand" href="#">Registered Departments</a>
                </div>
                <div w3-include-html="mainmenu.html"></div>
                <script> includeHTML(); </script>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of Registered Departments</h4>
                                Following departments are registered with HRMS
                                <a href="department_create.php"><button type="button" class="btn btn-info btn-fill pull-right">Add New Department</button></a>
                                <?php echo $record_result; ?>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Dept. ID</th>
                                    <th>Dept. Name</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // Attempt select query execution
                                    $sql = "SELECT *  FROM tblDepartment";
                                    $res=$conn->query($sql);
                                    if($res->num_rows>0) {
                                        while($row = $res->fetch_assoc()){
                                            $tr = "<tr>";
                                            $tr .= "<td>" . $row["department_id"] . "</td>";
                                            $tr .= "<td>" . $row["title"] . "</td>";
                                            $tr .= "<td>" . $row["address"] . "</td>";
                                            $tr .= "<td>" . $row["description"] . "</td>";
                                            $tr.="<td>";
                                            $tr.="<a href='Department_read.php?department_id=". $row['department_id'] ."' title='View Department'><img src='assets/img/view.png' alt='View Record' height='20' width='20'></imgspan></a>";
                                            $tr.= "<a href='department_list.php?department_id=". $row['department_id'] ."' title='Remove Department'><img src='assets/img/delete.png' alt='Deletes Record' height='15' width='15'></a>";
                                            $tr.= "</td>";
                                            $tr .= "</tr>";
                                            echo $tr;
                                        }
                                    }
                                    ?>
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!--/////////////////////////////////////////////////////-->
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
