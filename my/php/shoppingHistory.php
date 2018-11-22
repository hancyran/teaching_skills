<?php

include 'UserInfo.php';

$user = new UserInfo();
$history = $user->getHistory();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>历史订单</title>
  <link rel="stylesheet" href=".../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/my.css">
</head>
<body>
  <div class="navbar navbar-default">

  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="list-group side-bar-left">
          <a href="my.html" class="list-group-item">全部功能</a>
          <a href="#" class="list-group-item">我的购物车</a>
          <a href="#" class="list-group-item">进行中的课程</a>
          <a href="#" class="list-group-item active">历史订单</a>
          <a href="#" class="list-group-item">我的评价</a>
          <a href="#" class="list-group-item">个人信息</a>
          <a href="#" class="list-group-item">我的收藏</a>
          <a href="#" class="list-group-item">我的足迹</a>
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
                    <?php echo $value['coursename'] ?>
                  </div>
                  <div class="course-detail">
                    <div class="seller">
                      <?php echo $value['sellername'] ?>
                    </div>
                    <div class="status">
                      <?php echo $value['coursestatus'] ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          <?php  } ?>



        </div>
      </div>

      <div class="col-sm-3">
        <div class="calendar">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="feedback">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>

  </div>

<script src="js/main.js" charset="utf-8"></script>
</body>
</html>
