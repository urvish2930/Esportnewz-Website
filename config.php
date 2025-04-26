<HTML>
<head>
<title>Esport newz</title>
</head>
<body>
<?php

$dbhost ='localhost';
$dbuser = 'root';
 $dbpass ='';
 $dbname ='login';
$conn= mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
 //now check the connection
if(!$conn)
{
die("Connection Failed:".mysqli_error());
}
//echo "connected successfully <br> ";

?>


</body>

</HTML>
