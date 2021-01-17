<?php
if(isLoggedIn()) {
    header('Location: ' . $requestedPath . '/home');
    exit();
}

if(isset($_POST['loginEmail'], $_POST['loginPassword'])) {

    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $execute = true;

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie eine gültige Email Adresse an!'];
        $execute = false;
    }

    if (empty($password)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie ein Passwort an!'];
        $execute = false;
    }

    if ($execute == true) {

        $stmt = $dbConnection->prepare('SELECT `account_id`,`password` FROM `Account` WHERE `email` = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch();
        $dbPassword = $data['password'];
        if ($stmt->rowCount() > 0 && password_verify($password, $dbPassword)) {

            $_SESSION['ticketSystemFlashMessage'] = ['type' => 'success', 'message' => 'Sie wurden erfolgreich angemeldet!'];

            $_SESSION['ticketSystemLogin'] = $data['account_id'];

            header('Location: ' . $requestedPath . '/home');

            $execute = false;
        }
    }

    if ($execute == true) {
        $messages[] = ['type' => 'danger', 'message' => 'Es ist ein Fehler während der Anmeldung aufgetreten! '];
        $execute = false;
    }

}

require_once TEMPLATE_DIR.'page/login.php';