<div class="card mt-5">
    <div class="card-header">
        <h1>لیست دسته بندی ها</h1>
        <div class="float-left">
            <a class="btn btn-primary" href="<?= BASE_URL ?>/categories/create" role="button">ثبت دسته بندی</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام دسته بندی</th>
                <th>وضعیت</th>
                <th>تاریخ ثبت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td scope="row"><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td>
                        <span class="badge badge-<?= $category['status'] ? 'success' : 'danger' ?>">
                            <?= $category['status'] ? 'فعال' : 'غیرفعال' ?>
                        </span>
                    </td>
                    <td><?= $category['created_at'] ?? '-' ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL ?>/categories/edit/<?= $category['id'] ?>" role="button">ویرایش</a>
                        <a class="btn btn-danger" href="<?= BASE_URL ?>/categories/delete/<?= $category['id'] ?>" role="button">حذف</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>