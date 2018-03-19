<?php
/**
 * Ф-ция обработки данных для страницы product
 */
function productAction()
{
    $menu = config("menu");

    $data = [
        "title" => $menu["product"]
    ];

    view("product", $data, 'template');
}