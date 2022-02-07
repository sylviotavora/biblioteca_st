<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row my-5">
        <div class="col-12 text-center">
            <h1>STAVORA</h1>
            <a href="#" class="btn btn-primary">Botão CSS Bootstrap</a>
            <a href="#" class="btn btn-primary"><?= TXT('cancel', 'pt') ?></a>
            <a href="#" class="btn btn-primary"><?= TXT('accept', 'pt') ?></a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>