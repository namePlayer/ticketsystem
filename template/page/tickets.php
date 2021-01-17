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
        <h4 class="float-start">Ihre Tickets</h4>
        <a href="<?= $requestedPath ?>/newticket" class="btn btn-dark btn-sm float-end">Neues Ticket</a>
        <br>
        <hr>
        <?= $templateBuilder->renderMessages($messages); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><i>#</i></th>
                    <th>Betreff</th>
                    <th>Status</th>
                    <th>Bearbeiter</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
            </tbody>
        </table>
    </div>
</body>
</html>