<?php
                    // Include config file
                    require_once "config_main.php";
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $deptid=$_POST["department_id"];
                        echo "posted ".$deptid;
                        die();
                    }
                    $deptid=$_POST["department_id"];
                    $sql = "INSERT into tblDepartment(department_id, title , address,description) 
                        values(".$_POST["department_id"].",'".$_POST["department_title"]."','".$_POST["department_address"]."','".$_POST["department_description"]."')";
                    if($res=$conn->query($sql))
                    {

                    }

                    
                    
                    
?>