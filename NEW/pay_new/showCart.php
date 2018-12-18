<?php
include '../php/DB.php';

class showCart{
  private $db;
  private $order_num;
  private $sq;
  private $order_arr;
  private $i;
  public $class_name;
  public $price;
  public $order_id;

  public function __construct($arr){
    $this->db= new DB();
    $this->db->connect();
    $this->order_num= count($arr);
    $this->order_arr= $arr;
    $this->i= 0;
  }
  public function getOrderInfoInCart(){
    $this->order_id= $this->order_arr[$this->i];
    $this->i++;
    $sq= "select * from order_info where id='$this->order_id'";
    $this->db->query($sq);
    $order_in_cart_result= $this->db->getRow();
    $this->class_name= $order_in_cart_result['class_name'];
    $this->price= $order_in_cart_result['price'];
  }
  public function __destruct(){
    $this->db->close();
  }
}



 ?>
