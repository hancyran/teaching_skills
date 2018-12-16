<?php
include 'showCart.php';
//test cookie
$cart_of_order= '1,2';
$cart_of_order_num= '1,3';
setCookie('cart_of_order', $cart_of_order, time() + 24*60*60);
setCookie('cart_of_order_num', $cart_of_order_num, time() + 24*60*60);

//
$cookie_arr= $_COOKIE;
$cart_order_arr= explode(',', $cookie_arr['cart_of_order']);
$order_num= count($cart_order_arr);

$cart_order_num_arr= explode(',', $cookie_arr['cart_of_order_num']);
//if logged in, ignore cookie and get the cart_arr from DB;
//else, use the cookie as cart_arr

/*
$showCart= new showCart($cookie_arr);
$isLogin= $cookie_arr['isLogin'];
if ($isLogin == "1") {
	$cart_arr= $showCart->cart_arr;
}else {
	$cart_arr= $_COOKIE;
}
*/
$showCart= new showCart($cart_order_arr);

$showTotalAmount= "";
$amount=0;
//convert php array of cookie to js array of cookie
$json_cart_of_order= json_encode($cart_order_arr);
$json_cart_of_order_num= json_encode($cart_order_num_arr);

 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>授渔</title>
	<meta charset="UTF-8">
	<meta name="description" content="授渔">
	<meta name="keywords" content="授渔">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../img/favicon.ico" rel="shortcut icon"/>
	<!-- Stylesheets -->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/pay.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/jquery.cookie.js" charset="utf-8"></script>
</head>

<body>

	<header class="header-section narrow">
		<div class="header-warp narrow-warp">
			<div class="container wide-container">
				<a href="../" class="site-logo">
					<img src="../img/logo.png" style="width:100px">
				</a>
				<div class="user-panel">
					<a href="../login/">登录</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="../signup/">注册</a>
				</div>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<ul class="main-menu">
					<li><a href="#">关于我们</a></li>
					<li><a href="../search/?course=&page=1">课程总览</a></li>
					<li><a href="#">新闻中心</a></li>
					<li><a href="#">联系方式</a></li>
				</ul>
			</div>
		</div>
	</header>

	<div class="bgimg">
	</div>
	<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>购物车: &nbsp;&nbsp;&nbsp;<span id="course_num"></span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>编号</th>
							<th>课程图</th>
							<th>课时</th>
							<th>课程名</th>

							<th>价格</th>
							<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
						</tr>
					</thead>
					<!-- php code -->
					<?php for ($n=0; $n < $order_num; $n++) {
						$showCart->getOrderInfoInCart();
						$class_name= $showCart->class_name;
						$price= $showCart->price;
						$order_id= $showCart->order_id;
						$num_of_one_order= $cart_order_num_arr[$n];
						//
						if ($num_of_one_order == 1) {
							$showTotalAmount= $showTotalAmount. "<li>$class_name : <span>￥$price </span></li>";
						}
						else {
							$showTotalAmount= $showTotalAmount. "<li>$class_name : <span>$num_of_one_order x ￥$price </span></li>";
						}
						$amount += $price*$num_of_one_order;
					 ?>
					<!-- order -->
					<tr class="rem-<?php echo $n+1 ?>">
						<td class="invert"><?php echo $n+1 ?></td>
						<td class="invert-image">
							<form class="order_detail" action="../single/" method="post">
								<input type="hidden" name="order_id" value="<?php echo $order_id ?>">
								<button type="submit" name="button" style="padding:0">
									<img src="../img/order/datascience2.jpg" style="width:200px; height:100px" class="img-responsive" />
								</button>
							</form>
						</td>
						<td class="invert">
							 <div class="quantity">
								<div class="quantity-select">
									<div class="entry value-minus value-minus-<?php echo $n+1?>">&nbsp;</div>
									<div class="entry value value-<?php echo $n+1 ?>"><span><?php echo $num_of_one_order; ?></span></div>
									<div class="entry value-plus value-plus-<?php echo $n+1?> active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert"><?php echo $class_name ?></td>
						<td class="invert"><?php echo $price ?></td>
						<td class="invert">
							<div class="rem">
								<div class="close-<?php echo $n+1; ?>"><img src="../img/pay/close_1.png" alt=""> </div>
							</div>
							<script>$(document).ready(function(c) {
								$('.close-<?php echo $n+1 ?>').on('click', function(c){
									var order_in_cart= <?php echo $json_cart_of_order ?>;
									var index= order_in_cart.indexOf('<?php echo $order_id ?>');
									if (index > -1) {
  									order_in_cart.splice(index, 1);
									};
									$('.rem-<?php echo $n+1 ?>').fadeOut('slow', function(c){
										$('.rem-<?php echo $n+1 ?>').remove();
									});
									});
								});
						   </script>
						</td>
					</tr>
					<script>
					$('.value-plus-<?php echo $n+1?>').on('click', function(){
						var divUpd = $(this).parent().find('.value-<?php echo $n+1 ?>'), newVal = parseInt(divUpd.text(), 10)+1;
						divUpd.text(newVal);
						<?php
						echo "var order_in_cart_num = ". $json_cart_of_order_num . ";\n";
						echo "order_in_cart_num[$n] = parseInt(order_in_cart_num[$n], 10) + 1;\n";
						 ?>
						$.cookie('cart_of_order_num', order_in_cart_num);
					});
					$('.value-minus-<?php echo $n+1?>').on('click', function(){
						var divUpd = $(this).parent().find('.value-<?php echo $n+1 ?>'), newVal = parseInt(divUpd.text(), 10)-1;
						if(newVal>=1) divUpd.text(newVal);
						<?php
						echo "var order_in_cart_num = ". $json_cart_of_order_num . ";\n";
						echo "order_in_cart_num[$n] = parseInt(order_in_cart_num[$n], 10) - 1;\n";
						 ?>
						$.cookie('cart_of_order_num', order_in_cart_num);
					});
					</script>
					<!-- end an order-->
				<?php } ?>
				 <!--quantity-->
				</table>
			</div>
			<div class="checkout-left">
				<div class="checkout-left-basket">
					<h4>小结</h4>
					<ul>
						<?php echo $showTotalAmount ?>
						<li style="border-top: 1px solid #7a7a7a; padding-top:10px"><b style="font-size:17px">共计</b> : <span style="font-size:17px">￥ <?php echo $amount ?></span></li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					<div class="pay-type">
						<div class="wechat">
							<img src="../img/pay/wechatpay.png" style="width:60px;height:50px">
							<span>微信支付</span>
						</div>
						<div class="union">
							<img src="../img/pay/unionpay.png" style="width:80px;height:40px">
							<span>银联支付</span>
						</div>
						<div class="ali">
							<img src="../img/pay/alipay.png" style="width:55px;height:55px">
							<span>支付宝支付</span>
						</div>
						<a href="../"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>支付</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->


<!-- Footer section -->
<footer class="footer-section spad pb-0">
	<div class="container">
		<div class="text-center">
			<a href="#" class="site-btn">加入我们<i class="fa fa-angle-right"></i></a>
		</div>
		<div class="row text-white spad">
			<div class="col-lg-3 col-sm-6 footer-widget">
				<h4>理工科类</h4>
				<ul>
					<li><a href="#">人工智能</a></li>
					<li><a href="#">计算机编程</a></li>
					<li><a href="#">数据科学</a></li>
					<li><a href="#">应用数学</a></li>
					<li><a href="#">电子科技</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-sm-6 footer-widget">
				<h4>文科类</h4>
				<ul>
					<li><a href="#">外语深造</a></li>
					<li><a href="#">深入历史</a></li>
					<li><a href="#">文书磨砺</a></li>
					<li><a href="#">国内外文学</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-sm-6 footer-widget">
				<h4>艺术与设计</h4>
				<ul>
					<li><a href="#">平面设计</a></li>
					<li><a href="#">声乐</a></li>
					<li><a href="#">动画制作</a></li>
					<li><a href="#">计算机设计</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-sm-6 footer-widget">
				<h4>其他</h4>
				<ul>
					<li><a href="#">java</a></li>
					<li><a href="#">python</a></li>
					<li><a href="#">c++</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">php</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-bottom">

			<div class="social">
				<a href=""><i class="fa fa-qq"></i></a>
				<a href=""><i class="fa fa-wechat"></i></a>
				<a href=""><i class="fa fa-weibo"></i></a>
			</div>
			<ul class="footer-menu">
				<li><a href="about.html">关于我们</a></li>
				<li><a href="courses.html">课程总览</a></li>
				<li><a href="blog.html">新闻中心</a></li>
				<li><a href="contact.html">联系方式</a></li>
			</ul>
			<div class="footer-logo">
				<a href="#">
					<img src="../img/Wlogo.png" style="width:150px">
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<p class="text-white  text-center">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> SHOUYU All rights reserved
				</p>
			</div>

		</div>
	</div>
</footer>
<!-- Footer section end -->

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- main slider-banner -->
<script type="text/javascript">
	$(function(){

	});
	$('.wechat').on('click',  function(event) {
		$('.wechat').css('border', '2px solid black');
		$('.union').css('border', '2px solid rgb(230, 230, 230)');
		$('.ali').css('border', '2px solid rgb(230, 230, 230)');
	});
	$('.ali').on('click',  function(event) {
		$('.ali').css('border', '2px solid black');
		$('.union').css('border', '2px solid rgb(230, 230, 230)');
		$('.wechat').css('border', '2px solid rgb(230, 230, 230)');
	});
	$('.union').on('click',  function(event) {
		$('.union').css('border', '2px solid black');
		$('.wechat').css('border', '2px solid rgb(230, 230, 230)');
		$('.ali').css('border', '2px solid rgb(230, 230, 230)');
	});
</script>
<!-- //main slider-banner -->

</body>
</html>
