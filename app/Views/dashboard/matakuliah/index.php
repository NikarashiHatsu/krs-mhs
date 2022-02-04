<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex justify-between">
    <h6 class="text-lg font-medium mb-6 ">
        <?= $title ?>
    </h6>
    <a href="<?= base_url('/dashboard/matakuliah/new') ?>" class="btn btn-info">Tambah</a>
</div>

<div class="card bg-base-100 border mt-2">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table id="dataTable" class="table table-compact table-zebra w-full mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>MTK</td>
                        <td>Matematika</td>
                        <td>3</td>
                        <td>Wajib</td>
                        <td>Aktif</td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <a href="" class="btn btn-xs btn-warning">Edit</a>
                                <a href="" class="btn btn-xs btn-error">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>MTK</td>
                        <td>Matematika</td>
                        <td>3</td>
                        <td>Wajib</td>
                        <td>Aktif</td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <a href="" class="btn btn-xs btn-warning">Edit</a>
                                <a href="" class="btn btn-xs btn-error">Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>