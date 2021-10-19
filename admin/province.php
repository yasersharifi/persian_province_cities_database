<?php
namespace Back\View;
include_once "init.php";

use Back\Library\HeaderFooter;
use Back\Models\ProvinceModel;
use JetBrains\PhpStorm\NoReturn;

class province {
    private mixed $headerFooter;
    private mixed $provinceObject;

    public function __construct()
    {
        $this->headerFooter = new HeaderFooter();
        $this->provinceObject = new ProvinceModel();
    }

    public function index($page) {
        $this->headerFooter->header("همه استان ها");
        $numberOfRecordsPerPage = 7;
        $offset = ($page - 1) * $numberOfRecordsPerPage;
        $totalRows = $this->provinceObject->provinceCount();
        $totalPages = ceil($totalRows / $numberOfRecordsPerPage);
        $data = $this->provinceObject->get($offset, $numberOfRecordsPerPage);

        $pagination = '<ul class="pagination" dir="ltr">';
        $previous = "";
        $next = "";
        if ($page <= 1) {$previous = "disabled";}
        if ($page >= $totalPages) {$next = "disabled";}
        $pagination .= '<li class="page-item '. $previous .'">
                            <a class="page-link" href="'. siteUrl('province.php?page=')  . $page - 1 .'" tabindex="-1">قبلی</a>
                        </li>';
        for ($i = 1; $i <= $totalPages; $i ++) {
            $pagination .= '<li class="page-item"><a class="page-link" href="'. siteUrl('province.php?page=')  . $i .'">' . $i . '</a></li>';
        }
        $pagination .= '<li class="page-item '. $next .'">
                            <a class="page-link" href="'. siteUrl('province.php?page=')  . $page + 1 .'">بعدی</a>
                        </li>';
        $pagination .= '</ul';

        $data = array(
            "data" => $data,
            "pagination" => $pagination
        );
        loadView("province/index.php", $data);
        $this->headerFooter->footer();
    }

    public function show($provinceId) {
        $data = $this->provinceObject->getCitiesProvince($provinceId);
        loadView("province/show.php", $data);
    }

    public final function search($data){
        $search = $data["search"];
        $provinceId = $data["province"];
        $data = $this->provinceObject->search($provinceId, $search);
        echo json_encode(array("status" => "ok", "data" => $data));exit();
    }
}

if (basename($_SERVER["PHP_SELF"]) == "province.php" || basename($_SERVER["PHP_SELF"]) == "index") {
    $page = $_GET['page'] ?? 1;
    $provinceObject = new \Back\View\province();
    echo $provinceObject->index($page);
    return;
}

if (basename($_SERVER["PHP_SELF"]) == "show") {
    $provinceId = $_GET["id"];
    $provinceObject = new \Back\View\province();
    echo $provinceObject->show($provinceId);
    return;
}

if (basename($_SERVER["PHP_SELF"]) == "search") {
    $data = $_POST;
    $provinceObject = new \Back\View\province();
    echo $provinceObject->search($data);
    return;
}