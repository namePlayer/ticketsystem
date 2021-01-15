<?php
session_start();

define('CONFIG_DIR', __DIR__.'/config/');
define('ACTION_DIR', __DIR__.'/action/');
define('SCRIPT_DIR', __DIR__.'/script/');
define('ASSET_DIR', __DIR__.'/asset/');
define('TEMPLATE_DIR', __DIR__.'/template/');

$messages = [];
if(isset($_SESSION['ticketSystemFlashMessage'])) {
    $messages[] = $_SESSION['ticketSystemFlashMessage'];
    unset($_SESSION['ticketSystemFlashMessage']);
}

require_once CONFIG_DIR.'database.config.php';
require_once SCRIPT_DIR.'database.php';
require_once SCRIPT_DIR.'utilities.php';

require_once SCRIPT_DIR.'TemplateBuilder.php';
$templateBuilder = new TemplateBuilder();

require_once SCRIPT_DIR.'AccountSource.php';
$accountSource = new AccountSource($dbConnection, getAccountId());

require_once SCRIPT_DIR.'router.php';