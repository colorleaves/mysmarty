<?php
// 标志常量
header("content-type:text/html;charset=utf-8");
define("MVC","ok");
//项目运行的根目录
define("ROOT_PATH", substr($_SERVER["SCRIPT_FILENAME"], 0, (strrpos($_SERVER["SCRIPT_FILENAME"], "/") + 1)));
//引擎文件 目录
define("LIBS_PATH", ROOT_PATH . "libs/");
// 模块目录
define("MODULE_PATH", ROOT_PATH . "modules/");
// 服务器的根目录
define("HTTP_PATH","http://".$_SERVER["SERVER_NAME"].substr($_SERVER["SCRIPT_NAME"],0,(strrpos($_SERVER["SCRIPT_NAME"],"/")+1)));
// 静态的目录
define("STATIC_PATH",HTTP_PATH."static/");
//css目录
define("CSS_PATH",STATIC_PATH."css/");
define("JS_PATH",STATIC_PATH."js/");
define("IMG_PATH",STATIC_PATH."img/");
// 当前运行的文件
define("SELF_PATH","http://".$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"]);

include LIBS_PATH."route.class.php";
include LIBS_PATH."db.class.php";
include LIBS_PATH."smarty.class.php";
$routeObj=new route();
$routeObj->init();


?>



