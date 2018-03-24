<?php
/**
 * @param $string
 * @return string
 * Ф-ция преобразовывает строку в camelCase
 */
function camelCase($string)
{
    $string = ucwords(str_replace(["-", "_"], " ", $string));

    return  lcfirst(str_replace(" ", "", $string));
}