<?php if(session('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>

<?php if(session('warning')) : ?>
    <div class="alert alert-warning" role="alert">
        <?= session('warning') ?>
    </div>
<?php endif; ?>

<?php if(session('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('success') ?>
    </div>
<?php endif; ?>

<?php if(session('info')) : ?>
    <div class="alert alert-info" role="alert">
        <?= session('info') ?>
    </div>
<?php endif; ?>