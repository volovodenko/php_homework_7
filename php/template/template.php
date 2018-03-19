<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Framework | <?= $title ?></title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/font-awesome/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="wrapper">

    <header>
        <nav class="menu">
            <ul class="menu_left">
                <?php foreach (config("menu") as $link => $page): ?>

                    <?php if ($link == "home") : ?>
                        <li><a href="/<?= $link ?>" class="fa fa-home"></a></li>
                    <?php else: ?>
                        <li><a href="/<?= $link ?>"><?= $page ?></a></li>
                    <?php endif ?>

                <?php endforeach ?>
            </ul>


            <?php
            $email = getSESSION("email");
            if ($email) {
                include_once "./php/modules/menuRightLogged.php";
            } else {
                include_once "./php/modules/menuRightLogin.php";
            }

            ?>
        </nav>

        <?php
        if (!getSESSION("email")) {
            include_once "./php/modules/regForm.php";
            include_once "./php/modules/loginForm.php";
        }
        ?>
    </header>

    <main>
        <?php getFlash(); ?>
        <?= $content ?>
    </main>
</div>
<script src="./js/jquery.min.js"></script>
<script src="./js/common.js"></script>
</body>
</html>



