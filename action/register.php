<?php

if(isLoggedIn()) {
    header('Location: ' . $requestedPath . '/home');
    exit();
}

$email = '';
$firstname = '';
$lastname = '';
$password = '';

if(isset($_POST['registerEmail'], $_POST['registerFirstname'], $_POST['registerLastname'], $_POST['registerPassword'])) {

    $email = $_POST['registerEmail'];
    $firstname = $_POST['registerFirstname'];
    $lastname = $_POST['registerLastname'];
    $password = $_POST['registerPassword'];
    $execute = true;

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie eine gültige Email-Adresse an!'];
        $execute = false;
    }

    if(empty($password) || mb_strlen($password) < 8) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie ein sicheres Passwort mit mindestens 8 Zeichen an!'];
        $execute = false;
    }

    if(empty($firstname)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie einen Vornamen an!'];
        $execute = false;
    }

    if(empty($lastname)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte geben Sie einen Nachnamen an!'];
        $execute = false;
    }

    if(!isset($_POST['registerTerms'])) {
        $messages[] = ['type' => 'danger', 'message' => 'Sie müssen die Nutzungsbedingungen ankzeptieren!'];
        $execute = false;
    }

    if($execute == true) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $dbConnection->prepare('SELECT COUNT(*) FROM `Account` WHERE `email` = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->fetchColumn() > 0) {
            $messages[] = ['type' => 'danger', 'message' => 'Diese Email ist bereits in Verwendung!'];
            $execute = false;
        }
    }

    if($execute == true) {
        $timestamp = time();
        $stmt = $dbConnection->prepare('INSERT INTO `Account` SET `email` = :email, `firstname` = :firstname, `lastname` = :lastname,`password` = :passwd, `registered` = :curtimestamp');
        $stmt->bindParam(':email',  $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':passwd', $password);
        $stmt->bindParam(':curtimestamp', $timestamp);
        if($stmt->execute()) {
            $messages[] = ['type' => 'success', 'message' => 'Ihr Konto wurde erfolreich angelegt!'];
            $execute = false;
        }
    }

    if($execute == true) {
        $messages[] = ['type' => 'danger', 'message' => 'Es ist ein Fehler aufgetreten!'];
        $execute = false;
    }


}

require_once TEMPLATE_DIR.'page/register.php';