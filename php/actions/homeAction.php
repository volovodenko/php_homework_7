<?php
/**
 * Ф-ция обработки данных для страницы home
 */
function homeAction()
{
    $menu = config("menu"); //массив меню => тайтл

    $data = [
        "title" => $menu["home"]
    ];

    view("home", $data, 'template');
}