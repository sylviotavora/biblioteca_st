<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row my-5">
            <div class="col-12">
            
                <h3><?= $LNG->TXT($feature->name) ?></h3>
                <hr>
               
                <?= form_open($feature->controller . '/' . $feature->initial_method) ?>

                <div class="mb-3">
                    <label class="form_label" for="text_value">Valor:</label>
                    <input type="text" class="form-control" name="text_value" id="text_value" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" value="Aceitar">
                </div>

                <?= form_close() ?>

                <?php if(!empty($initial_value)): ?>

                    <div class="mt-5">
                        <p>Valor inicial: <strong><?= $initial_value ?></strong></p>
                        <p>Has MD5: <strong><?= $final_value ?></strong></p>
                    </div>

                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>