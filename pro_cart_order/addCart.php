<?php
    session_start(); // 初始化session
	include 'psql.php';
    //加入购物车操作
    //1.接受传递过来的post参数
    $id =intval($_POST['id']);
    echo $id;
    $num =intval($_POST['num']);
    //2.准备要添加的购物车数据
    //$buyer_id = $_SESSION['buyer_id'];
    $buyer_id ="张三";
    $ret = 0;

    $sql ="SELECT * FROM cart WHERE buyer_id ='{$buyer_id}' and id='{$id}'";
    $data = pg_query($db, $sql);
    $numRows = pg_num_rows ($data);
    $row = pg_fetch_array($data);
    //3.完成购物车数据的添加操作（判断当前用户在购物车当中是否已经加入该商品）
    print_r($row);
    if($numRows){
        echo 1;
        $num = $num + $row['num'];
        $sql= "UPDATE cart SET num='{$num}' WHERE buyer_id ='{$buyer_id}' and id='{$id}'";
        $ret =pg_query($db, $sql);
    }else{
        echo 2;
        $sql = "INSERT INTO cart(id,name,buyer_id,price,num,image) VALUES('{$id}','数据库原理','{$buyer_id}',50,'{$num}','img/sjkyl.PNG')";
        $ret =pg_query($db, $sql);
    }
        
    //4.返回最终添加的结果
    if($ret){
        $response = array(
            'errno'     => 0,
            'errmsg'  => 'success',
            'data'      => true,
        );
    }else{
        $response = array(
            'errno'     => -1,
            'errmsg'   => 'fail',
            'data'       => false,
        );
    }
    
    echo json_encode($response);