<?php
const DIR = __DIR__;
session_start();
$folders = ['./libraries/facades/*.php', './helpers/*.php', './middleware/*.php', './models/*.php', './libraries/PHPExcel/*.php'];
foreach ($folders as $folder) {
    foreach (glob($folder) as $file) {
        require_once $file;
    }
}
require __DIR__ . '/libraries/PHPMailer/PHPMailer.php';
require __DIR__ . '/libraries/PHPMailer/SMTP.php';
date_default_timezone_set(timezone);
$main = new main();
