<?php

require_once './vendor/autoload.php';
require_once ('db.php');

//必须要写的文件combo
$loader = new Twig_Loader_Filesystem('./templates');//加载文件系统
$twig = new Twig_Environment($loader);//twig的文件加载对象



$db = new DBConnection();
$result = $db->getAllItemsReturnObj();

echo $twig->render('index4.html.twig', array('result' => $result));








?>