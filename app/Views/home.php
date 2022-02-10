<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row my-5">
        <div class="col-12 text-center">
            <h3>Funcionalidades disponíveis:</h3>
            <?php foreach($features as $feature): ?>

                <div class="card p-2 my-1">
                    <h4><?= $feature->name ?></h4>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>