<?php
  header("Content-type:text/html;charset=utf-8");
  if(!defined("MVC")){
     echo "非法侵入";
     exit;
  }
  echo HTTP_PATH;
?>
