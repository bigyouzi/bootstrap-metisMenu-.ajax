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
$sql="select * from registerbot_customer where rbcust_id = $_GET[id] limit $start , $pageSize";
//$sql="select * from registerbot_customer where rbcust_name = urldecode($_GET[name]) limit $start , $pageSize";
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