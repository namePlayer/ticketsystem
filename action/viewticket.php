<?php
if(!isLoggedIn()) {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Um diese Seite aufrufen zu können, müssen Sie angemeldet sein!'];
    header('Location: ' . $requestedPath . '/login');
    exit();
}

$output = '';
$urlParts = explode('/', $requestedUrl);

if(count($urlParts) !== 3 || $urlParts[2] == '') {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Dieses Ticket wurde nicht gefunden!'];
    header('Location: ' . $requestedPath . '/mytickets');
    exit();
}

$stmt = $dbConnection->prepare('SELECT Ticket.ticket_id, Ticket.subject, Ticket.status, Ticket.created, Ticket.message, Account.firstname, Account.lastname FROM Ticket LEFT JOIN account ON Ticket.creator = Account.account_id LEFT JOIN accountgroup ON Ticket.assigned_group = accountgroup.group_id WHERE Ticket.ticket_id = :ticketId');
$stmt->bindParam(':ticketId', $urlParts[2]);
if(!$stmt->execute()) {
    echo 'Error';
    exit();
}

$data = $stmt->fetch();
$output .= $templateBuilder->render('ticketCard', ['firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'message' => $data['message'], 'created' => $data['created']]);

$stmt = $dbConnection->prepare('SELECT Account.firstname, Account.lastname, AccountGroup.title FROM Ticket LEFT JOIN account ON Ticket.assigned_user = Account.account_id LEFT JOIN accountgroup ON Ticket.assigned_group = accountgroup.group_id');
if(!$stmt->execute()) {
    echo 'Error';
    exit();
}

$agentData = $stmt->fetch();

$agent = '';
if($agentData['title'] !== NULL) {
    $agent = $agentData['title'];
}
if(empty($agent) && $agentData['firstname'] !== NULL || $agentData['lastname'] !== NULL) {
    $agent = $agentData['firstname'] . ' ' . $agentData['lastname'];
}

$ticketStatus = 'Unbekannt';
if($data['status'] == 'Open') {
    $ticketStatus = 'Offen';
}
if($data['status'] == 'Pending') {
    $ticketStatus = 'Ausstehend';
}
if($data['status'] == 'Resolved') {
    $ticketStatus = 'Gelöst';
}
if($data['status'] == 'Closed') {
    $ticketStatus = 'Geschlossen';
}

$stmt = $dbConnection->prepare('SELECT Messages.text, Messages.user, Messages.timestamp, Account.firstname, Account.lastname FROM `Messages` LEFT JOIN account ON Messages.user = Account.account_id WHERE `ticket` = :ticketId ORDER BY Messages.`timestamp` DESC');
$stmt->bindParam('ticketId', $urlParts[2]);
if(!$stmt->execute()) {
    echo 'Error';
    exit();
}

$responseOutput = '';
while ($row = $stmt->fetch()) {
    $responseOutput .= $templateBuilder->render('ticketCard', ['firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'message' => $row['text'], 'created' => $row['timestamp']]);
}

require_once TEMPLATE_DIR.'page/viewticket.php';