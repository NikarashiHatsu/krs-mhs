<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex justify-between">
    <h6 class="text-lg font-medium mb-6 ">
        <?= $title ?>
    </h6>
    <a href="<?= base_url('/dashboard/dosen/new') ?>" class="btn btn-info">Tambah</a>
</div>

<div class="card bg-base-100 border mt-2">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table id="dataTable" class="table table-compact table-zebra w-full mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>NIP</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($dosen as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td>
                    <img src="<?= base_url('').'/../'.'writable/uploads/' . $item->foto?>"
                                alt="<?= $item->foto ?>"style="width: 60px;padding:4px"/>
                    </td>
                    <td><?= $item->name ?></td>
                    <td><?= $item->username ?></td>
                    <td><?= $item->nip ?></td>
                    <td><?= $item->alamat ?></td>
                    <td><?= $item->telepon ?></td>
                    <td>
                        <div class="flex justify-center gap-2">
                            <a href="<?= base_url('dashboard/dosen/edit/' . $item->id) ?>" class="btn btn-xs btn-warning">Edit</a>
                            <form action="<?= base_url('dashboard/dosen/delete/' . $item->id) ?>" method="post" class="inline">
                                <button class="btn btn-xs btn-error">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>