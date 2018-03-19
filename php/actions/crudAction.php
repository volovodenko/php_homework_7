<?php
/**
 * Ф-ция обработки данных для страницы CRUD
 */
function crudAction()
{
    $content = [];
    $menu = config("menu"); //массив меню => тайтл

    //выборка данных из базы
    $query = dbQuery("SELECT email, password, regdate FROM users ORDER BY email");
    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $content[] = $result;
    }

    $data = [
        "title" => $menu["crud"],
        "content" => $content
    ];

    view("crud", $data, 'template');
}