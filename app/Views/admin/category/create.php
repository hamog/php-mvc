<div class="card mt-5">
    <div class="card-header">
        <h1>ثبت دسته بندی</h1>
    </div>
    <div class="card-body">

        <form action="<?= BASE_URL ?>/categories/store" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="control-leabel" for="name">نام</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <?php if (isset($errors['name'])): ?>
                            <div class="form-text text-danger"><?= $errors['name'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-leabel" for="status">وضعیت فعال بودن</label>
                        <input type="checkbox" class="form-control" name="status" id="status" value="1" checked>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">ثبت و ذخیره</button>
                </div>
            </div>
        </form>
    </div>
</div>