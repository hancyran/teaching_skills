<?php

include 'DB.php';


class UserInfo
{
  public $username;
  public $uid;
  public $tel;
  public $wechat;
  public $QQ;
  public $school;
  public $campus;
  public $gender;
  public $introduction;
  public $varification;
  public $buyed;
  public $selled;

  public function isLogin( $_COOKIE )
  {
    if(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin']==1){
      return true;
    }
     return false;
  }
  public function __construct()
  {
    if($this->isLogin()){
      $this->uid = $_COOKIE['uid'];
      $this->username = $_COOKIE['username'];
      $sql = "select * from userinfo where id = '" . $this->uid . "'";
      $db = new DB();
      $db->connect();
      $db->query($sql);
      $result_arr = $db->getAllRows();
      if($result_arr){
        $this->tel = $result_arr[0]['tel'];
        $this->wechat = $result_arr[0]['wechat'];
        $this->QQ = $result_arr[0]['QQ'];
        $this->gender = $result_arr[0]['gnder'];
        $this->school = $result_arr[0]['school'];
        $this->campus = $result_arr[0]['campus'];
        $this->introduction = $result_arr[0]['intro'];
        $this->varification = $result_arr[0]['varification'];
      }
    }
  }
  public function set($propname,$newVal)
  {
    $this->$propname = $newVal;
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
      $sql = "select * from order_info where buyer_id = uid"//语句未完成
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
      $sql = "select * from order_info where seller_id = uid"//语句未完成
      $db->query($sql);
      $result_arr = $db->getAllRows();
      return $result_arr;
    }
  }

  public function getHistory()
  {
    $db = new DB();
    $db->connect();
    $sql="select * from order_info where userid='" . $this->id ."' and status =  " ;
    $db->query($sql);
    $result_arr = $db->getALlRows();
    return $result_arr;
  }
}

  public function updateUserInfo($value='')
  {
    $sql = "uodate ** on***......"
  }
 ?>
