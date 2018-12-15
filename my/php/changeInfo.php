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
$user->updateUserInfo('QQ',$user->get('QQ'));
$user->updateUserInfo('wechat',$user->get('wechat'));
$user->updateUserInfo('tel',$user->get('tel'));

echo '<script>
alert("修改成功！");
window.location.href="my.php";
</script>';
 ?>
