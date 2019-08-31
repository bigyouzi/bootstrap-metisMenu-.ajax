<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:text/html;charset=utf-8');

$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("bot_crm", $con);

$sql="update orders set rbcust_name = '$_GET[name]', order_url = '$_GET[url]', email_account = '$_GET[account]', order_time = '$_GET[time]', order_shoe = '$_GET[shoe]',  order_code = '$_GET[code]', order_size = '$_GET[size]', order_price = '$_GET[price]', order_pay = '$_GET[pay]' where order_id = $_GET[id] ";
//echo $sql;

if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';

mysql_close($con)
?>