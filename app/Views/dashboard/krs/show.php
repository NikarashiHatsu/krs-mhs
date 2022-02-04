<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('dashboard/krs') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Detail KRS
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <!-- BEGIN: Section KRS -->
        <h6 class="font-medium">
            Overview KRS
        </h6>
        <div class="grid grid-cols-12 grid-flow-row gap-4 mb-6 pb-6 border-b">
            <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                <label for="nama" class="label">
                    <span class="label-text">Nama KRS</span>
                </label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="input input-bordered input-disabled"
                    placeholder="KRS Prodi TI Sm. 1"
                    value="<?= $krs->nama ?>"
                    readonly
                />
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                <label for="semester" class="label">
                    <span class="label-text">Semester</span>
                </label>
                <input
                    type="number"
                    name="semester"
                    id="semester"
                    class="input input-bordered input-disabled"
                    placeholder="1"
                    value="<?= $krs->semester ?>"
                    readonly
                />
            </div>
        </div>
        <!-- END: Section KRS -->

        <!-- BEGIN: Section detail KRS -->
        <div class="flex items-center justify-between mb-6">
            <h6 class="font-medium">
                Detail KRS
            </h6>
            <form action="<?= base_url('dashboard/krs_children/create') ?>" method="post">
                <input type="hidden" name="krs_id" value="<?= $krs->id ?>">
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="select select-bordered select-sm" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php $i = 1; if(count($mata_kuliahs) > 0): ?>
                        <?php foreach($mata_kuliahs as $mata_kuliah): ?>
                            <option value="<?= $mata_kuliah->id ?>">
                                <?= $mata_kuliah->kode_mk ?> - <?= $mata_kuliah->nama_mk ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">Belum ada Mata Kuliah yang tersedia</option>
                    <?php endif; ?>
                </select>
                <button type="submit" class="btn btn-sm btn-primary">
                    Tambah
                </button>
            </form>
        </div>
        <table class="table table-zebra table-compact w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Mata Kuliah</th>
                    <th>Jumlah SKS</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; $jumlah_sks = 0; if(count($krs_children) > 0): ?>
                    <?php foreach($krs_children as $krs_child): ?>
                        <?php $jumlah_sks += $krs_child->sks ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $krs_child->kode_mk ?></td>
                            <td><?= $krs_child->nama_mk ?></td>
                            <td><?= $krs_child->sks ?></td>
                            <td>
                                <form action="<?= base_url('dashboard/krs_children/delete/' . $krs_child->id) ?>" method="post" class="inline">
                                    <button class="btn btn-xs btn-error">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada mata kuliah yang ditambahkan ke KRS ini.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">
                        Jumlah SKS:
                    </th>
                    <th>
                        <?= $jumlah_sks ?>
                    </th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <!-- END: Section detail KRS -->
    </div>
</div>

<?= $this->endSection() ?>