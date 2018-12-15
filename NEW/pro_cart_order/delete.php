<?php
    session_start();
	include 'psql.php';
    //1.接收参数并且处理参数
    $id = intval($_POST['id']);
    var_dump($id);
    //$buyer_id = $_SESSION['buyer_id'];
    //$id = "1";
    $buyer_id ="张三";
    //2.删除数据表
    
    $sql ="DELETE FROM cart WHERE buyer_id ='{$buyer_id}' and id='{$id}'";
    $data = pg_query($db, $sql);
    
    //3.返回处理结果
    if($data){
        $response = array(
            'errno'     =>  0,
            'errmsg'   => 'success',
            'data'       => true
        );
    }else{
        $response = array(
            'errno'     =>  -1,
            'errmsg'   => 'fail',
            'data'       => false
        );
    }
    
    echo json_encode($response);