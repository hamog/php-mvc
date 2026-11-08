</div>
<script src="<?= BASE_URL ?>/public/assets/plugins/alertifyjs/alertify.min.js"></script>
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