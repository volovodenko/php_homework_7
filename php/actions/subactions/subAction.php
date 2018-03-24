<?php
include_once "./php/actions/subactions/loginSubAction.php";
include_once "./php/actions/subactions/registerSubAction.php";
include_once "./php/actions/subactions/logoutSubAction.php";
include_once "./php/actions/subactions/deluserSubAction.php";
include_once "./php/actions/subactions/edituserSubAction.php";

/**
 * @param null $subAction
 * Ф-ция вызова определенной субакции (из списка выше)
 */
function subAction($subAction = null) {
    if ($subAction) {  //если пришло наименование субакции
        $subAction .= "SubAction";
        if (function_exists($subAction)) { //если есть такая функция
            call_user_func($subAction);  //вызываем ее
        }
    }
}
