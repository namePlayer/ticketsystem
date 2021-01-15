<?php
if(!isLoggedIn()) {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Um diese Seite aufrufen zu können, müssen Sie angemeldet sein!'];
    header('Location: ' . $requestedPath . '/login');
    exit();
}

$urlParts = explode('/', $requestedUrl);
var_dump($urlParts);

if(count($urlParts) !== 3 || $urlParts[2] == '') {
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'danger', 'message' => 'Dieses Ticket wurde nicht gefunden!'];
    header('Location: ' . $requestedPath . '/mytickets');
}

