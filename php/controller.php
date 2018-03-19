<?php
include_once "./php/actions/actions.php";
include_once "./php/actions/subactions/subAction.php";
/**
 * @param $action
 * @param null $subAction
 * Контроллер распределени операций по акциям и субакциям
 */
function controller($action, $subAction = null)
{
    $listAction = config("action"); //список зарегистрированных акций и субакций

    if (!in_array($action, $listAction)) { //Если акция не зарегистрированна
        return notFoundAction();
    }

    if ($subAction != null) { //Если есть субакция

        if (!in_array($subAction, $listAction)) { //Если субакция не зарегистрированна
            $subAction = null;
        }
    }

    $mainAction = $action . "Action"; //формируем название функции для соответсвующей акции

    if (function_exists($mainAction)) {
        subAction($subAction); //вызов субакции

        call_user_func($mainAction); //вызов основной акции
    } else {
        notFoundAction();
    }
}