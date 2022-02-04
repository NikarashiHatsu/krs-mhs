<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('dashboard/matakuliah') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        <?= $title ?>
    </h6>
</div>

<div class="card bg-base-100 border mt-2">
    <div class="card-body">
        <form action="<?= base_url('dashboard/matakuliah/create') ?>" method="post">
            <div class="grid grid-cols-12 grid-flow-row gap-6">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label"><span class="label-text">Kategori</span></label>
                    <select name="kategori" id="kategori" class="select select-bordered" required>
                        <option value="non-prasyarat">Non Prasyarat</option>
                        <option value="wajib">Wajib</option>
                        <option value="teori">Teori</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">Kode MK</span>
                    </label>
                    <input type="text" name="kode_mk" class="input input-bordered" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">Nama MK</span>
                    </label>
                    <input type="text" name="nama_mk" class="input input-bordered" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">SKS</span>
                    </label>
                    <input type="number" name="sks" class="input input-bordered" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <div class="p-6 card bordered">
                        <div class="form-control">
                            <label class="cursor-pointer label">
                                <span class="label-text">Aktif ?</span>
                                <input type="checkbox" name="status" value="1" checked="checked" class="checkbox checkbox-primary">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 flex justify-end">
                    <button class="btn btn-primary">
                        <span class='mr-2'>
                            Simpan
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>