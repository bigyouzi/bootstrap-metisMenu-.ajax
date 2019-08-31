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

$sql="select *,(select count(*) from hcwqzbot_customer) as total from hcwqzbot_customer order by sbcust_id  limit $start , $pageSize ";
//echo $sql;

$result = mysql_query($sql);
//echo $result;
$list = array();
$total = 0;
//echo $list;
while($row = mysql_fetch_array($result)){
	//print_r($row);
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