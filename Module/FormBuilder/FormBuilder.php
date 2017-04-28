<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\FormBuilder;

/**
 * Class FormBuilder
 * @package Module\FormBuilder
 */
class FormBuilder implements FormBuilderInterface
{
    /**
     * @var array
     */
    protected $fieldList = [];

    /**
     * @param FormBuilderItem $item
     * @return $this
     */
    public function add(FormBuilderItem $item)
    {
        $this->fieldList[strtolower($item->getName())] = $item;

        return $this;
    }

    /**
     * @param $name
     * @return FormBuilderItem
     */
    public function get($name)
    {
        return isset($this->fieldList[strtolower($name)]) ? $this->fieldList[strtolower($name)] : null;
    }

    /**
     * @return FormBuilderItem[]
     */
    public function getFields()
    {
        return $this->fieldList;
    }
}
