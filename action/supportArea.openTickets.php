<?php
if(!$accountSource->hasSupportBackend()) {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Um diese Seite aufrufen zu können, müssen Sie als Supporter angemeldet sein!'];
    header('Location: ' . $requestedPath . '/login');
    exit();
}

$userId = getAccountId();
$groupId = $accountSource->getGroupId();

$output = '';
$stmt = $dbConnection->prepare('
    SELECT Ticket.ticket_id, Ticket.subject, Ticket.created, Ticket.assigned_group, Ticket.status, Ticket.important, Account.firstname, Account.lastname, Messages.timestamp 
    FROM `Ticket` 
    LEFT JOIN account ON Ticket.creator = Account.account_id
    LEFT JOIN messages ON Ticket.ticket_id = messages.ticket
    WHERE Ticket.status = "Open" OR Ticket.status = "Resolved" AND Ticket.assigned_user = :userId OR Ticket.assigned_group = :userGroup ORDER BY `timestamp` ASC');
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':userGroup', $groupId);
$stmt->execute();

while($row = $stmt->fetch()) {
    $output .= '<tr>
                    <td>'.$row['ticket_id'].'</td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['firstname'].'  '. $row['lastname'] .'</td>
                    <td>'.$row['status'].'</td>
                    <td>'.date('d.m.Y H:i', $row['created']).'</td>
                    <td><a href="'. $requestedPath .'/supportarea/viewticket/'.$row['ticket_id'].'">Öffnen</a></td>
                </tr>';
}

require_once TEMPLATE_DIR.'page/supportArea.openTickets.php';