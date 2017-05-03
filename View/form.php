<?php if (!empty($error)) {
    echo '<div style="color: red">' . $error . '</div>';
}?>
<form id="testForm" name="test" method="POST">
    <label>
        Имя:<br>
        <input type="text"
               value="<?php echo isset($name) ? $name : ''; ?>"
               name="name" placeholder="Пример: Руслан" />
        <?php
        if (!empty($errors['name'])) {
            echo '<span style="color: red">'. $errors['name'] .'</span>';
        }
        ?>
    </label>
    <label>
        <br><br>
        E-mail:

        <br>
        <input type="text"
               value=""
               name="email">
        <?php
        if (!empty($errors['email'])) {
            echo '<span style="color: red">' . $errors['email'] . '</span>';
        }
        ?>

    </label>
    <label><br>
    <input type="submit" name="testName" value="Отправить">
</form>

<?php
if (!empty($contacts)) {
    echo '<br/><br/>Все сообщения:<br/>';
    foreach ($contacts as $contact) {
        echo htmlspecialchars($contact['name'], ENT_QUOTES, 'utf-8') . '<br/>';
        echo htmlspecialchars($contact['email'], ENT_QUOTES, 'utf-8') . '<br/><hr/>';
    }
}
?>