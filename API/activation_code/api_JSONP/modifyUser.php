<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:text/html;charset=utf-8');

$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("bot_crm", $con);

$sql="update activation_code set active_code = '$_GET[code]', active_type = '$_GET[type]', active_createtime = '$_GET[createtime]', active_endtime = '$_GET[endtime]', active_auth_code = '$_GET[auth_code]' where active_id = $_GET[id]";
//echo $sql;

if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';

mysql_close($con)
?>