<?php
define('CLASS_DIR', __DIR__ . '/Module');
define('VIEW_DIR', __DIR__ . '/View');
define('FILE_NAME', __DIR__ . '/file.txt');

require_once __DIR__ . '/bootstrap.php';

use \Module\ContactForm\ContactForm;
use \Module\ContactForm\ContactFormSaveToFile;

try {
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form = new ContactForm(
            $_POST,
            new ContactFormSaveToFile(FILE_NAME)
        );

        if ($form->isValid()) {
            $form->save();
            //делаем редирект
            header('Location: ' . $_SERVER['PHP_SELF']);
            die;
        }

        $errors = $form::$errors;
    }

    $reader = new \Module\ContactForm\ContactFormReader(FILE_NAME);
    $contacts = $reader->getItems();

} catch (\Exception $exception) {
    $error = 'Неизвестная ошибка';
}

//view
require_once VIEW_DIR . '/form.php';
