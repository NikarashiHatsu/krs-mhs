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
        <h6 class="font-medium">
            Detail KRS
        </h6>
        <!-- END: Section detail KRS -->
    </div>
</div>

<?= $this->endSection() ?>