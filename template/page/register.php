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
        <?php $templateBuilder->renderMessages($messages); ?>
        <div class="row">
            <div class="col-5">
                <h5>Registrieren</h5>
                <hr>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" placeholder="test@beispiel.de" id="registerEmail" name="registerEmail" value="<?= $email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="registerFirstname" class="form-label">Vorname <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" placeholder="Vorname" id="registerFirstname" name="registerFirstname" value="<?= $firstname ?>">
                    </div>
                    <div class="mb-3">
                        <label for="registerLastname" class="form-label">Nachname <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" placeholder="Nachname" id="registerLastname" name="registerLastname" value="<?= $lastname ?>">
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Passwort <span class="text-danger">*</span></label>
                        <input id="registerPassword" class="form-control" type="password" placeholder="Passwort" name="registerPassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="registerTerms" name="registerTerms">
                        <label class="form-check-label" for="registerTerms">Ich akzeptiere die Nutzungsbedingungen <span class="text-danger">*</span></label>
                    </div>
                    <input type="submit" class="btn btn-dark float-end" value="Anmelden">
                </form>
            </div>
            <div class="col-7">
                <h5>Bereits ein Konto?</h5>
                <hr>
                <p>Wenn Sie bereits ein Konto bei uns besitzen, können Sie sich bei unterem Knopf anmelden!</p>
                <span<b>Jetzt Anmelden!</b></span>
                <a href="<?= $requestedPath ?>/login" class="btn btn-dark btn-sm float-end" role="button">Anmelden</a>
            </div>
        </div>
    </div>

</body>
</html>