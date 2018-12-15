<?php
    session_start();
	include 'psql.php';
    //完成对数据表的修改操作
    //1.接收参数 //2.处理参数
    $id = intval($_POST['id']);
    $num = intval($_POST['num']);
    //$id = 2;
    //$num =6;
    var_dump($id);
    var_dump($num);
    //$buyer_id = $_SESSION['buyer_id'];
    $buyer_id ="张三";
    //3.完成更新操作
    
    $sql ="SELECT * FROM cart WHERE buyer_id ='{$buyer_id}' and id='{$id}'";
    $data = pg_query($db, $sql);
    $numRows = pg_num_rows ($data);
    $row = pg_fetch_array($data);

    if($numRows){
        $sql= "UPDATE cart SET num='{$num}' WHERE buyer_id ='{$buyer_id}' and id='{$id}'";
        $ret =pg_query($db, $sql);
    }else{
        echo "出错了";
    }
    
    //4.返回结果
    if($ret){
        $response = array(
            'errno'         => 0,
            'errmsg'      => 'success',
            'data'          => true,
        );
    }else{
        $response = array(
            'errno'         => -1,
            'errmsg'      => 'fail',
            'data'          => false,
        );
    }
    
    echo json_encode($response);