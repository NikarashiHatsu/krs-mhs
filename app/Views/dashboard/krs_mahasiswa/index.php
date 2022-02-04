<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<h6 class="text-lg font-medium mb-6">
    KRS Saya (Semester <?= session()->user->semester ?>)
</h6>

<div class="card bg-base-100 border">
    <div class="card-body">
        <?php $i = 1; if(count($krs) > 0): ?>

            <?php foreach($krs as $kr): ?>
                <form action="" method="post">
                    <div class="mb-6 border-b" x-data="{ minimized: <?= $kr->semester != session()->user->semester ? 'true' : 'false' ?> }">
                        <div class="flex justify-between items-center mb-6">
                            <h6 class="font-medium">
                                <?= $kr->nama ?>
                            </h6>
                            <button type="button" class="btn btn-sm btn-warning" x-show="!minimized" x-on:click="minimized = true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-sm btn-success" x-cloak x-show="minimized" x-on:click="minimized = false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                </svg>
                            </button>
                        </div>
                        <table class="table table-zebra table-compact w-full my-6" x-transition x-show="!minimized">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mata Kuliah</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; if(count($kr->detail) > 0): ?>
                                <?php foreach($kr->detail as $mk): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $mk->kode_mk ?></td>
                                        <td><?= $mk->nama_mk ?></td>
                                        <td><?= $mk->sks ?></td>
                                        <td class="flex">
                                            <input
                                                type="checkbox"
                                                name="krs_child_id[]"
                                                id="krs_child_id"
                                                class="checkbox checkbox-bordered checkbox-sm"
                                                value="<?= $mk->id ?>"
                                                <?= $kr->semester != session()->user->semester ? 'disabled' : '' ?>
                                            >
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Belum ada data KRS yang tersedia.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </form>
            <?php endforeach; ?>

        <?php else: ?>
            <p>
                Belum ada data KRS yang tersedia.
            </p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>