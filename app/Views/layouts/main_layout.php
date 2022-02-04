<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME . " " . APP_VERSION ?></title>
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>

<?= $this->renderSection('content') ?>

<!-- scripts js -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    
</body>
</html>