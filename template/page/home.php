<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TicketSystem :: Home</title>
    <link href="<?= $requestedPath ?>/asset/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php require_once TEMPLATE_DIR.'element/navigation.php'; ?>

    <div class="container mt-4">
        <?= $templateBuilder->renderMessages($messages); ?>
    </div>

</body>
</html>