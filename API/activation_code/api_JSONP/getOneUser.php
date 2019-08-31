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

$sql="select * from activation_code where active_id = $id";

$result = mysql_query($sql);

$list = array();
$total = 0;

while($row = mysql_fetch_array($result)){
    $item = array(
    'id' => $row['active_id'],
    'code' => $row['active_code'],
    'type' => $row['active_type'],
	'createtime' => $row['active_createtime'],
	'endtime' => $row['active_endtime'],
    'auth_code' => intval($row['active_auth_code']),
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