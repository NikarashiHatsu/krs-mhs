<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('dashboard/krs') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Tambah KRS
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/krs/update/' . $krs->id) ?>" method="post">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label for="nama" class="label">
                        <span class="label-text">Nama KRS</span>
                    </label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        class="input input-bordered"
                        placeholder="KRS Prodi TI Sm. 1"
                        value="<?= $krs->nama ?>"
                        required
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
                        class="input input-bordered"
                        placeholder="1"
                        value="<?= $krs->semester ?>"
                        required
                    />
                </div>
                <div class="col-span-12 flex justify-end">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>