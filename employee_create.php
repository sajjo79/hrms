<?php
require_once "config_main.php";

$employee_id=$employee_title=$employee_address=$employee_description="";
$employee_id_err=$employee_title_err=$employee_address_err=$employee_description_err="";
$query_error = "";
$save_result="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //file_put_contents( 'debug' . time() . '.log', var_export( $_POST, true));

    if(isset($_POST["employee_id_hidden"]) && trim($_POST["employee_id_hidden"])!="")
    {

        $employee_id=$_POST["employee_id_hidden"];
        $employee_title=$_POST["employee_title"];
        $employee_address=$_POST["employee_address"];
        $employee_description=$_POST["employee_description"];


        if(empty($employee_title)){ $employee_title_err = "<div class='alert alert-warning'>employee name missing</div>";  }

        if($employee_id_err=="" && $employee_title_err=="")
        {
            $sql = "INSERT into tblemployee(employee_id, title , address,description) 
                                values(".$_POST["employee_id_hidden"].",'".$_POST["employee_title"]."','".$_POST["employee_address"]."','".$_POST["employee_description"]."')";
            if($res=$conn->query($sql)==TRUE)
            {
                $save_result="<div class='alert alert-success'><strong>Success!</strong> employee Saved Successfully</div>";
            }
            else
                $save_result="<div class='alert alert-dangers'><strong>Failure!</strong> Failed to save employee</div>".$conn->error;
        }

    }
    else
        $save_result="<div class='alert alert-warning'><strong>Warning!</strong> Please input employee ID</div>";


}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Register New employee</title>

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
    <script language="javascript">
        function GetNewID() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var resp_text=this.responseText;
                    //alert(resp_text);
                    document.getElementById("employee_id").value=resp_text;
                    document.getElementById("employee_id_hidden").value=resp_text;
                }
            };
            xmlhttp.open("GET", "getnext_deptid.php", true);
            xmlhttp.send();
        }

    </script>
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
                                <h4 class="title">Add employee</h4>
                            </div>
                            <div class="content">

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>employee ID</label>
                                                <input type="text" name="employee_id" id="employee_id" class="form-control" disabled placeholder="employee ID">
                                                <input type="text" name="employee_id_hidden" id="employee_id_hidden" class="form-control" style="display:none;">
                                                <span class="help-block"><?php echo $employee_id_err;?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>.</label>
                                                <input type="button" class="form-control" value="Create New ID" onclick="GetNewID();">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>employee Name</label>
                                                <input type="text" name="employee_title"  class="form-control" placeholder="employee Name" width="100%">
                                                <span class="help-block"><?php echo $employee_title_err; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>employee Address</label>
                                                <input type="text" name="employee_address" id="employee_address" class="form-control" placeholder="employee Address" width="100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="employee_description" id="employee_description" class="form-control" placeholder="employee description ..." rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div><?php echo $save_result ?></div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Save employee</button>
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
