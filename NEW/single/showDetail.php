<?php
include_once '../php/DB.php';

class showDetail{
  private $order_id;
  private $order_row;
  private $db_for_orderInfo;
  private $db_for_sellerInfo;
  private $course_type_id;
  //
  //public $course_type1;
  //public $course_type2;
  //
  public $class_name;
  public $description;
  public $price;
  //
  public $school;
  public $campus;
  public $city;
  //public $content;
  //public $img;
  //public $seller_img;
  //
  public $seller_username;
  public $seller_school;
  public $seller_major;
  //public $seller_description;

  public function __construct($arr){
    $this->db_for_orderInfo= new DB();
    $this->db_for_sellerInfo= new DB();
    $this->db_for_orderInfo->connect();
    $this->db_for_sellerInfo->connect();
    $this->order_id= $arr['order_id'];
    $this->sq= "select * from order_info,school_info where order_info.id=$this->order_id and
    (school_info.school_id,school_info.campus_id)=(order_info.school_id,order_info.campus_id)";
    $this->db_for_orderInfo->query($this->sq);
    }
  //
  public function getOrderDetail(){
    $this->order_row= $this->db_for_orderInfo->getRow();
    //
    $this->course_type_id= $this->order_row['cid'];
    $this->class_name= $this->order_row['class_name'];
    $this->description= $this->order_row['description'];
    $this->price= $this->order_row['price'];
    //
    $this->school= $this->order_row['school_name'];
    $this->campus= $this->order_row['campus_name'];
    $this->city= $this->order_row['city'];
    //
    $seller_id= $this->order_row['seller_id'];
    $get_userinfo_sq= "select * from user_info, seller_info, school_info
    where user_info.id=seller_info.uid and
    (school_info.school_id,school_info.campus_id)=(seller_info.real_school_id,seller_info.real_campus_id) and
    seller_info.id=$seller_id";
    $this->db_for_sellerInfo->query($get_userinfo_sq);
    $seller_result= $this->db_for_sellerInfo->getRow();
    //
    $this->seller_username= $seller_result['username'];
    $this->seller_school= $seller_result['school_name'];
    $this->seller_major= $seller_result['major'];
  }
  public function __destruct(){
    $this->db_for_sellerInfo->close();
    $this->db_for_orderInfo->close();
  }
}

?>
