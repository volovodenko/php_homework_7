<?php
/**
 * @param $name - наименование переменной
 * @return string
 * выборка переменной $name из массива _POST
 */
function getPOST($name)
{
    return isset($_POST[$name])
        ? $_POST[$name]
        : null;
}