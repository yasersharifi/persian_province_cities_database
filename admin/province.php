<?php
namespace Back\View;
include_once "init.php";

use Back\Library\HeaderFooter;
use Back\Models\ProvinceModel;

class province {
    private mixed $headerFooter;
    private mixed $provinceObject;

    public function __construct()
    {
        $this->headerFooter = new HeaderFooter();
        $this->provinceObject = new ProvinceModel();
    }

    public function index() {


        $this->headerFooter->header("همه استان ها");

        $data = $this->provinceObject->get();

        loadView("province/index.php", $data);

        $this->headerFooter->footer();
    }
}

if (basename($_SERVER["REQUEST_URI"]) == "province.php" || basename($_SERVER["REQUEST_URI"]) == "index") {
    $provinceObject = new \Back\View\province();
    echo $provinceObject->index();
}