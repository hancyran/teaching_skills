<?php include "../php/DB.php" ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>搜索页</title>
		<script src="https://cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="../js/search.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/public.css"/>
		<link rel="stylesheet" type="text/css" href="../css/proList.css"/>
	</head>
	<body>
		<!--head-->
		<div class="nav">
			<div class="menu">
				<div class="menu_icon" onclick="menu_slide(this)">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>
			<div class="search">
				<i class="fas fa-search fa-2x" onclick="toggleSearch()"></i>
				<form class="search_form" action="php/search.php" method="get">
					<input type="text" name="search_key" placeholder="请输入课程关键字" id="search_key">
				</form>
			</div>
			<div class="logo">
				授渔
			</div>
			<div class="self">
				<div class="login">
					<a id="login" href="#login">登录</a>
				</div>
				<div class="signup">
					<a id="signup" href="#signup">注册</a>
				</div>
				<div class="cart" onclick="">
					<span id="count">0</span>
				</div>
			</div>
		</div>

		<!--搜索列表-->
		<div class="schBox">
			<ul class="select">
	       		<li class="select-list">
					<dl id="select1">
						<dt>课程：</dt>
						<dd class="select-all selected"><a href="#">全部</a></dd>
						<dd><a href="#">数据库原理</a></dd>
						<dd><a href="#">数据结构</a></dd>
					</dl>
				</li>
				<li class="select-list">
					<dl id="select2">
						<dt>省份：</dt>
						<dd class="select-all selected"><a href="#">全部</a></dd>
						<dd><a href="#">四川</a></dd>
						<dd><a href="#">浙江</a></dd>
					</dl>
				</li>
				<li class="select-list">
					<dl id="select3">
						<dt>城市：</dt>
						<dd class="select-all selected"><a href="#">全部</a></dd>
						<dd><a href="#">成都市</a></dd>
						<dd><a href="#">自贡市</a></dd>
						<dd><a href="#">绵阳市</a></dd>
					</dl>
				</li>
				<li class="select-list">
						<dl id="select4">
							<dt>学校：</dt>
							<dd class="select-all selected"><a href="#">全部</a></dd>
							<dd><a href="#">四川大学</a></dd>
							<dd><a href="#">电子科技大学</a></dd>
							<dd><a href="#">西南财经大学</a></dd>
						</dl>
					</li>
				<li class="select-result">
					<dl>
						<dt>已选条件：</dt>
						<dd class="select-no">暂时没有选择过滤条件</dd>
					</dl>
				</li>
			</ul>
		</div>
		<!--current-->
		<div class="current">
			<div class="index clearfix">
				<h3 class="fl">搜索结果：</h3>
			</div>
		</div>
		<!--proList--->
		<ul class="proList wrapper clearfix">
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
			<li>
				<a href="#">
					<dl>
						<dt><img src="img/sjkyl.PNG"></dt>
						<dd>数据库原理</dd>
						<dd>￥50</dd>
					</dl>
				</a>
			</li>
		</ul>
		<div class="page">
			<a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><span class="hl">...</span><a href="#">20</a><a href="#">下一页</a><span class="morePage">共20页，到第</span><input type="text" class="pageNum"><span class="ye">页</span><input type="button" value="确定" class="page_btn">
		</div>
	</body>
</html>
