<?php
$conn = sqlsrv_connect("DESKTOP-MBKKSOM\MSSQLSERVER02", array("Database" => "musikin", "UID" => "", "PWD" => ""));
if (!$conn) die(print_r(sqlsrv_errors(), true));