<?php
require_once 'config/init.php';

$currentDateTime = date('Y-m-d H:i:s');

$log = array(
    "date" =>$currentDateTime ,
    "hit" => "yes"
);
$log_where = array();
$SubDB->performCRUD("tblscriptlog", "i", $log, $log_where);

echo "success";

?>