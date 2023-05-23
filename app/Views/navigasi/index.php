<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/navigasi/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="example">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">URL</th>
                <th scope="col">Icon</th>
                <th scope="col">Dropdown</th>
                <th scope="col">Urutan</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($navigasi as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['menu']; ?></td>
                    <td><?= $row['url']; ?></td>
                    <td>
                        <i class="<?= $row['icon']; ?>"></i>
                    </td>
                    <td><?= $row['dropdown'] == 0 ? 'root' : getMenu($row['dropdown'])['menu']; ?></td>
                    <td><?= $row['urutan']; ?></td>
                    <td><?= $row['aktif'] == 1 ? 'Yes' : 'No'; ?></td>
                    <td></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endSection(); ?>