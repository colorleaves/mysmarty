<?php
if(!defined("MVC")){
    echo "非法";
    exit();
}
class route{
    private static $dir="";
    private static $file="";
    private static $action="";
    public function init(){
        $this->getInfo();
    }
    private function getInfo(){
          self::$dir=(isset($_REQUEST["d"])&&!empty($_REQUEST["d"]))?$_REQUEST["d"]:"index";

          self::$file=(isset($_REQUEST["f"])&&!empty($_REQUEST["f"]))?$_REQUEST["f"]:"index";
          self::$action=(isset($_REQUEST["a"])&&!empty($_REQUEST["a"]))?$_REQUEST["a"]:"init";
          $fulldir=MODULE_PATH. self::$dir;

          if(is_dir($fulldir)){
              $fullpath=MODULE_PATH. self::$dir."/".self::$file.".class.php";

              if(is_file($fullpath)){
                  include $fullpath;
                  if(class_exists(self::$file,false)){
                      $obj=new self::$file();

                      if(method_exists($obj,self::$action)){
                         $method=self::$action;
                         $obj->$method();

                      }else{
                          echo self::$action."方法不存在";
                      }
                  }else{
                      echo self::$file."类不存在";
                  }

              }else{
                  echo $fullpath."这个文件不存在";
              }

          }else{
            echo $fulldir."这个文件夹不存在";
          }




    }

}