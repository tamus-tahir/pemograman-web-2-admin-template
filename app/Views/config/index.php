<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif ?>

<form class="row g-3" method="post" action="/config/update">

    <div class="col-md-4">
        <label for="appname" class="form-label">App Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('appname') ? 'is-invalid' : ''; ?>" id="appname" name="appname" required value="<?= $config['appname']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('appname') ? 'is-invalid' : ''; ?>
        </div>
    </div>
    <div class="col-md-8">
        <label for="copyright" class="form-label">Copyright <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('copyright') ? 'is-invalid' : ''; ?>" id="copyright" name="copyright" required value="<?= $config['copyright']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('copyright') ? 'is-invalid' : ''; ?>
        </div>
    </div>
    <div class="col-md-8">
        <label for="keywords" class="form-label">Keywords <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('keywords') ? 'is-invalid' : ''; ?>" id="keywords" name="keywords" required value="<?= $config['keywords']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('keywords') ? 'is-invalid' : ''; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('author') ? 'is-invalid' : ''; ?>" id="author" name="author" required value="<?= $config['author']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('author') ? 'is-invalid' : ''; ?>
        </div>
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
        <textarea class="form-control <?= validation_show_error('description') ? 'is-invalid' : ''; ?>" id="description" name="description" required cols="30" rows="2"><?= $config['description']; ?></textarea>
        <div class="invalid-feedback">
            <?= validation_show_error('description') ? 'is-invalid' : ''; ?>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>