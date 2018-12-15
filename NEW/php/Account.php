<?php
include '../php/DB.php';

class Account
{
  public $id;
  public $identifier;
  public $password;
  public $identify_type;
  public $email;
  public $do;
  public function setIdentifier()
  {
    if(isset($_POST['username']))
    {
      $this->identifier = $_POST['username'];//获取用户输入的姓名
    }
  }
  public function setEmail()
  {
    if(isset($_POST['email']))
    {
      $this->email = $_POST['email'];//获取用户输入的姓名
    }
  }
  public function setPassword()
  {
    if ( isset($_POST['password'])) {
      // code...
      $this->password = $_POST['password'];//获取用户输入的密码
    }
  }
  public function __construct()
  {
    $this->setIdentifier();
    $this->setPassword();
    $this->setEmail();
  }
  public function getDo()
  {
    if(isset($_GET['do'])){
      $this->do = $_GET['do'];
    }
  }
  public function AccountDBselect()//数据库操作
  {
    $db_o = new DB();
    $db_o->connect();
    $sql = "SELECT * FROM account where identifier='" . $this->identifier . "' and identify_type='username'";
    // select * from account where identifier='xiaohong' and identify_type='username';
    $db_o->query($sql);
    $row = $db_o->getRow();//取出查询结果
    return $row;
  }
  public function UserDBselect()//数据库操作
  {
    $db_o = new DB();
    $db_o->connect();
    $sql = "SELECT * FROM user_info where username='" . $this->identifier . "'";
    $db_o->query($sql);
    $row = $db_o->getRow();//取出查询结果
    return $row;
  }

  public function login()
  {
    $result_arr = $this->AccountDBselect();
    // print_r($result_arr);
    if($result_arr){
      if($result_arr['login_token']==$this->password)
      {
        $this->id = $result_arr['user_id'];
        $time = time()+24*60*60;
        setCookie("uid", $this->id, $time, "/"); //设置COOKIE
        setCookie("username", $this->identifier, $time, "/"); //设置一个用户名COOKIE
        setCookie("isLogin", 1, $time, "/"); // 设置一个登录判断的标记isLogin
        echo '<script type="text/javascript">
        alert("登陆成功！");
        window.location.href="../index.html";
        </script>';//返回主页
      }
      else{
        echo '<script type="text/javascript">
        alert("登录名或密码错误！请重新输入");
        window.location.href="./login.html";
        </script>';
      }
    }
    else{
      echo '<script type="text/javascript">
      alert("登录名或密码错误！请重新输入");
      window.location.href="./login.html";
      </script>';
    }
  }

  public function logout()
  {
    if(isset($_GET['do']) && $_GET['do']=='logout'){
    setCookie("uid", '', time()-3600, "/");
    setCookie("identifier", '', time()-3600, "/");
    setCookie("isLogin", '', time()-3600, "/");
    echo '<script>alert("退出成功");
    location="../index.html"
    </script>';
    }
  }

  public function signup()
  {
    $result_arr = $this->AccountDBselect();
    if($result_arr){
      echo "<script type='text/javascript'>
      alert('用户名不可用！请重新输入');
      window.location.href='./signup.html';
      </script>";
    }
    else{
      // echo $this->identifier,$this->email;
      $sql="insert into user_info(username,qq) values('$this->identifier','$this->email')";
      echo $sql;
      $db_o = new DB();
      $db_o->connect();
      $db_o->query($sql);

      $result_arr=$this->UserDBselect();
      // print_r($result_arr);
      // insert into user_info(id,username,qq) values(10,'test','123');
      $userid=$result_arr['id'];
      $username=$result_arr['username'];
      $sql1 = "insert into account(user_id,identify_type,identifier,login_token) values($userid,'username','$this->identifier','$this->password')";
      $db_o->query($sql1);
      $time = time()+24*60*60;
      setCookie("uid", $userid, $time, "/"); //设置COOKIE
      setCookie("username", $username, $time, "/"); //设置一个用户名COOKIE
      setCookie("isLogin", 1, $time, "/"); // 设置一个登录判断的标记isLogin
      //echo "<script type='text/javascript'>
      //alert('注册成功！请登录');
      //window.location.href='../index.html';
      //</script>";
    }
  }

}

$test = new Account();
$test->getDo();
$funName = (string)$test->do;
$test->$funName();
 ?>
