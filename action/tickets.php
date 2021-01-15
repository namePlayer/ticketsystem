<?php
if(!isLoggedIn()) {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Um diese Seite aufrufen zu können, müssen Sie angemeldet sein!'];
    header('Location: ' . $requestedPath . '/login');
    exit();
}

$accountId = getAccountId();

$stmt = $dbConnection->prepare('SELECT Ticket.ticket_id, Ticket.subject, Ticket.status, accountgroup.title, Account.firstname, Account.lastname  FROM Ticket LEFT JOIN account ON Ticket.assigned_user = Account.account_id LEFT JOIN accountgroup ON Ticket.assigned_group = accountgroup.group_id WHERE Ticket.creator = :creator ORDER BY `created` DESC');
$stmt->bindParam(':creator', $accountId);
$stmt->execute();

$output = '';
while($row = $stmt->fetch()) {

    $agent = '';
    if($row['title'] !== NULL) {
        $agent = $row['title'];
    }
    if(empty($agent) && $row['firstname'] !== NULL || $row['lastname'] !== NULL) {
        $agent = $row['firstname'] . ' ' . $row['lastname'];
    }

    $ticketStatus = 'Unbekannt';
    if($row['status'] == 'Open') {
        $ticketStatus = 'Offen';
    }
    if($row['status'] == 'Pending') {
        $ticketStatus = 'Ausstehend';
    }
    if($row['status'] == 'Resolved') {
        $ticketStatus = 'Gelöst';
    }
    if($row['status'] == 'Closed') {
        $ticketStatus = 'Geschlossen';
    }


    $output .= '<tr><td>'.$row['ticket_id'].'</td><td>'.$row['subject'].'</td><td>'.$ticketStatus.'</td><td>'.$agent.'</td><td><a href="'. $requestedPath . '/ticket/' .$row['ticket_id'].'">Einsehen</a></td></tr>';

}

require_once TEMPLATE_DIR.'page/tickets.php';