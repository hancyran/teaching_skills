<?php
include 'UserInfo.php';
//测试
$time = time()+24*60*60;
setCookie("uid", '1000', $time, "/"); //设置COOKIE
setCookie("username", 'karen', $time, "/"); //设置一个用户名COOKIE
setCookie("isLogin", 1, $time, "/");

$user = new UserInfo();
$user->set('gender','女');
// $user->set('QQ','2559837097');
// $user->set('tel','131--------');
// $user->set('wechat','wangxin');
$user->set('baits','233');
$user->set('balance',0);
$user->set('email','123@123.com');
$user->set('school','2');

function getInfo($prop,$obj)
{
  if($obj->get($prop)=='null'){
    return $obj->get($prop);
  }
  else {
    return '/';
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>我的授渔</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/my.css">
   <link rel="stylesheet" href="../css/style.css">
 </head>
 <body>
   <header class="header-section narrow">
     <div class="header-warp narrow-warp">
       <div class="container wide-container">
         <a href="./" class="site-logo">
           <img src="../img/logo.png" style="width:100px">
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

   <div class="container main-container">
     <div class="row">
       <div class="col-sm-2">
         <div class="list-group side-bar-left">
           <a href="index.php" class="list-group-item">全部功能</a>
           <a href="#" class="list-group-item">我的购物车</a>
           <a href="#" class="list-group-item">进行中的课程</a>
           <a href="shoppingHistory.php" class="list-group-item">历史订单</a>
           <a href="#" class="list-group-item">我的评价</a>
           <a href="#" class="list-group-item  active">个人信息</a>
           <a href="#" class="list-group-item">我的收藏</a>
           <a href="identification.php" class="list-group-item">信息认证</a>

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
             我的信息
           </div>
          <form class="info" action="changeInfo.php" method="post">
            <div class="input-wrap">
              <label for="username">用户名：</label>
              <input class="input-control" type="text" name="username"  value=<?php echo   getInfo('username',$user); ?>>
            </div>

            <div class="input-wrap">
              <label for="gender">性别：</label>
              <select class="input-control" id="genderSelect"  name="gender">
                <option value='男' >男</option>
                <option value='女'>女</option>
              </select>

            </div>

            <div class="input-wrap">
              <label for="school">学校：</label>
              <select class="input-control" id="schoolSelect" name="school">
                <option value="1">北京大学</option>
                <option value="2">北京航空航天大学</option>
              </select>
            </div>

            <div class="input-wrap">
              <label for="tel">电话：</label>
              <input class="input-control" type="text" name="tel" value=<?php  echo getInfo('tel',$user); ?>>
            </div>

            <div class="input-wrap">
              <label for="QQ">QQ：</label>
              <input class="input-control" type="number" name="QQ" value=<?php echo   getInfo('QQ',$user); ?>>
            </div>

            <div class="input-wrap">
              <label for="wechat">微信：</label>
              <input class="input-control" type="text" name="wechat" value=<?php echo   getInfo('wechat',$user); ?>>
            </div>

            <div class="input-wrap">
              <label for="email">邮箱：</label>
              <input class="input-control" type="email" name="email" value=<?php echo   getInfo('email',$user); ?>>
            </div>


            <button type="button" name="alterInfo" class='btn btn-default'>修改信息</button>
            <button type="submit" name="submit" class='btn btn-primary disabled'>提交</button>
          </form>
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
  <script src="../js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="../js/my.js" charset="utf-8"></script>
  <script src="../js/jquery.cookie.js" charset="utf-8"></script>
  <script type="text/javascript">
  $("#genderSelect  option[value=<?php echo $user->get('gender'); ?>] ").attr("selected",true);
  $("#schoolSelect  option[value=<?php echo $user->get('school'); ?>] ").attr("selected",true);
  </script>
  <script>
  if($.cookie("uid"))
  {
    var name = $.cookie("username");
    $('.user-panel').html("<a href='#'>hello!"+name+"~&nbsp;</a><a href='../php/Account.php?do=logout'>退出登录</a>");
  }
  </script>
 </body>
 </html>
