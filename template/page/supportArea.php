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
        <div class="col-lg-3">
            <?= $templateBuilder->render('supportSidebar', ['requestedPath' => $requestedPath]); ?>
        </div>
        <div class="col-lg-9">
            <h4 class="float-start">Support Bereich</h4>
            <div class="btn-group float-end" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Neu
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#createNewTicketModal">Ticket</a></li>
                    <li><a class="dropdown-item" href="#">Konto</a></li>
                    <li><a class="dropdown-item disabled" href="#">Email</a></li>
                </ul>
            </div>
            <br><hr>
            <div class="row">
                <div class="col-4">
                    <div class="card shadow p-3">
                        <span>Ungelöste Tickets</span>
                        <h3><?= $unresolvedTickets ?></h3>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow p-3">
                        <span>Offene Tickets</span>
                        <h3><?= $openTickets ?></h3>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow p-3">
                        <span>Tickets letzte 24 Stunden</span>
                        <h3><?= $lastTwentyFourHoursTickets ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once TEMPLATE_DIR.'element/modals.php'; ?>

<script src="<?= $requestedPath ?>/asset/bootstrap.bundle.min.js"></script>

</body>
</html>