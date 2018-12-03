<?php

include 'UserInfo.php';

$user = new UserInfo();
$user->set('gender',$_POST['gender']);
$user->set('tel',$_POST['tel']);
$user->set('QQ',$_POST['QQ']);
$user->set('wechat',$_POST['wechat']);
$user->set('school',$_POST['school']);

print_r($_POST);

$user->updateUserInfo('gender',$user->get('gender'));

echo '<script>
alert("修改成功！");
window.location.href="my.php";
</script>';
 ?>
