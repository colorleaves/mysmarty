<?php
if(!defined("MVC")){
    echo "非法";
    exit();
}
  class db{
     public $host="localhost";
     public $user="root";
     public $pass="root";
     public $database="1612blog";
     private $opts=[];
     function __construct($table){
        $this->table=$table;
     }

     public function connect(){
         $link=new mysqli($this->host,$this->user,$this->pass,$this->database);
         $this->obj=$link;
         if(mysqli_connect_errno()){
             echo "数据库连接出错";
             exit();
         }else{
             $this->obj=$link;
         }

         $this->opts["where"]=$this->opts["order"]=$this->opts["limit"]="";

         $this->field="*";
         $this->val="";
     }

     public function select(){
         $sql="select ".$this->field." from ".$this->table." ".$this->opts["where"]." ".$this->opts["order"]." ".$this->opts["limit"];
         $arr=array();
         $result=$this->obj->query($sql);
         while ($row=$result->fetch_assoc()){
            $arr[]=$row;
         }
         return $arr;

     }

     public function where ($params){
        $this->opts["where"]="WHERE ".$params;
        return $this;
     }
      public function order ($params){
          $this->opts["order"]="ORDER BY ".$params;
          return $this;
      }
      public function limit ($params){
          $this->opts["limit"]="LIMIT ".$params;
          return $this;
      }


      public function update(){
          $sql="update ".$this->table." set ".$this->field ." ".$this->opts["where"];

          $this->obj->query($sql);
          return $this->obj->affected_rows;

      }

      public function setField($params){
        $this->field=$params;
        return $this;
      }

      public function insert (){
          $sql="insert into ".$this->table." (".$this->field.") VALUES (".$this->val.")";
          $this->obj->query($sql);
          return $this->obj->affected_rows;

      }

      public function setVal($params){
            $this->val=$params;
            return $this;
      }

      public function del(){
          $sql="delete from ".$this->table." ".$this->opts["where"];

          $this->obj->query($sql);

          return $this->obj->affected_rows;
      }

  }

?>