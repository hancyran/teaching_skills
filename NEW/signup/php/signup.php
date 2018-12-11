<?php

include 'Account.php'

 ?>


 <!DOCTYPE html>
 <html lang="zh-CN">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>注册啦！</title>
   <link rel="icon" href="img/heart.png">
   <link rel="stylesheet" href="https://cdn.bootcss.com/normalize/8.0.0/normalize.css">
   <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="D:/HTML/17.code/17.xcode/css/style.css">
 </head>
 <body>
   <div class="nav">
     <a href="#">我的</a>
   </div>
 <div class="wrap wrap-sm" id="mainCard" style="">
   <div class="header">
     <h1>注册<small>已有账号?<a href="login.php">登录</a></small></h1>
   </div>

   <div class="form"  >
     <form id="signup" class="" action="Account.php?do=signup" method="post">
       <div class="input-wrap">
         <label for="username">用户名</label>
         <input name='username' data-rule='pattern:"^[0-9a-zA-z\u2E80-\u9FFF]{2,10}$"|required:true' type="text" class="input-control" value="">
         <div id = "username-input-error" class="input-error">请输入3-10位汉字、英文字母和数字组成的昵称
         </div>
       </div>

         <div class="input-wrap">
           <label for="password">密码</label>
           <input name='password' data-rule='pattern:"^[0-9a-zA-Z]{5,12}$"|required:true'  type="password" class="input-control" value="">
           <div id = "password-input-error" class="input-error">请输入5-16位英文字母和数字组成的密码
           </div>
         </div>

       <button class="btn" type="submit" name="signup">注册</button>
     </form>
   </div>

   <div class="QQ_wechat">
     <a id = "QQ_icon" href="#">QQ登录</a>
     <a id = "wechat_icon" href="#">微信登录</a>
   </div>
 </div>

 <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
 <script src="js/validator.js" charset="utf-8"></script>
 <script src="js/input.js" charset="utf-8"></script>
 <script src="js/main.js" charset="utf-8"></script>

 </body>
 </html>
