<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('dashboard/dosen') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        <?= $title ?>
    </h6>
</div>

<div class="card bg-base-100 border mt-2">
    <div class="card-body">
        <form action="<?= base_url('dashboard/dosen/update/' . $data->id) ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 grid-flow-row gap-6">
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">NIP</span>
                    </label>
                    <input type="text" name="nip" value="<?= $data->nip ?>" class="input input-bordered" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="name" value="<?= $data->name ?>" class="input input-bordered" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">Telepon</span>
                    </label>
                    <input type="number" name="telepon" value="<?= $data->telepon ?>" class="input input-bordered" required />
                </div>
                <div class="col-span-12 form-control">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea name="alamat" id="alamat" rows="5" class="textarea textarea-bordered" require><?= $data->alamat ?></textarea>
                </div>
                
                
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" name="username" value="<?= $data->username ?>" class="input input-bordered" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" class="input input-bordered" />
                    <small>Kosongkan jika tidak ingin update password</small>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                    <label class="label">
                            <span class="label-text">Foto</span>
                        </label>
                        <input type="hidden" name="foto_path" value="<?= $data->foto; ?>">
                        <img src="<?= base_url('').'/../'.'writable/uploads/' . $data->foto?>" style="width: 120px;padding:4px"/>
                        <br>
                        <input type="file" name="foto" class="input input-bordered" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4 form-control">
                   
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