<p>This is <b><?= $title ?></b> page.</p>
<section class="crud">
    <ul class="crud_row-title">
        <li>User name</li>
        <li>Password</li>
        <li>RegDate</li>
        <li>Operations</li>
    </ul>
    <?php if (empty($content)): ?>
        <ul class="crud_row">
            <li>Empty base. Please register users</li>
            <li>Empty base. Please register users</li>
            <li></li>
            <li></li>
        </ul>
    <?php endif; ?>
    <?php foreach ($content as $value): ?>
        <ul class="crud_row">
            <li class="email"><?= $value["email"] ?></li>
            <li class="password"><?= $value["password"] ?></li>
            <li class="regdate"><?= $value["regdate"] ?></li>
            <li>
                <button type="button" title="Edit" class="action edit" value="<?= $value["email"] ?>">
                    <i class="fa fa-pencil fa-lg"></i>
                </button>
                <button type="button" title="Delete" class="danger del" value="<?= $value["email"] ?>">
                    <i class="fa fa-trash-o fa-lg"></i>
                </button>
            </li>
        </ul>
    <?php endforeach; ?>
</section>

<form class="menu_form collapse" id="delForm" method="POST" action="?deluser">
    <fieldset>
        <legend id="legendDelete">
        </legend>
        <button id="delConfirmYes" value="">Yes</button>
        <button id="delConfirmNo">Cancel</button>
    </fieldset>
</form>

<form class="menu_form collapse" id="editForm" method="POST" action="?edituser">
    <fieldset>
        <legend>
            Edit user
        </legend>

        <input type="email" name="newUserEmail" placeholder="E-mail" value="" id="newUserEmail">
        <input type="password" name="newUserPassword" placeholder="Password">
        <button type="submit">Submit</button>
        <button id="editConfirmNo">Cancel</button>
    </fieldset>
</form>