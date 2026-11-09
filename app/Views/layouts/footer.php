</div>
<!-- فوتر -->
<footer class="py-4">
    <div class="container text-center"><small>تمامی حقوق این سایت محفوظ است &copy; ۱۴۰۵</small></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/public/assets/plugins/alertifyjs/alertify.min.js"></script>
<script src="<?= BASE_URL ?>/public/assets/js/data.js"></script>
<script src="<?= BASE_URL ?>/public/assets/js/app.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right')

    <?php if (isset($_SESSION['success'])): ?>
    alertify.success('<?= $_SESSION['success'] ?>');
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
    alertify.error('<?= $_SESSION['error'] ?>');
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</script>
</body>
</html>