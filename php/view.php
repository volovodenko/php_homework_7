<?php
include_once "./php/render.php";
/**
 * @param $contentName
 * @param array $data
 * @param null $layout
 * Ф-ция отображает контент на экран
 */
function view($contentName, $data = [], $layout = null)
{
    $content = render("./php/content/" . $contentName . ".php", $data);

    if (!$layout) {
        echo $content;
    }

    $data["content"] = $content;
    echo render("./php/template/" . $layout . ".php", $data);
}