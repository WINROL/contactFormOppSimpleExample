<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\FormBuilder;

/**
 * Interface FormBuilderInterface
 * @package Module\FormBuilder
 */
interface FormBuilderInterface
{
    /**
     * @param FormBuilderItem $item
     * @return $this
     */
    public function add(FormBuilderItem $item);

    /**
     * @param $name
     * @return FormBuilderItem
     */
    public function get($name);

    /**
     * @return FormBuilderItem[]
     */
    public function getFields();
}
