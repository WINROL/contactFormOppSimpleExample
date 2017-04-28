<?php
define('CLASS_DIR', __DIR__ . '/Module');
define('VIEW_DIR', __DIR__ . '/View');
define('FILE_NAME', __DIR__ . '/file.txt');

require_once __DIR__ . '/bootstrap.php';

try {
    $form = new \Module\ContactForm\ContactForm(
        new \Module\ContactForm\ContactFormBuilder(new \Module\FormBuilder\FormBuilder()),
        new \Module\ContactForm\ContactFormSaveToFile(FILE_NAME)
    );
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form->handleRequest($_POST);
        if ($form->isValid()) {
            $form->save();
            //делаем редирект
            header('Location: ' . $_SERVER['PHP_SELF']);
            die;
        }
    }

    $reader = new \Module\ContactForm\ContactFormReader(FILE_NAME);
    $contacts = $reader->getItems();

} catch (\Exception $exception) {
    $error = 'Неизвестная ошибка';
}

//view
require_once VIEW_DIR . '/form.php';
