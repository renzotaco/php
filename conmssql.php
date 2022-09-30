<?php
/* Bajar de https://github.com/Microsoft/msphpsql/releases/tag/v5.10.1 los drivers e incluir en el php.ini
   Para nuestro caso: Windows-8.1.zip
   Se debe copiar en XAMPP/php/ext/
*/
$serverName = "192.168.66.110\\SQLLIBRE"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AdventureWorks2019", "UID"=>"user01", "PWD"=>"Ujcm2022");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     //echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT Top 100 FirstName, LastName FROM AdventureWorks2019.Person.Person";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
echo "<CENTER><H1>ADVENTUREWORKS - MS SQL SERVER 2019</H1></CENTER>";
echo "<table width='60%' align='center' border='2'>";
echo "<tr><td><b>Apellidos</b></td><td><b>Nombre</b></td>";
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo "<tr><td>".$row['LastName']."</td><td> ".$row['FirstName']."</td></tr>";
}
echo "</table>";

sqlsrv_free_stmt( $stmt);


?>