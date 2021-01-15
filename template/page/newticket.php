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
        <h4>Neues Ticket anlegen</h4>
        <hr>

        <?php $templateBuilder->renderMessages($messages) ?>

        <form action="" method="post">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="newTicketSubject" class="form-label">Betreff</label>
                    <input type="text" class="form-control shadow" id="newTicketSubject" name="newTicketSubject">
                </div>
                <div class="col-12 mb-3">
                    <label for="newTicketMessage" class="form-label">Nachricht</label>
                    <textarea id="newTicketMessage" class="form-control shadow" rows="5" name="newTicketMessage"></textarea>
                </div>
                <button type="submit" class="btn btn-dark mt-3 btn">Ticket speichern</button>
            </div>
        </form>

    </div>
</body>
</html>