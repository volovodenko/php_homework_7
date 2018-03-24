<?php
/**
 * Ф-ция обработки данных для страницы tour
 */
function tourAction()
{
    $menu = config("menu");

    $data = [
        "title" => $menu["tour"]
    ];

    view("tour", $data, 'template');
}