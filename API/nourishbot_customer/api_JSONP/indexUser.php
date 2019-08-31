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
$sql="select * from nourishbot_customer where nbcust_id = $_GET[id] limit $start , $pageSize";
//$sql="select * from nourishbot_customer where nbcust_name = urldecode($_GET[name]) limit $start , $pageSize";
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