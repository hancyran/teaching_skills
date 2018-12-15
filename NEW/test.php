<?php
include 'search.php';
//combine the get info into an array
$search_arr = $_GET;
$search= new search($search_arr);
//get the number of search results
$num_result= $search->getSearchResultNum();
//default max number of displayed courses: 9
$max_page= ceil($num_result / 9) ;
$page= (int)$_GET['page'];
//start number of course
$start_order= ($page-1) * 9;
//end number of course
if ($start_order+9 >= $num_result) {
	$end_order= $num_result;
}
else {
	$end_order= $start_order + 9;
}
?>
