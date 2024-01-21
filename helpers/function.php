<?php

use Libraries\Facades\Route;
use PHPMailer\PHPMailer\PHPMailer;

function redirect($url)
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $isRouteName = stristr($url, $protocol) !== false ? true : false;
    if ($isRouteName) {
        header("location:" . $url);
    } else {
        header("location:" . base . $url);
    }
    exit();
}

function route($routeName)
{
    if (empty($routeName)) return null;
    $routes = array_merge(Route::routesGet(), Route::routesPost());
    foreach ($routes as $route) {
        if ($route->name === $routeName) {
            return base . $route->path;
        }
    }
}

function getOldValue($key)
{
    if (isset($_SESSION['old'][$key])) {
        $value = $_SESSION['old'][$key];
        unset($_SESSION['old'][$key]);
        return $value;
    }
    return '';
}

function setOldValue($data)
{
    if (isset($_SESSION['old'])) {
        unset($_SESSION['old']);
    }
    $_SESSION['old'] = $data;
}

function isRoute($path)
{
    if (strtolower(trim($path, '/')) === trim(strtolower(explode('?', getFullURL())[0]), '/')) {
        return true;
    }
    return false;
}

function getPathRequest()
{
    $url = explode("?", explode(base, getFullURL())[1])[0] ?? '';
    return trim($url, '/') ? trim($url, '/') : '/';
}

function getFullURL() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $requestUri = $_SERVER['REQUEST_URI'];

    return $protocol . $host . $requestUri;
}

function sendEmail($data)
{
    try {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = Host;
        $mail->SMTPAuth = SMTPAuth;
        $mail->Username = Username; // Địa chỉ email của bạn
        $mail->Password = Password; // Mật khẩu email của bạn
        $mail->SMTPSecure = SMTPSecure;
        $mail->Port = Port;
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->setFrom(Email, Name);
        $mail->addAddress($data['email']);
        $mail->Subject = $data['subject'];
        $mail->Body = $data['body'];
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
    
}

function dd($data)
{
    echo '<pre>';
    print_r($data);
    exit();
}
