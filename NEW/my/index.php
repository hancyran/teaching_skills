<?php
include 'UserInfo.php';
//测试
/*

setCookie("uid", '1000', $time, "/"); //设置COOKIE
setCookie("username", 'karen', $time, "/"); //设置一个用户名COOKIE
*/
$time = time()+24*60*60;
setCookie("isLogin", 1, $time, "/");
$user = new UserInfo();

$cart_of_order= '1,2';
$cart_of_order_num= '1,3';
setCookie('cart_of_order', $cart_of_order, time() + 24*60*60, '/');
setCookie('cart_of_order_num', $cart_of_order_num, time() + 24*60*60, '/') ;


/*
$user->set('gender','女');
$user->set('QQ','2559837097');
$user->set('tel','131--------');
$user->set('wechat','wangxin');
$user->set('balance',0);
*/

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
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/my.css">
   <link rel="stylesheet" href="../css/style.css">
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

   <div class="mybgimg">
   </div>

   <div class="container main-container">
     <div class="row">
       <div class="col-sm-2">
         <div class="list-group side-bar-left">
           <a href="./" class="list-group-item active">全部功能</a>
           <a href="../pay/" class="list-group-item">我的购物车</a>
           <a href="#" class="list-group-item">进行中的课程</a>
           <a href="shoppingHistory/" class="list-group-item">历史订单</a>
           <a href="#" class="list-group-item">我的评价</a>
           <a href="info/" class="list-group-item">个人信息</a>
           <a href="#" class="list-group-item">我的收藏</a>
           <a href="identification/" class="list-group-item">信息认证</a>
         </div>
       </div>


       <div class="col-sm-7">
         <div class="header">
           <div class="info">
             <div class="row">
               <div class="col-sm-2">
                 <a class="avator" href="#"></a>
               </div>
               <div class="col-sm-10">
                 <a class="name" href="#">
                   <?php
                    echo $user->get('username');
                     ?></a>
                 <div class="signature">
                   <?php
                     echo $user->get('introduction');
                    ?>
                 </div>
               </div>
             </div>
           </div>


           <div class="orderNav">
             <div class="row">
               <div class="col-sm-4">
                 <a class="firstA" href="#">
                   进行中的课程
                 </a>
               </div>
               <div class="col-sm-4">
                 <a href="#">
                   待付款的课程
                 </a>
               </div>
               <div class="col-sm-4">
                 <a href="#">
                   待评价的课程
                 </a>
               </div>
             </div>
           </div>
         </div>

         <div class="content">
           <div class="title">
             我的足迹
           </div>
           <div class="browsingHistory">
             <div class="box">
              1
             </div>
             <div class="box">
               2
             </div>
             <div class="box">
               3
             </div>
             <div class="box">
               3
             </div>
             <div class="box">
               3
             </div>
             <div class="box">
               3
             </div>
             <div class="box">
               3
             </div>
           </div>
         </div>
       </div>

       <div class="col-sm-3">
         <div class="balance">
           <div class="title">
             我的余额
           </div>
           <div class="remaining">
             <?php
             echo $user->get('balance');
              ?>
           </div>
         </div>

         <div class="calendar">
           <div class="year"><?php echo date("Y")," 年"; ?></div><div class="month"><?php echo date("m")," 月"; ?></div>
           <div class="day">
             <?php echo date("d")," 日"; ?>
           </div>
         </div>
         <div class="feedback">
           <div class="title">
             我要反馈
           </div>
           <ul class="content">
             <li><a href="">课程反馈</a></li>
             <li><a href="">功能异常</a></li>
             <li><a href="">其他</a></li>
           </ul>
         </div>
       </div>

   </div>
 </div>
 <footer class="footer-section spad pb-0 narrow-footer">
   <div class="container">
       <div class="footer-logo">
         <a href="#">
           <img src="../img/Wlogo.png" style="width:130px">
         </a>
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
 <!-- <script src="js/main.js" charset="utf-8"></script> -->
 <script src="../js/jquery-3.2.1.min.js"></script>
 <script src="../js/jquery.cookie.js" charset="utf-8"></script>
 <script>
 if($.cookie("uid"))
 {
   var name = $.cookie("username");
   $('.user-panel').html("<a href='./'><b>"+name+"&nbsp;&nbsp;&nbsp;</b></a> <a href='../php/Account.php?do=logout' style='font-weight:lighter;font-size:14px'>退出</a>");
 }
 </script>
 </body>
 </html>
