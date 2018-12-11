<?php
include 'search.php';

$arr= $_GET;
$search= new search($arr);
for ($i=0; $i < 3 ; $i++) {
  $search->getRowInOrderInfo();
  print_r($search->seller_course);
  echo '<br>';
}
?>
