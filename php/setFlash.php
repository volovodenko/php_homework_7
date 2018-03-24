<?php
/**
 * @param $message
 * @param $status
 * Установка флэш-сообщения
 */
function setFlash($message, $status) {

    $_COOKIE["flash"] = $message;
    $_COOKIE["status"] = $status; //true - сообщение Ok, false - сообщение Warning
}