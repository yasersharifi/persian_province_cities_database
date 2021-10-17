<?php

defined("SITE_URL") | define("SITE_URL", "http://localhost/persian_province_cities_database/admin/");
function siteUrl($path = null) {
    return SITE_URL . $path;
}