<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\ContactForm;

use Module\FormBuilder\Exception\FormValidateParamException;
use Module\FormBuilder\FormBuilderInterface;

/**
 * Class ContactForm
 * @package Module\ContactForm
 */
class ContactForm
{
    /**
     * @var FormBuilderInterface|null
     */
    protected $formBuilder = null;
    protected $isValid = false;

    /**
     * @var bool|FormSaveInterface
     */
    protected $formSave = false;

    /**
     * ContactForm constructor.
     * @param ContactFormBuilder $contactFormBuilder
     * @param FormSaveInterface $formSave
     */
    public function __construct(ContactFormBuilder $contactFormBuilder, FormSaveInterface $formSave)
    {
        $this->formBuilder = $contactFormBuilder->buildForm();
        $this->formSave = $formSave;
    }

    /**
     * @param $fields
     */
    public function handleRequest(array $fields)
    {
        foreach ($fields as $name => $value) {
            $item = $this->formBuilder->get($name);
            if (null !== $item) {
                $item->setValue($value);
            }
        }

        if (false !== $this->isValid) {
            $this->isValid = false;
        }
    }

    /**
     * @return bool
     * @throws FormValidateParamException
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
        $items = $this->formBuilder->getFields();
        $valid = 0;
        if (empty($items)) {
            return false;
        }

        foreach ($items as $item) {
            if ($item->isValid()) {
                $valid++;
            }
        }

        $this->isValid = $valid === count($items) ? true : false;

        return $this->isValid;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (!$this->isValid()) {
            return false;
        }

        $items = $this->formBuilder->getFields();
        $params = [];

        if (!empty($items)) {
            foreach ($items as $item) {
                $params[$item->getName()] = $item->getValue();
            }
        }

        return $this->formSave->save($params);
    }

    /**
     * @param $fieldName
     * @return \Module\FormBuilder\FormBuilderItem
     */
    public function getField($fieldName)
    {
        return $this->formBuilder->get($fieldName);
    }

    public function getForm()
    {

    }
}
