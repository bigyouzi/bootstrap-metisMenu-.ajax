<?php
header('Content-Type:application/json;charset=utf-8');

/* create table teacher  (id int auto_increment primary key,username varchar(500),password varchar(500),name varchar(500),school varchar(50),age int) default charset = utf8;
*/

// 默认值
$con = mysql_connect("localhost","root","root");

if (!$con){
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("bot_crm", $con);

$pageNum = $_GET['pageNum'];
$pageSize = $_GET['pageSize'];

$start=($pageNum-1)*$pageSize;

$sql="select *,(select count(*) from nourishbot_customer) as total from nourishbot_customer order by nbcust_id  limit $start , $pageSize ";
//echo $sql;

$result = mysql_query($sql);
//echo $result;
$list = array();
$total = 0;
//echo $list;
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
    $total = $row['total'];
}
//print_r($list);
$resultJSONString = json_encode(
array(
'list'=>$list,
'pageSize'=>intval($pageSize),
'pageNum'=>intval($pageNum),
'total'=> intval($total)
)
);

echo($_GET['callback']."($resultJSONString)");
//echo ($_GET['callback']."($list)");

mysql_close($con);

// sleep(1);
?>