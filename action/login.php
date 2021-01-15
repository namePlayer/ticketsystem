<?php
if(isLoggedIn()) {
    header('Location: ' . $requestedPath . '/home');
    exit();
}

if(isset($_POST['loginEmail'], $_POST['loginPassword'])) {

    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $execute = true;

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie eine gültige Email Adresse an!'];
        $execute = false;
    }

    if(empty($password)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie ein Passwort an!'];
        $execute = false;
    }

    if($execute == true) {

        $stmt = $dbConnection->prepare('SELECT `account_id`,`password` FROM `Account` WHERE `email` = :email');
        $stmt->bindParam(':email', $email);
        if($stmt->execute() && $stmt->rowCount() > 0) {
            $messages[] = ['type' => 'success', 'message' => 'Sie wurden erfolgreich angemeldet!'];

            $_SESSION['ticketSystemLogin'] = $stmt->fetch()['account_id'];

            header('Location: ' . $requestedPath . '/home');

            $execute = false;
        }
    }

}

require_once TEMPLATE_DIR.'page/login.php';