<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

defined("SITE_URL") | define("SITE_URL", "http://localhost/persian_province_cities_database/admin/");
function siteUrl($path = null) {
    return SITE_URL . $path;
}

function loadView($url, $data = null) {
    include_once "views/" . $url;
}