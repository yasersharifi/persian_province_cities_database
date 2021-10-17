<?php
include_once "init.php";
$headerFooter = new Back\Library\HeaderFooter();
$headerFooter->header("صفحه نخست");
loadView("home/index.php");
$headerFooter->footer();
