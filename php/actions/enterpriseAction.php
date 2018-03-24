<?php
/**
 * Ф-ция обработки данных для страницы enterprise
 */
function enterpriseAction()
{
    $menu = config("menu"); //массив меню => тайтл

    $data = [
        "title" => $menu["enterprise"]
    ];

    view("enterprise", $data, 'template');
}