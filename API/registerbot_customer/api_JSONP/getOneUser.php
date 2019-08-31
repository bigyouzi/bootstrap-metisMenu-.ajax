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

$sql="select * from registerbot_customer where rbcust_id = $id";

$result = mysql_query($sql);

$list = array();
$total = 0;

while($row = mysql_fetch_array($result)){
    $item = array(
    'id' => $row['rbcust_id'],
	'name' => $row['rbcust_name'],
    'active_code' => $row['rbcust_active_code'],
    'mac_address' => $row['rbcust_mac_address'],
    'thread' => $row['rbcust_thread'],
    'auth_code' => $row['rbcust_auth_code'],
	'createtime' => $row['rbcust_createtime'],
	'endtime' => $row['rbcust_endtime'],
	'expiredtime' => intval($row['rbcust_expiredtime']),
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