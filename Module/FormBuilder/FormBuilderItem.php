<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\FormBuilder;

/**
 * Class FormBuilderItem
 * @package Module\FormBuilder
 */
class FormBuilderItem
{
    /**
     * @var bool
     */
    private $required = false;

    /**
     * @var callable
     */
    private $validator = null;

    /**
     * @var string
     */
    private $itemName;

    /**
     * @var string
     */
    private $customError;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param $required
     * @return $this
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return mixed
     */
    public function isValid()
    {
        $validator = $this->validator;
        if (null === $validator) {
            return true;
        }

        $result = $validator($this->value);
        if (true !== $result) {
            $this->setCustomError($result);
            return false;
        }

        return true;
    }

    /**
     * @param callable $validator
     * @return $this
     */
    public function setValidator(callable $validator)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomError()
    {
        return $this->customError;
    }

    /**
     * @param $customError
     * @return $this
     */
    public function setCustomError($customError)
    {
        $this->customError = $customError;
        return $this;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * FormBuilderItem constructor.
     * @param $itemName
     */
    public function __construct($itemName = '')
    {
        if ($itemName !== '') {
            $this->setName($itemName);
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->itemName;
    }

    /**
     * @param $itemName
     * @return $this
     */
    public function setName($itemName)
    {
        $this->itemName = $itemName;

        return $this;
    }
}
