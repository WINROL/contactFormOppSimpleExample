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
        if (!empty($form->getField('name')->getCustomError())) {
            echo '<span style="color: red">'. $form->getField('name')->getCustomError() .'</span>';
        }
        ?>
    </label>
    <label>
        <br><br>
        E-mail:

        <br>
        <input type="text"
               value="<?php echo empty($form->getField('email')->getCustomError())
                   ? htmlspecialchars($form->getField('email')->getValue(), ENT_QUOTES, 'utf-8')
                   : ''; ?>"
               name="email">
        <?php
        if (!empty($form->getField('email')->getCustomError())) {
            echo '<span style="color: red">' . $form->getField('email')->getCustomError() . '</span>';
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