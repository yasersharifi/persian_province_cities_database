<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div style="display: flex;justify-content: space-between;align-items: center">
                <h4 class="card-title">همه استان ها</h4>
                <p class="card-description">
                    <button type="button" class="btn btn-success btn-icon" style="margin: 0 !important;">
                        <i class="ti-plus"></i>
                    </button>
                </p>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>استان</th>
                        <th>تعداد شهر</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($data)): $counter = 1; foreach ($data["data"] as $item): ?>
                        <tr>
                            <td><strong><?= $counter ++; ?></strong></td>
                            <td><?= $item->province; ?></td>
                            <td class="text-primary"><strong><?= $item->cityCount ?></strong></td>
                            <td style="width: 260px">
                                <div class="template-demo d-flex justify-content-between flex-nowrap">
                                    <button type="button" class="btn btn-inverse-danger btn-icon" style="margin: 0 !important;">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-icon" style="margin: 0 !important;">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <a href="<?= siteUrl('province.php/show?id=') . $item->provinceId; ?>" class="btn btn-primary btn-icon" style="margin: 0 !important;" title="مشاهده جزئیات">
                                        <i class="ti-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <div style="display: flex;justify-content: center">
                <?= $data["pagination"]; ?>
            </div>
        </div>
    </div>
</div>