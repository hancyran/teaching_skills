<?php
include dirname(__FILE__)."/DB.php";
$db_conn= new DB();
//sample for connect()
$db_conn->connect();
//the result will save in the '$db'(but just execute the statement would be fine);
print_r($db_conn->db);//the result "PDO Object ( )"
echo "<br>";
//
//sample for query()
$sq= "select * from course_info";
$db_conn->query($sq);
//the result save into $result;
print_r($db_conn->result);//result: PDOStatement Object ( [queryString] => select * from course_info )
echo "<br>";
//
//sample for getRow()
$row= $db_conn->getRow();
print_r($row);// or just use $db_conn->row
//it will return an array with both number key and original key
//result: Array ( [id] => 1 [0] => 1 [name] => 数据库 [1] => 数据库 )
echo "<br>";
//
//sample for getAllRow()
//for getRow() will change the pointer to next row,
// here we need to execute the query again to get the whole info
$sq= "select * from course_info";
$db_conn->query($sq);
$all_rows= $db_conn->getAllRow();
print_r($all_rows);// or just use $db_conn->all_rows
//it will return an array with numberKey-arrayValue
//result: Array ( [0] => Array ( [id] => 1 [0] => 1 [name] => 数据库 [1] => 数据库 )
//              [1] => Array ( [id] => 2 [0] => 2 [name] => 数据结构 [1] => 数据结构 ) )
echo "<br>";
//if we want to use getAllRow(), we can use a foreach loop
foreach ($all_rows as $row) {
  print "This is course: {$row['name']}" . "<br>";
}
//sample for getRowNum()
print $db_conn->getRowNum();
echo "<br>";
//
$preq= 'INSERT INTO course_info (name) VALUES (?)';
$db_conn->prepare($preq);
$arr= array('PS基础教程');
print_r($db_conn->execute($arr));
//finally, NOTE: dont forget to close the db_conn info
$db_conn->close();
?>

