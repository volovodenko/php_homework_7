<?php
/**
 * Отображение флэш-сообщения
 */
function getFlash()
{
    if (isset($_COOKIE["flash"])) {
        $status = $_COOKIE["status"] ? "flash Ok" : "flash Alert";
        echo "<div class='". $status . "'>" . $_COOKIE["flash"] . "</div>";
    }

}