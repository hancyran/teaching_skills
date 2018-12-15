<?php
	session_start(); // 初始化session
	include 'psql.php';
   $_SESSION['buyer_id'] = "张三";

   $id="1";
    
   
   $sql ="SELECT * FROM pro where id='{$id}'";
   $ret = pg_query($db, $sql);
   if (!$ret) {
       echo pg_last_error($db);
   }
/*    else {
      echo "Table created successfully\n";
   } */
   pg_close($db);
   $row = pg_fetch_array($ret)
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>详情页</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css"/>
		<!-- others -->
		<!-- <link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	</head>
	<body>
		<!------------------------------head------------------------------>
		<!-- <div class="head ding">
			<h1>授渔</h1>
		</div> -->
		<!-- Header section -->
	<!-- <div class="header-section">
		<div class="header-warp">
			<div class="container">
				<a href="./" class="site-logo">
					<img src="img/logo.png" style="width:100px">
				</a>
				<div class="user-panel">
					<a href="signup/signup.html">登录</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="signup/login.html">注册</a>
				</div>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<ul class="main-menu">
					<li><a href="about.html">关于我们</a></li>
					<li><a href="courses.html">课程总览</a></li>
					<li><a href="blog.html">新闻中心</a></li>
					<li><a href="contact.html">联系方式</a></li>
				</ul>
			</div>
		</div>
</div> -->
		<!-----------------------Detail------------------------------>
		<div class="detCon">
			<div class="proDet wrapper">
				<div class="proCon clearfix">
					<div class="proImg fl">
						<img class="det" src="<?php echo $row["image"]?>" />
					</div>
					<div class="fl intro">
						<div class="title">
							<h4><?php echo $row["name"]?></h4>
							<p><?php echo $row["description"]?></p>
							<span>￥<?php echo $row["price"]?></span>
						</div>
						<div class="proIntro">
							<p>数量&nbsp;&nbsp;库存<span><?php echo $row["stock"]?></span>件</p>
							<div class="num clearfix">
								<img class="fl psub" src="img/sub.jpg">
								<span class="fl" contentEditable="true" id="proNum">1</span>
								<img class="fl padd" src="img/add.jpg">
							</div>
						</div>
						<div class="btns clearfix">
							<a href="javascript:buySoon(<?php echo $row['id']?>)"><p class="buy fl">立即购买</p></a>
							<a href="javascript:addCart(<?php echo $row['id']?>)" ><p class="cart fr">加入购物车</p></a>
						</div>
						<script type="text/javascript">
							function buySoon(id){
								var pnum = parseInt(document.getElementById("proNum").innerText);
								url= "order.php?id="+id+"&num="+pnum;
								window.location.href=url;
							}
            				function addCart(id){
								//ajax请求php脚本完成数据的添加 cart
								//alert('加入购物车成功');
								// var url = "addCart.php";
                				// var data = {"id":id,"num":parseInt(document.getElementById("proNum").innerText)};
                				// // var success= function(response){
                    			// // if(response.errno == -1){
                        		// // 	alert('加入购物车失败');
                    			// // }else{
                        		// // 	alert('加入购物车成功');
                    			// // }	
                				// // }
                				// $.post(url, data,success);
            					// } 
 
								$.ajax({
									url:"addCart.php",
									type:"post",
									//dataType:"json",
									//traditional: true,//加上这个属性，后台用 String[] arr 就可以接收到了
									//contentType:"application/x-www-form-urlencoded",
									data:{
											"id":id,
											"num":parseInt(document.getElementById("proNum").innerText)
											//, "num":parseInt($("#num").val())
										},
									success:function(response){
										if(response.errno == -1){
                        					alert('加入购物车失败');
                    					}else{
                        					alert('加入购物车成功');
                    					}	
									},
									error: function () {
										alert('出现错误！');
									}			
								});
							}

      					</script>
					</div>
					<div class="fr seller">
						<div class="image">
							<img class="fr" src="<?php echo $row["timg"]?>" />
						</div>
						<div class="allInfo">
							<div class="fr info">
								<span><?php echo $row["tname"]?></span>
							 	<p><?php echo $row["tmajor"]?></p>
								<p><?php echo $row["texp"]?></p>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="introMsg wrapper clearfix">
			<div class="msgL fl">
				<div class="msgTit clearfix">
					<a class="on">商品详情</a>
					<a>所有评价</a>
				</div>
				<div class="msgAll">
					<div class="msgImgs">
						<?php
                         $imgs = explode("|", $row['detail']);
                         for ($i = 0; $i < count($imgs); $i++) {
                             ?>
						<img src="<?php echo $imgs[$i]?>">
						<?php
                         }
                         ?>
					</div>
					<div class="eva">
						<div class="per clearfix">
							<img class="fl" src="img/wstx.PNG">
							<div class="perR fl">
								<p>某某某</p>
								<p>课程很好，全5分</p>
								<p><span>2018年11月11日11:11</span></span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="msgR fr">
				<h4>为你推荐</h4>
				<div class="seeList">
					<a href="#">
						<dl>
							<dt><img src="img/sjkyl.PNG"></dt>
							<dd>数据库原理</dd>
							<dd>￥50</dd>
						</dl>
					</a>
					<a href="#">
							<dl>
								<dt><img src="img/sjkyl.PNG"></dt>
								<dd>数据库原理</dd>
								<dd>￥50</dd>
							</dl>
					</a>
					<a href="#">
							<dl>
								<dt><img src="img/sjkyl.PNG"></dt>
								<dd>数据库原理</dd>
								<dd>￥50</dd>
							</dl>
						</a>
					<a href="#">
						<dl>
							<dt><img src="img/sjkyl.PNG"></dt>
							<dd>数据库原理</dd>
							<dd>￥50</dd>
						</dl>
					</a>
				</div>
				
			</div>
		</div>
		</div>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pro.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/cart.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			jQuery(".bottom").slide({titCell:".hd ul",mainCell:".bd .likeList",autoPage:true,autoPlay:false,effect:"leftLoop",autoPlay:true,vis:1});
		</script>
	</body>
</html>
