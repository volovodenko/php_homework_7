<?php
/**
 * @param $string - наименование переменной
 * @return string
 * выборка переменной $string из массива _SESSION
 */
function getSESSION($name)
{
    return isset($_SESSION[$name])
        ? $_SESSION[$name]
        : null;
}