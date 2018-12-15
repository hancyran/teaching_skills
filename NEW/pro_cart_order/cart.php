<?php
	
	session_start();
	include 'psql.php';
	$buyer_id=$_SESSION['buyer_id'] = "张三";


	$sql ="SELECT * FROM cart where buyer_id ='{$buyer_id}'";
   $ret = pg_query($db, $sql);
   if (!$ret) {
       echo pg_last_error($db);
   }
/*    else {
      echo "Table created successfully\n";
   } */
   //pg_close($db);
   $numRows=pg_num_rows($ret);
?>


<html>
	<head lang="en">
		<meta charset="utf-8" />
		<title>购物车</title>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/proList.css" />
	</head>
	<body>
		<!--------------------------------------cart--------------------->
		<!-- <div class="head ding">
			<h1>授渔</h1>
		</div> -->
		<div class="cart mt">
			<!-----------------logo------------------->
			<!--<div class="logo">
				<h1 class="wrapper clearfix">
					<a href="index.html"><img class="fl" src="img/temp/logo.png"></a>
					<img class="top" src="img/temp/cartTop01.png">
				</h1>
			</div>-->
			<!-----------------site------------------->
			<div class="site">
				<p class=" wrapper clearfix">
					<span class="fl">购物车</span>
				</p>
			</div>
			<!-----------------table------------------->
			<div class="table wrapper">
				<div class="tr">
					<div>商品</div>
					<div>单价</div>
					<div>数量</div>
					<div>小计</div>
					<div>操作</div>
				</div>
				
				<?php
				if($numRows!=0){
                while ($row = pg_fetch_array($ret)) {
                ?>
				<div class="th" id="CarProList">
					<div class="pro clearfix">
						<label class="fl">
							<input type="checkbox" data="<?php echo $row["id"]?>"/>
    						<span></span>
						</label>
						<a class="fl" href="#">
							<dl class="clearfix">
								<dt class="fl"><img src="<?php echo $row["image"]?>"></dt>
								<dd class="fl">
									<p><?php echo $row["name"]?></p>
								</dd>
							</dl>
						</a>
					</div>
					<div class="price">￥<?php echo $row["price"]?></div>
					<div class="number">
						<p class="num clearfix">
							<img class="fl sub" src="img/sub.jpg">
							<span data="<?php echo $row['id'] ?>" class="fl" id="cartNum"><?php echo $row["num"]?></span>
							<img class="fl add" src="img/add.jpg">
						</p>
					</div>
					<div class="price sAll">￥<?php echo number_format($row["price"]*$row["num"],2)?></div>
					<div class="price"><a class="del"  data="<?php echo $row['id'] ?>" href="#2"><span>删除</span></a></div>
				</div>
				<?php
				}
			}
				else{
				?>
				<div class="goOn" style="display:block">空空如也~<a href="index.html">去逛逛</a></div>
				<?php
				}
                ?>
                
				<div class="goOn">空空如也~<a href="index.html">去逛逛</a></div>
				<div class="tr clearfix">
					<label class="fl">
						<input class="checkAll" type="checkbox"/>
						<span></span>
					</label>
					<p class="fl">
						<a href="#">全选</a>
						<a href="#" class="del">清空</a>
					</p>
					<p class="fr">
						<span>共<small id="sl">0</small>件商品</span>
						<span>合计:&nbsp;<small id="all">￥0.00</small></span>
						<a href="javascript:settlement()" class="count">结算</a>
					</p>
				</div>
			</div>
		</div>
		<div class="mask"></div>
		<div class="tipDel">
			<p>确定要删除该商品吗？</p>
			<p class="clearfix">
				<a class="fl cer" href="#">确定</a>
				<a class="fr cancel" href="#">取消</a>
			</p>
		</div>
		<div class="pleaseC">
			<p>购物车已清空</p>
			<img class="off" src="img/off.jpg" />
		</div>
		<div class="like">
			<h4>猜你喜欢</h4>
			<div class="bottom">
				<div class="hd">
					<span class="prev"><img src="img/prev.png"></span>
					<span class="next"><img src="img/next.png"></span>
				</div>
				<div class="imgCon bd">
					<div class="likeList clearfix">
						<div>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html">
								<dl>
								    <dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html" class="last">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
						</div>
						<div>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html">
								<dl>
									<dt><img src="img/sjkyl.PNG"></dt>
									<dd>数据库原理</dd>
									<dd>￥50</dd>
								</dl>
							</a>
							<a href="proDetail.html" class="last">
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
		</div>
</html>
		
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pro.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/cart.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			jQuery(".bottom").slide({titCell:".hd ul",mainCell:".bd .likeList",autoPage:true,autoPlay:false,effect:"leftLoop",autoPlay:true,vis:1});
		</script>
		<script type="text/javascript">
			function settlement(){
				var all = $(".checkAll").is(":checked");
				if(all){
					var str = document.getElementById("all").innerText;
					var SumPrice = parseFloat(str.substr(1));
					url="orderAll.php?sum="+SumPrice;
					window.location.href=url;
				}
				else{
					var arr = new Array();
					var len = $("input[type='checkbox']:checked").length;
					var str = document.getElementById("all").innerText;
					var SumPrice = parseFloat(str.substr(1));
					$("input[type='checkbox']:checked").each(function(){  
						arr.push(parseInt($(this).attr('data')));
					}); 
					url="orderPart.php?sum="+SumPrice+"&arr="+arr+"&len="+len;
					window.location.href=url;

				}
			}
		</script>
	</body>
