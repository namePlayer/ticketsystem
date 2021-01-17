<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TicketSystem :: Login</title>
    <link href="<?= $requestedPath ?>/asset/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php require_once TEMPLATE_DIR.'element/navigation.php'; ?>

    <div class="container mt-4">

        <?= $templateBuilder->renderMessages($messages); ?>

        <div class="row">
            <div class="col-5">
                <h5>Anmelden</h5>
                <hr>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email:</label>
                        <input class="form-control" type="email" placeholder="test@beispiel.de" id="loginEmail" name="loginEmail">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Passwort:</label>
                        <input id="loginPassword" class="form-control" type="password" placeholder="Passwort" name="loginPassword">
                    </div>
                    <input type="submit" class="btn btn-dark float-end" value="Anmelden">
                </form>
            </div>
            <div class="col-7">
                <h5>Sie haben noch kein Konto?</h5>
                <hr>
                <p>Mit einem Konto haben Sie viele Vorteile. Sie können den Ticket-Status einsehen, Sie können Ticket-Benachrichtigungen deaktiveren, sie haben die volle Kontrolle über ihr Ticket und sehen den aktuellen bearbeiter ihres Tickets.</p>
                <span>Überzeugt? <b>Jetzt registrieren!</b></span>
                <a href="<?= $requestedPath ?>/register" class="btn btn-dark btn-sm float-end" role="button">Registrieren</a>
            </div>
        </div>
    </div>

</body>
</html>