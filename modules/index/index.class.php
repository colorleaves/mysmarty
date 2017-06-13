<?php
  class index{
        function __construct(){
            $obj=new db("user");
            $obj->connect();
            $this->obj=$obj;
        }

      function select(){
            echo "这是首页的数据";
        }

         function submit(){
            echo "我是提交";
         }

         function init(){

            $result=$this->obj->select();

         }

  }

?>