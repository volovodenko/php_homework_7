<?php
/**
 * Ф-ция обработки данных для страницы features
 */
function featuresAction()
{
    $menu = config("menu"); //массив меню => тайтл

    $data = [
        "title" => $menu["features"]
    ];

    view("features", $data, 'template');
}