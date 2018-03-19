<?php
/**
 * @param $fileName
 * @param array $data
 * @return string
 * Рендеринг соотвествующиего контента
 */
function render ($fileName, $data = []) {

    if (!file_exists($fileName)) {
        return "";
    }

    ob_start();
    extract($data);
    include($fileName);
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}