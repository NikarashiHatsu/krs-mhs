<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<h6 class="text-lg font-medium mb-6">
    Welcome, <?= session()->user->name ?>
</h6>

<div class="grid grid-cols-3 gap-4">
    <div class=" card shadow-2xl lg:card-side bg-info text-primary-content">
      <div class="card-body">
        <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos.</p> 
        <div class="justify-end card-actions">
          <button class="btn btn-primary">
                More info
                
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 ml-2 stroke-current">  
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>                        
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class=" card shadow-2xl lg:card-side bg-success text-primary-content">
      <div class="card-body">
        <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos.</p> 
        <div class="justify-end card-actions">
          <button class="btn btn-primary">
                More info
                
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 ml-2 stroke-current">  
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>                        
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class=" card shadow-2xl lg:card-side bg-error text-primary-content">
      <div class="card-body">
        <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos.</p> 
        <div class="justify-end card-actions">
          <button class="btn btn-primary">
                More info
                
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 ml-2 stroke-current">  
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>                        
            </svg>
          </button>
        </div>
      </div>
    </div>
</div>

<?= $this->endSection() ?>