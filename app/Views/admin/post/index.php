<div class="card mt-5">
    <div class="card-header">
        <h1>لیست مقاله ها</h1>
        <div class="float-left">
            <a class="btn btn-primary" href="<?= BASE_URL ?>/posts/create" role="button">ثبت مقاله</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان مقاله</th>
                <th>دسته بندی</th>
                <th>وضعیت</th>
                <th>تاریخ ثبت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td scope="row"><?= $post['id'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['category_name'] ?></td>
                    <td>
                        <span class="badge badge-<?= $post['status'] ? 'success' : 'danger' ?>">
                            <?= $post['status'] ? 'فعال' : 'غیرفعال' ?>
                        </span>
                    </td>
                    <td><?= $post['created_at'] ?? '-' ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL ?>/posts/edit/<?= $post['id'] ?>" role="button">ویرایش</a>
                        <form action="<?= BASE_URL ?>/posts/delete/<?= $post['id'] ?>" method="POST"
                              onsubmit="return confirm('آیا از حذف این دسته‌بندی اطمینان دارید؟')" class="d-inline">

                            <button type="submit" class="btn btn-danger">
                                حذف
                            </button>

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>