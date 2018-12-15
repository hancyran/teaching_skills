<?php

include 'DB.php';


class UserInfo
{
  public $username;
  public $uid;
  public $tel;
  public $wechat;
  public $QQ;
  public $email;
  public $school;
  public $campus;
  public $gender;
  public $introduction;
  public $verification;
  public $buyed;
  public $selled;
  public $isLogin;
  public $baits;
  public $balance;

  public function __construct()
  {
    $this->isLogin = isset($_COOKIE['isLogin'])?$_COOKIE['isLogin']:'';
    if($this->isLogin){
      $this->uid = $_COOKIE['uid'];
      $this->username = $_COOKIE['username'];
      $sql = "select * from user_info where id = '" . $this->uid . "'";
      $db = new DB();
      $db->connect();
      $db->query($sql);
      $result_arr = $db->getAllRows();
      if($result_arr){
        $this->tel = $result_arr[0]['tel'];
        $this->wechat = $result_arr[0]['wechat'];
        // $this->QQ = $result_arr[0]['QQ'];
        $this->gender = $result_arr[0]['gender'];
        $this->school = $result_arr[0]['school_id'];
        $this->campus = $result_arr[0]['campus_id'];
        // $this->introduction = $result_arr[0]['intro'];
        $this->verification = $result_arr[0]['verification'];
        // $this->verification = $result_arr[0]['email'];
      }
    }
  }
  public function set($propname,$newVal)
  {
    $this->$propname = $newVal;
    $this->updateUserInfo($propname,$newVal);
  }

  public function get($propname)
  {
    return $this->$propname;
  }

  public function buyedList()//已购买的课程
  {
    if($this->verification=="buyer")
    {
      $db = new DB();
      $db->connect();
      $sql = "select * from order_info where buyer_id = uid";//语句未完成
      $db->query($sql);
      $result_arr = $db->getAllRows();
      return $result_arr;
    }
  }
  public function selledList()//已发布的课程
  {
    if($this->verification=="seller")
    {
      $db = new DB();
      $db->connect();
      $sql = "select * from order_info where seller_id = uid";//语句未完成
      $db->query($sql);
      $result_arr = $db->getAllRows();
      return $result_arr;
    }
  }

  public function getHistory()
  {
    $db = new DB();
    $db->connect();
    $sql="select * from order_info,seller_info,user_info where order_info.buyer_id='$this->uid' and status='3' and seller_info.id=order_info.seller_id and seller_info.uid=user_info.id";
    $db->query($sql);
    $result_arr = $db->getALlRows();
    return $result_arr;
  }

  public function updateUserInfo($propname,$value)
  {
    $sql = "update user_info set " . $propname ."='" . $value ."' where ";
  }
}




 ?>
