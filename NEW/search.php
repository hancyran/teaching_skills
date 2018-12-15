<?php
include_once '../php/DB.php';

class search{
  private $city;
  private $district;
  private $teacher;
  private $price;
  private $course;
  private $db_for_orderInfo;
  private $db_for_schoolInfo;
  private $db_for_sellerInfo;
  private $sq;
  public $seller_course;
  public $seller_result_in_schoolInfo;
  public $seller_school;
  public $seller_campus;
  public $seller_city;
  public $seller_img;
  public $seller_username;
  public function __construct($arr){
    $this->db_for_orderInfo= new DB();
    $this->db_for_schoolInfo= new DB();
    $this->db_for_userInfo= new DB();
    $this->db_for_orderInfo->connect();
    $this->db_for_schoolInfo->connect();
    $this->db_for_userInfo->connect();
    $this->course= $arr['course'];
    $this->sq= "select * from order_info where class_name like '%$this->course%' and visibility='1' order by visit_time desc, create_date desc";
    $this->db_for_orderInfo->query($this->sq);
    /*
    $this->city= $arr['city'];
    $this->district= $arr['district'];
    $this->teacher= $arr['teacher'];
    $this->price= $arr['price'];
    */
  }
  //get the array containing all rows after query and also the seller school
  public function getRowInOrderInfo(){
    //get a row in table order_info
    $this->seller_course= $this->db_for_orderInfo->getRow();
    //get the seller school name from school_info
    $school_id=$this->seller_course['school_id'];
    $campus_id= $this->seller_course['campus_id'];
    $get_school_sq= "select * from school_info where school_id='$school_id' and campus_id='$campus_id'";
    $this->db_for_schoolInfo->query($get_school_sq);
    $seller_result_in_schoolInfo= $this->db_for_schoolInfo->getRow();
    $this->seller_school= $seller_result_in_schoolInfo['school_name'];
    //get the seller city name from school_info
    $this->seller_city= $seller_result_in_schoolInfo['city'];
    //get the seller campus from school_info
    $this->seller_campus= $this->seller_result_in_schoolInfo['campus_name'];
    //get the seller info
    $seller_id= $this->seller_course['seller_id'];
    //get the seller img from user_info
    $get_img_sq= "select * from user_info, seller_info where user_info.id=seller_info.uid and seller_info.id='$seller_id'";
    $this->db_for_userInfo->query($get_img_sq);
    $seller_result_in_userInfo= $this->db_for_userInfo->getRow();
    $this->seller_img= $seller_result_in_userInfo['img'];
    //get the seller username from user_info
    $this->seller_username= $seller_result_in_userInfo['username'];
  }
  //get the number of all rows after query
  public function getSearchResultNum(){
    return $this->db_for_orderInfo->getRowNum();
  }
  public function __destruct(){
    $this->db_for_orderInfo->close();
    $this->db_for_schoolInfo->close();
    $this->db_for_userInfo->close();
  }
}

?>
