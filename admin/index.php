<?php
include_once "init.php";
$headerFooter = new \Library\HeaderFooter();
$headerFooter->header("صفحه نخست");
loadView("home/index.php");
$headerFooter->footer();
