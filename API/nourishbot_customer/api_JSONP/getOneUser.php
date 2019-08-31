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

$sql="select * from nourishbot_customer where nbcust_id = $id";

$result = mysql_query($sql);

$list = array();
$total = 0;

while($row = mysql_fetch_array($result)){
    $item = array(
    'id' => $row['nbcust_id'],
	'name' => $row['nbcust_name'],
    'active_code' => $row['nbcust_active_code'],
    'mac_address' => $row['nbcust_mac_address'],
    'thread' => $row['nbcust_thread'],
    'auth_code' => $row['nbcust_auth_code'],
	'reset' => $row['nbcust_reset'],
	'total' => $row['nbcust_total'],
	'createtime' => $row['nbcust_createtime'],
	'endtime' => $row['nbcust_endtime'],
	'expiredtime' => intval($row['nbcust_expiredtime']),
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