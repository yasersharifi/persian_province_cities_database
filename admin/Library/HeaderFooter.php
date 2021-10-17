<?php
namespace Library;

class HeaderFooter
{
    public final function header($pageTitle = null, $css = null, $js = null) {
        include_once "./views/template/header.php";
    }

    public final function footer($js = null) {
        include_once "./views/template/footer.php";
    }

}