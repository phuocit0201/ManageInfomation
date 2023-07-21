<?php
function redirect($url)
{
    header("location:" . base . $url);
    return;
}
?>