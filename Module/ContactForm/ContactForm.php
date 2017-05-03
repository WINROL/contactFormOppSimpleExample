<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\ContactForm;

/**
 * Class ContactForm
 * @package Module\ContactForm
 */
class ContactForm
{
    protected $name = null;
    protected $email = null;
    static public $errors = [];

    /**
     * @var bool|FormSaveInterface
     */
    protected $formSave = false;

    /**
     * ContactForm constructor.
     * @param array $data
     * @param FormSaveInterface $formSave
     */
    public function __construct(array $data, FormSaveInterface $formSave)
    {
        foreach ($this as $key => $val) {
            if (isset($data[$key])) {
                $this->{$key} = $data[$key];
            }
        }

        $this->formSave = $formSave;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->validate();
    }

    /**
     * @return bool
     */
    private function validate()
    {
        if (empty($this->name)) {
            self::$errors['name'] = 'Не заполнено поле "name"';
        }

        if (empty($this->email)) {
            self::$errors['email'] = 'Не заполнено поле "email"';
        }

        if (!empty(self::$errors)) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (!$this->isValid()) {
            return false;
        }

        $params = [];
        $params['name'] = $this->name;
        $params['email'] = $this->email;

        return $this->formSave->save($params);
    }
}
