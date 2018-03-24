<?php
/**
 * Ф-ция обработки данных для страницы pricing
 */
function pricingAction()
{
    $menu = config("menu"); //массив меню => тайтл

    $data = [
        "title" => $menu["pricing"]
    ];

    view("pricing", $data, 'template');
}