<?php
// Include config file
require_once "config_main.php";

// Attempt select query execution
$sql = "SELECT max(designationid) as desgid FROM tblDesignation";
$res=$conn->query($sql);
$row = $res->fetch_assoc();
//file_put_contents( 'deptid' . time() . '.log', var_export( $row, true));
$maxid=$row["desgid"]+1 ;
echo $maxid;



?>