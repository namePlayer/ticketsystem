<?php
if(!$accountSource->hasSupportBackend()) {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Um diese Seite aufrufen zu können, müssen Sie als Supporter angemeldet sein!'];
    header('Location: ' . $requestedPath . '/login');
    exit();
}

$stmt = $dbConnection->prepare('SELECT COUNT(*) FROM `Ticket` WHERE `status` = "Open"');
$stmt->execute();
$unresolvedTickets = $stmt->fetchColumn();

$stmt = $dbConnection->prepare('SELECT COUNT(*) FROM `Ticket` WHERE `status` = "Open" OR `status` = "Resolved"');
$stmt->execute();
$openTickets = $stmt->fetchColumn();

$lastDay = time() - (60 * 60 *24);
$stmt = $dbConnection->prepare('SELECT COUNT(*) FROM `Ticket` WHERE `created` > :currenttime');
$stmt->bindParam(':currenttime', $lastDay);
$stmt->execute();
$lastTwentyFourHoursTickets = $stmt->fetchColumn();

require_once TEMPLATE_DIR.'page/supportArea.php';