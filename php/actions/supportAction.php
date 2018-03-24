<?php
/**
 * Ф-ция обработки данных для страницы support
 */
function supportAction()
{
    $menu = config("menu");

    $data = [
        "title" => $menu["support"]
    ];

    view("support", $data, 'template');
}