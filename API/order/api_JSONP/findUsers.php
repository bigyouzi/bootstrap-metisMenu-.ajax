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

$sql="select *,(select count(*) from orders) as total from orders order by order_id  limit $start , $pageSize ";
//echo $sql;

$result = mysql_query($sql);
//echo $result;
$list = array();
$total = 0;
//echo $list;
while($row = mysql_fetch_array($result)){
	//print_r($row);
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