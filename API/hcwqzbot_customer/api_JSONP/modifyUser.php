<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:text/html;charset=utf-8');

$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("bot_crm", $con);

$sql="update hcwqzbot_customer set sbcust_name = '$_GET[name]', sbcust_active_code = '$_GET[active_code]', sbcust_mac_address = '$_GET[mac_address]', sbcust_auth_code = '$_GET[auth_code]',  sbcust_createtime = '$_GET[createtime]', sbcust_endtime = '$_GET[endtime]', sbcust_expiredtime = '$_GET[expiredtime]' where sbcust_id = $_GET[id] ";
//echo $sql;

if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';

mysql_close($con)
?>