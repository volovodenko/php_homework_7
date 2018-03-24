<?php
/**
 * @param $name - наименование переменной
 * @return string
 * выборка переменной $name из массива _COOKIE
 */
function getCOOKIE($name)
{
    return isset($_COOKIE[$name])
        ? $_COOKIE[$name]
        : null;
}