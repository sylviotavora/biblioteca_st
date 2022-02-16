<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row my-5">
        <div class="col-12 text-center">
            <h3>Funcionalidades disponíveis:</h3>
            <?php foreach($features as $feature): ?>

                <div class="card p-2 my-1">
                    <h4><?= $LNG->TXT($feature->name) ?></h4>
                    <p><a href="<?= site_url($feature->controller . '/' . $feature->initial_method) ?>" class="link-app">Link</a></p>
                </div>



            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>