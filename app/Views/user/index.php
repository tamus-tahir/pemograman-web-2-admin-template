<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/user/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profil</th>
                <th scope="col">Username</th>
                <th scope="col">Tama</th>
                <th scope="col">Telpon</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($user as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['profil']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['telpon']; ?></td>
                    <td><?= $row['aktif'] == 1 ? 'Yes' : 'No'; ?></td>
                    <td class="text-nowrap">
                        <a href="/user/edit/<?= $row['id_user']; ?>" class="btn btn-warning me-1">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <a href="/user/delete/<?= $row['id_user']; ?>" class="btn btn-danger btn-delete">
                            <i class='bx bx-trash'></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>