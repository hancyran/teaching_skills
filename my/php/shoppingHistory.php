<?php

include 'UserInfo.php';
//测试
$time = time()+24*60*60;
setCookie("uid", '1000', $time, "/"); //设置COOKIE
setCookie("username", 'karen', $time, "/"); //设置一个用户名COOKIE
setCookie("isLogin", 1, $time, "/");

$user = new UserInfo();
$user->set('gender','女');
$user->set('QQ','2559837097');
$user->set('tel','131--------');
$user->set('wechat','wangxin');
$user->set('baits','233');
$user->set('balance',0);


$history = $user->getHistory();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>历史订单</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/my.css">
</head>
<body>
  <div class="navbar navbar-default">
    <div class="logo">
      授  渔
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="list-group side-bar-left">
          <a href="my.php" class="list-group-item">全部功能</a>
          <a href="#" class="list-group-item">我的购物车</a>
          <a href="#" class="list-group-item">进行中的课程</a>
          <a href="#" class="list-group-item active">历史订单</a>
          <a href="#" class="list-group-item">我的评价</a>
          <a href="info.php" class="list-group-item">个人信息</a>
          <a href="#" class="list-group-item">我的收藏</a>
          <a href="identification.php"" class="list-group-item">信息认证</a>

        </div>
      </div>


      <div class="col-sm-7">
        <div class="item-list">

          <?php foreach ($history as $key => $value) { ?>

            <div class="item">
              <div class="row">
                <div class="col-sm-2">
                  <a class="avator" href="#"></a>
                </div>
                <div class="col-sm-10">
                  <div class="title">
                    <?php echo $value['class_name'] ?>
                  </div>
                  <div class="course-detail">
                    <div class="seller">
                      <?php echo $value['seller_id'] ?>
                    </div>
                    <div class="status">
                      <?php echo $value['status'] ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php  } ?>



        </div>
      </div>

      <div class="col-sm-3">
        <div class="baits_balance">
          <div class="baits">
            <div class="title">
              我的鱼饵
            </div>
            <div class="remaining">
              <?php
              echo $user->get('baits');
               ?>
            </div>
          </div>
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

<script src="js/main.js" charset="utf-8"></script>
</body>
</html>
