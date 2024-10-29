<?php
$conn = sqlsrv_connect("NATHANAEL", array("Database" => "MUSIKIN", "UID" => "", "PWD" => ""));
if (!$conn) die(print_r(sqlsrv_errors(), true));