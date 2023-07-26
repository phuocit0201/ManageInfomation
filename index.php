<?php
session_start();
$folders = ['./libraries/facades/*.php', './helpers/*.php', './middleware/*.php', './models/*.php'];
foreach ($folders as $folder) {
    foreach (glob($folder) as $file) {
        require_once $file;
    }
}
date_default_timezone_set(timezone);
$main = new main();
