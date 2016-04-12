<?php
define("APP_DEBUG",true);

//定义路径常量
define("SITE_URL", "http://localhost/AA/");
define("CSS_URL", SITE_URL."public/Home/css/");
define("IMG_URL", SITE_URL."public/home/images/");
define("JS_URL", SITE_URL."public/home/js/");

define("ADMIN_CSS_URL", SITE_URL."public/Admin/css/");
define("ADMIN_IMG_URL", SITE_URL."public/Admin/img/");

function show_bug($mag)
{
	echo "<pre style='color:red'>";
	var_dump($mag);
	echo "</pre >";
}

include './ThinkPHP/ThinkPHP.php';
?>