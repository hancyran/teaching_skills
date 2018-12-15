<?php
include 'showDetail.php';

$order_arr= $_POST;
$showDetail= new showDetail($order_arr);
$showDetail->getOrderDetail();

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>授渔</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/flaticon.css"/>
		<link rel="stylesheet" href="css/owl.carousel.css"/>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

		<!-- Header section -->
		<header class="header-section narrow">
			<div class="header-warp narrow-warp">
				<div class="container wide-container">
					<a href="./" class="site-logo">
						<img src="img/logo.png" style="width:100px">
					</a>
					<div class="user-panel">
						<a href="#">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="">注册</a>
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
					<ul class="main-menu">
						<li><a href="about.html">关于我们</a></li>
						<li><a href="courses.php?course=&page=1">课程总览</a></li>
						<li><a href="blog.html">新闻中心</a></li>
						<li><a href="contact.html">联系方式</a></li>
					</ul>
				</div>
			</div>
		</header>

		<div class="bgimg">
		</div>

		<!-- Course-type Section (with search bar)-->
		<section class="multi-search-section type-section">
			<div class="msf-warp">
				<div class="container">
					<div class="course-type">
						<span id="type">课程类别: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id="type1">工科类 / </span><span id="type2">计算机</span>
					</div>
					<form class="multi-search-form" action="courses.php">
						<input type="text" name="course" placeholder="课程关键字" autocomplete="off">
						<input type="hidden" name="page" value="1">
						<button class="site-btn">查询<i class="fa fa-angle-right"></i></button>
					</form>
				</div>
			</div>
		</section>
		<!-- Search section end -->


		<!--Detail Section --->
		<div class="detCon">
			<div class="proDet wrapper">
				<div class="proCon clearfix">
					<div class="proImg fl">
						<img class="det" src="img/courses/python.png"/>
					</div>
					<!-- Product description Section-->
					<div class="fl intro">
						<div class="title">
							<h3><?php echo $showDetail->class_name ?></h3>
							<p><?php echo $showDetail->description ?></p>
							<span><?php echo $showDetail->price ?>元 / 时</span>
						</div>
						<div class="proIntro">
							<h6>发布学校: <?php echo $showDetail->school ?> / <?php echo $showDetail->campus ?> &nbsp;&nbsp;所在城市: <?php echo $showDetail->city ?></h6>
							<br>
							<p>授课人计划共出售: &nbsp;<span>9999</span>小时</p>
							<div class="num clearfix">
								<img class="fl sub" src="img/sub.jpg">
								<span class="fl" contentEditable="true">1</span>
								<img class="fl add" src="img/add.jpg">
							</div>
						</div>
						<div class="btns clearfix">
							<a href="#2"><p class="buy fl">立即购买</p></a>
							<a href="#2"><p class="cart fr">加入购物车</p></a>
						</div>
					</div>
					<!-- end Product description Section -->

					<!-- Teacher info Section -->
					<div class="fr seller">
						<div class="image">
							<img class="fr" src="img/user/femalecodercat.jpg" />
						</div>
						<div class="allInfo">
							<div class="fr info">
								<span><?php echo $showDetail->seller_username ?></span>
							 	<p><b><?php echo $showDetail->seller_school ?> &nbsp;&nbsp;<?php echo $showDetail->seller_major ?></b> </p>
								<p>个人描述</p>
							</div>
						</div>
					</div>
					<!-- end Teacher info Section -->

				</div>
			</div>
		</div>
		<!-- end Detail Section -->

		<!-- Order details and recommendation Section -->
		<div class="introMsg wrapper clearfix">
			<!-- order details -->
			<div class="msgL fl">
				<div class="msgTit clearfix">
					<a class="on">商品详情</a>
					<a>所有评价</a>
				</div>
				<div class="msgAll">
					<div class="msgImgs">
						<img src="img/order/datascience.png">
					</div>
					<div class="msgDetails">
						<h5>机器学习与数据分析</h5>
						<br>
						<p>
						散点图展示了线性支持向量机核函数的决策边界（虚线）问题分类 聚类 回归 异常检测 关联规则 强化学习 结构预测 特征学习 在线学习 半监督学习 语法归纳
						监督学习 (分类 · 回归) 决策树 集成（装袋, 提升，随机森林） k-NN 线性回归 朴素贝叶斯 神经网络 逻辑回归 感知器 支持向量机（SVM） 相关向量机（RVM）
						聚类 BIRCH 层次 k-平均 期望最大化（EM）DBSCAN OPTICS 均值飘移降维 因子分析 CCA ICA LDA NMF PCA LASSO t-SNE
						结构预测概率图模型（贝叶斯网络，CRF, HMM）异常检测k-NN 局部离群因子神经网络自编码 深度学习 多层感知机 RNN 受限玻尔兹曼机 SOM CNN
						强化学习 Q学习 SARSA 时间差分学习 深度强化学习理论 偏差/方差困境 计算学习理论 经验风险最小化 PAC学习 统计学习 VC理论
						查论编数据科学（英语：data science），又称资料科学，是一门利用数据学习知识的学科，其目标是通过从数据中提取出有价值的部分来生产数据产品。
						它结合了诸多领域中的理论和技术，包括应用数学、统计、模式识别、机器学习、数据可视化、数据仓库以及高性能计算。数据科学通过运用各种相关的数据来帮助非专业人士理解问题。
						数据科学技术可以帮助我们如何正确的处理数据并协助我们在生物学、社会科学、人类学等领域进行研究调研。此外，数据科学也对商业竞争有极大的帮助。
						</p>
					</div>
					<div class="eva">
						<div class="per clearfix">
							<img class="fl" src="img/user/femalecodercat.jpg">
							<div class="perR fl">
								<p>某某某</p>
								<p>课程很好，全5分</p>
								<p><span>2018年11月11日11:11</span></span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- recommendation -->
			<div class="msgR fr">
				<h5>相关课程</h5>
				<div class="seeList">
					<a href="#">
						<dl>
							<dt><img src="img/order/datascience2.jpg"></dt>
							<dd>数据科学入门</dd>
							<dd>50元 / 时</dd>
						</dl>
					</a>
					<a href="#">
							<dl>
								<dt><img src="img/order/datascience3.jpg"></dt>
								<dd>python数据分析</dd>
								<dd>50元 / 时</dd>
							</dl>
					</a>
					<a href="#">
							<dl>
								<dt><img src="img/order/datascience4.jpg"></dt>
								<dd>大数据应用</dd>
								<dd>50元 / 时</dd>
							</dl>
						</a>
				</div>
			</div>
		</div>
		<!-- end Order details and recommendation Section -->


		<!-- Footer section -->
		<footer class="footer-section spad pb-0">
			<div class="container wide-container">
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


		</div>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pro.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/cart.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
