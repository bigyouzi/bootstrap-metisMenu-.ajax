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

$sql="INSERT INTO orders ( rbcust_name, order_url, email_account, order_time, order_shoe, order_code, order_size, order_price, order_pay)
VALUES
('$_GET[name]','$_GET[url]', '$_GET[account]', '$_GET[time]', '$_GET[shoe]', '$_GET[code]', '$_GET[size]', '$_GET[price]', $_GET[pay])";

//echo $sql;
//echo 11;
if (!mysql_query($sql,$con)){
    die('Error: ' . mysql_error());
}

echo $_GET['callback'].'({"status":"ok"})';
//echo '({"status":"ok"})';

mysql_close($con)
?>