<?php
use Back\Library\HeaderFooter;
$headerFooter = new HeaderFooter();
$headerFooter->header("جزئیات استان ها");
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div style="display: flex;justify-content: space-between;align-items: center">
                <h4 class="card-title">همه شهر های <?= $data[0]->province; ?></h4>
                <div id="sorting">
                    <label for="search">مرتب سازی</label>
                    <select class="form-select" style="direction: ltr">
                        <option value="1">بصورت صعودی</option>
                        <option value="2">بصورت نزولی</option>
                    </select>
                </div>
                <div>
                    <form id="searchForm" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="search">جستجو</label>
                        <input type="search" name="search" class="form-control" id="search">
                    </form>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>شهر</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    <?php if (isset($data)): $counter = 1; foreach ($data as $item): ?>
                        <tr>
                            <td><strong><?= $counter ++; ?></strong></td>
                            <td><?= $item->city; ?></td>
                            <td style="width: 260px">
                                <div class="template-demo d-flex justify-content-between flex-nowrap">
                                    <button type="button" class="btn btn-info btn-icon" style="margin: 0 !important;">
                                        <i class="ti-pencil"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $headerFooter->footer(); ?>
<script>
    $(document).ready(function () {
        $("#search").on("keyup", function (e) {
            e.preventDefault();
            let search = $("#search").val();
            let province = <?= $_GET["id"]; ?>;
            $.ajax({
                url: "<?= siteUrl('province.php/search'); ?>",
                method: "POST",
                data: {search: search, province: province},
                cache: false,
                success: function (response) {
                    let data = JSON.parse(response);
                    let htmlContent = "";
                    $.each(data["data"], function (index, value) {
                        htmlContent += ' <tr><td><strong>' + index + '</strong></td>' +
                            '<td>' + value.city + '</td>' +
                            '<td style="width: 260px">' +
                            '<div class="template-demo d-flex justify-content-between flex-nowrap">' +
                            '<button type="button" class="btn btn-info btn-icon" style="margin: 0 !important;">' +
                            '<i class="ti-pencil"></i>' +
                            '</button>' +
                            '</div>' +
                            '</td>' +
                            '</tr>';
                    });
                    $("#tbody").html(htmlContent);
                }
            });
        });
    });
</script>
