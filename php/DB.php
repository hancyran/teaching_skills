<?php
/*

Here I will give you a sample .php to show the usage of DB class(DB_sample.php)

*/
class DB{
  public static $host= "localhost";
  public static $port= "5432";
  public static $dbname= "teaching_skills";
  public static $username= "haoxiran";
  public static $password= "password";
  public $result;
  public $db;
  public $row;
  public $row_num;
  public $all_rows;
  // the prepared query for the prepare() and execute()
  public $preq;
  public function connect(){
    $this->db= new PDO("pgsql:host=" . DB::$host . " port=". DB::$port . " dbname=". DB::$dbname, DB::$username, DB::$password);
    if (!$this->db) {
      print "Cannot access to database";
    }
    else{
      return $this->db;
    }
  }
  ////function for directly executable query
  public function query($sq){
    $this->result= $this->db->query($sq);
    if(!$this->result){
      print "Query not valid";
    }
    else {
      return $this->result;
    }
  }
  //get just one row from the object $result;
  public function getRow(){
    $this->row= $this->result->fetch();
    if ($this->row) {
      return $this->row;
    }
    else{
      print "All rows fetched";
    }
  }
  public function getAllRow(){
    $this->all_rows= $this->result->fetchAll();
    return $this->all_rows;
  }
  public function getRowNum(){
    $this->row_num= $this->result->rowCount();
    return $this->row_num;
  }
  //function for parameter-included query
  public function prepare($preq){
    //i.e.
    //$db->prepare('INSERT INTO family (id,name) VALUES (?,?)');
    //$st->execute(array(1,'Vito'));
    $this->preq= $this->db->prepare($preq);
    return $this->preq;
  }
  public function execute($arr){
    return $this->preq->execute($arr);
  }
  public function close(){
    $this->result= null;
    $this->db= null;
  }
}
?>
