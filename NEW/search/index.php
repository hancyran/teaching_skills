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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>授渔</title>
	<meta charset="UTF-8">
	<meta name="description" content="授渔">
	<meta name="keywords" content="授渔">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../img/favicon.ico" rel="shortcut icon"/>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/flaticon.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<!--my style-->
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="container">
				<a href="../" class="site-logo">
					<img src="../img/logo.png" style="width:100px">
				</a>
				<div class="user-panel">
					<a href="#">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="">注册</a>
				</div>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<ul class="main-menu">
					<li><a href="#">关于我们</a></li>
					<li><a href="./?course=&page=1">课程总览</a></li>
					<li><a href="#">新闻中心</a></li>
					<li><a href="#">联系方式</a></li>
				</ul>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="../img/page-top-bg.jpg">
		<div class="container text-white">
			<h3>课程搜索</h3>
		</div>
	</section>
	<!--  Page top end -->


	<!-- Search section -->
	<section class="multi-search-section">
		<div class="msf-warp">
			<div class="container">
				<h5>查询课程</h5>
				<form class="multi-search-form" action="./">
					<input type="text" name="city" placeholder="所在城市">
					<input type="text" name="district" placeholder="所在地区">
					<input type="text" name="teacher" placeholder="授课人">
					<input type="text" name="price" placeholder="价格">
					<input type="text" name="course" placeholder="课程关键字" autocomplete="off" autofocus>
					<input type="hidden" name="page" value="1">
					<button class="site-btn">查询<i class="fa fa-angle-right"></i></button>
				</form>
			</div>
		</div>
	</section>
	<!-- Search section end -->


	<!-- Courses section  -->
	<section class="courses-section spad">
		<div class="container">
			<div class="sec-title text-center">
				<span>只为最优课程</span>
				<h2>搜索结果</h2>
				<span>共筛选<?php echo $num_result?>条课程</span>
				<h5 id="none_of_course">尚未此课程，我们正在努力扩大课程范围来帮您O(∩_∩)O！<br><br>敬请谅解</h5>
			</div>
			<div class="row courses-page">
				<!--
				php loop code
			-->
				<?php for ($i= $start_order; $i<$end_order ; $i++) {
					$search->getRowInOrderInfo();
					$course= $search->seller_course;
					$seller_school= $search->seller_school;
					$seller_city= $search->seller_city;
					$seller_img= $search->seller_img;
					$seller_username= $search->seller_username;
				?>
				<!-- course -->
				<div class="col-lg-4 col-md-6">
					<form class="course-item" action="../single/" method="post">
						<input type="hidden" name="order_id" value="<?php echo $course['id'] ?>">
						<button type="submit" name="button" id="order_btn">
								<figure class="course-preview">
									<!-- course image-->
									<img src="../img/courses/5.jpg" alt="course">
									<!-- course price -->
									<div class="price"><?php echo $course['price'] ?> / 时</div>
								</figure>
								<div class="course-content">
									<div class="cc-text">
										<!-- coures name -->
										<h5><?php echo $course['class_name'] ?></h5>
										<h5>&nbsp;</h5>
										<!-- description -->
										<p>为那些想要入门设计或是对于ps日常应用比较热爱的同学准备</p>
										<span><i class="flaticon-student-2"></i>已售课时 20</span>
										<span><i class="flaticon-placeholder"></i>浏览数 <?php echo $course['visit_time'] ?></span>
									</div>
									<div class="seller-info rating">
										<!-- teacher image -->
										<div class="seller-pic set-bg" data-setbg="../img/user/<?php echo $seller_img ?>.jpg"></div>
										<!-- teacher info, including school, located city-->
										<h6><?php echo $seller_username ?>- <span>发布学校: <?php echo $seller_school ?> 城市: <?php echo $seller_city ?></span><br>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star i-fade"></i>
										</h6>
									</div>
								</div>
						</button>
					</form>
				</div>
			<?php } ?>
			</div>
			<form class="text-center pt-2" action="./" method="get">
				<input type="hidden" name="course" placeholder="课程关键字" id="course">
				<input type="hidden" name="page" id="page">
				<button type="submit" class="site-btn last-page"><i class="fa fa-angle-left"></i> 上一页</button>
				<span id="page-counter">第 <?php echo $page ?> / <?php echo $max_page ?> 页</span>
				<button type="submit" class="site-btn next-page">下一页 <i class="fa fa-angle-right"></i></button>
			</form>
		</div>
	</section>
	<!-- Courses section end -->


	<!-- Footer section -->
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
						<img src="img/Wlogo.png" style="width:150px">
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


	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.more.js"></script>
	<script>
	$(function() {
		if (<?php echo $page ?> == 1) {
			$('.last-page').css('visibility', 'hidden');
		}
		if (<?php echo $page ?> == <?php echo $max_page ?>) {
			$('.next-page').css('visibility', 'hidden');
		}
		if (<?php echo $max_page ?> == 0) {
			$('.last-page').css('visibility', 'hidden');
			$('.next-page').css('visibility', 'hidden');
			$('#none_of_course').css('visibility', 'visible');
		}
		else {
			$('#none_of_course').css('visibility', 'hidden');
		}
	});
	$('.last-page').on('click', function(event) {
		$('#page').val('<?php echo $page-1 ?>');
		$('#course').val('<?php echo $search_arr['course'] ?>');
	});
	$('.next-page').on('click', function(event) {
		$('#page').val('<?php echo $page+1 ?>');
		$('#course').val('<?php echo $search_arr['course'] ?>');
	});
	</script>
</body>
</html>
<?php
$search= null;
?>
