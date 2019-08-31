<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:text/html;charset=utf-8');

$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("bot_crm", $con);

$sql="update nourishbot_customer set nbcust_name = '$_GET[name]', nbcust_active_code = '$_GET[active_code]', nbcust_mac_address = '$_GET[mac_address]', nbcust_thread = '$_GET[thread]', nbcust_auth_code = '$_GET[auth_code]',  nbcust_reset = '$_GET[reset]', nbcust_total = '$_GET[total]', nbcust_createtime = '$_GET[createtime]', nbcust_endtime = '$_GET[endtime]', nbcust_expiredtime = '$_GET[expiredtime]' where nbcust_id = $_GET[id] ";
//echo $sql;

if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';

mysql_close($con)
?>