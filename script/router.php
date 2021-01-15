<?php
$requestedUrl = $_SERVER['REQUEST_URI'];
$requestedPath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$requestedUrl = str_replace($requestedPath, '', $requestedUrl);

if($requestedUrl == '/') {
    header('Location: home/');
    exit();
}

if(strpos($requestedUrl, '/home') !== FALSE) {
    require_once ACTION_DIR.'home.php';
    exit();
}

if(strpos($requestedUrl,'/login') !== FALSE) {
    require_once ACTION_DIR.'login.php';
    exit();
}

if(strpos($requestedUrl,'/register') !== FALSE) {
    require_once ACTION_DIR.'register.php';
    exit();
}

if(strpos($requestedUrl,'/logout') !== FALSE) {
    session_destroy();
    session_start();
    $_SESSION['ticketSystemFlashMessage'] = ['type' => 'success', 'message' => 'Sie wurden erfolgreich abgemeldet!'];
    header('Location: '. $requestedPath . '/login');
    exit();
}

if(strpos($requestedUrl,'/mytickets') !== FALSE) {
    require_once ACTION_DIR.'tickets.php';
    exit();
}

if(strpos($requestedUrl,'/ticket/') !== FALSE) {
    require_once ACTION_DIR.'viewticket.php';
    exit();
}

if(strpos($requestedUrl,'/newticket') !== FALSE) {
    require_once ACTION_DIR.'newticket.php';
    exit();
}
