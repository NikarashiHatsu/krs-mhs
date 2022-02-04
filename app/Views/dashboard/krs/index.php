<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        Master KRS
    </h6>
    <a href="<?= base_url('dashboard/krs/new') ?>" class="btn btn-primary">
        Tambah
    </a>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <table class="table table-zebra w-full" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama KRS</th>
                    <th>Semester</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; if(count($krs) > 0): ?>
                    <?php foreach($krs as $kr): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $kr->nama ?></td>
                            <td><?= $kr->semester ?></td>
                            <td>
                                <a href="<?= base_url('dashboard/krs/edit/' . $kr->id) ?>" class="btn btn-sm btn-info">
                                    Edit
                                </a>
                                <form action="<?= base_url('dashboard/krs/delete/' . $kr->id) ?>" method="post" class="inline">
                                    <button href="<?= base_url('/krs/' . $kr->id) ?>" class="btn btn-sm btn-error">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada data.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>