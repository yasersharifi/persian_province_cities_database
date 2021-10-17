<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">همه استان ها</h4>
            <p class="card-description">
                Add class <code>.table-hover</code>
            </p>
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
                    <?php if (isset($data)): $counter = 1; foreach ($data as $item): ?>
                        <tr>
                            <td><?= $counter ++; ?></td>
                            <td><?= $item->name; ?></td>
                            <td class="text-danger"> <?= "1"; ?><i class="ti-arrow-down"></i></td>
                            <td style="width: 200px">
                                <div class="template-demo d-flex justify-content-between flex-nowrap">
                                    <button type="button" class="btn btn-inverse-danger btn-icon">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-icon">
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