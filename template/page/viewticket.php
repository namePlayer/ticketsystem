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

    <div class="row">
        <div class="col-lg-9">

            <?= $responseOutput ?>
            <?= $output ?>

        </div>
        <div class="col-lg-3 shadow p-4 d-grid gap-2">
            <h5><b>Ticket ID</b></h5>
            <span>#<?= $data['ticket_id'] ?></span>
            <hr>
            <h5><b>Betreff</b></h5>
            <span><?= $data['subject'] ?></span>
            <hr>
            <h5><b>Bearbeiter</b></h5>
            <span><?= $agent ?></span>
            <hr>
            <h5><b>Ticket-Status</b></h5>
            <span><?= $ticketStatus ?></span>
            <hr>
            <button type="button" class="btn btn-dark">Antworten</button>
        </div>
    </div>

</div>

</body>
</html>