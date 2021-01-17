<?php
if(!isLoggedIn()) {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Um diese Seite aufrufen zu können, müssen Sie angemeldet sein!'];
    header('Location: ' . $requestedPath . '/login');
    exit();
}


if(isset($_POST['newTicketSubject'], $_POST['newTicketMessage'])) {

    $subject = $_POST['newTicketSubject'];
    $message = $_POST['newTicketMessage'];
    $execute = true;

    if(empty($subject)) {
        $messages[] = ['type' => 'danger', 'message' => 'Der Betreff darf nicht leer sein!'];
        $execute = false;
    }

    if(empty($message)) {
        $messages[] = ['type' => 'danger', 'message' => 'Eine Nachricht muss hinterlegt werden!'];
        $execute = false;
    }

    if($execute == true) {
        $defaultGroup = 1;
        $timeNow = time();
        $creatorId = getAccountId();

        $stmt = $dbConnection->prepare('INSERT INTO `Ticket` SET `subject` = :subject, `assigned_group` = :agroup, `created` = :timenow, `creator` = :creator, `message` = :msg');
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':agroup', $defaultGroup);
        $stmt->bindParam(':timenow', $timeNow);
        $stmt->bindParam(':creator', $creatorId);
        $stmt->bindParam(':msg', $message);
        if($stmt->execute()) {
            $_SESSION['ticketSystemFlashMessage'] = ['type' => 'success', 'message' => 'Ihr Ticket wurde angelegt!'];
            header('Location: ' . $requestedPath . '/mytickets');
            $execute = false;
            exit();
        }
    }

    if($execute == true) {
        $messages[] = ['type' => 'danger', 'message' => 'Es ist ein Fehler während des anlegens eines Tickets aufgetreten!'];
        $execute = false;
    }

}

require_once TEMPLATE_DIR.'page/newticket.php';