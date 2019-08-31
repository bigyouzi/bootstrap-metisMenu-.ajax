<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json;charset=utf-8');



// 默认值
$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("bot_crm", $con);

$pageNum = $_GET['pageNum'];
$pageSize = $_GET['pageSize'];

$start=($pageNum-1)*$pageSize;
//$name = $_GET['name'];

//echo $name;
$sql="select * from activation_code where active_id = $_GET[id] limit $start , $pageSize";
//$sql="select * from activation_code where active_name = urldecode($_GET[name]) limit $start , $pageSize";
//echo $sql;

$result = mysql_query($sql);
//echo $result;
$list = array();
//echo $list;

//$row = mysql_fetch_array($result);
//print_r($row);
while($row = mysql_fetch_array($result)){
	//print_r($row);
    $item = array(
    'id' => $row['active_id'],
    'code' => $row['active_code'],
    'type' => $row['active_type'],
	'createtime' => $row['active_createtime'],
	'endtime' => $row['active_endtime'],
    'auth_code' => intval($row['active_auth_code']),
    );
    array_push($list,$item);
	//$total = $row['total'];
}

//print_r($list);
//echo $list;
$resultJSONString = json_encode(
array(
'list'=>$list,
'pageSize'=>intval($pageSize),
'pageNum'=>intval($pageNum),
'total'=> intval(1)
)
);

echo($_GET['callback']."($resultJSONString)");
//echo ($_GET['callback']."($list)");

mysql_close($con);

// sleep(1);
?>