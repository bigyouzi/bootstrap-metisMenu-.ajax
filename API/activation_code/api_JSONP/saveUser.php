<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type:text/html;charset=utf-8');
header('Content-Type:application/json;charset=utf-8');
//header('Content-Type:application/x-www-form-urlencoded;charset=utf-8');
$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("bot_crm", $con);

$sql="INSERT INTO activation_code ( active_code, active_type, active_createtime, active_endtime, active_auth_code)
VALUES
('$_GET[code]', '$_GET[type]', '$_GET[createtime]', '$_GET[endtime]', '$_GET[auth_code]')";
//echo $sql;
//echo 11;
if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';
//echo '({"status":"ok"})';

mysql_close($con)
?>