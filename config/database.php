<?php 
$serverName = "DESKTOP-9VSBNMI\\SQLEXPRESS"; // Your SQL Server instance name
$connectionOptions = array(
    "Database" => "WCFTCodeChallangeDB", // Your database name
    "Uid" => "sa", // Your SQL Server username
    "PWD" => "password" // Your SQL Server password
); 
function getDatabaseConnection() {
    global $serverName, $connectionOptions;
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    return $conn;
}
?>
