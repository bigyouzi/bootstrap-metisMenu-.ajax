<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:text/html;charset=utf-8');

$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("bot_crm", $con);

$sql="update registerbot_customer set rbcust_name = '$_GET[name]', rbcust_active_code = '$_GET[active_code]', rbcust_mac_address = '$_GET[mac_address]', rbcust_thread = '$_GET[thread]', rbcust_auth_code = '$_GET[auth_code]',  rbcust_createtime = '$_GET[createtime]', rbcust_endtime = '$_GET[endtime]', rbcust_expiredtime = '$_GET[expiredtime]' where rbcust_id = $_GET[id] ";
//echo $sql;

if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';

mysql_close($con)
?>