<?php
$conn = sqlsrv_connect("RAFI\MSSQLSERVER01", array("Database" => "musikin", "UID" => "", "PWD" => ""));
if (!$conn) die(print_r(sqlsrv_errors(), true));