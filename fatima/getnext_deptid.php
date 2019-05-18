<?php
                    // Include config file
                    require_once "config_main.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT max(department_id) as deptid FROM tblDepartment";
                    $res=$conn->query($sql);
                    $row = $res->fetch_assoc();
                    //file_put_contents( 'deptid' . time() . '.log', var_export( $row, true));
                    $maxid=$row["deptid"]+1 ;
                    echo $maxid;
                    
                    
                    
?>