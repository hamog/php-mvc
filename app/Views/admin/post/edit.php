<div class="card mt-5">
    <div class="card-header">
        <h1>ویرایش مقاله</h1>
    </div>
    <div class="card-body">

        <form action="<?= BASE_URL ?>/posts/update/<?= $post['id'] ?>" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="control-leabel" for="title">عنوان</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= $post['title'] ?>" required>
                        <?php if (isset($_SESSION['errors']['title'])): ?>
                            <div class="form-text text-danger"><?= $_SESSION['errors']['title']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="category_id">دسته بندی</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option value="">دسته بندی را انتخاب کنید</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"<?php if ($category['id'] == $post['category_id']): ?> selected <?php endif; ?>><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-leabel" for="status">وضعیت فعال بودن</label>
                        <input type="checkbox" class="form-control" name="status" id="status" value="1"<?= $post['status'] ? ' checked' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="body">متن مقاله</label>
                        <textarea class="form-control" name="body" id="body" rows="3" required><?= $post['body'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-warning">به روزرسانی</button>
                    <?php
                    if (isset($_SESSION['errors'])) {
                        unset($_SESSION['errors']);
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>