<?php
    //将该用户下的所有购物车数据删除
    session_start();
	include 'psql.php';
    $buyer_id = $_SESSION['buyer_id'];

   
    $sql ="DELETE FROM cart WHERE buyer_id ='{$buyer_id}'";
    $data = pg_query($db, $sql);
    
    if($data){
        $response = array(
            'errno'  => 0,
            'errmsg' => 'success',
            'data'   => true,
        );
    }else{
        $response = array(
            'errno'  => -1,
            'errmsg' => 'fail',
            'data'   => false,
        );
    }
    
    echo json_encode($response);