<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type:application/json;charset=utf-8');


// 默认值
$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("bot_crm", $con);

$id = $_GET['id'];

$sql="select * from orders where order_id = $id";

$result = mysql_query($sql);

$list = array();
$total = 0;

while($row = mysql_fetch_array($result)){
    $item = array(
    'id' => $row['order_id'],
	'name' => $row['rbcust_name'],
	'url' => $row['order_url'],
	'account' => $row['email_account'],
	'time' => $row['order_time'],
	'shoe' => $row['order_shoe'],
	'code' => $row['order_code'],
	'size' => $row['order_size'],
	'price' => $row['order_price'],
	'pay' => intval($row['order_pay']),
    );
    array_push($list,$item);
}

$resultJSONString = json_encode(
array(
'list'=>$list,
)
);

echo $_GET['callback']."($resultJSONString)";

mysql_close($con);

// sleep(1);
?>