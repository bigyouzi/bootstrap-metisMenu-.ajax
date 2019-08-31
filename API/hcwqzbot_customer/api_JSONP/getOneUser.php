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

$sql="select * from hcwqzbot_customer where sbcust_id = $id";

$result = mysql_query($sql);

$list = array();
$total = 0;

while($row = mysql_fetch_array($result)){
    $item = array(
    'id' => $row['sbcust_id'],
	'name' => $row['sbcust_name'],
    'active_code' => $row['sbcust_active_code'],
    'mac_address' => $row['sbcust_mac_address'],
    'auth_code' => $row['sbcust_auth_code'],
	'createtime' => $row['sbcust_createtime'],
	'endtime' => $row['sbcust_endtime'],
	'expiredtime' => intval($row['sbcust_expiredtime']),
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