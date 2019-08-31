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

$sql="INSERT INTO registerbot_customer ( rbcust_name, rbcust_active_code, rbcust_mac_address, rbcust_thread, rbcust_auth_code, rbcust_createtime, rbcust_endtime, rbcust_expiredtime)
VALUES
('$_GET[name]','$_GET[active_code]', '$_GET[mac_address]', '$_GET[thread]', '$_GET[auth_code]', '$_GET[createtime]', '$_GET[endtime]', '$_GET[expiredtime]')";
//echo $sql;
//echo 11;
if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';
//echo '({"status":"ok"})';

mysql_close($con)
?>