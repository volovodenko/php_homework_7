<?php
session_save_path("./session/");
session_start();
include_once "./php/database.php";
include_once "./php/getPOST.php";
include_once "./php/getCOOKIE.php";
include_once "./php/run.php";

run();