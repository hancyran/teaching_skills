<?php

session_start();
	include 'psql.php';
    $buyer_id=$_SESSION['buyer_id'] = "张三";
    $sum = $_GET["sum"];
    $arr = $_GET["arr"];
    $arr = explode(',', $arr); 
    $len = $_GET["len"];

  
	$sql ="SELECT * FROM cart where buyer_id ='{$buyer_id}'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
       echo pg_last_error($db);
   }
/*    else {
      echo "Table created successfully\n";
   } */
   //pg_close($db);
//    $data=pg_fetch_array($ret);
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>订单页</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css" />
		<link rel="stylesheet" type="text/css" href="css/mygxin.css" />
	</head>
	<body>
		<!----------------------------------------order------------------>
		<!-- <div class="head ding">
			<h1>授渔</h1>
		</div> -->
		<div class="order cart mt">
			<!-----------------site------------------->
			<div class="site">
				<p class="wrapper clearfix">
					<span class="fl">订单确认</span>
				</p>
			</div>
			<!-----------------orderCon------------------->
			<div class="orderCon wrapper clearfix">
				<div class="orderL fl">
					<!--------h3---------------->
					<h3>收件信息<a href="#" class="fr">新增地址</a></h3>
					<!--------addres---------------->
					<div class="addres clearfix">
						<div class="addre fl on">
							<div class="tit clearfix">
								<p class="fl">张三1
									<span class="default">[默认地址]</span>
								</p>
								<p class="fr">
									<a href="#">删除</a>
									<span>|</span>
									<a href="#" class="edit">编辑</a>
								</p>
							</div>
							<div class="addCon">
								<p>四川省&nbsp;成都市&nbsp;双流县&nbsp;四川大学江安校区</p>
								<p>13023332333</p>
							</div>
						</div>
						<div class="addre fl">
							<div class="tit clearfix">
								<p class="fl">张三2
								</p>
								<p class="fr">
									<a href="#" class="setDefault">设为默认</a>
									<span>|</span>
									<a href="#">删除</a>
									<span>|</span>
									<a href="#" class="edit">编辑</a>
								</p>
							</div>
							<div class="addCon">
								<p>四川省&nbsp;成都市&nbsp;双流县&nbsp;四川大学江安校区</p>
								<p>13023332333</p>
							</div>
						</div>
						<div class="addre fl">
							<div class="tit clearfix">
								<p class="fl">张三3
								</p>
								<p class="fr">
									<a href="#" class="setDefault">设为默认</a>
									<span>|</span>
									<a href="#">删除</a>
									<span>|</span>
									<a href="#" class="edit">编辑</a>
								</p>
							</div>
							<div class="addCon">
								<p>四川省&nbsp;成都市&nbsp;双流县&nbsp;四川大学江安校区</p>
								<p>13023332333</p>
							</div>
						</div>
					</div>
					<h3>支付方式</h3>
					<!--------way---------------->
					<div class="way clearfix">
						<img class="on" src="img/way01.jpg"> 
						<img src="img/way02.jpg"> 
						<img src="img/way03.jpg"> 
						<img src="img/way04.jpg"> 
					</div>
				</div>
				<div class="orderR fr">
					<div class="msg">
						<h3>订单内容<a href="cart.php" class="fr">返回购物车</a></h3>
                        <!--------ul---------------->
                        <?php 
                        for ($i=0;$i<$len;$i++) {
                            $sql ="SELECT * FROM cart where buyer_id ='{$buyer_id}'and id='{$arr[$i]}'";
                            $ret = pg_query($db, $sql);
                            $data = pg_fetch_array($ret);
                            // while ($data = pg_fetch_array($ret)) {
                                ?>
						<ul class="clearfix">
							<li class="fl">
								<img src="<?php echo $data["image"]?>">
							</li>
							<li class="fl">
								<p><?php echo $data["name"]?></p>
								<p>数量：<?php echo $data["num"];?></p>
							</li>
							<li class="fr">￥<?php echo $data["num"] * $data["price"]?></li>
                        </ul>
                        <?php
                            // }
                        }
                        ?>
					</div>
					<!--------tips---------------->
					<!-- <div class="tips">
						<p><span class="fl">商品金额：</span><span class="fr">￥139.80</span></p>
						<p><span class="fl">优惠金额：</span><span class="fr">￥0.00</span></p>
						<p><span class="fl">运费：</span><span class="fr">免运费</span></p>
					</div> -->
					<!--------tips count---------------->
					<div class="count tips">
						<p><span class="fl">合计：</span><span class="fr">￥<?php echo $sum?></span></p>
					</div>
					<!--<input type="button" name="" value="去支付"> -->
					<a href="#" class="pay">去支付</a>
				</div>
			</div>
		</div>
		<!--编辑弹框-->
		<!--遮罩-->
		<div class="mask"></div>
		<div class="adddz editAddre">
			<form action="#" method="get">
				<input type="text" placeholder="姓名" class="on" />
				<input type="text" placeholder="手机号" />
				<div class="city">
					<select name="">
						<option value="省份/自治区">省份/自治区</option>
					</select>
					<select>
						<option value="城市/地区">城市/地区</option>
					</select>
					<select>
						<option value="区/县">区/县</option>
					</select>
					<select>
						<option value="配送区域">配送区域</option>
					</select>
				</div>
				<textarea name="" rows="" cols="" placeholder="详细地址"></textarea>
				<input type="text" placeholder="邮政编码" />
				<div class="bc">
					<input type="button" value="保存" />
					<input type="button" value="取消" />
				</div>
			</form>
		</div>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pro.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/user.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
