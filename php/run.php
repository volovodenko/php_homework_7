<?php
include_once "./php/config.php";
include_once "./php/controller.php";
include_once "./php/camelCase.php";
include_once "./php/getSESSION.php";
/**
 * Ф-ция определения акции, субакции и запуска контроллера
 */
function run() {
    $uri = trim($_SERVER['REQUEST_URI'], "/");
    $uriArray = explode("?", $uri);

    $uri = array_shift($uriArray);
    $subAction = array_shift($uriArray);

    $action = $uri ?: "home";

    $action = camelCase($action);

    controller($action, $subAction);
}